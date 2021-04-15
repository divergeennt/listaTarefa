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

                $this->verificarSession($request);
               

                
            }else{
                $retorno['tipo'] =  'erro';
                $retorno['mensagem'] = 'Usuário inválido.';
                return json_encode($retorno);
            }
        }
    }

     public function verificarSession($request)
    {
        if ($request->session()->exists('key')) {
            dd('dsdff');
            return 'usuario';
        }else{
            dd('dsssss');
            return 'dfsf';
        }
        // // dd('sdas');
        // if(!session()->has('data')){
        //     $retorno['tipo'] =  'erro';
        //     $retorno['mensagem'] = 'Sessão Expirada';
        //     return json_encode($retorno);
        // }else{
        //     return 'sd';
        // }
     
    }


    // public function Login_(Request $request){
    //     $usuario = Usuario::where('login', '=', $request->login)->get();
    //     foreach ($usuario as $key => $value) {
    //         $senha = md5($request->senha);
    //         if($value->senha == md5($request->senha)){

    //             $this->verificarToken($value->id, $value->token);
               
    //             // if($retorno['tipo'] ==  'success'){
    //             //     $retorno['tipo'] =  'success';
    //             //     $retorno['mensagem'] = 'Logado';
    //             //     return json_encode($retorno);
    //             // }else{
    //             //     $retorno['tipo'] =  'erro';
    //             //     $retorno['mensagem'] = 'Problemas ao salvar o token.';
    //             //     return json_encode($retorno);    
    //             // }
                
    //         }else{
    //             $retorno['tipo'] =  'erro';
    //             $retorno['mensagem'] = 'Usuário inválido.';
    //             return json_encode($retorno);
    //         }
    //     }
    // }

    public function verificarToken($id, $token)
    {
        JWTAuth::parseToken();
        $token = JWTAuth::getToken();
        $verificarToken = DB::table('usuario')->where('token', '=', $token)->first();

        if(!empty($verificarToken)){
            $token = $this->gerarToken($request);
            $retorno = $this->salvarToken($value->id, $token);
        }else{
            $retorno['tipo'] =  'erro';
            $retorno['mensagem'] = 'Algum erro correu, por favor entre encontato com o suporte.';
            return json_encode($retorno);            
        }
    }

    public function salvarToken($id, $token)
    {
        try {
            $usuario = Usuario::find($id);
            $usuario->token = $token;
            $usuario->save();
            return true;

        } catch (\Throwable $th) {
                
            $retorno['tipo'] =  'erro';
            $retorno['mensagem'] = 'Token não atualizado, por favor entre encontato com o suporte.';
            return json_encode($retorno);
        }
    }

    public function gerarToken(Request $request)
    {
        $payload = JWTFactory::emptyClaims()->addClaims([
            'sub'   => request(['login'])
        ])->make();

        $token = JWTAuth::encode($payload);
        return $token;      
    }
}