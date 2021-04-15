<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tarefas extends Model
{
    use SoftDeletes;    
    public $table = 'tarefas';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
