<?php

namespace Modules\Sistema\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SistemaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
