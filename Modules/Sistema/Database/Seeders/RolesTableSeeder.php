<?php

use Illuminate\Database\Seeder;
use Modules\Sistema\Entities\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var array $roles */
        $roles = config('init.roles');

        array_map(function ($role) {
            Role::create([
                'name'   => $role['name'],
                'active' => $role['active']
            ]);
        }, $roles);
    }
}