<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">/* Chart.js */
    @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
</head>
<body class="layout-top-nav" style="height: auto;">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white ">
            <div class="container">
                    <a href="{{route('login')}}" class="navbar-brand">
                        <span class="brand-text font-weight-light"><strong>Ize</strong> Banc</span>
                    </a>
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{route('login')}}"><i class="fas fa-user-alt"></i> Login</a>
                        </li>
                    </ul>
            </div>
        </nav>
        <div class="content-wrapper" style="min-height: 390px;">
            @if( count($produtos) > 0 )
                <div class="content-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <form action="{{ route('cadastros.loja.search') }}" method="POST" class="form form-inline">
                                    {!! csrf_field() !!}
                                    <input name="nomeLoja" type="text" style="display:none" value="{!!$nomeLoja!!}">
                                    <div class="input-group input-group-sm">
                                            <input name="data" type="text" class="form-control" placeholder="Nome">
                                        <span class="input-group-append">
                                            <button $type="submit" class="btn btn-primary">Filtrar</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-12 col-md-6 ">
                                <div class="d-flex justify-content-center float-md-right">
                                    @if(isset($dataForm))
                                        {!! $produtos->appends($dataForm ?? '')->links() !!} 
                                    @else
                                        {!! $produtos->links() !!}     
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="container">
                        @foreach($produtos as $produto)
                            <div class="card">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3">
                                            <h3 class="d-inline-block d-sm-none">{{$produto->nome}}</h3>
                                            <div class="col-12">
                                                <img src="/images/{{$produto->image}}" class="img-thumbnail product-image" alt="Product Image">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <h class="my-2">{{$produto->nome}}</h>
                                            <hr>
                                            <p style="text-indent:30px;"><font size="1">{{$produto->desc}}</font></p>
                                            <hr>
                                            <div class="bg-success py-2 px-3 mt-1" style="border-radius:10px;">
                                                <h4 class="mt-0" >
                                                    <small>R$ {{$produto->preco}}</small>
                                                </h4>
                                            </div>
                                            <div class="mt-1">
                                                    {!! $produto->codPag !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header" style="margin-right:200px;margin-left:200px; ">
                        <div class="col-sm-5 float-left">
                            <form method="POST" class="form form-inline">
                                <input name="data" type="text" class="form-control" placeholder="Nome">
                                &nbsp&nbsp&nbsp<span $type="submit" class="btn btn-primary">Filtrar</span>
                            </form>
                        </div>
                        <div class="card-tools float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled" aria-disabled="true" aria-label="pagination.previous">
                                        <span class="page-link" aria-hidden="true">
                                            ‹
                                        </span>
                                    </li>
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">
                                            1
                                        </span>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" rel="next" aria-label="pagination.next">
                                            ›
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="card-body">
                        <center>
                            <h1>Oops!</h1>
                            <p>Loja Não encontrada</p>
                        </center>
                    </div>
                </div>
            @endif
        </div>
        <footer class="main-footer">
            <center>
                <font size="2">
                    Desenvolvido por- 
                    <strong>JL Empreendimento LTDA</strong>
                </font>
            </center>
        </footer>

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

        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/vendor/adminlte/dist/js/adminlte.min.js"></script>
    </div>
</body>
</html>