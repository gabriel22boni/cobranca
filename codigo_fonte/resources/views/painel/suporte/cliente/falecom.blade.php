@extends('adminlte::page')

@section('title', 'Fale Conosco')

@section('content_header')
    <h1>Fale Conosco</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> Home</li>
        <li class="breadcrumb-item active" aria-current="page">Fale Conosco</li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header justify-content-between" style="display: inline-block">
            <h3 class="card-title">Help Desks</h3>
            <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#New-Help">
                <i class="fas fa-edit"></i>
                 Novo Help-Desk
            </button>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>-</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>645347</td>        
                        <td><i class="far fa-calendar"></i> 21/08/2019</td>
                        <td><i class="far fa-clock"></i> 15:30 pm</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-secondary btn-xs"><i class="fas fa-check-square"></i> finalizado</button></td>
                    </tr>
                    <tr>
                        <td>345678</td>
                        <td><i class="far fa-calendar"></i> 20/07/2019</td>
                        <td><i class="far fa-clock"></i> 13:30 pm</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-info btn-xs"><i class="fas fa-external-link-square-alt"></i> Novo</button></td>
                    </tr>
                    <tr>
                        <td>643584</td>
                        <td><i class="far fa-calendar"></i> 17/05/2019</td>
                        <td><i class="far fa-clock"></i> 11:25 am</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-info btn-xs"><i class="fas fa-external-link-square-alt"></i> Novo</button></td>
                    </tr>
                    <tr>
                        <td>345678</td>
                        <td><i class="far fa-calendar"></i> 15/05/2019</td>
                        <td><i class="far fa-clock"></i> 12:22 pm</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-secondary btn-xs"><i class="fas fa-check-square"></i> Finalizado</button></td>
                    </tr>
                    <tr>
                        <td>234934</td>
                        <td><i class="far fa-calendar"></i> 12/01/2019</td>
                        <td><i class="far fa-clock"></i> 08:37 pm</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-info btn-xs"><i class="fas fa-external-link-square-alt"></i> Novo</button></td>
                    </tr>
                    <tr>
                        <td>643584</td>
                        <td><i class="far fa-calendar"></i> 02/02/2018</td>
                        <td><i class="far fa-clock"></i> 21/:30 pm</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-success btn-xs"><i class="far fa-edit"></i> Atendido</button></td>
                    </tr>
                    <tr>
                        <td>345678</td>
                        <td><i class="far fa-calendar"></i> 01/01/2017</td>
                        <td><i class="far fa-clock"></i> 15:30 pm</td>
                        <td><button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-Ver"><i class="fas fa-eye"></i> Ver</button></td>
                        <td><button type="button" class="btn btn-block btn-outline-warning btn-xs"><i class="fas fa-reply"></i> Respondido</button></td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Data</th>
                        <th>Horário</th>
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
                                    <span class="float-right  col-lg-3">
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

    

    <div class="modal fade" id="New-Help" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Novo Help-Desk</h4>
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
                    </form>    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal" data-toggle="modal" onclick="resetForm('#formElogio')">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
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