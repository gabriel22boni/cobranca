@extends('adminlte::page')

@section('title', 'Feedback')

@section('content_header')
    <h1>Feedback</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active" aria-current="page">Feedback</li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <center>
                <h3><i class="fas fa-info-circle"></i> Informe o Tipo de Feedback</h3>
            </center>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-body pad table-responsive">
                <table class="table table-bordered text-center">
                    <tbody>
                        <tr>
                            <button type="button" class="btn btn-block bg-gradient-success btn-lg" data-toggle="modal" data-target="#modal-success">Elogio</button>
                        </tr>
                        <tr>
                            <button type="button" class="btn btn-block bg-gradient-danger btn-lg" data-toggle="modal" data-target="#modal-danger">Reclamação</button>
                        </tr>
                    </tbody>
                </table>
            <!-- /.card -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
            <h4 class="modal-title">Registrar Reclamação</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="formReclama" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="emailR">Email address</label>
                            <input name="email" type="email" class="form-control" id="emailR" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="tituloR">Título</label>
                            <input name="titulo" type="text" class="form-control" id="tituloR" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="textR">Descrição</label>
                            <textarea name="text" class="form-control" id="textR" rows="3" placeholder=" ..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal" data-toggle="modal" data-target="#snippet-cancel-recl"  onclick="resetForm('#formReclama')">Cancelar</button>
            <button type="button" class="btn btn-outline-light" data-dismiss="modal" data-toggle="modal" data-target="#snippet-success-recl" onclick="reclama()">Enviar Reclamação</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-success" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar Elogio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                </div>
            <div class="modal-body">
            <form id="formElogio" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="emailE">Email address</label>
                            <input name="email" type="email" class="form-control" id="emailE" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="tituloE">Título</label>
                            <input name="titulo" type="text" class="form-control" id="tituloE" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="textE">Descrição</label>
                            <textarea name="text" class="form-control" id="textE" rows="3" placeholder=" ..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal" data-toggle="modal" data-target="#snippet-cancel-elogio"  onclick="resetForm('#formElogio')">Cancelar</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal" data-toggle="modal" data-target="#snippet-success-elogio" onclick="elogio()">Enviar Elogio</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="snippet-success-elogio" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Sucesso!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <!--snippet-success-->
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
                <!--snippet-->
                <center>Seu Elogio Foi registrado com sucesso!</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="snippet-success-recl" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Sucesso!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <!--snippet-success-->
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
                <!--snippet-->
                <center>Sua reclamação Foi registrada com sucesso!</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="snippet-cancel-elogio" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Operação Cancelada!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <!--snippet-error-->
                <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
                    <span class="swal2-x-mark"><span class="swal2-x-mark-line-left">
                    </span>
                    <span class="swal2-x-mark-line-right">
                    </span>
                </div>
                <!--snippet-->
                <center>Nenhuma Informação foi Registrada!</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="snippet-cancel-recl" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Operação Cancelada!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <!--snippet-error-->
                <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
                    <span class="swal2-x-mark"><span class="swal2-x-mark-line-left">
                    </span>
                    <span class="swal2-x-mark-line-right">
                    </span>
                </div>
                <!--snippet-->
                <center>Nenhuma Informação foi Registrada!</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/vendor/snippets/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function resetForm(form){
            $(form).each(function(){
                this.reset();
            });
        }

/*        function elogio(){
            var email = document.getElementById('emailE').value,
            titulo = document.getElementById('tituloE').value, 
            text = document.getElementById('textE').value,
            tipo = 'E';
            resetForm('#formElogio');
            $.ajax({
                type: 'post',
                url: "route('feedback.processa')",
                data: {
                    "_token":"{{csrf_token()}}",
                    email,
                    titulo,
                    text,
                    tipo,
                },
                success: function(retorno){
                    console.log(retorno);
                },
                error:function(error){
                    console.log(error);
                },
            });
        };

        function reclama(){
            var email = document.getElementById('emailR').value,
            titulo = document.getElementById('tituloR').value, 
            text = document.getElementById('textR').value,
            tipo = 'R';
            resetForm('#formReclama');
            $.ajax({
                type: "post",
                url: "route('feedback.processa')}}",
                data: {
                    "_token":"{{csrf_token()}}",
                    email,
                    titulo,
                    text,
                    tipo,
                },
                success: function(retorno){
                    console.log(retorno);
                },
                error:function(error){
                    console.log(error);
                },
            });
        }	*/
        </script>

@stop