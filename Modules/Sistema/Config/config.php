<?php
return [

    'name' => 'Sistema',

    'init' => [
        // Roles
        'roles'   => [
            [
                'name'   => 'Admin',
                'active' => true
            ],
            [
                'name'   => 'User',
                'active' => true
            ]
        ],
        // Users
        'users'   => [
            [
                'email'      => 'admin@example.com',
                'password'   => 'ascent',
                'first_name' => 'Administrator',
                'last_name'  => 'Administrator',
                'role_id'    => 1,
                'active'     => true
            ],
            [
                'email'      => 'user@example.com',
                'password'   => 'ascent',
                'first_name' => 'User',
                'last_name'  => 'User',
                'role_id'    => 2,
                'active'     => true
            ]
        ],
        // Modules
        'modules' => [
            [
                'name'        => 'Inicio',
                'description' => 'Inicio',
                'url'         => 'mod.Inicio.view.Inicio',
                'roles'       => [1],
                'controllers' => [
                    'mod.Inicio.controller.Inicio'
                ]
            ],
            [
                'name'        => 'Sistema',
                'description' => 'Sistema',
                'url'         => 'mod.Sistema.view.Sistema',
                'roles'       => [1],
                'controllers' => [
                    'mod.Sistema.controller.Sistema'
                ]
            ],
            [
                'name'        => 'Ayuda',
                'description' => 'Ayuda',
                'url'         => 'mod.Ayuda.view.Ayuda',
                'roles'       => [1, 2],
                'controllers' => [
                    'mod.Ayuda.controller.Ayuda'
                ]
            ]
        ],
    ]
];
