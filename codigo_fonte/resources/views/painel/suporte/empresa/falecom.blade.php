@extends('adminlte::page')

@section('title', 'Atendimento')

@section('content_header')
    <h1>Atendimento</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> Home</li>
        <li class="breadcrumb-item active" aria-current="page">Atendimento</li>
    </ol>
@stop

@section('content_header')
    <h1>Academias</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> Home</li>
        <li class="breadcrumb-item active" aria-current="page">Academias</li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header justify-content-between" style="display: inline-block">
            <h3 class="card-title">Help Desks</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th>-</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>645347</td>        
                        <td>Daniel Carlos</td>
                        <td><i class="fas fa-envelope"></i> danielcarlos@outlook.com</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-secondary btn-xs"><i class="fas fa-check-square"></i> finalizado</button></td>
                    </tr>
                    <tr>
                        <td>345678</td>
                        <td>Joao Maria</td>
                        <td><i class="fas fa-envelope"></i> joão2013@live.com</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-info btn-xs"><i class="fas fa-external-link-square-alt"></i> Novo</button></td>
                    </tr>
                    <tr>
                        <td>643584</td>
                        <td>Peterson de Andrade</td>
                        <td><i class="fas fa-envelope"></i> peterson.andrade@gmail.com</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-info btn-xs"><i class="fas fa-external-link-square-alt"></i> Novo</button></td>
                    </tr>
                    <tr>
                        <td>345678</td>
                        <td>Maria Barbosa</td>
                        <td><i class="fas fa-envelope"></i> barbosa.maria@gmail.com</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-secondary btn-xs"><i class="fas fa-check-square"></i> Finalizado</button></td>
                    </tr>
                    <tr>
                        <td>234934</td>
                        <td>Gabriel Da Silva</td>
                        <td><i class="fas fa-envelope"></i> gabriel_22@outlook.com</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-info btn-xs"><i class="fas fa-external-link-square-alt"></i> Novo</button></td>
                    </tr>
                    <tr>
                        <td>643584</td>
                        <td>José da Silva</td>
                        <td><i class="fas fa-envelope"></i> josedasilva2021@hotmail.com</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-success btn-xs"><i class="far fa-edit"></i> Atendido</button></td>
                    </tr>
                    <tr>
                        <td>345678</td>
                        <td>Marcos de Almeida</td>
                        <td><i class="fas fa-envelope"></i> marcosdealmeida21@outlook.com</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-warning btn-xs"><i class="fas fa-reply"></i> Respondido</button></td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th>-</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="modal-Ver" style="display: none; padding-right: 12px;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Help Desk - Detalhes</h4>                   
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div><!-- modal-header-->    
                <div class="modal-header">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#New-Resp">
                        Responder
                    </button>
                    <span class="float-right">
                        <button type="button" class="btn btn-block btn-outline-info btn-xs">
                            <strong>Chamado Numero: </strong>289147
                        </button>
                    </span>
                </div><!-- modal-header-->
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="modal-title">Histórico</h5>                   
                        </div> 
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <i class="far fa-calendar-alt"></i> 22/08/2019
                                    <span class="float-right col-lg-3">
                                        <button type="button" class="btn btn-block btn-outline-secondary btn-xs"><strong>Finalizado</strong></button>
                                    </span>  
                                    <span class="float-right">Status:</span>   
                                </div>
                                <div class="card-body">
                                    Olá, este é um teste de finalização de um Help Desk.            
                                </div>
                                <div class="card-footer">
                                    Origem: Suporte - <i class="far fa-clock"></i> 08:59
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Anexo 1</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Anexo 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <i class="far fa-calendar-alt"></i> 22/08/2019
                                    <span class="float-right col-lg-3">
                                        <button type="button" class="btn btn-block btn-outline-warning btn-xs"><strong>Respondido</strong></button>
                                    </span>  
                                    <span class="float-right">Status:</span>  
                                </div>
                                <div class="card-body">
                                    Olá, este é um teste de resposta de um Help Desk.            
                                </div>
                                <div class="card-footer">
                                    Origem: Usuário - <i class="far fa-clock"></i> 08:41
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <i class="far fa-calendar-alt"></i> 21/08/2019
                                    <span class="float-right col-lg-3">
                                        <button type="button" class="btn btn-block btn-outline-success btn-xs"><strong>Atendido</strong></button>
                                    </span>  
                                    <span class="float-right">Status:</span>  
                                </div>
                                <div class="card-body">
                                    Olá, este é um teste de atendimento de um Help Desk.            
                                </div>
                                <div class="card-footer">
                                    Origem: Suporte - <i class="far fa-clock"></i> 22:35
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <i class="far fa-calendar-alt"></i> 21/08/2019
                                    <span class="float-right col-lg-3">
                                        <button type="button" class="btn btn-block btn-outline-info btn-xs"><strong>Novo</strong></button>
                                    </span>  
                                    <span class="float-right">Status:</span>
                                </div>
                                <div class="card-body">
                                    Olá, este é um teste de solicitação Help Desk.            
                                </div>
                                <div class="card-footer">
                                    Enviado por: Usuário - <i class="far fa-clock"></i> 21:35
                                </div>
                            </div>
                        </div><!--card-body-->
                    </div><!-- card-->
                </div><!-- modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary float-rigth" data-dismiss="modal">Fechar</button>
                </div><!-- modal-footer-->
            </div><!-- modal-content-->
        </div><!-- modal-dialog-->
    </div><!-- modal fade-->

    <div class="modal fade" id="snippet-cancel-cadastro" style="display: none;" aria-hidden="true">
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
                <center>Nenhum Dado foi Alterado!</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="snippet-success-cadastro" style="display: none;" aria-hidden="true">
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
                <center>Dados Atualizados com Sucesso!</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="New-Resp" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Respoder Chamado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="Name">Nome</label>
                                <input type="text" class="form-control" id="Name" placeholder="Nome">
                            </div>
                            <div class="form-group col-lg-6">
                                    <label for="textarea1">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="exemplo@email.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea1">Detalhes</label>
                            <textarea class="form-control" id="textarea1" rows="3" placeholder=" ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Selecionar Arquivo</label>
                                </div>
                                    <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                    </form>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"  data-toggle="modal" data-target="#snippet-success">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="snippet-success" style="display: none;" aria-hidden="true">
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
                <center>Resposta Enviada com Sucesso!</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"  data-toggle="modal" data-target="#modal-Ver">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="../../vendor/datatables-adminlte/css/dataTables.bootstrap4.css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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


    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../vendor/datatables-adminlte/js/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables-adminlte/js/dataTables.bootstrap4.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script>
    $(function () {
        $('#example').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        });
    });
    </script>
@stop