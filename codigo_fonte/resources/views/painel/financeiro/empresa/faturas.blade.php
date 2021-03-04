@extends('adminlte::page')

@section('title', 'Home - Pagamentos')

@section('content_header')
    <h1>Novo Empréstimo</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Financeiro</li>
        <li class="breadcrumb-item active" aria-current="page">Novo</li>
    </ol>
@stop

@section('content')
    <div class="card card-primary" style="position: relative; left: 0px; top: 0px;">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Clientes Cadastrados
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
                <div class="card-header">
                    <div class="col-sm-5 float-left">
                        <form action="{{ route('empresa.emprestimo.novo.search') }}" method="POST" class="form form-inline">
                            {!! csrf_field() !!}
                            <input name="data" type="text" class="form-control" placeholder="Nome">
                            &nbsp&nbsp&nbsp<button $type="submit" class="btn btn-primary">Filtrar</button>
                        </form>
                        
                    </div>
                    <div class="card-tools float-right">
                        @if(isset($dataForm))
                            {!! $cadClis->appends($dataForm ?? '')->links() !!} 
                        @else
                            {!! $cadClis->links() !!}     
                        @endif
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Nome</th>
                                <th style="width:40px">T. Emprestado</th>
                                <th style="width:40px">Limite Total</th>
                                <th style="width:40px">Limite Disponivel</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cadClis as $cadCli)
                                <tr id="clienteRow{{$cadCli->id}}">
                                    <td>{{$cadCli->id}}.</td>
                                    <td>{{$cadCli->nome ?? $cadCli->fnome}}</td>
                                    <td><span class="badge bg-secondary">R$ {{ number_format($cadCli->saldo_dev, 2, ',' ,'') }}</span></td>
                                    <td><span class="badge bg-success">R$ {{number_format($cadCli->limite, 2, ',' ,'')}}</span></td>
                                    <td><span class="badge bg-info">R$ {{number_format(($cadCli->limite-$cadCli->saldo_dev), 2, ',' ,'')}}</span></td>
                                    <td>
                                        <center>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEmprestimo" style="width:80px" onclick="verfaturas({{$cadCli->id}})">
                                                Ver
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEmprestimo" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <div class="form-group col-sm-1">
                                        <label for="idCliente">ID Cliente</label>
                                        <input disabled="" type="text" class="form-control clienteDataForm" name="idCliente" id="idCliente">
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="nomeCli">Cliente</label>
                                        <input disabled="" type="text" class="form-control clienteDataForm" name="nomeCli" id="nomeCli">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="documentoCli">CPF/CNPJ</label>
                                        <input disabled="" type="text" class="form-control clienteDataForm" name="documentoCli" id="documentoCli">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header justify-content-between" style="display: inline-block">
                            <h3 class="card-title">Faturas</h3>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Cód.</th>
                                        <th>Vencimento</th>
                                        <th style="width:120px">Valor</th>
                                        <th style="width:120px">pago</th>
                                        <th style="width:120px">a pagar</th>
                                        <th style="width:120px"></th>
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
                                        <th style="width:120px"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalValor" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Informe o Valor a Baixar:</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>R$:<input type="text" id="valorBaixa"></center>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="btBaixarDup">Baixar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="baixaEfetuada" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sucesso!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Valor baixado com sucesso.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success float-right" onclick="pageRefresh()">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="baixaError" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ops!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Valor inserido maior que o valor em aberto.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success float-right" data-dismiss="modal"500>OK</button>
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


    <script src="/vendor/sweetalert2/sweetalert2.min.js"></script>
    <script src="/vendor/jqueryMask/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#valorBaixa").mask("9999999999.00",{reverse:true});
        });
        
        function verfaturas(idCliente){
            $.ajax({
                type:'post',
                datatype:'json',
                data:{
                    _token:'{{ csrf_token() }}',
                    idCliente,
                },
                url:"{{ route('empresa.emprestimo.novo.cliId') }}",
                success:function(retorno){
                    var clienteDataForm = document.getElementsByClassName('clienteDataForm');
                    if(retorno[0].pessoa == 'J'){
                        clienteDataForm.documentoCli.value = retorno[0].cnpj;
                        clienteDataForm.idCliente.value = idCliente;
                        clienteDataForm.nomeCli.value = retorno[0].fnome;
                    }else{
                        clienteDataForm.documentoCli.value = retorno[0].cpf;
                        clienteDataForm.idCliente.value = idCliente;
                        clienteDataForm.nomeCli.value = retorno[0].nome;
                    }    
                },
            });

            $.ajax({
                type:'post',
                datatype:'json',
                data:{
                    _token:'{{ csrf_token() }}',
                    idCliente,
                },
                url:"{{ route('empresa.emprestimo.verFaturas') }}",
                success:function(retorno){
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
                        td6 = document.createElement('td');
                        if(retorno[a].status !='Q'){
                            td6.innerHTML = "<button type=\"button\" class=\"btn btn-block btn-primary\" onclick=\"baixarFaturaValor("+retorno[a].id+")\">Baixar</button>";
                        }
                        tr.appendChild(td6);
                        tbody.appendChild(tr);
                    }
                },
                error:function(error){console.log(error);},
            });
        }
     
        function baixarFatura(id){
            valorBaixa = document.getElementById('valorBaixa').value;
            $.ajax({
                type:'post',
                datatype:'json',
                data:{
                    _token:'{{ csrf_token() }}',
                    id,
                    valorBaixa,
                },
                url:"{{ route('empresa.emprestimo.efetuarBaixa') }}",
                success:function(retorno){
                    if(retorno =='A'){
                        $("#modalValor").modal("hide");
                        $("#modalEmprestimo").modal("hide");
                        $("#baixaEfetuada").modal("show");
                    }else{
                        $("#baixaError").modal("show");

                    }
                    
                },
                error:function(error){console.log(error);},
            });
        }

        function baixarFaturaValor(id){
            
            document.getElementById('btBaixarDup').onclick = function(){baixarFatura(id)};
            $("#modalValor").modal("show");
        }

        function pageRefresh(){
            window.location.href = "{{route('empresa.emprestimo.baixa')}}";
        }
    </script>
@stop