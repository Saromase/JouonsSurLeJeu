<?php

use Illuminate\Database\Seeder;

use App\RiotMatchs;
use App\RiotPlayers;


class RiotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountId = [
            [
                'name' => 'Corobizar',
                'accountId' => 22869368,
                'gameId' => ['3530133057','3528974630', '3528703171', '3528625068', '3528590255']
            ],
            [
                'name' => 'Wakz',
                'accountId' => 21686351,
                'gameId' => ['3532440313','3532397696', '3531135386', '3523078757', '3523004057']
            ],
            [
                'name' => 'Domingo',
                'accountId' => 22869368,
                'gameId' => ['3534221714','3530190209', '3530048095', '3529336723', '3529335471']
            ],
            [
                'name' => 'Sardoche',
                'accountId' => 39841553,
                'gameId' => ['3533412217','3533357826', '3533331583', '3533227188', '3533168218']
            ],
            [
                'name' => 'Auzyris',
                'accountId' => 26487670,
                'gameId' => ['3529292633','3529273000', '3525746556', '3525035780', '3524850977']
            ]
        ];

        foreach ($accountId as $value) {
            RiotPlayers::insert([
                'name' => $value['name'],
                'account_id' => $value['accountId']
            ]);

            foreach ($value['gameId'] as $game) {
                RiotMatchs::insert([
                    'game_id' => $game,
                    'account_id' => $value['accountId'],
                    'participant_id' => 1
                ]);
            }


        }
    }
}
