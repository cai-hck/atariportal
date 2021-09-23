@extends('layouts.admin')
@section('header')
<link href="{{asset('/')}}admin/pages/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
<script>
    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
    }
</script>
@endsection
@section('body')


<!--**********************************
    Content body start
***********************************-->
<div class="content-body dashboard-content-body" style="position:relative">
    <div class="container-fluid">
        <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
            <h2 class="font-w600 mb-2 mr-auto ">Dashboard</h2>
        </div>
        @include ('messages.alert')
        <div class="row">
        <section class="main-homepage">
            <div class="container centered" style="background:none">	
                <div class="col-md-9 m-auto" style="backgroudn:none">
                    <div class="card pull-up" style="background:#00000059">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-center" style="position: relative;text-align: center;color: white;">
                                        <div class="align-self-center">                                
                                            <img class="map-image img-fluid" src="{{asset('/')}}admin/img/circle.png" alt="" ><br><br>
                                            <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%); ">
                                                <h1 class="circle-texts text-white ">Account Balance</h1>
                                                <h3 class="circle-texts  text-white">$ 0.00</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="background:none;border:none">
                                <div class="form-group row tex-center">
                                    <div class="col-md-4 col-sm-12 mt-1">
                                        <a class="home-btns btn  btn-block" href="javascript:void(0)" id="buy-popup">BUY</a>
                                    </div>
                                    <div class="col-md-4 col-sm-12 mt-1">
                                        <a class="home-btns btn btn btn-block" href="javascript:void(0)" id="withdraw-popup">WITHDRAW</a>
                                    </div>
                                    <div class="col-md-4 col-sm-12 mt-1">
                                        <a class="home-btns btn btn btn-block" href="javascript:void(0)" id="staking-popup">STAKING</a>
                                    </div>                          
                                </div>
                            </div>
                        </div>                

                    </div>            

                </div>
            </div>
        </section>

        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->






