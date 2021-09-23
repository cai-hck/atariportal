@extends('layouts.auth')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/w3-css/4.1.0/w3.css" integrity="sha512-Ef5r/bdKQ7JAmVBbTgivSgg3RM+SLRjwU0cAgySwTSv4+jYcVeDukMp+9lZGWT78T4vCUxgT3g+E8t7uabwRuw==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
@section('body')

<section class="main">
    <div class="container custom-login-container">
        <div class="row">
             <div class="col-12 col-sm-12 col-md-12 col-lg-4 custom-signup-col-1 w3-animate-right">
                <div class="button-div" style="">
                    <div style="display: table-cell; vertical-align: middle;">
                 
	                <div class="sign-up">
	                    <div>
	                        <h3>Have an account? </h3>
	                    </div>
            		<a href="{{url("/login")}}">SIGN IN</a>
	            </div>
	            </div>
	            </div>
	        </div>
	        
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 custom-signup-col-2 w3-animate-left">
	            <div class="login-form">
            		<form action="{{URL::to('/register')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            			<h1>Register</h1>
            			<hr/>
                        @include('messages.alert')
                        
            			<div class="form-group">
            				<input type="email" placeholder="Email" name="email" required>
            				<i class="fa fa-envelope-o" aria-hidden="true"></i>
            			</div>
            			<div class="form-group">
            				<input type="text" placeholder="Username" name="name" required>
            				<i class="fa fa-key" aria-hidden="true"></i>
            			</div>
            			<div class="form-group">
            				<input type="password" placeholder="Password" name="password" required>
            				<i class="fa fa-lock" aria-hidden="true"></i>
            			</div>
            			<hr/>
            			<!--<p style="text-align;">Please the enter the following details to make a account</p>-->
            			<button>Register</button>
                    </form>
                </div>
	        </div>
	       
	   </div>
	</div>
</section>



@endsection
@section('footer')

@endsection
