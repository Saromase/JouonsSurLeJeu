<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = ['Gagnant', 'Premier Sang', 'Première Tour', 'Premier Inhib', 'Premier Dragon', 'Premier Baron', 'Durée de la game'];
        foreach ($datas as $value) {
            DB::table('bet_type')->insert([
                'name' => $value
            ]);
        }
    }
}
