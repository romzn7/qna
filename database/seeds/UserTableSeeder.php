<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'admin';
        $user->password = bcrypt('admin');
        $user->save();

        $user = new User();
        $user->username = 'bhuyu';
        $user->password = bcrypt('bhuyu');
        $user->save();
    }
}
