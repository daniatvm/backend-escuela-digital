<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'new';
    protected $guarded=['id_new','id_new_type','id_user','id_class'];
}
