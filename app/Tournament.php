<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $table = 'tournaments';

	protected $fillable = ['panda_id', 'name', 'serie', 'begin_at', 'end_at', 'url'];
}
