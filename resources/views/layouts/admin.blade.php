<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Atari Portal </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}main/icon.png">
	<link rel="stylesheet" href="{{asset('/')}}admin/vendor/chartist/css/chartist.min.css">
    <link href="{{asset('/')}}admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="{{asset('/')}}admin/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('/')}}admin/css/style.css" rel="stylesheet">
	
    @yield('header')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include ('layouts.header')

        @include ('layouts.sidemenu')
        
        @yield('body')


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">      

        <div class="copyright">
            <div style="text-align: center">
                <img src="{{asset('/')}}admin/img/logo.png" style="text-align: center"><br><br>
                <img src="{{asset('/')}}admin/img/social.png"><br><br><br>
            </div>
            <p align="center" class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
                Contact us
            </p>
            <p align="center" class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
                Email: token@atari.com
            </p><br><br>
            <p align="center" class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
                Copyright &copy; {{date('Y')}} Atari Chain, Limited. All rights Reserved,
                <br> Atari and the Atari logo are trademarks owned by Atari interactive, Inc. All other trademarks are the property of their respective owners
            </p><br>
            <p align="center" class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
                Privacy Policy Terms of Use Risk Factors Regulator Oversight Atari Token Disclaimer AML / CFT Policy Cookie Policy
            </p>
        </diV>     
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
    
    <!--**********************************
        Support ticket button start
    ***********************************-->

    <!--**********************************
        Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('/')}}admin/vendor/global/global.min.js"></script>
	<script src="{{asset('/')}}admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		
	    <script src="{{asset('/')}}admin/js/custom.min.js"></script>
	<script src="{{asset('/')}}admin/js/deznav-init.js"></script>
    @yield('footer')
</body>
</html>