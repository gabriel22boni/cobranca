@extends('adminlte::page')

@section('title', 'Home - Faturas')

@section('content_header')
    <h1>Relatório Financeiro</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Financeiro</li>
        <li class="breadcrumb-item active" aria-current="page">Relatório</li>
    </ol>
@stop

@section('content')
    <div class="card card-primary" style="position: relative; left: 0px; top: 0px;">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Minhas Faturas
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body" style="display: block;">
            <div class="card">
                <div class="card-body">
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="idCliente">ID Cliente</label>
                                <input disabled="" type="text" class="form-control clienteDataForm" name="idCliente" id="idCliente" value="{{auth()->user()->idcli}}">
                            </div>
                            <div class="form-group col-sm">
                                <label for="nomeCli">Cliente</label>
                                <input disabled="" type="text" class="form-control clienteDataForm" name="nomeCli" id="nomeCli" value="{{auth()->user()->name}}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header justify-content-between" style="display: inline-block">
                    <h3 class="card-title">Faturas</h3>
                </div>
                <div class="card-body" id="cardFaturas">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cód.</th>
                                <th>Vencimento</th>
                                <th style="width:120px">Valor</th>
                                <th style="width:120px">pago</th>
                                <th style="width:120px">a pagar</th>
                            </tr>
                        </thead>

                        <tbody id="faturasView">
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Cód.</th>
                                <th>Vencimento</th>
                                <th style="width:120px">Valor</th>
                                <th style="width:120px">pago</th>
                                <th style="width:120px">a pagar</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
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
    <link rel="stylesheet" href="/vendor/sweetalert2/bootstrap-4.min.css">
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


    <script>
        $(document).ready(function(){
            verfaturas(varIdCliente);
        });
        var varIdCliente = {{auth()->user()->idcli}};
        
        function verfaturas(idCliente){
            $.ajax({
                type:'post',
                datatype:'json',
                data:{
                    _token:'{{ csrf_token() }}',
                    idCliente,
                },
                url:"{{ route('cliente.emprestimo.verFaturas') }}",
                success:function(retorno){
                    if (retorno.length == 0){
                        var cardFaturas = document.getElementById("cardFaturas");
                        cardFaturas.innerHTML = '<p class="float-left">Nenhuma Fatura Cadastrada.<p><button onclick="pageRefresh()" class="btn btn-primary float-right">Atualizar</button>';
                    }else{
                        tbody = document.getElementById('faturasView');
                        tbody.innerHTML ='';
                        for(a=0;a<retorno.length; a++){
                            tr = document.createElement('tr');
                            td1 = document.createElement('td');
                            td1.innerHTML = retorno[a].idEmprestimo+'-'+retorno[a].faturaNumero;
                            tr.appendChild(td1);
                            td2 = document.createElement('td');
                            if(retorno[a].vencida == true){
                                td2.innerHTML = "<button type=\"button\" class=\"btn btn-block btn-outline-danger btn-xs\">"+retorno[a].vcto+"</button>";
                            }else{
                                td2.innerHTML = "<button type=\"button\" class=\"btn btn-block btn-outline-success btn-xs\">"+retorno[a].vcto+"</button>";
                            };
                            tr.appendChild(td2);
                            td3 = document.createElement('td');
                            td3.innerHTML = retorno[a].valor;
                            tr.appendChild(td3);
                            td4 = document.createElement('td');
                            td4.innerHTML = retorno[a].pago;
                            tr.appendChild(td4);
                            td5 = document.createElement('td');
                            td5.innerHTML = retorno[a].devedor;
                            tr.appendChild(td5);
                            tbody.appendChild(tr);
                        }
                    }
                },
            });
        };

        function pageRefresh(){
            window.location.href = "{{route('faturas.cliente')}}";
        }
    </script>
@stop