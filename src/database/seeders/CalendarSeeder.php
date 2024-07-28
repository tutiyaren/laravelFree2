<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => 'A',
                'contents' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
                'date' => '2024-07-01',
                'start_time' => '00:00:00',
                'end_time' => '23:59:59',
            ],
            [
                'title' => 'BB',
                'contents' => 'bbbbbbbbbbbbbbbbb',
                'date' => '2024-07-07',
                'start_time' => '00:00:00',
                'end_time' => '23:59:59',
            ],
            [
                'title' => 'CCC',
                'contents' => 'ccccccccccccccccccccccccccccccccccccccccccccccc',
                'date' => '2024-07-11',
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'DDDD',
                'contents' => 'ddddd',
                'date' => '2024-07-12',
                'start_time' => '10:30:00',
                'end_time' => '12:30:00',
            ],
            [
                'title' => 'EEEEE',
                'contents' => 'e',
                'date' => '2024-07-12',
                'start_time' => '12:00:00',
                'end_time' => '13:00:00',
            ],
            [
                'title' => 'FFFFFF',
                'contents' => 'fffffffffffffffffffffffffffffffffffff',
                'date' => '2024-07-12',
                'start_time' => '17:30:00',
                'end_time' => '19:00:00',
            ],
            [
                'title' => 'GGGGGGG',
                'contents' => 'gggggggggggggggggggggg',
                'date' => '2024-07-12',
                'start_time' => '20:00:00',
                'end_time' => '22:00:00',
            ],
            [
                'title' => 'HHHHHHHH',
                'contents' => 'hhhhhhhhhhhhhhhh',
                'date' => '2024-07-13',
                'start_time' => '07:00:00',
                'end_time' => '10:00:00',
            ],
            [
                'title' => 'IIIIIIIIII',
                'contents' => 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
                'date' => '2024-07-15',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'title' => 'JJJJJJJJJJJJJJJJ',
                'contents' => 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj',
                'date' => '2024-07-20',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
            ],
            [
                'title' => 'KKKKKKKKKKKKKKKKKKKKKKKKKKKK',
                'contents' => 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk',
                'date' => '2024-07-26',
                'start_time' => '09:00:00',
                'end_time' => '21:00:00',
            ],
        ];

        DB::table('calendars')->insert($events);
    }
}
