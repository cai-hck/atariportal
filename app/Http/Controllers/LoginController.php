<?php namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

use Auth;
use Validator;
use Redirect;
use PDF;

class LoginController extends Controller {

    function __construct()  {
        if (Session::get('auth_token') !== null) {
            Session::flush();
            return redirect('/dashboard');
        }
    }
    
    function mailtesting() {
        $user_id = Session::get('id');
        $user_name = Session::get('username');
        $user_address = Session::get('address');
        $user_type = Session::get('role');

        $data['path'] = Route::getFacadeRoot()->current()->uri();
        $data['layout'] = 'login-layout';
        
        Mail::send('emails.testing', $data, function ($message) use ($user_name) {
            $message->from('info@development.atariportal.com', 'Atari token');
            $message->to('faizankhalid.fk1@gmail.com')
                ->bcc('shapesbespokestudio@gmail.com')
                ->subject('Atari Token – Verify your account email');
        });
        return back()->with('success', 'Email sent. Check your email.');
    }

    function index()  {

    }

    function login () {
        return view('auth.login');
    }

    function login_post(Request $request ) {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
        $params = [
            'path' => 'login',
            'params' => 'email='.$user_data['email'].'&password='. $user_data['password']
        ];
        if ($return = $this->postExternalRequest($params)) {
    
            $res = json_decode($return);
            if ( isset($res->message) && $res->message!=''  ) 
            {
                  return back()->with('error', $res->message);
            } 
            else
            {
                     // JWT token auth session
                    Session::put('auth_token', $res->token);
                    //User Details
                    Session::put('id', $res->user->_id);
                    Session::put('username', $res->user->name);
                    Session::put('address', $res->user->publicAddress);
                    Session::put('email', $res->user->email);
                    Session::put('role', $res->user->role);    
                    Session::put('att', $res->user->balAtt);    
                    Session::put('eth', $res->user->balEth);    
                    Session::put('usdt', $res->user->balUsdt);  

                    return redirect('dashboard');
            }
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }   
    
    function register() {
        return view('auth.register');
    }

    function register_post() {
        $params = [
            'path' => 'jwtsign',
            'params' => 'email='.$request['email'].'&password='. $request['password'].'&name='.$request['name']
        ];
        
        $return = $this->postExternalRequest($params);
        $res = json_decode($return);
        
        if ($res->code == 200) {
            $token = ''; // jwt token retreived by nodejs app
            $data = [
                'username' =>$request['name'],
                'url' => url('/').'/verify-account/'. $token,
                'email' => $request['email'],
            ];
            $this->sendEmailUser($data);
            return redirect('/login');    
        } else {
            return redirect('/register');
        }        
    }

    function forgot_password() {
        return view('auth.forgot-password');
    }

    function reset_password() {
        return view('auth.reset-password');
    }


    function logout() {
        Session::flush();
        return redirect('login');
    }


    public function postExternalRequest($data)
    {
        $url = 'https://vub.gla.mybluehost.me/api/users/'. $data['path'];
        
        $myvars = $data['params'];
       
        //$authorization = "Authorization: Bearer ". Session::get('auth_token');
       
        $ch = curl_init( $url );

        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        if ($data['path'] == 'login' || $data['path'] =='jwtsign')
            curl_setopt( $ch, CURLOPT_HEADER, 0);
        else
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('auth-token:'.Session::get('auth_token')));
            
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec( $ch );
        
        return $response;
        
    }
    public function getExternalRequest($data)
    {
        // create curl resource
        $url = 'https://vub.gla.mybluehost.me/api/users/'. $data['path'];
        
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        
        return $output;
    }

    public function sendEmailUser($data)
    {
        //Send email to user
        $subject = 'Welcome to Our Atari Portal';
        $to_email = $data['email'];
        $url = $data['url'];
        Mail::send('emails.verify-email', ['username'=>$data['name'],'url'=>$url], function ($message) use ($subject, $to_email){       
            $message->subject($subject);
            $message->to($to_email);
        });
    }

    public function testSendEmail(Request $request)
    {
        //'faizankhalid.fk1@gmail.com'
        $token = '12312412532634347347347347347';
        $data = [
            'username' =>'Test Email User',
            'url' => url('/').'/verify-account/'. $token,
            'email' => $request['email'],
        ];
            
        //Send email to user
        $subject = 'Welcome to Our platform';
        $to_email = $data['email'];
        $url = $data['url'];
        Mail::send('emails.verify-email', ['username'=>$data['username'],'url'=>$url], function ($message) use ($subject, $to_email){       
            $message->subject($subject);
            $message->to($to_email);
        });
        
        echo 'successfully sent email';
    }

    public function requestActivateAccount($tk)
    {
        //send activate request to nodejs API
        $data = [
            'path' => 'email-activate',
            'token' => $tk
        ];
        
        $res = $this->postExternalRequest($data);
        
        return redirect('/login');
        
    }

    function passwordResetEmail(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
        );

        $user = User::where('email', '=', $user_data)->first();

        if($user != null ){
            $data['user'] = $user;

            Mail::send('emails.reset-password', $data, function ($message) use ($user) {
                $message->from('services@igilifevitality.com.pk', 'IGI Life Vitality');
                $message->to($user->email)
                    ->subject('IGI LIFE VITALITY – Password Reset');
            });
            return back()->with('success', 'Email sent. Check your email.');
        }
        else{
            return back()->with('error', 'Email is not Valid');
        }       

    }

    public function passwordResetLink(Request $request, $id){

        $data['path'] = Route::getFacadeRoot()->current()->uri();
        $data['layout'] = 'login-layout';

        $data['user'] = User::where('email', '=',base64_decode($id))->first();

        return view('auth.password', $data);
    }

    function updatePassword(Request $request){
        $user = array(
            "password" => "Password",
            "repeat_password" => "Repeat Password",
        );
        $validator = Validator::make($request->all(),
            [
                'password'  => 'alphaNum|min:3',
                'repeat_password'  => 'alphaNum|min:3'
            ]);
        $validator->setAttributeNames($user);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }else {

            $password = $request->input('password');
            $repeat_password = $request->input('repeat_password');
            $email = $request->input('email');

            $user = User::where('email', '=', $email)->first();

            if($user != null ){
                if ($password == $repeat_password){
                    $user->password =  bcrypt($password);
                    $user->save();

                    Session::flash('success', "Password Successfully Updated");
                    return redirect('login');

                }else {
                    return back()->with('error', 'Password do not match. Try again');
                }
            }
            else{
                return back()->with('error', 'Contact Administrator');
            }
        }
    }



}

?>