<!-- Buy Modal -->
<div id="buy-modal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content bg-black">
      <div class="modal-header" style="border:none">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white" style="opacity:1 !important">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Logo -->
                    <img src="{{asset('/')}}admin/img/logo.png"/>
                </div>
            </div>
            <div class="row mt-2" id="buy-methods">              
                <div class="col-md-12 p-2">

                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="b-methods" data-type="locked" checked/>
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>Locked</label>
                        </div>
                    </div>

                    <label>LOCKED tokens are discounted ATRI, but locked for certain period of time</label>
                </div>
                <div class="col-md-12  p-2">
                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="b-methods" data-type="unlocked"/>
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>UnLocked</label>
                        </div>
                    </div>
                    <label>Unlocked tokens are ATRI at market price that are immediately available </label>
                </div>   
                <div class="col-md-12 text-right">
                    <!-- <button type="button" class="btn btn-secondary custom-home-btn" data-dismiss="modal">Close</button> -->
                    <a  href="javascript:void(0)" id="next-buy" class="btn text-white custom-home-btn">Next   <i class="fa fa-arrow-right text-white" style="position:unset" ></i></a>                        
                </div>                                        
            </div>

            <div class="row mt-2" id="buy-locked-methods">              
                <div class="col-md-12 p-2">
                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="b-locked-methods"/>
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>ATARI locked</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12  p-2">
                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="b-locked-methods" />
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>Smart contract lockK</label>
                        </div>
                    </div>
                </div>   
                <div class="px-5" id="locked-discounts">
                    <div class="col-md-12 mt-2" >
                        <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                            <input type="checkbox" class="b-discount-methods" />
                            <div class="state p-danger">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>1 month: 1% discount </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2" >
                        <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                            <input type="checkbox" class="b-discount-methods" />
                            <div class="state p-danger">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>3 month: 3% discount </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2" >
                        <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                            <input type="checkbox" class="b-discount-methods" />
                            <div class="state p-danger">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>6 month: 10% discount </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2" >
                        <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                            <input type="checkbox" class="b-discount-methods" />
                            <div class="state p-danger">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>1 Year: 20% discount </label>
                            </div>
                        </div>
                    </div>                                                            
                </div>
                <div class="col-md-12 text-left mt-5">
                    <a  href="javascript:void(0)" class="btn text-white custom-home-btn" id="prev-locked-buy"> <i class="fa fa-arrow-left text-white" style="position:unset" ></i> Prev  </a>                                                    
                    <a  href="javascript:void(0)" id="next-locked-buy" class="btn text-white custom-home-btn float-right">Next   <i class="fa fa-arrow-right text-white" style="position:unset" ></i></a>                        
                </div>                                        
            </div>

            <div class="row mt-2" id="payment-methods">       
                <div class="col-md-12 mt-3">
                    <h5 class="text-white">Choose your payment method:</h5>
                </div>
                <div class="coins-list w-100 jsutify-align-space  justify-content-between">
                    <div class=" mt-5 payment-select"><!--  -->
                        <a href="javascrip:void(0)" class="a-pay-method" data-method="btc">
                            <img src="{{asset('/')}}admin/img/logo/bitcoin.png" class="coin-image"/>
                        </a>
                        <h5 class="text-white ml-2"><a href="javascript:void(0)" class="text-white a-pay-method" data-method="btc">BTC</a></h5>

                        
                    </div>

             
                    <div class="mt-5 payment-select">
                        <a href="javascrip:void(0)" class="a-pay-method" data-method="usdt" >
                            <img src="{{asset('/')}}admin/img/logo/usdt.svg" class="coin-image" />
                            </a>                                            
                        <h5 class="text-white ml-2" ><a href="javascript:void(0)" class="text-white a-pay-method" data-method="usdt">USDT</a></h5>

                    </div>
                    <div class=" mt-5 payment-select">
                        <a href="javascrip:void(0)" class="a-pay-method" data-method="usdt" >
                            <img src="{{asset('/')}}admin/img/logo/ETHEREUM.png" class="coin-image"/>
                            </a>                                                      
                            <h5 class="text-white ml-2"><a href="javascript:void(0)" class="text-white a-pay-method" data-method="usdt">ETH</a></h5>
                        
                    </div>
                    <div class="mt-5 payment-select">
                        <a href="javascrip:void(0)" class="a-pay-method" data-method="usdt">
                            <img src="{{asset('/')}}admin/img/logo/litecoin.png" class="coin-image"/>
                        </a>                                         
                            <h5 class="text-white ml-2"><a href="javascript:void(0)" class="text-white a-pay-method" data-method="usdt">LTC</a></h5>
                    </div>         

                    <div class="mt-5 payment-select">
                        <a href="javascrip:void(0)" class="a-pay-method" data-method="usdt">
                            <img src="{{asset('/')}}admin/img/logo/ftm.png" class="coin-image"/>
                        </a>                                         
                            <h5 class="text-white ml-2"><a href="javascript:void(0)" class="text-white a-pay-method" data-method="usdt">FTM</a></h5>
                    </div>         
                </div>

                <div class="col-md-12 mt-5" id="conversion-form">
                    <!-- Convrsion Form -->
                    <div class="form-group mt-1">
                        <h6 class="text-white">How much ATARI TOKENS(ATRI) you would like to buy?</h6>
                    </div>
                    <div class="form-group mt-1">
                        <label class="text-white">In ATRI</label>
                        <input type="text" class="form-control bg-white text-black t-font-bold" id="atari_amt" onkeypress="return isNumberKey(event)"/>
                    </div>                    
                    <div class="form-group mt-1">
                        <label class="text-white">In USD</label>
                        <input type="text" class="form-control bg-white  text-black t-font-bold"  id="usd_amt" onkeypress="return isNumberKey(event)"/>
                    </div>                                        
                </div>                                                               
                <!-- <div class="col-md-12 d-flex" style="justify-content:space-between"> -->
                <div class="col-md-12 text-left mt-5" >
                    <!-- <button type="button" class="btn btn-secondary custom-home-btn" data-dismiss="modal">Close</button> -->
                    <a  href="javascript:void(0)" class="btn text-white custom-home-btn" id="prev-buy"> <i class="fa fa-arrow-left text-white" style="position:unset" ></i> Prev  </a>                                                    
                    <a  href="javascript:void(0)" id="next-buy-pay" class="btn text-white custom-home-btn float-right">Next   <i class="fa fa-arrow-right text-white" style="position:unset" ></i></a>                        
                </div>
            </div>


      </div>
      <div class="modal-footer" style="border:none">
      
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="atari-qr-modal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content bg-black">
      <div class="modal-header" style="border:none">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white" style="opacity:1 !important">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Logo -->
                    <img src="{{asset('/')}}admin/img/logo.png"/>
                </div>
            </div>      

            <div class="row">
                <div id="qrcode" class="mt-5 mb-5" style="margin: auto"></div>
            </div>
      </div>
      <div class="modal-footer" style="border:none">
      
      </div>
    </div>
  </div>
