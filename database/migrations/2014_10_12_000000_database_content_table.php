<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = config('database.default');

        Schema::connection($connection)->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->float('H_Coin');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::connection($connection)->create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::connection($connection)->create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('panda_id');
            $table->string('name');
            $table->string('serie');
            $table->string('url');
            $table->date('begin_at');
            $table->date('end_at');
            $table->timestamps();
        });
        Schema::connection($connection)->create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('match_id');
            $table->string('team_one');
            $table->string('team_one_tag');
            $table->string('team_one_url');
            $table->string('team_two');
            $table->string('team_two_tag');
            $table->string('team_two_url');
            $table->integer('panda_id');
            $table->date('begin_at');
            $table->timestamps();
        });
        Schema::connection($connection)->create('riot_players', function (Blueprint $table){
            $table->string('name');
            $table->integer('account_id');
        });

        Schema::connection($connection)->create('riot_players_play_match', function (Blueprint $table){
            $table->integer('account_id');
            $table->bigInteger('game_id');
            $table->integer('participant_id');
        });

        Schema::connection($connection)->create('bet_type', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
        });

        Schema::connection($connection)->create('user_bets', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('bet_type')->unsigned();
            $table->foreign('bet_type')->references('id')->on('bet_type');
            $table->bigInteger('game_id');
            $table->integer('bet');
            $table->integer('bet_team');
            $table->integer('states');
            $table->float('cote');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users', 'password_resets', 'riot_players_play_match', 'riot_players', 'matchs', 'tournaments', 'user_bets', 'bet_type');
    }
}
