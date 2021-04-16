<?php
namespace App\Repositories;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use DB;



class UsuarioRepository 
{
    public function Login(Request $request){
        $usuario = Usuario::where('login', '=', $request->login)->get();
        foreach ($usuario as $key => $value) {
            $senha = md5($request->senha);
            if($value->senha == md5($request->senha)){

                // $this->verificarSession($request);
               
                $retorno['tipo'] =  'success';
                $retorno['mensagem'] = 'Usuário Logado.';
                return json_encode($retorno);
                
            }else{
                $retorno['tipo'] =  'erro';
                $retorno['mensagem'] = 'Usuário inválido.';
                return json_encode($retorno);
            }       
        }
        $retorno['tipo'] =  'erro';
        $retorno['mensagem'] = 'Usuário Não encontrado.';
        return json_encode($retorno);
    }

     public function verificarSession($request)
    {
     
    }

}