</div>


<!-- Staking  Modal -->
<div id="staking-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content bg-black">
      <div class="modal-header" style="border:none">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white" style="opacity:1 !important">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Logo -->
                    <img src="{{asset('/')}}admin/img/logo.png"/>
                </div>
            </div>

            <div class="row mt-2" id="staking-methods">              
                <div class="col-md-12 p-2">
                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="s-methods"/>
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>ATARI Staking</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12  p-2">
                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="s-methods" />
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>Smart contract staking</label>
                        </div>
                    </div>
                </div>   
                <div class="px-5" id="staking-discounts">
                    <div class="col-md-12 mt-2" >
                        <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                            <input type="checkbox" class="s-discount-methods" />
                            <div class="state p-danger">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>1 month: 1% return </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2" >
                        <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                            <input type="checkbox" class="s-discount-methods" />
                            <div class="state p-danger">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>3 month: 3% return </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2" >
                        <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                            <input type="checkbox" class="s-discount-methods" />
                            <div class="state p-danger">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>6 month: 10% return </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2" >
                        <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                            <input type="checkbox" class="s-discount-methods" />
                            <div class="state p-danger">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>1 Year: 20% return </label>
                            </div>
                        </div>
                    </div>                                                            
                </div>
                <div class="col-md-12 text-left mt-5">
                    <a  href="javascript:void(0)" id="next-staking-buy" class="btn text-white custom-home-btn float-right">Next   <i class="fa fa-arrow-right text-white" style="position:unset" ></i></a>                        
                </div>                                        
            </div>
      </div>
      <div class="modal-footer" style="border:none">
      
      </div>
    </div>
  </div>
</div>


<!-- Withdraw Modal -->
<div id="withdraw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content bg-black">
      <div class="modal-header" style="border:none">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white" style="opacity:1 !important">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Logo -->
                    <img src="{{asset('/')}}admin/img/logo.png"/>
                </div>
            </div>

            <div class="row mt-2" id="withdraw-methods">       
                <div class="col-md-12 mt-2">
                    <h6 class="text-white">Withdraw your Atari on  </h6>
                </div>         
                <div class="col-md-12 p-2">
                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="w-methods"/>
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>ETH network</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12  p-2">
                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="w-methods" />
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>FTM network </label>
                        </div>
                    </div>
                </div>   
                <div class="col-md-12 p-2">
                    <div class="pretty p-svg p-round p-bigger buy-text-heading" >
                        <input type="checkbox" class="w-methods" />
                        <div class="state p-danger">
                            <!-- svg path -->
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label>BNB  network </label>
                        </div>
                    </div>
                </div>   
                <div class="col-md-12 mt-2" id="w-address">
                    <div class="form-group">
                        <label class="text-white">Enter your address: </label>
                        <input type="text" class="form-control bg-white text-black t-font-bold" name="address" id="w-method-address"/>
                    </div>                                                            
                </div>
                <div class="col-md-12 text-left mt-5">
                    <a  href="javascript:void(0)" id="next-withraw-submit" class="btn text-white custom-home-btn float-right">Submit   <i class="fa fa-arrow-right text-white" style="position:unset" ></i></a>                        
                </div>                                        
            </div>
      </div>
      <div class="modal-footer" style="border:none">
      
      </div>
    </div>
  </div>
