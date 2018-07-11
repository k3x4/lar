<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            //'token' => str_random(64),
            //'activated' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            //'token' => str_random(64),
            //'activated' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }

}
