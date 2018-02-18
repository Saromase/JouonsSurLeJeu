<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiotPlayers extends Model
{
    protected $table = 'riot_players';

	protected $fillable = ['name', 'account_id'];
}
