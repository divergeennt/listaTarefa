<?php
namespace App\Repositories;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioRepository 
{
    public function Login(Request $request){
        $usuario = Usuario::where('login', '=', $request->login)->get();
        foreach ($usuario as $key => $value) {
            $senha = md5($request->senha);
            if($value->senha == md5($request->senha)){
                //login - OBS: fazer a autenticação via sessão
                // gerar o token da sessão e salvar no campo token da tabela usuário
                //$this->gerarToken(Request $request);
                $retorno = $this->salvarToken($value->id, $token);
                if($retorno['tipo'] ==  'success'){
                    $retorno['tipo'] =  'success';
                    $retorno['mensagem'] = 'Logado';
                    return json_encode($retorno);
                }else{
                    $retorno['tipo'] =  'erro';
                    $retorno['mensagem'] = 'Problemas ao salvar o token.';
                    return json_encode($retorno);    
                }
                
            }else{
                $retorno['tipo'] =  'erro';
                $retorno['mensagem'] = 'Usuário inválido.';
                return json_encode($retorno);
            }
        }
    }

    public function salvarToken($id, $token)
    {
        //pega o token gerado e atualiza a tabela de usuário
        try {
            $usuario = Usuario::find($id);
            $usuario->token = $token;
            $usuario->save();

            $retorno['tipo']     = 'sucesso';
            $retorno['mensagem'] = 'Unidade de Conservação atulizada com Sucesso.';
            return json_encode($retorno);
        } catch (\Throwable $th) {
                
            $retorno['tipo'] =  'erro';
            $retorno['mensagem'] = 'Ops, ocorreu um erro ao tentar atualizar os dados da Unidade de Conservação.';
            return json_encode($retorno);
        }
    }

    public function gerarToken(Request $request)
    {
        //....
        return $token;
    }
}