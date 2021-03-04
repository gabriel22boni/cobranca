@extends('adminlte::page')

@section('title', 'Cadastros - Produtos')

@section('content_header')
    <h1>Produtos</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item active" aria-current="page">Produtos</li>
    </ol>
@stop

@section('content')

    <div class="card card-primary" style="position: relative; left: 0px; top: 0px;">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Produtos Cadastrados
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
                        <form action="{{ route('cadastros.produto.search') }}" method="POST" class="form form-inline">
                            {!! csrf_field() !!}
                            <input name="data" type="text" class="form-control" placeholder="Nome do Produto">
                            &nbsp&nbsp&nbsp<button $type="submit" class="btn btn-primary">Filtrar</button>
                        </form>
                        
                    </div>
                    <div class="card-tools float-right">
                        @if(isset($dataForm))
                            {!! $produtos->appends($dataForm ?? '')->links() !!} 
                        @else
                            {!! $produtos->links() !!}     
                        @endif
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Nome</th>
                                <th style="width:40px"></th>
                                <th style="width:40px"></th>
                                <th style="width:40px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr id="produtoRow{{$produto->id}}">
                                    <td>{{$produto->id}}.</td>
                                    <td>{{$produto->nome}}</td>
                                    <td>
                                        <center>
                                            <button onclick="modalDados({{$produto->id}})" type="button" class="btn btn-primary" style="width:100px;">
                                                Ver
                                            </button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button onclick="modalEditar({{$produto->id}})" type="button" class="btn btn-secondary" style="width:100px;">
                                                Editar
                                            </button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button onclick="modalDel({{$produto->id}},'confirm')" type="button" class="btn btn-danger" style="width:100px;">
                                                Excluir
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

    <div class="card card-primary" style="position: relative; left: 0px; top: 0px;">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-plus"></i>
                Cadastrar Produto
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
            <form action="" method="POST" id="formCadastro" >
                
                @if(
                    auth()->user()->nivel=='CEO'
                    ||auth()->user()->nivel=='MAS'
                )
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control formData" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="preco">Preço</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control formData" id="preco" name="preco" placeholder="99,90">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="idadm">Administrador</label>
                        <select name="idadm" class="form-control formData" id="idadm">
                            <option value="">-- Administrador --</option>
                            @foreach($cadAdms as $cadAdm)
                                <option value="{{$cadAdm->id}}">{{$cadAdm->nome ?? $cadAdm->fnome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @else
                <input style="display:none" type="text" class="form-control formData" id="idadm" name="idadm" value="{{auth()->user()->idadm}}">
                <div class="row">
                    <div class="form-group col-sm-10">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control formData" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="nome">Preço</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control formData" id="preco" name="preco" placeholder="R$ 99,90">
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="desc">Descrição</label>
                        <textarea rowns="3" class="form-control formData" id="desc" name="desc" placeholder="Uma breve descrição."></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="codPag">Código de Pagamento</label>
                        <textarea rowns="3" class="form-control formData" id="codPag" name="codPag" placeholder="código do botão de pagamento."></textarea>
                    </div>
                </div>
                <input style="display:none" type="text" class="form-control formData" id="image" name="image" value="">
            </form>
            <div class="alert" id="message" style="display:none"></div>
            <div class="row">
                <div class="form-group col-sm-11">
                    <form method="post" id="upload_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <table class="table">
                                <tr>
                                    <td width="40%" align="right"><label>Imagem:</label></td>
                                    <td width="30%"><input type="file" name="select_file"/></td>
                                    <td width="30%" align="left"><input type="submit" name="upload" id="upload" class="btn btn-primary" value="upload"></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="form-group col-sm-1">
                    <span id="uploaded_image"></span>
                </div>
            </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-secondary float-left" onclick="resetForm('F')">Limpar</button>
            <button type="submit" class="btn btn-primary float-right" onclick="formSubmit()">Cadastrar</button>    
        </div>
    </div>
    
    <div class="modal fade" id="modalSuccessCadastro" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sucesso!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);">
                        </div>
                        <span class="swal2-success-line-tip">
                        </span>
                        <span class="swal2-success-line-long">
                        </span>
                        <div class="swal2-success-ring">
                        </div> 
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);">
                        </div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);">
                        </div>
                    </div>
                    <center><p>Produto Cadastrado com sucesso.</p></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default float-rigth" data-dismiss="modal" onclick="pageRefresh()">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modalVer" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Visualizar Cadastro</h4>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="" >
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="nomeVer">Nome</label>
                                <input type="text" class="form-control formDataVer" id="nomeVer" name="nomeVer" placeholder="Nome" disabled="">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="preco">Preço</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input type="text" class="form-control formDataVer" id="precoVer" name="precoVer" placeholder="R$ 99,90" disabled="">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="idadmVer">Administrador</label>
                                <select class="form-control" disabled="">
                                    <option name="idadmVer" class="formDataVer" id="idadmVer">Administrador Nome</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-10 col-md-7 col-lg-10">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="descVer">Descrição</label>
                                        <textarea rowns="3" class="form-control formDataVer" id="descVer" name="descVer" placeholder="Uma breve descrição." disabled=""></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="codPagVer">Código de Pagamento</label>
                                        <div id="btPag">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-2 col-md-5 col-lg-2">
                                <img src="" class="img-thumbnail formDataVer" id="imageVer" name="imageVer">
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modalEdit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="POST" id="formAlterProd" >
                        <input style="display:none" type="text" class="form-control formDataEdit" id="idEdit" name="idEdit">
                        <div class="card-header">
                            <div class="float-left">
                                <h4 class="modal-title">Editar Produto</h4>
                            </div>
                           
                            <div class="float-right">
                                <td style="width: 100px">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="modalEditF()">Cancelar</button>
                                </td>
                                <td style="width: 100px">
                                    <button type="button" class="btn btn-success" onclick="ModalConfAlter()">Salvar</button>
                                </td>
                            </div>
                        </div>
                        @if(
                            auth()->user()->nivel=='CEO'
                            ||auth()->user()->nivel=='MAS'
                        )
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="nomeEdit">Nome</label>
                                    <input type="text" class="form-control formDataEdit" id="nomeEdit" name="nomeEdit" placeholder="Nome">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="precoEdit">Preço</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control formDataEdit" id="precoEdit" name="precoEdit" placeholder="R$ 99,90">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="idadmEdit">Administrador</label>
                                    <select name="idadmEditSelect" id="idadmEditSelect" class="form-control formDataEditSelect">
                                        <option name="idadmEdit" class="formDataEdit" id="idadmEdit" value="">Administrador Nome</option>
                                        @foreach($cadAdms as $cadAdm)
                                            <option value="{{$cadAdm->id}}">{{$cadAdm->nome ?? $cadAdm->fnome}}</option>
                                        @endforeach                       
                                    </select>
                                </div>
                            </div>
                        @else
                            <input style="display:none" type="text" class="form-control formDataEdit" id="idadmEdit" name="idadmEdit" value="{{auth()->user()->idadm}}">
                            <div class="row">
                                <div class="form-group col-sm-10">
                                    <label for="nomeEdit">Nome</label>
                                    <input type="text" class="form-control formDataEdit" id="nomeEdit" name="nomeEdit" placeholder="Nome">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="precoEdit">Preço</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control formDataEdit" id="precoEdit" name="precoEdit" placeholder="R$ 99,90">
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="form-group col-sm-10 col-md-7 col-lg-10">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="descEdit">Descrição</label>
                                        <textarea rowns="3" class="form-control formDataEdit" id="descEdit" name="descEdit" placeholder="Uma breve descrição."></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="codPagEdit">Código de Pagamento</label>
                                        <textarea rowns="3" class="form-control formDataEdit" id="codPagEdit" name="codPagEdit" placeholder="código do botão de pagamento."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-2 col-md-5 col-lg-2">
                                <img src="" class="img-thumbnail formDataEdit" id="imageShowEdit" name="imageShowEdit">
                            </div>
                        </div>
                        <input style="display:none" type="text" class="form-control formDataEdit" id="imageEdit" name="imageEdit">
                    </form>
                    <div class="alert" id="message2" style="display:none"></div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-12 col-md-12">
                            <form method="post" id="upload_form2" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                                        Alterar Imagem:
                                    </div>
                                    <div class="form-group col-sm-8 col-lg-8 col-md-8">
                                        <input type="file" name="select_file"/>
                                    </div>
                                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                                        <input type="submit" name="upload" id="upload" class="btn btn-primary float-left" value="upload">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modalDelConfirm" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Atenção!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir o Produto?
                    <strong>id: </strong> <span id="idDel" class="dadosModalDel"></span></br>
                    <strong>Nome: </strong> <span id="NomeDel" class="dadosModalDel"></span></br>
                    <strong>Preço: </strong> <span id="PrecoDel" class="dadosModalDel"></span>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"  data-toggle="modal" data-target="#modalDelCancel">Cancelar</button>
                    <button type="button" class="btn btn-primary dadosModalDel" data-dismiss="modal">Sim, Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelCancel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Exclusão Cancelada!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Operação Cancelada: </strong>Nenhum dado foi excluido.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sucesso!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Produto excluído com sucesso.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalConfAlt" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sucesso!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Dados Atualizados.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal" onclick="pageRefresh()">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalVazio" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Oops!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Nenhum dado a Atualizar.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">OK</button>
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
            
            $("#precoEdit").mask("9999999999.00",{reverse:true});
            $("#preco").mask("9999999999.00",{reverse:true});
            $('#upload_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('produto.upload') }}",
                    method:"post",
                    data: new FormData(this),
                    dataType:'json',
                    contentType: false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        console.log(data);
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        document.getElementById('message').className = data.class_name;
                        $('#uploaded_image').html(data.uploaded_image);
                        document.getElementById('image').value = data.name;
                    },
                    error:function(error){
                        console.log(error);
                    },
                })
            });

            $('#upload_form2').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('produto.upload') }}",
                    method:"post",
                    data: new FormData(this),
                    dataType:'json',
                    contentType: false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        console.log(data);
                        $('#message2').css('display', 'block');
                        $('#message2').html(data.message);
                        document.getElementById('message2').className = data.class_name;
                        if(data.message == 'Upload Realizado com Sucesso'){
                            document.getElementById('imageEdit').value = data.name;
                            document.getElementById('imageShowEdit').src = "/images/"+data.name;
                        }
                    },
                    error:function(error){
                        console.log(error);
                    },
                })
            });
        });

        function formSubmit (){
            var nome = document.getElementsByClassName('formData').nome.value,
            preco = document.getElementsByClassName('formData').preco.value,          
            idadm = document.getElementsByClassName('formData').idadm.value,
            desc = document.getElementsByClassName('formData').desc.value;        
            codPag = document.getElementsByClassName('formData').codPag.value;  
            image = document.getElementsByClassName('formData').image.value;  
            
            $.ajax({
                type: "POST",
                url: "{{ route('cadastros.produto.insert') }}",
                data: {
                    _token:'{{csrf_token()}}',
                    nome,
                    preco,
                    idadm,
                    desc,
                    codPag,
                    image,
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
                        $('#formCadastro').each (function(){
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
        
        function resetForm(){
            $('#formCadastro').each (function(){
                this.reset();
            });
        }

        function pageRefresh(){
            window.location.href = "{{route('cadastros.produto')}}";
        }

        function modalDados(id){
            $.ajax({
                url:"{{ route('cadastros.produto.dados') }}",
                type:"post",
                datatype:"json",
                data:{
                    _token:"{{csrf_token()}}",
                    id,
                },
                success:function(retorno){
                    console.log(retorno);
                    var elementos = document.getElementsByClassName('formDataVer');
                    document.getElementsByClassName('formDataVer').nomeVer.value        = retorno[0].nome;
                    if(retorno[0].nomeadm != null){
                        document.getElementsByClassName('formDataVer').idadmVer.innerHTML           = retorno[0].nomeadm;       
                    }else{
                        document.getElementsByClassName('formDataVer').idadmVer.innerHTML           = retorno[0].fnomeadm;       
                    };
                    document.getElementsByClassName('formDataVer').descVer.value           = retorno[0].desc;       
                    document.getElementsByClassName('formDataVer').precoVer.value    = retorno[0].preco;          
                    document.getElementsByClassName('formDataVer').imageVer.src    = '/images/'+retorno[0].image; 
                    document.getElementById('btPag').innerHTML = retorno[0].codPag;
                    $('#modalVer').modal('show');
                },
                error:function(error){
                    console.log(error);
                },
            });
        }

        function modalDel(id, param){
            if(param == 'confirm'){
                $.ajax({
                    type:"post",
                    datatype:"json",
                    data:{
                        _token:"{{csrf_token()}}",
                        id,
                    },
                    url:"{{ route('cadastros.produto.dados') }}",
                    success:function(retorno){
                        dados = document.getElementsByClassName('dadosModalDel');
                        dados[3].onclick = function(){
                            return modalDel(id);
                        };
                            dados[0].innerHTML = id;
                            dados[1].innerHTML = retorno[0].nome;
                            dados[2].innerHTML = retorno[0].preco;
                        $('#modalDelConfirm').modal('show');
                    },
                });
            }else{
                $.ajax({
                    type:"post",
                    datatype:"json",
                    data:{
                        _token:"{{csrf_token()}}",
                        id,
                    },
                    url:"{{ route('produto.delete') }}",
                    success:function(retorno){
                        rowDeleted = document.getElementById('produtoRow'+id);
                        rowDeleted.style = "display:none;";
                        $('#modalDel').modal('show');
                    },
                });
            }
            
        }
        
        function modalEditar(id){
            $.ajax({
                url:"{{ route('cadastros.produto.dados') }}",
                type:"post",
                datatype:"json",
                data:{
                    _token:"{{csrf_token()}}",
                    id,
                },
                success:function(retorno){
                    $('#message2').css('display', 'none');
                    var elementos = document.getElementsByClassName('formDataEdit');
                    elementos.idEdit.value                  = id;
                    elementos.nomeEdit.placeholder        = retorno[0].nome;
                    elementos.precoEdit.placeholder           = retorno[0].preco;       
                    if(retorno[0].nomeadm != null){
                        elementos.idadmEdit.innerHTML           = retorno[0].nomeadm;       
                    }else{
                        elementos.idadmEdit.innerHTML           = retorno[0].fnomeadm;       
                    }
                    elementos.descEdit.placeholder          = retorno[0].desc;          
                    elementos.codPagEdit.placeholder          = retorno[0].codPag;   
                    elementos.imageShowEdit.src          = '/images/'+retorno[0].image;  
                    console.log(retorno);       
                    $('#modalEdit').modal('show');
                },
            });
        }

        function modalEditF(){
            $('#formAlterProd').each (function(){
                this.reset();
            });
        }

        function ModalConfAlter(){
            var id = document.getElementsByClassName('formDataEdit').idEdit.value, 
            nome = document.getElementsByClassName('formDataEdit').nomeEdit.value, 
            preco = document.getElementsByClassName('formDataEdit').precoEdit.value,  
            idadm = document.getElementsByClassName('formDataEditSelect').idadmEditSelect.value,
            desc = document.getElementsByClassName('formDataEdit').descEdit.value;
            codPag = document.getElementsByClassName('formDataEdit').codPagEdit.value;
            image = document.getElementsByClassName('formDataEdit').imageEdit.value;
            console.log(idadm);
            $.ajax({
                type:"post",
                datatype:"json",
                data:{
                    _token:"{{ csrf_token() }}",
                    id,
                    nome,
                    preco,
                    idadm,
                    desc,
                    codPag,
                    image,
                },
                url:"{{ route('produto.update') }}",
                success:function(retorno){
                    console.log(retorno);
                    if(retorno['status'] == 'vazio'){
                        $('#ModalVazio').modal('show');
                    }else{
                        $('#ModalConfAlt').modal('show');
                        $('#modalEdit').modal('hide');
                        }
                },
                error:function(error){
                    console.log(error);
                },
            });
            
        }
    </script>
@stop