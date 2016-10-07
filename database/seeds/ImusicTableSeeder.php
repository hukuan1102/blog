<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ImusicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imusic')->insert([
            'singer_name'=>'jerry',
            'song_name'=>'happy birthday',
            'admin_id'=>'1',
        ]);
    }
}
//insert data to the database with records.