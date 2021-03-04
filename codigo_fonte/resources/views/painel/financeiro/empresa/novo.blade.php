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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="position: relative; left: 0px; top: 0px;">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Cadastrar Empréstimo
            </h3>

            <div class="card-tools">
                <button type="button" class="btn  btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn  btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <form role="form" id="novoEmprestimo">
            <div>
                <div class="row">
                    <div class="form-group col-sm-1">
                            <label for="idCliente">ID Cliente</label>
                            <input type="text" nome="idCliente" class="form-control formData" id="idCliente" placeholder="Cód.">
                        </div>
                        <div class="form-group col-sm">
                            <label for="NomeCliente">Cliente</label>
                            <input type="text" nome="NomeCliente" class="form-control formData" id="NomeCliente" placeholder="Nome" disabled="true">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="numeroDoc">CPF/CNPJ</label>
                            <input type="text" nome="numeroDoc" class="form-control formData" id="numeroDoc" placeholder="123.456.789-01" disabled="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="qtdeFaturas">Qtde. Faturas</label>
                        <input type="text" nome="qtdeFaturas" class="form-control formData" id="qtdeFaturas" placeholder="30">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="valorEmprestimo">Valor Empréstimo</label>
                        <input type="text" nome="valorEmprestimo" class="form-control formData" id="valorEmprestimo">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="primeiroVcto">Primeiro Vcto. Em:</label>
                        <input type="date" nome="primeiroVcto" class="form-control formData" id="primeiroVcto">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="intervaloPag">Intervalo de Pgtos(dias)</label>
                        <input type="text" nome="intervaloPag" class="form-control formData" id="intervaloPag">
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary float-right" onclick="formSubmit()">Cadastrar</button>    
        </div>
    </div>
    
    <div class="modal fade" id="clienteInválido" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Oops!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>O Código digitado nao corresponde a nenhum de seus clientes.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default floar-right" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSuccessCadastro" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sucesso!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Empréstimo Cadastrado</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default floar-right" data-dismiss="modal" onclick="pageRefresh()">Ok</button>
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
            
            $("#valorEmprestimo").mask("9999999999.00",{reverse:true});
            $("#idCliente").mask("00000");
            $("#qtdeFaturas").mask("00");
            $("#intervaloPag").mask("000");


        });

        $("#idCliente").blur(function(){
            var idCliente = document.getElementById('idCliente').value;
            $.ajax({
                type:'post',
                datatype:'json',
                data:{
                    _token:'{{csrf_token()}}',
                    idCliente,
                },
                url:"{{ route('empresa.emprestimo.novo.cliId') }}",
                success:function(retorno){
                    console.log(retorno);
                    nome = document.getElementById('NomeCliente');
                    documento = document.getElementById('numeroDoc');
                    if(retorno.length !=0){
                        if(retorno[0].pessoa =='F'){
                            nome.value = retorno[0].nome;
                            documento.value = retorno[0].cpf;
                        }else{
                            nome.value = retorno[0].fnome;
                            documento.value = retorno[0].cnpj;
                        }
                    }else{
                        $("#clienteInválido").modal('show');
                        $('#novoEmprestimo').each (function(){
                            this.reset();
                        });
                    }
                    
                },
                error:function(error){console.log(error);},
            });
        });
        
        function formSubmit(){
            var id = document.getElementsByClassName('formData').idCliente.value,
            qtde = document.getElementsByClassName('formData').qtdeFaturas.value,
            valor = document.getElementsByClassName('formData').valorEmprestimo.value,
            intervalo = document.getElementsByClassName('formData').intervaloPag.value,
            pVcto = document.getElementsByClassName('formData').primeiroVcto.value;
            
            console.log(id);
            console.log(qtde);
            console.log(valor);
            console.log(intervalo);
            console.log(pVcto);
            $.ajax({
                type: "post",
                url: "{{ route('empresa.emprestimo.novo.insert') }}",
                data: {
                    _token:'{{csrf_token()}}',
                    id,
                    qtde,
                    valor,
                    intervalo,
                    pVcto,
                },
                success: function(retorno){
                    toasts = document.getElementById('toastsContainerTopRight');
                    if(toasts != null){
                        toasts.remove();
                    }
                    
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-center',
                        showConfirmButton: true
                    });

                    if(retorno['status'] == 'error'){
                        retorno[0].forEach(
                            function mensagem(msg){
                                $(document).Toasts(
                                    'create', {
                                    class: 'bg-danger', 
                                    title: '',
                                    subtitle: 'Subtitle',
                                    body: msg
                                    }
                                )
                            }
                        )
                    }else{
                        $('#modalSuccessCadastro').modal('show');
                        $('#novoEmprestimo').each(function(){
                            this.reset();
                        });
                        
                    }
                },
                error:function(error){
                    console.log(error);
                },
            });

            return false;
        };
        
        function pageRefresh(){
            window.location.href = "{{route('empresa.emprestimo.novo')}}";
        }
    </script>
@stop