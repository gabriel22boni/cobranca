<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fatura extends Model
{
    public function insertFatura($idEmprestimo, $a, $Vcto , $valorFat){
        $this
            ->insert([
                'idEmprestimo'=>$idEmprestimo,
                'faturaNumero'=>$a,
                'vcto'=>$Vcto,
                'valor'=>$valorFat,
                'pago'=>0,

            ]);
    }

    public function verFaturas($idCliente){
        $retorno = $this
                ->select('faturas.*')
                ->leftJoin('emprestimos','faturas.idEmprestimo','=','emprestimos.id')
                ->where('emprestimos.idcli',$idCliente)
                ->get();

        for($b =0; $b < count($retorno); $b++){

            //verifica status
            if(($retorno[$b]['valor']-$retorno[$b]['pago'])!=0){
                if($retorno[$b]['pago'] == 0){
                    $retorno[$b]['status']='A';//aberto
                }else{
                    $retorno[$b]['status']='P';//parcial
                }
            }else{
                $retorno[$b]['status']='Q';//quitado
            }

            //verificar se está vencida
            if(date('Y-m-d')<$retorno[$b]['vcto'] ){
                $retorno[$b]['vencida'] = false;
            }else{
                if($retorno[$b]['status']=="Q"){
                    $retorno[$b]['vencida'] = false;
                }else{
                    $retorno[$b]['vencida'] = true;
                }

            }

            $retorno[$b]['vcto'] = date('d/m/Y', strtotime($retorno[$b]['vcto']));
            $retorno[$b]['devedor'] = 'R$ '. number_format($retorno[$b]['valor']-$retorno[$b]['pago'], 2, ',' ,'');
            $retorno[$b]['valor'] = 'R$ '. number_format($retorno[$b]['valor'], 2, ',' ,'');
            $retorno[$b]['pago'] = 'R$ '. number_format($retorno[$b]['pago'], 2, ',' ,'');
        }
        
        return $retorno;
    }

    public function autorizarBaixaFatura($dataBaixa){
        $pago = (
            $this
                ->select('pago')
                ->where('id',$dataBaixa['id'])
                ->get()
        )[0]['pago'];
        
        $valor = (
            $this
                ->select('valor')
                ->where('id',$dataBaixa['id'])
                ->get()
        )[0]['valor'];
        
        $aberto = $valor - $pago;

        if($dataBaixa['valorBaixa']>$aberto){
            return false;
        }else{
            return true;
        }

    }

    public function baixaFatura($dataBaixa){
        $pago = (
            $this
                ->select('pago')
                ->where('id',$dataBaixa['id'])
                ->get()
        )[0]['pago'];
        
        $pagoTotal = $pago+$dataBaixa['valorBaixa'];
        
        $this
            ->where('id', $dataBaixa['id'])
            ->update(['pago' => $pagoTotal]);
    }
}
