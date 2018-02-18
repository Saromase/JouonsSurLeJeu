<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    protected $table = 'matchs';

    protected $fillable = ['match_id', 'team_one', 'team_one_url', 'team_one_tag','team_two', 'team_two_url', 'team_two_tag', 'panda_id', 'begin_at'];
}
