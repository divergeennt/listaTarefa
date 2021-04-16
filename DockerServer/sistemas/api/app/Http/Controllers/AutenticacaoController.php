<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTFactory;
use Tymon\JWTAuth\PayloadFactory;

class AutenticacaoController extends Controller
{
    public function authtoken(Request $request){
        JWTAuth::parseToken();
        $token = JWTAuth::getToken();
        
        $verificarToken = DB::table('usuario')->where('token', '=', $token)->first();

        if(empty($verificarToken)){
            $retorno['tipo']     =  'erro';
            $retorno['mensagem'] =  'Token não logado no sistema.';
            return json_encode($retorno);
        }else{
            $retorno['tipo']     =  'sucesso';
            $retorno['mensagem'] =  'ok';
            return json_encode($retorno);
        }
    }
}
