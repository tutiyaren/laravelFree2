<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tests = [
            [
                'user_id' => '1',
                'test' => 'AのQRコード',
            ],
            [
                'user_id' => '2',
                'test' => 'BのQRコード',
            ],
            [
                'user_id' => '3',
                'test' => 'CのQRコード',
            ]
        ];

        DB::table('tests')->insert($tests);
    }
}
