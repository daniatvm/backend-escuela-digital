<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_x_Employee extends Model
{
    protected $table = 'class_x_employee';
    protected $guarded=['id_class_x_employee','id_employee','id_class'];
}
