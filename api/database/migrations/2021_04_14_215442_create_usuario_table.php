<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login', 15)->nullable();
            $table->string('senha', 200)->nullable();    
            $table->string('email', 200);           
            $table->string('token', 500);           
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('usuario');
    }
}
