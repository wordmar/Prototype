<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = array(
            ['name' => 'normal'],
            ['name' => 'admin'],
        );

        foreach ($roles as $role)
        {
            Role::create($role);
        }
    }
}