</div>




@endsection
@section('footer')
<script src="{{asset('/')}}admin/custom/easy.qrcode.min.js" type="text/javascript" charset="utf-8"></script>
<!-- Withdraw Btn functions -->
<script>
$(document).ready(function(){
    $('#w-address').hide();
    $('#next-withraw-submit').hide();
    $('#withdraw-popup').click(function(){
        $('.w-methods').prop('checked',false);
        $('#w-method-address').val('');
        $('#next-withraw-submit').hide();
        $('#w-address').hide();
        $('#withdraw-modal').modal('show');
    });
    $('.w-methods').on('change', function() {
        $('#w-address').hide();
        $('#w-method-address').val('');
        $('#w-address').show('slow',function() {
            $('#next-withraw-submit').show();
        });
        $('.w-methods').not(this).prop('checked',false);    
    });
});
</script>
<!-- Staking btn function -->
<script>
$(document).ready(function() {

    $('#staking-discounts').hide();

    $('#staking-popup').click(function() {
        $('.s-methods').prop('checked',false);
        $('#staking-discounts').hide();
        $('#staking-modal').modal('show');
    });

    $('.s-methods').on('change', function() {
        $('.s-discount-methods').prop('checked',false);
        $('#staking-discounts').hide();
        $('.s-methods').not(this).prop('checked',false);     
        $('#staking-discounts').show("slow",function() {
            
        }).fadeIn(); 
    });

    $('.s-discount-methods').on('change', function() {
        $('.s-discount-methods').not(this).prop('checked',false);  
    });
});
</script>


