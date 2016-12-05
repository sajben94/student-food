<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "root",
            'email' => "root@root.sk",
            'password' => bcrypt('administrator'),
            'admin' => "1"
        ]);
    }
}
