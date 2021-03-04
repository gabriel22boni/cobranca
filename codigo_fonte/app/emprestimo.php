<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emprestimo extends Model
{
    public function novoEmprestimo ($idcli, $valor){

        $id = $this->max('id');
        
        if(!$id){
            $id=2;
        }else{
            $id=++$id;
        }
        
        $this
            ->insert([
                'id'=>$id,
                'idcli'=>$idcli,
                'amount'=>$valor,
                'dataEmprestimo'=>date('Y-m-d'),
            ]);

        return $id;
    }
}