<!-- BUY Btn functions -->
<script>
$(document).ready(function() {

    var rate = {{$rate}};
    var locked_type = 'locked';


    function second_to_third_prev()
    {
        $('#buy-locked-methods').show('slow',function() {

        }); 
        $('#payment-methods').hide();
        $('#conversion-form').hide();
        $('#next-buy-pay').hide();
        $('#buy-methods').hide();
        //$('#locked-discounts').hide();
    }

    function second_to_third_next()
    {
        $('#payment-methods').show("slow", function() {
                //show slow
        });                    
        $('#buy-methods').hide();
        $('#buy-locked-methods').hide();
        $('#conversion-form').hide();
        $('#next-buy-pay').hide();  
        $('#locked-discounts').hide();

    }

    function first_to_third_prev()
    {
        $('#buy-methods').show("slow", function() {
            //show slow
        });
        $('#payment-methods').hide();
        $('#conversion-form').hide();
        $('#next-buy-pay').hide();
        $('#locked-discounts').hide();
    }

    function first_to_third_next()
    {
        $('#payment-methods').show("slow", function() {
                //show slow
        });                    
        $('#buy-methods').hide();
        $('#conversion-form').hide();
        $('#next-buy-pay').hide();
        $('#locked-discounts').hide();
    }
    function first_to_second_prev()
    {
        $('#buy-methods').show("slow", function() {
                //show slow
        }); 
        $('#buy-locked-methods').hide();
        $('#conversion-form').hide();
        $('#next-buy-pay').hide();   
        $('#locked-discounts').hide();
    }
    function first_to_second_next()
    {
        $('#buy-locked-methods').show("slow", function() {
                //show slow
        });                    
        $('#buy-methods').hide();
        $('#locked-discounts').hide();
    }

    function generateQRCode(publicAddress, atariVal) {

        $("#qrcode").empty();
        var parameters = {
        //text: "publicAddress" + '_' + atariVal, // Content
        text:"https://baidu.com",
        width: 240, // Widht
		height: 240, // Height
        colorDark: "#000000", // Dark color
		colorLight: "#ffffff", // Light color        
        quietZone: 15,
        quietZoneColor: '#e3182f',        
        //logo: "{{asset('/')}}assets/img/logo/atari.png",
        //logo: "{{asset('/')}}assets/img/logo/atari.png",
        //logo: "https://s2.coinmarketcap.com/static/img/coins/64x64/7395.png",
        logo:"https://cryptorank-images.s3.eu-central-1.amazonaws.com/coins/atari%20token1602873650679.png",

        logoBackgroundColor: '#ffffff', // Logo backgroud color, Invalid when `logBgTransparent` is true; default is '#ffffff'
        logoBackgroundTransparent: false, // Whether use transparent image, default is false
        correctLevel: QRCode.CorrectLevel.H // L, M, Q, H
    };

    new QRCode(document.getElementById("qrcode"), parameters);
    }

    $('#payment-methods').hide();
    $('#conversion-form').hide();
    $('#buy-locked-methods').hide();
    $('#next-buy-pay').hide();
    $('#locked-discounts').hide();
    /* New */
    $('#buy-popup').click(function() {
        $('.b-methods').prop('checked',false);
        $('#buy-methods').show();
        $('#payment-methods').hide();
        $('#conversion-form').hide();
        $('#buy-locked-methods').hide();
        $('#next-buy-pay').hide();
        $('#locked-discounts').hide();

        $('#buy-modal').modal('show');
    });
    
    $('.b-methods').on('change', function() {
        $('.b-methods').not(this).prop('checked',false);
        locked_type = $(this).attr('data-type');
    });

    $('.b-locked-methods').on('change', function() {
        $('.b-discount-methods').prop('checked',false);
        $('#locked-discounts').hide();
        $('.b-locked-methods').not(this).prop('checked',false);     
        $('#locked-discounts').show("slow",function() {
            
        }).fadeIn(); 
    });
    $('.b-discount-methods').on('change', function() {
        $('.b-discount-methods').not(this).prop('checked',false);  
    });

    $('#next-buy').click(function() {
        if (locked_type == 'locked') {
            first_to_second_next();
        } else {
            first_to_third_next();
        }
    });
    $('#prev-buy').click(function() {
        if (locked_type == 'locked') {
            second_to_third_prev();
        } else  {
            first_to_third_prev();                
        }
    });    

    $('#next-locked-buy').click(function() {
        second_to_third_next();
    });
    $('#prev-locked-buy').click(function() {
        first_to_second_prev();
    });    

    $('.a-pay-method').click(function(){
        $('#conversion-form').show('slow',function(){

            $.ajax({
                url: "{{url('/rltime-atari-rate')}}",
                type:"post",
                data: {_token:"{{csrf_token()}}"},
                success:function(data) {
                    rate = data;
                    console.log(rate);
                    $('#next-buy-pay').show();
                },
                failure: function() {

                }
            });


        });
    });
    $('#atari_amt').on("input",function() {

        var value = parseFloat($(this).val()) * rate;

        //console.log(parseFloat($(this).val) * rate);
        $('#usd_amt').val(parseFloat(value).toFixed(4));
    });
    $('#usd_amt').on("input", function() {
        var value = $(this).val() / rate;
        $('#atari_amt').val(parseFloat(value).toFixed(4));
    });    


    $('#next-buy-pay').click(function() {
        generateQRCode('1234567', $('#atari_amt').val());
        $('#atari-qr-modal').modal('show');
        $('#buy-modal').modal('hide');
    });
});
</script>
@endsection