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
     */
    public function run(UserRepository $userRepository)
    {
        $users = config('sistema.init.users');

        array_map(function ($array) use ($userRepository) {
            /** @var integer $role */
            $role = $array['role_id'];

            // Remove the role from the array
            unset($array['role_id']);

            $user = $userRepository->create($array, true);

            RoleUser::create([
                'role_id' => $role,
                'user_id' => $user->id
            ]);
        }, $users);
    }
}
