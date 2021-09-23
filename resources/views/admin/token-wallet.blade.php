@extends('layouts.admin')
@section('header')
<link href="{{asset('/')}}admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
.dataTables_length label{ color:white;}
.dataTables_filter label{color:white;}
</style>
<style>
      
    .apex-chart {
    width:100% !important;
    max-width:500px;
    height:150px !important;      
    }
</style>
@endsection
@section('body')

	
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
            <h2 class="font-w600 mb-2 mr-auto ">Token Wallet</h2>
        </div>
        @include ('messages.alert')
        <div class="row">

            <div class="col-md-4 col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <div class="align-self-center" style="position:relative">
                            <br><br>
                            <img class="map-image img-fluid" src="{{asset('/')}}admin/img/circle.png" alt=""><br><br>
                            <div class="text-center"style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%); ">
                                <p style="font-size: 20px; color: red">Account Balance</p>
                                <p style="font-size: 20px; color: white">$ 0.00</p>
                            </div>
                            <h6 >You don't have any other currencies</h6>
                            <p class="text-white"> •	ATARI COIN is to be introduced at a later stage.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h5 class="card-title">Graphs</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-self-left">                                               
                            <div class="col-md-4">
                                <div style="display: flex;align-items: center;margin-top:30px">
                                    <div class="mr-2" style="; text-align: left;">
                                        <img class="map-image" src="{{asset('/')}}admin/img/logo/TOKEN_ATARI_text_icon.png"/>
                                    </div>
                                    <div class="" style=" text-align:left;">
                                        <h1>ATAR</h1>
                                        <h4>(Atar $0.10) 0</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="w-100" style=";text-align: left;">
                                    <div id="chart_atar" class="apex-chart"></div>
                                </div>
                            </div>                                                                                                
                        </div>
                    
                        <div class="row align-self-left">

                            <div class="col-md-4">
                                <div style="display: flex;align-items: center;margin-top:30px">
                                    <div class="mr-2" style="; text-align: left;">
                                        <img class="map-image" src="{{asset('/')}}admin/img/logo/TOKEN_ATARI_text_icon.png"/>
                                    </div>
                                    <div class="" style="text-align:left;">
                                        <h1>ATRI</h1>
                                        <h4>{{$apiReturnValue['att']}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="w-100" style="text-align: left;">
                                    <div id="chart_atai" class="apex-chart"></div>
                                </div>
                            </div>                                                                                                
                        </div>
                        
                        
                        <div class="row align-self-left">
                            <div class="col-md-4">
                                <div style="display: flex;align-items: center;margin-top:30px">
                                    <div class="mr-2" style="text-align: left;">
                                        <img class="map-image" src="{{asset('/')}}admin/img/logo/bitcoin.png"/>
                                    </div>
                                    <div class="" style="text-align:left;">
                                        <h1>BTC</h1>
                                        <h4>0</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="w-100" style="text-align: left;">
                                <div id="chart_btc" class="apex-chart"></div>
                                </div>
                            </div>                                                        
                        </div>
                    

                        <div class="row align-self-left">
                            <div class="col-md-4">
                                <div style="display: flex;align-items: center;margin-top:30px">
                                        <div class="mr-2" style=" text-align: left;">
                                            <img class="map-image" src="{{asset('/')}}admin/img/logo/green_token.png"/>
                                        </div>
                                        <div class="" style=" text-align:left;">
                                            <h1>USDT</h1>
                                            <h4>{{$apiReturnValue['usdt']}}</h4>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-8">
                                <div class="w-100" style="text-align: left;">
                                    <div id="chart_usdt" class="apex-chart"></div>
                                </div>
                            </div>     
                        </div>
                        
                        <div class="row align-self-left">
                            <div class="col-md-4">
                                <div style="display: flex;align-items: center;margin-top:30px">
                                    <div class="mr-2" style="text-align: left;">
                                        <img class="map-image" src="{{asset('/')}}admin/img/logo/ETHEREUM.png"/>
                                    </div>
                                    <div class="" style=" text-align:left;">
                                        <h1>ETH</h1>
                                        <h4>{{$apiReturnValue['eth']}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="w-100" style="text-align: left;">
                                    <div id="chart_eth" class="apex-chart"></div>
                                </div>
                            </div>          
                        </div>
                        
                        <div class="row align-self-left">

                            <div class="col-md-4">
                                <div style="display: flex;align-items: center;margin-top:30px">
                                    <div class="mr-2" style="text-align: left;">
                                        <img class="map-image" src="{{asset('/')}}admin/img/logo/litecoin.png"/>
                                    </div>
                                    <div class="" style=" text-align:left;">
                                        <h1>LTC</h1>
                                        <h4>0.00000</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="w-100" style="text-align: left;">
                                    <div id="chart_ltc" class="apex-chart"></div>
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{asset('/')}}graphs/irregular-data-series.js"></script>
<script>
      var ts2 = 1484418600000;
      var dates = [];
      var spikes = [5, -5, 3, -3, 8, -8]
      for (var i = 0; i < 120; i++) {
        ts2 = ts2 + 86400000;
        var innerArr = [ts2, dataSeries[1][i].value];
        dates.push(innerArr)
      }
    </script>
    <script>      
    
      /* 
      ATAI, ATAR
      colro: default	      
      */
      var options_atai = {
        series: [{
            name: 'Value ',
            data: dates
        }],
        chart: {
            type: 'area',
            stacked: false,
            height: 150,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        colors: ['#ff0000'],
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0);
                },
            },
            title: {
                text: ''
            },
        },
        xaxis: {
            type: 'datetime',
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0)
            }
            }
        }
      };
      var options_atar = {
        series: [{
            name: 'Value ',
            data: dates
        }],
        chart: {
            type: 'area',
            stacked: false,
            height: 150,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        colors: ['#ff0000'],
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0);
                },
            },
            title: {
                text: ''
            },
        },
        xaxis: {
            type: 'datetime',
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0)
            }
            }
        }
      };
      /* 
      BTC
      colro:#FFA500	      
      */
      var options_btc = {
        series: [{
            name: 'Value ',
            data: dates
        }],
        chart: {
            type: 'area',
            stacked: false,
            height: 150,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        colors: ['#FFA500'],
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0);
                },
            },
            title: {
                text: ''
            },
        },
        xaxis: {
            type: 'datetime',
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0)
            }
            }
        }
      };
      /* 
      USDT
      color: #1E9FF2 
      */
      var options_usdt = {
        series: [{
            name: 'Value ',
            data: dates
        }],
        chart: {
            type: 'area',
            stacked: false,
            height: 150,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        colors: ['#00ff00'],
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0);
                },
            },
            title: {
                text: ''
            },
        },
        xaxis: {
            type: 'datetime',
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0)
            }
            }
        }
      };
      /* 
      ETH
      color: #1E9FF2 
      */
      var options_eth = {
        series: [{
            name: 'Value ',
            data: dates
        }],
        chart: {
            type: 'area',
            stacked: false,
            height: 150,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        colors: ['#FFFFFF'],
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0);
                },
            },
            title: {
                text: ''
            },
        },
        xaxis: {
            type: 'datetime',
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0)
            }
            }
        }
      };
      /* 
      LTC
      color: #1E9FF2 
      */
      var options_ltc = {
        series: [{
            name: 'Value ',
            data: dates
        }],
        chart: {
            type: 'area',
            stacked: false,
            height: 150,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        colors: ['#1E9FF2'],
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0);
                },
            },
            title: {
                text: ''
            },
        },
        xaxis: {
            type: 'datetime',
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return (val / 1000000).toFixed(0)
            }
            }
        }
      };
      var chart_atar = new ApexCharts(document.querySelector("#chart_atar"), options_atar);
      chart_atar.render();        
      var chart_atai = new ApexCharts(document.querySelector("#chart_atai"), options_atai);
      chart_atai.render();        
      var chart_btc = new ApexCharts(document.querySelector("#chart_btc"), options_btc);
      chart_btc.render();        
      var chart_usdt = new ApexCharts(document.querySelector("#chart_usdt"), options_usdt);
      chart_usdt.render();        
      var chart_eth = new ApexCharts(document.querySelector("#chart_eth"), options_eth);
      chart_eth.render();        
      var chart_ltc = new ApexCharts(document.querySelector("#chart_ltc"), options_ltc);
      chart_ltc.render();        
      
    </script>

@endsection