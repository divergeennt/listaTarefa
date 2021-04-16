<?php
namespace App\Repositories;

use App\Models\Tarefas;
use Illuminate\Http\Request;
use Response;


class TarefasRepository 
{

    public function getTarefas($id)
    {
        $tarefas = Tarefas::where('usuario_id', '=', $id)->get();
        return $tarefas;

    }

}