<?php
return [

    'name' => 'Sistema',

    'init' => [
        // Roles
        'roles'   => [
            [
                'name'        => 'admin',
                'active'      => true,
                'description' => 'Admin'
            ],
            [
                'name'        => 'user',
                'active'      => true,
                'description' => 'User'
            ]
        ],
        // Users
        'users'   => [
            [
                'email'      => 'admin@example.com',
                'password'   => 'ascent',
                'first_name' => 'Admin',
                'last_name'  => 'Admin',
                'roles'      => [1, 2],
                'active'     => true
            ],
            [
                'email'      => 'user@example.com',
                'password'   => 'ascent',
                'first_name' => 'User',
                'last_name'  => 'User',
                'roles'      => [2],
                'active'     => true
            ]
        ],
        // Modules
        'modules' => [
            [
                'name'        => 'Inicio',
                'description' => 'Inicio',
                'url'         => 'mod.Inicio.view.Inicio',
                'roles'       => [1, 2],
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
                'roles'       => [1],
                'controllers' => [
                    'mod.Ayuda.controller.Ayuda'
                ]
            ]
        ],
    ]
];
