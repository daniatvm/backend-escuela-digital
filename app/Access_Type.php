<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access_Type extends Model
{
    protected $table = 'access_type';
    protected $guarded=['id_access_type'];
}
