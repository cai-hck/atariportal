@extends('layouts.auth')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/w3-css/4.1.0/w3.css" integrity="sha512-Ef5r/bdKQ7JAmVBbTgivSgg3RM+SLRjwU0cAgySwTSv4+jYcVeDukMp+9lZGWT78T4vCUxgT3g+E8t7uabwRuw==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 {!! NoCaptcha::renderJs() !!}
@endsection
@section('body')

<section class="main">
    <div class="container custom-login-container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 custom-login-col-1 w3-animate-right">
                <div class="login-form">
            		<form action="{{URL::to('/login')}}" method="post" class="form-class">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            			<h1>Sign in</h1>
            			<!--<hr/>-->
            			
            			<div>
            			    <i class="fa fa-facebook icons facebook-class" aria-hidden="true"></i>
            			    <i class="fa fa-google-plus icons" aria-hidden="true"></i>
            			    <i class="fa fa-linkedin icons" aria-hidden="true"></i>
            			    <p>or use your account</p>
            			</div>

                        @include('messages.alert')
            			
            			<div class="form-group">
            				<input type="email" placeholder="Email" name="email">
            				<i class="fa fa-envelope-o" aria-hidden="true"></i>
            			</div>
            			<div class="form-group">
            				<input type="password" placeholder="Password" name="password">
            				<i class="fa fa-lock" aria-hidden="true"></i>
            			</div>
            			           			                                               
            			<div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            			<!--<hr/>-->
            			<h6><a style="" href="{{URL::to('forget/password')}}">Forgot password?</a></h6>
            			<button type="submit">LOG IN</button>
            		</form>
            	</div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 custom-login-col-2 w3-animate-left">
                <div class="button-div" style="">
                    <div style="display: table-cell; vertical-align: middle;">
                    <div class="sign-up">
                        <h1>Hello, Friends!</h1>
            		<!--<h1>Don't have an account? </h1>-->
            		<p style="color:white; margin: 30px auto;">Enter your personal details and start your journey with us </p>
            		<a href="{{url("/register")}}">SIGN UP</a>
            	</div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
    
{!! NoCaptcha::renderJs() !!}

</section>
@endsection
@section('footer')

@endsection
