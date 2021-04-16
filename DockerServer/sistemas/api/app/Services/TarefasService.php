<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Repositories\TarefasRepository;

class TarefasService 
{
    public function __construct(TarefasRepository $tarefasRepository)
    {
        $this->TarefasRepository = $tarefasRepository;
    }

    public function listarTarefas($id)
    {
        return $this->TarefasRepository->getTarefas($id);
    }    
}