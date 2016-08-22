<?php

use App\User;
use App\Role;
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
        DB::table('users')->delete();
        DB::table('user_role')->delete();

        $users = array(
            ['name' => 'john', 'email' => 'john@dingyue.com', 'password' => Hash::make('secret')],
            ['name' => 'mary', 'email' => 'mary@dingyue.com', 'password' => Hash::make('secret')],
            ['name' => 'admin', 'email' => 'admin@dingyue.como', 'password' => Hash::make('secret')],
        );

        $userRole = array(
            'john' => 'normal', 'mary' => 'normal', 'admin' => 'admin'
        );

        foreach ($users as $user) {
            $user = User::create($user);
            $title = $userRole[$user->name];
            $user->makeEmployee($title);
        }
    }
}
