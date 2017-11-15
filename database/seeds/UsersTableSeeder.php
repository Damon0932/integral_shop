<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert(
            ['username' => 'root', 'password' => \Hash::make('root'), 'name' => 'root']
        );
    }
}
