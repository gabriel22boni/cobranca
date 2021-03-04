<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cad_produto extends Model
{
    public function search($totalPage, $data = null){
        if(auth()->user()->nivel =='CEO'){
            if(isset($data["data"]) && $data["data"]!=null){
                return $this
                ->select('cad_produtos.*')
                ->where('cad_produtos.status', '=',"A")
                ->where('cad_adms.status', '=',"A")
                ->where('cad_admasters.status', '=',"A")
                ->where('cad_ceos.status', '=',"A")
                ->where('cad_ceos.id', '=',auth()->user()->idceo)
                ->leftJoin('cad_adms', 'cad_produtos.idadm','=','cad_adms.id')
                ->leftJoin('cad_admasters','cad_adms.idmaster','=','cad_admasters.id')
                ->leftJoin('cad_ceos','cad_admasters.idceo','=','cad_ceos.id')
                ->where('cad_produtos.nome', 'like', '%'.$data["data"]."%")
                ->paginate($totalPage);
            }else{
                return $this
                ->select('cad_produtos.*')
                ->where('cad_produtos.status', '=',"A")
                ->where('cad_adms.status', '=',"A")
                ->where('cad_admasters.status', '=',"A")
                ->where('cad_ceos.status', '=',"A")
                ->where('cad_ceos.id', '=',auth()->user()->idceo)
                ->leftJoin('cad_adms', 'cad_produtos.idadm','=','cad_adms.id')
                ->leftJoin('cad_admasters','cad_adms.idmaster','=','cad_admasters.id')
                ->leftJoin('cad_ceos','cad_admasters.idceo','=','cad_ceos.id')
                ->paginate($totalPage);
            }
        }else{
            if(auth()->user()->nivel =='MAS'){
                if(isset($data["data"]) && $data["data"]!=null){
                    return $this
                    ->select('cad_produtos.*')
                    ->where('cad_produtos.status', '=',"A")
                    ->where('cad_adms.status', '=',"A")
                    ->where('cad_admasters.status', '=',"A")
                    ->where('cad_admasters.id', '=',auth()->user()->idmas)
                    ->leftJoin('cad_adms', 'cad_produtos.idadm','=','cad_adms.id')
                    ->leftJoin('cad_admasters','cad_adms.idmaster','=','cad_admasters.id')
                    ->where('cad_produtos.nome', 'like', '%'.$data["data"]."%")
                    ->paginate($totalPage);
                }else{
                    return $this
                    ->select('cad_produtos.*')
                    ->where('cad_produtos.status', '=',"A")
                    ->where('cad_adms.status', '=',"A")
                    ->where('cad_admasters.status', '=',"A")
                    ->where('cad_admasters.id', '=',auth()->user()->idmas)
                    ->leftJoin('cad_adms', 'cad_produtos.idadm','=','cad_adms.id')
                    ->leftJoin('cad_admasters','cad_adms.idmaster','=','cad_admasters.id')
                    ->paginate($totalPage);
                }
            }else{
                if(isset($data["data"]) && $data["data"]!=null){
                    return $this
                    ->select('cad_produtos.*')
                    ->where('cad_produtos.status', '=',"A")
                    ->where('cad_adms.status', '=',"A")
                    ->where('cad_adms.id', '=',auth()->user()->idadm)
                    ->leftJoin('cad_adms', 'cad_produtos.idadm','=','cad_adms.id')
                    ->where('cad_produtos.nome', 'like', '%'.$data["data"]."%")
                    ->paginate($totalPage);
                }else{
                    return $this
                    ->select('cad_produtos.*')
                    ->where('cad_produtos.status', '=',"A")
                    ->where('cad_adms.status', '=',"A")
                    ->where('cad_adms.id', '=',auth()->user()->idadm)
                    ->leftJoin('cad_adms', 'cad_produtos.idadm','=','cad_adms.id')
                    ->paginate($totalPage);
                }
            }
        }
    }

    public function porId($id){
        return $this
                    ->select([
                        'cad_produtos.nome',
                        'cad_produtos.preco',
                        'cad_adms.nome as nomeadm',
                        'cad_adms.fnome as fnomeadm',
                        'cad_produtos.desc',
                        'cad_produtos.codPag',
                        'cad_produtos.image',
                    ])
                    ->where('cad_produtos.id','=',$id)
                    ->leftJoin('cad_adms','cad_produtos.idadm','=','cad_adms.id')
                    ->get();
    }

    public function deleteProduto($id){
        return $this
                ->where('id','=',$id)
                ->update(['status' => 'I']);
    }

    public function updateReg($data){
        $id = $data['id'];
        unset($data['id']);
        
            $this
                ->where('id', $id)
                ->update($data);
    }

    public function porLoja($totalpage, $nomeLoja){
        return $this
                ->select('cad_produtos.*') 
                ->where('cad_produtos.status','A')
                ->where('cad_adms.nomeloja',$nomeLoja)
                ->leftJoin('cad_adms','cad_produtos.idadm','=','cad_adms.id' )
                ->paginate($totalpage);
    }

    public function porLojaPesq($totalpage, $data){
        if(isset($data['data'])){
            return $this
                ->select('cad_produtos.*') 
                ->where('cad_adms.nomeloja',$data['nomeLoja'])
                ->where('cad_produtos.status','A')
                ->where('cad_produtos.nome','like','%'.$data['data'].'%')
                ->leftJoin('cad_adms','cad_produtos.idadm','=','cad_adms.id' )
                ->paginate($totalpage);
        }else{
            return $this
                ->select('cad_produtos.*') 
                ->where('cad_produtos.status','A')
                ->where('cad_adms.nomeloja',$data['nomeLoja'])
                ->leftJoin('cad_adms','cad_produtos.idadm','=','cad_adms.id' )
                ->paginate($totalpage);
        }
    }
}
