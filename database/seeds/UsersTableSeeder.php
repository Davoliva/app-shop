<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Blake',
            'email' => 'blake@gmail.com',
            'password' => bcrypt('199244'),
            'admin' => true
        ]);
    }
}
