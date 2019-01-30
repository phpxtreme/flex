<?php

namespace Modules\Sistema\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sistema\Entities\ModuleControllers;
use Modules\Sistema\Entities\ModuleRole;
use Modules\Sistema\Repositories\ModuleRepository;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param ModuleRepository $moduleRepository
     *
     * @return void
     */
    public function run(ModuleRepository $moduleRepository)
    {
        /** @var array $modules */
        $modules = config('sistema.init.modules');

        array_map(function ($array) use ($moduleRepository) {

            /** @var integer $roles */
            $roles = $array['roles'];

            /** @var string $controllers */
            $controllers = $array['controllers'];

            // Remove elements from the array
            unset($array['roles'], $array['controllers']);

            // Create Module
            $module = $moduleRepository->create($array, true);

            // Associate Roles
            foreach ($roles as $role) {
                ModuleRole::create([
                    'module_id' => $module->id,
                    'role_id'   => $role
                ]);
            }

            // Associate Controllers
            foreach ($controllers as $controller) {
                ModuleControllers::create([
                    'module_id' => $module->id,
                    'path'      => $controller
                ]);
            }
        }, $modules);
    }
}
