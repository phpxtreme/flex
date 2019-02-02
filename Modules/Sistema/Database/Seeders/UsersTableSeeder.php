<?php

namespace Modules\Sistema\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sistema\Entities\RoleUser;
use Modules\Sistema\Repositories\UserRepository;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param UserRepository $userRepository
     *
     * @return void
     */
    public function run(UserRepository $userRepository)
    {
        /** @var array $users */
        $users = config('sistema.init.users');

        array_map(function ($array) use ($userRepository) {

            /** @var array $role */
            $roles = $array['roles'];

            // Remove elements from the array
            unset($array['roles']);

            $user = $userRepository->create($array, true);

            // Associate Roles
            foreach ($roles as $role) {
                RoleUser::create([
                    'role_id' => $role,
                    'user_id' => $user->id
                ]);
            }
        }, $users);
    }
}
