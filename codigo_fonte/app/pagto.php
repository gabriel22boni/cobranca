<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagto extends Model
{
    public function baixaFatura($dataBaixa){
        
        $this
        ->insert([
            'idfat' => $dataBaixa['id'], 
            'valor' => $dataBaixa['valorBaixa'],
            'data'  => date('Y-m-d'),
        ]);
    }
}
