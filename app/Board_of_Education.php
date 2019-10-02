<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board_of_Education extends Model
{
    protected $table = 'board_of_education';
    protected $guarded=['id_board_of_education','id_school'];
}
