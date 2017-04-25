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
        $user = new User;
        $user->user_name = 'admin';
        $user->user_pass = bcrypt('admin');
        $user->user_namalengkap = 'Admin';
        $user->user_email = 'admin@localhost.com';
        $user->user_status = 1;
        $user->save();
    }
}
