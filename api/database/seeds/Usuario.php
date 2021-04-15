<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'login' => 'usuario1',
            'senha' => '123',           
            'email' => 'usuario1@email.com',           
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('usuario')->insert([
            'login' => 'usuario2',
            'senha' => '1234',           
            'email' => 'usuario1@email.com',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
