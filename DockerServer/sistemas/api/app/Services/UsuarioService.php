<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Repositories\UsuarioRepository;

class UsuarioService 
{
    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->UsuarioRepository = $usuarioRepository;
    }

    public function RealizarLogin(Request $request)
    {
        return $this->UsuarioRepository->Login($request);
    }    
}