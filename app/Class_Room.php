<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_Room extends Model
{
    protected $table = 'class';
    protected $guarded=['id_class','id_level'];
}
