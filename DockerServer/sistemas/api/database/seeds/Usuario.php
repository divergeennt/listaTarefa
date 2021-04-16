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
            'senha' => '202cb962ac59075b964b07152d234b70',           
            'email' => 'usuario1@email.com',           
            'token' => null,           
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('usuario')->insert([
            'login' => 'usuario2',
            'senha' => '81dc9bdb52d04dc20036dbd8313ed055',
            'token' => null,              
            'email' => 'usuario1@email.com',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
