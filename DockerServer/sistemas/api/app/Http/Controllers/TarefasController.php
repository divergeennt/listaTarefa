<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TarefasService;

class TarefasController extends Controller
{
    public function __construct(TarefasService $tarefasService)
    {
        $this->TarefasService = $tarefasService;
    }

     public function listaTarefas($id){
       return $this->TarefasService->listarTarefas($id);
     }
}
