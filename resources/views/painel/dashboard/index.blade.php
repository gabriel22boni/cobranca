@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> Home</li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Clientes</span>
                        <span class="info-box-number">
                            10
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Faturas</span>
                        <span class="info-box-number">725</span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-dollar-sign "></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Empréstimos</span>
                        <span class="info-box-number">R$ 35.000,00</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-dollar-sign"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Ticket Medio</span>
                        <span class="info-box-number">R$ 492,00</span>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>14</h3>

                        <p>Parcial</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-clock"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>7</h3>

                        <p>Pendentes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>44</h3>

                        <p>VENCIDAS</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>65</h3>

                        <p>PAGAS</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <section class="col-lg-7 connectedSortable ui-sortable">
                <div class="card">
                    <div class="card-header">
                        <center><h3 class="card-title">Visão Anual</h3></center>
                    </div>
                    <div class="card-body">
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px; display: block; width: 716px;" width="716" class="chartjs-render-monitor">
                            </canvas>                         
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="col-lg-5 connectedSortable ui-sortable">
                <div class="card">
                    <div class="card-header">
                        <center><h3 class="card-title">Visão Geral</h3></center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="pieChart" height="126" style="display: block; width: 252px; height: 126px;" width="252" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="far fa-circle text-danger"></i> Vencidas</li>
                                    <li><i class="far fa-circle text-success"></i> Pagas</li>
                                    <li><i class="far fa-circle text-warning"></i> Pendentes</li>
                                    <li><i class="far fa-circle text-info"></i> Parcial</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                Vencidas
                                <span class="float-right text-danger">
                                <i class="fas fa-arrow-down text-sm"></i>40%
                            </span>
                            </li>
                            <li class="nav-item">
                                Pagas
                                <span class="float-right text-success">
                                <i class="fas fa-arrow-up text-sm"></i> 30%
                                </span>
                            </li>
                            <li class="nav-item">
                                Pendentes
                                <span class="float-right text-warning">
                                <i class="fas fa-arrow-left text-sm"></i> 20%
                                </span>
                            </li>
                            <li class="nav-item">
                                Parcial
                                <span class="float-right text-info">
                                <i class="fas fa-arrow-left text-sm"></i> 35%
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <div class="card-footer">
    </div>
</div>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <center>Desenvolvido por - <strong>JL Empreendimento LTDA</strong> </center>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5d1fdbc322d70e36c2a460b3/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->  


    <!-- ChartJS -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <!-- (Canvas Data) -->
    <script src="/vendor/js/dashboard.js"></script>
    <script>
        $(document).ready(function(){
            (function consolee(){
                $.ajax({
                    type:"post",
                    datatype:"json",
                    data:{
                        _token:"{{csrf_token()}}",
                    },
                    url:"{{ route('painel.authenticateUsr') }}",
                    success:function(retorno){
                        if(retorno == "MAS"){
                        };
                        if(retorno == "ADM"){
                        };
                        if(retorno == "COB"){
                        };
                        if(retorno == "CLI"){
                        };
                        
                    },
                    error:function(error){
                        console.log(error);
                    },
                });
            })();
        });
    </script>
@stop