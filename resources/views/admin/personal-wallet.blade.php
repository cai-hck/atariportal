@extends('layouts.admin')
@section('header')
<link href="{{asset('/')}}admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
.dataTables_length label{ color:white;}
.dataTables_filter label{color:white;}
</style>
@endsection
@section('body')

	
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
            <h2 class="font-w600 mb-2 mr-auto ">Individual Wallet</h2>
        </div>
        @include ('messages.alert')
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-bitcoin"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1 text-white">Bitcoin Wallet</p>
                                <h3 class="text-white">0.00013761 BTC</h3>
                                <h5>$8.64</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="widget-stat card">
                    <div class="card-body  p-4">
                        <a class="btn btn-danger btn-block" href="#" onclick="document.getElementById('receive_fund_form').submit();">Received / Deposit</a>
                        <a class="btn btn-secondary btn-block" href="javascript:void(0)"  data-toggle="modal" data-target="#sendModal">Send</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="widget-stat card">
                    <div class="card-body  p-4">
                        <img class="map-image img-fluid" src="{{asset('/')}}admin/img/graph/3.png" alt=""><br><br>
                    </div>
                </div>
            </div>
                  
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">    
                            <div class="col-md-8">
                                <h3 class="text-white">Buy Tokens by exchanging your BTC/ETC to ATRI</h3>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-warning btn-block text-white"> EXCHANGE NOW</a>
                            </div>                            
                        </div>
                    </div>                   
                </div>
            </div>          
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h5 class="card-title">Recent Transactions</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="transaction_table" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>                   
                </div>
            </div>          
        </div>

    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
<form action="{{url('receive-fund')}}" method="post" id="receive_fund_form" style="display:hidden">
    <input type="hidden" name="_token" value="{{csrf_token()}}" >
</form>

<!-- Modal -->
<div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:white"><strong>Send</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{url('/send-money')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
             <div class="col-md-6">
                <div calss="form-group">
                    <label class="text-whtie" style="color:white"><strong>Type:</strong></label>
                    <select class="form-control" required name="type">
                        <option value="ATRI" style="color:black">ATRI</option>
                        <option  value="ATAR" style="color:black">ATAR</option>
                        <option  value="BTC" style="color:black">BTC</option>
                        <option  value="BCH" style="color:black">BCH</option>
                        <option  value="ETH" style="color:black">ETH</option>
                        <option  value="LTC" style="color:black">LTC</option>
                        <option  value="USDT" style="color:black">USDT</option>
                    </select>
                </div>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label class="text-whtie" style="color:white"><strong>Amount:</strong></label>
                    <input type="text" name="amount" class="form-control" style="    background: white;border-radius: 10px;" required/>
                </div>
             </div>             
             <div class="col-md-12">
                 <div class="form-group">
                    <label class="text-whtie" style="color:white"><strong>To:</strong></label>
                    <input type="text" name="to" class="form-control" style="    background: white;border-radius: 10px;" required/>
                </div>
             </div>
             
            <div class="col-md-12">
                 <div class="form-group" style="text-align:center">
                    <button class="btn btn-danger btn-block">Send</button>
                </div>
             </div>
             
         </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection
@section('footer')
<script src="{{asset('/')}}admin/vendor/datatables/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    var table = $('#transaction_table').DataTable({
        createdRow: function ( row, data, index ) {
           $(row).addClass('selected')
        } 
    });
      
    table.on('click', 'tbody tr', function() {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
        $row.removeClass('selected')
    } else {
        $row.addClass('selected')
    }
    })
    
    table.rows().every(function() {
    this.nodes().to$().removeClass('selected')
    });
});
</script>
@endsection