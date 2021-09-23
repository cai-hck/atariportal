<!--**********************************
    Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile p-3">                    
            <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> {{$user['name']}}</h5>
            <p class="mb-0 fs-14 font-w400">#{{$user['id']}}</p>
            <p class="mb-0 fs-14 font-w400" style="word-break:break-all">{{$user['address']}}</p>
        </div>
        <ul class="metismenu" id="menu">
            <li class="{{Request::is('dashboard')?'mm-active':''}}">
                <a class="ai-icon" href="{{url('/dashboard')}}" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>               
            </li>
            <li class="{{Request::is('token-wallet')?'mm-active':''}}">
                <a class="ai-icon" href="{{url('/token-wallet')}}" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Token Wallet</span>
                </a>              
            </li>       
            <li class="{{Request::is('personal-wallet')?'mm-active':''}}">
                <a class="ai-icon" href="{{url('/personal-wallet')}}" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Individual Wallet</span>
                </a>               
            </li>
            <li><a class="ai-icon" href="{{url('/logout')}}" aria-expanded="false">
                    <i class="flaticon-059-log-out"></i>
                    <span class="nav-text">Logout</span>
                </a>             
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->