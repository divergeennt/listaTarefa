<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Tarefas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['A fazer', 'Fazendo', 'Concluído'];

        for($i=0; $i < 30; $i++){
            DB::table('tarefas')->insert([
                'usuario_id' => rand(1,2),
                'titulo' => Str::random(10),
                'subtitulo' => Str::random(10),
                'descricao' => Str::random(30),
                'status' => array_random($status),
                'created_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
