<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

use App\Services\UsuarioService;
class UsuarioController extends Controller
{
    //
    public function __construct(UsuarioService $usuarioService)
    {
        $this->UsuarioService = $usuarioService;
    }

    public function RealizaLogin(Request $request)
    {
        return $this->UsuarioService->RealizarLogin($request);
    }
}


