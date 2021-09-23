<?php namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Validator;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Redirect;

class AdminController extends Controller {

    function __construct() 
    {
        if (Session::get('auth_token') === null) {
            Session::flush();
            return redirect('/logout');
        }
    }
    
   
    function index() {

    }

    function dashboard() {
        $user_id = Session::get('id');
        $user_name = Session::get('username');
        $user_address = Session::get('address');
        $user_type = Session::get('role');
        $att=  Session::get('att');    
        $eth = Session::get('eth');    
        $usdt= Session::get('usdt');  

        $data['user'] = array("id"=>$user_id,"name"=>$user_name, "address"=>$user_address);

        
        
        if(isset($user_id)){
            $rate = number_format($this->atariTokenRate(), 4);
            $data['rate'] = $rate;            
            return view('admin.dashboard',$data);
        }

        return redirect('login');        
    }


    function token_wallet() {
        $user_id = Session::get('id');
        $user_name = Session::get('username');
        $user_address = Session::get('address');
        $user_type = Session::get('role');
        $att=  Session::get('att');    
        $eth = Session::get('eth');    
        $usdt= Session::get('usdt');        


        if(isset($user_id)){ 
            $data['user'] = array("id"=>$user_id,"name"=>$user_name, "address"=>$user_address);
            $data['month'] = date('m');
            $data['year'] = date('Y');
            $data['days'] = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);
            $data['weeks'] = ceil(number_format($data['days']/7, 2));
            $data['apiReturnValue'] =  ['att' => $att,'eth'=>$eth,'usdt'=>$usdt];

            return view('admin.token-wallet', $data);
        } else {
            return redirect('login');
        }
    }

    function personal_wallet() {
        $user_id = Session::get('id');
        $user_name = Session::get('username');
        $user_address = Session::get('address');
        $user_type = Session::get('role');
        $att=  Session::get('att');    
        $eth = Session::get('eth');    
        $usdt= Session::get('usdt');
        $data['user'] = array("id"=>$user_id,"name"=>$user_name, "address"=>$user_address);

        if(isset($user_id)){
            $data['month'] = date('m');
            $data['year'] = date('Y');
            $data['days'] = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);
            $data['weeks'] = ceil(number_format($data['days']/7, 2));

            return view('admin.personal-wallet', $data);
        }
        else{
            return redirect('login');
        }

    }
    public function atariTokenRate()
    {
        //$key ="7399ca3b-b79b-47f1-a7fd-29079c4de4b2"; //mine
        $key = "bd0bd026-502b-46c8-81ad-5d96d13c2992"; //atari
        $url ="https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=ATRI";
        
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-CMC_PRO_API_KEY:'. $key));
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch);

        $rate = 1;

        if ($output) {
            $rate = json_decode($output)->data->ATRI->quote->USD->price;
        } 
        return $rate;
    }

    public function real_time_atari_rate(Request $request)
    {
        $rate = number_format($this->atariTokenRate(), 4);
        echo $rate;
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


    public function sendMoneyPerType(Request $request)
    {
        
       // dd(Session::get('auth_token'));
        $type = $request['type'];
        $amount = $request['amount'];
        $to = $request['to'];
        
        $user_id = Session::get('id');
        $user_address = Session::get('address');

        $params = [
            'path' => '',
            'params' => "reveiverAddress=". $to. "&âmount=".$amount
        ];
        switch ($type) {
            case 'ATRI':
                $params['path'] = "sendAttari";
                break;
            case 'USDT':
                $params['path'] = "sendUsdt";
                break;
            case 'ETH':
                $params['path'] = "sendEther";
                break;                
            default: 
                return back()->with('error','Sending failed');
                break;
        }
        
        $res = $this->postExternalRequest($params);
        $result = json_decode($res);
        
        if ($result != null) {
            if ($result->code != 200)
                return back()->with('error', $result->message );
            return back()->with('success','Successfully sent');
        } else {
                return back()->with('error', 'API Failed' );
        }
    }
    
    public function receiveFund(Request $request)
    {
        $user_id = Session::get('id');
        $params = ['path'=> "getAddress?id=".$user_id];
        //$result = $this->getExternalRequest($params);
        //dd($result);
        return back()->with('error','API error');
    }
    
}

?>