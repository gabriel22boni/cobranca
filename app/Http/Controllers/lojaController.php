<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cad_produto;

class lojaController extends Controller
{
    private $totalpage = 3;
    public function index($nomeLoja, cad_produto $produto){
        $produtos = $produto->porLoja($this->totalpage, $nomeLoja);
        return view('loja.index',compact('nomeLoja','produtos'));
    }

    public function produtosSearch(cad_produto $produto, Request $request){
        $dataForm = $request->except('_token');
        $produtos = $produto->porLojaPesq($this->totalpage, $dataForm);
        $nomeLoja = $dataForm['nomeLoja'];
        return view('loja.index',compact('nomeLoja','produtos','dataForm'));
    }
}

