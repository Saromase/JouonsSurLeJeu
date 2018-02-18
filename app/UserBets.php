<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBets extends Model
{
    protected $table = 'user_bets';

	protected $fillable = ['user_id', 'bet_type', 'game_id', 'bet', 'bet_team', 'states', 'cote'];
}
