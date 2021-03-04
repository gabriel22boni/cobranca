<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\state;
use App\cad_cli;
use App\cad_cob;
use App\fatura;
use App\emprestimo;
use App\pagto;

class financeiroController extends Controller
{
    private $totalpage = 3;
    public function faturasView(){
        return view('painel.financeiro.index');
    }

    public function clientefaturasView(){
        return view('painel.financeiro.cliente.index');
    }

    public function novoEmprestimoView(state $state, cad_cob $cadCob, cad_cli $cadCli){
        $stateNames = $state->all();   
        $cadCobs = $cadCob->where('status', 'A')->get();
        $cadClis = $cadCli->search($this->totalpage);
        return view('painel.financeiro.empresa.novo',compact('stateNames','cadCobs','cadClis'));
    }

    public function novoEmprestimoSearch(state $state, cad_cob $cadCob, cad_cli $cadCli, Request $request){
        $dataForm = $request->except('_token');
        $stateNames = $state->get();   
        $cadCobs = $cadCob->where('status', 'A')->get();
        $cadClis = $cadCli->search($this->totalpage, $dataForm);
        return view('painel.financeiro.empresa.novo',compact('stateNames','cadCobs','cadClis','dataForm'));
    }

    public function clientePorId(Request $request, cad_cli $cadCli){
        $data = $request->except('_token');
        $retorno = $cadCli->porId($data['idCliente']);
        return $retorno;
    }

    public function insertFatura(Request $request, emprestimo $emprestimo,fatura $fatura, cad_cli $cad_cli){
        $dataForm = $request->except('_token');
        $retorno = [
            'status' => 'success',
        ];
        $msg = [];

        if(!isset($dataForm['id']))
        {
            array_push($msg, 'Favor informar o Cliente');
            $retorno['status'] = 'error';
        }
        if(!isset($dataForm['qtde']))
        {
            array_push($msg, 'Favor informar Qtde. de Faturas');
            $retorno['status'] = 'error';
        }else{
            if($dataForm['qtde'] == 0)
            {
                array_push($msg, 'Qtde. de Faturas não pode ser igual a zero');
                $retorno['status'] = 'error';
            }
        }
        if(!isset($dataForm['valor']))
        {
            array_push($msg, 'Favor informar Valor do Empréstimo');
            $retorno['status'] = 'error';
        }else{
            if($dataForm['valor'] == 0)
            {
                array_push($msg, 'Valor do Empréstimo não pode ser igual a zero');
                $retorno['status'] = 'error';
            }
        }
        if(!isset($dataForm['intervalo']))
        {
            array_push($msg, 'Favor informar o intervalo de Pgtos');
            $retorno['status'] = 'error';
        }else{
            if($dataForm['intervalo'] == 0)
            {
                array_push($msg, 'O intervalo de Pgtos não pode ser igual a zero.');
                $retorno['status'] = 'error';
            }
        }
        if(!isset($dataForm['pVcto']))
        {
            array_push($msg, 'Favor informar a Data do Primeiro Vcto.');
            $retorno['status'] = 'error';
        }

        $saldoCliente = $cad_cli->verSaldo($dataForm['id']);

        if(($saldoCliente-$dataForm['valor']) < 0)
        {
            array_push($msg, 'Valor ultrapassa o limite de credito do cliente.');
            $retorno['status'] = 'error';
        }

        if($retorno['status'] == 'success'){
            //cria emprestimo
            $idEmprestimo = $emprestimo->novoEmprestimo($dataForm['id'], $dataForm['valor']);
            
            //cria a(s) fatura(s)
            $valorFat = ($dataForm['valor'] / $dataForm['qtde']);
            for($a = 1, $b = 0; $a <= $dataForm['qtde']; $a++){
                if($a == 1){
                    $fatura->insertFatura($idEmprestimo, $a, $dataForm['pVcto'], $valorFat);
                    $b++;
                }else{
                    $dataVcto = $dataForm['pVcto'];
                    $Vcto = date('Y-m-d', strtotime("+".strval($dataForm['intervalo']*$b)." days",strtotime($dataVcto)));
                    $fatura->insertFatura($idEmprestimo, $a, $Vcto , $valorFat);
                    $b++;
                }
            }
            
            //altera o Total emprestado do cliente
            $cad_cli->updateSaldo($dataForm['id'], $dataForm['valor']);
        }

        array_push($retorno, $msg);
        return $retorno;
    }

    public function baixarEmprestimoView(){
        return view('painel.financeiro.empresa.baixar');
    }

    public function verEmprestimoView(state $state, cad_cob $cadCob, cad_cli $cadCli){
        $stateNames = $state->all();   
        $cadCobs = $cadCob->where('status', 'A')->get();
        $cadClis = $cadCli->search($this->totalpage);
        return view('painel.financeiro.empresa.faturas',compact('stateNames','cadCobs','cadClis'));
    }

    public function verFaturas(Request $request, fatura $fatura){
        $idCliente = $request->except("_token");
        $retorno = $fatura->verFaturas($idCliente['idCliente']);

        return $retorno;
    }

    public function efetuarBaixa(Request $request, fatura $fatura, pagto $pagto, cad_cli $cad_cli){
        $dataR = $request->except("_token");
        if($fatura->autorizarBaixaFatura($dataR) == true){
            $pagto->baixaFatura($dataR);
            $cad_cli->baixaFatura($dataR);
            $fatura->baixaFatura($dataR);
            return'A';
        }else{
            return'NA';
        }
        
    }
}
