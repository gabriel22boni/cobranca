<?php
use App\Http\Middleware\CEOUser;
use App\Http\Middleware\MAdminUser;
use App\Http\Middleware\AdminUser;
use App\Http\Middleware\CobradorUser;

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'painel'],       function (){
    
    
    Route::post ('/cadastro/search/state'   , 'cadastrosController@searchState'         )->name('search.state');
    
    Route::group(['middleware'=>CEOUser::Class], function(){
        Route::post ('/cadastro/ceo/update' , 'cadastrosController@ceoUpdate'       )->name('ceo.update');
        Route::post ('/cadastro/ceo/delete' , 'cadastrosController@ceoDelete'       )->name('ceo.delete');
        Route::post ('/cadastro/ceo/dados' , 'cadastrosController@ceoDados'       )->name('cadastros.ceo.dados');
        Route::post ('/cadastro/ceo/insert' , 'cadastrosController@ceoInsert'       )->name('cadastros.ceo.insert');
        Route::get ('/cadastro/ceo/search' , 'cadastrosController@ceoSearch'       )->name('cadastros.ceo.search');
        Route::post ('/cadastro/ceo/search' , 'cadastrosController@ceoSearch'       )->name('cadastros.ceo.search');
        Route::get  ('/cadastro/ceo'            , 'cadastrosController@ceoView'             )->name('cadastros.ceo');
    });
    
    Route::group(['middleware'=>CEOUser::Class], function(){
        Route::post ('/cadastro/masterAdmin/update' , 'cadastrosController@masterAdminUpdate'       )->name('masterAdmin.update');
        Route::post ('/cadastro/masterAdmin/delete' , 'cadastrosController@masterAdminDelete'       )->name('masterAdmin.delete');
        Route::post ('/cadastro/masterAdmin/dados' , 'cadastrosController@masterAdminDados'       )->name('cadastros.masterAdmin.dados');
        Route::post ('/cadastro/masterAdmin/insert' , 'cadastrosController@masterAdminInsert'       )->name('cadastros.masterAdmin.insert');
        Route::get ('/cadastro/masterAdmin/search' , 'cadastrosController@masterAdminSearch'       )->name('cadastros.masterAdmin.search');
        Route::post ('/cadastro/masterAdmin/search' , 'cadastrosController@masterAdminSearch'       )->name('cadastros.masterAdmin.search');
        Route::get  ('/cadastro/masteradmin'    , 'cadastrosController@masteradminView'     )->name('cadastros.masterAdmin');
    });

    Route::group(['middleware'=>MAdminUser::Class], function(){
        Route::post ('/cadastro/admin/update' , 'cadastrosController@adminUpdate'       )->name('admin.update');
        Route::post ('/cadastro/admin/delete' , 'cadastrosController@adminDelete'       )->name('admin.delete');
        Route::post ('/cadastro/admin/dados' , 'cadastrosController@adminDados'       )->name('cadastros.admin.dados');
        Route::post ('/cadastro/admin/insert' , 'cadastrosController@adminInsert'       )->name('cadastros.admin.insert');
        Route::get ('/cadastro/admin/search' , 'cadastrosController@adminSearch'       )->name('cadastros.admin.search');
        Route::post ('/cadastro/admin/search' , 'cadastrosController@adminSearch'       )->name('cadastros.admin.search');
        Route::get  ('/cadastro/admin'          , 'cadastrosController@adminView'           )->name('cadastros.admin');
    });

    Route::group(['middleware'=>AdminUser::Class], function(){
        Route::post ('/cadastro/cobrador/update' , 'cadastrosController@cobradorUpdate'       )->name('cobrador.update');
        Route::post ('/cadastro/cobrador/delete' , 'cadastrosController@cobradorDelete'       )->name('cobrador.delete');
        Route::post ('/cadastro/cobrador/dados' , 'cadastrosController@cobradorDados'       )->name('cadastros.cobrador.dados');
        Route::post ('/cadastro/cobrador/insert' , 'cadastrosController@cobradorInsert'       )->name('cadastros.cobrador.insert');
        Route::get ('/cadastro/cobrador/search' , 'cadastrosController@cobradorSearch'       )->name('cadastros.cobrador.search');
        Route::post ('/cadastro/cobrador/search' , 'cadastrosController@cobradorSearch'       )->name('cadastros.cobrador.search');
        Route::get  ('/cadastro/cobrador'       , 'cadastrosController@cobradorView'        )->name('cadastros.cobrador');
        
        Route::post ('/cadastro/produtos/upload' , 'uploadController@produtoUpload'       )->name('produto.upload');
        Route::post ('/cadastro/produtos/update' , 'cadastrosController@produtoUpdate'       )->name('produto.update');
        Route::post ('/cadastro/produtos/delete' , 'cadastrosController@produtosDelete'       )->name('produto.delete');
        Route::post ('/cadastro/produtos/dados' , 'cadastrosController@produtosDados'       )->name('cadastros.produto.dados');
        Route::post ('/cadastro/produtos/insert' , 'cadastrosController@produtosInsert'       )->name('cadastros.produto.insert');
        Route::get ('/cadastro/produtos/search' , 'cadastrosController@produtosSearch'       )->name('cadastros.produto.search');
        Route::post ('/cadastro/produtos/search' , 'cadastrosController@produtosSearch'       )->name('cadastros.produto.search');
        Route::get ('/cadastro/produtos' , 'cadastrosController@produtosView'       )->name('cadastros.produto');
    });

    Route::group(['middleware'=>CobradorUser::Class], function(){
        Route::get  ('/helpdesk/empresa/', 'suporteController@empresaHelpDeskView'        )->name('helpdesk.empresa');
        Route::get  ('/feedback/empresa/', 'suporteController@empresaFeedbackView'        )->name('feedback.empresa');
        
        Route::post  ('/financeiro/empresa/faturas/baixar', 'financeiroController@efetuarBaixa'        )->name('empresa.emprestimo.efetuarBaixa');
        Route::post  ('/financeiro/empresa/faturas/search', 'financeiroController@verFaturas'        )->name('empresa.emprestimo.verFaturas');
        Route::get  ('/financeiro/empresa/faturas', 'financeiroController@verEmprestimoView'        )->name('empresa.emprestimo.baixa');
        Route::post  ('/financeiro/empresa/faturas/insert', 'financeiroController@insertFatura'        )->name('empresa.emprestimo.novo.insert');
        Route::post  ('/financeiro/empresa/faturas/cliId', 'financeiroController@clientePorId'        )->name('empresa.emprestimo.novo.cliId');
        Route::get  ('/financeiro/empresa/faturas/novosearch', 'financeiroController@novoEmprestimoSearch'        )->name('empresa.emprestimo.novo.search');
        Route::post  ('/financeiro/empresa/faturas/novosearch', 'financeiroController@novoEmprestimoSearch'        )->name('empresa.emprestimo.novo.search');
        Route::get  ('/financeiro/empresa/faturas/novo', 'financeiroController@novoEmprestimoView'        )->name('empresa.emprestimo.novo');
        
        Route::post ('/cadastro/cliente/update' , 'cadastrosController@clienteUpdate'       )->name('cliente.update');
        Route::post ('/cadastro/cliente/delete' , 'cadastrosController@clienteDelete'       )->name('cliente.delete');
        Route::post ('/cadastro/cliente/dados' , 'cadastrosController@clienteDados'       )->name('cadastros.cliente.dados');
        Route::post ('/cadastro/cliente/insert' , 'cadastrosController@clienteInsert'       )->name('cadastros.cliente.insert');
        Route::get ('/cadastro/cliente/search' , 'cadastrosController@clienteSearch'       )->name('cadastros.cliente.search');
        Route::post ('/cadastro/cliente/search' , 'cadastrosController@clienteSearch'       )->name('cadastros.cliente.search');
        Route::get  ('/cadastro/cliente'        , 'cadastrosController@clienteView'         )->name('cadastros.cliente');
    });


    Route::post  ('/financeiro/cliente/faturas/search', 'financeiroController@verFaturas'        )->name('cliente.emprestimo.verFaturas');
    Route::get  ('/helpdesk/cliente/', 'suporteController@clienteHelpDeskView'        )->name('helpdesk.cliente');
    Route::get  ('/feedback/cliente/', 'suporteController@clienteFeedbackView'        )->name('feedback.cliente');
    Route::get  ('/financeiro/cliente/faturas', 'financeiroController@clienteFaturasView'        )->name('faturas.cliente');
    Route::post ('/perfil/update'           , 'UserController@profileUpdate'            )->name('perfil.update');
    Route::get  ('/perfil'                  , 'UserController@profile'                  )->name('perfil');
    
    Route::post  ('/dashboard/authenticateUsr', 'painelController@authenticateUsr'       )->name('painel.authenticateUsr');
    
    Route::get  ('/dashboard'               , 'painelController@index'                  )->name('painel.home');
});

    Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'],       function (){
        Route::get('/'                              , 'painelController@index'               )->name('home');
    });

    Route::get ('/loja/search' , 'lojaController@produtosSearch'       )->name('cadastros.loja.search');
    Route::post ('/loja/search' , 'lojaController@produtosSearch'       )->name('cadastros.loja.search');
    Route::get('/loja/{nomeLoja}','lojaController@index')->name('loja');
    Auth::routes();
