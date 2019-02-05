<?php
return [

    'name' => 'Sistema',

    'init' => [
        // Roles
        'roles'   => [
            [
                'name'        => 'dev',
                'active'      => true,
                'description' => 'Flex Developer'
            ],
            [
                'name'        => 'admin',
                'active'      => true,
                'description' => 'System Administrator'
            ]
        ],
        // Users
        'users'   => [
            [
                'email'      => 'dev@example.com',
                'password'   => 'ascent',
                'first_name' => 'Flex',
                'last_name'  => 'Developer',
                'roles'      => [1, 2],
                'active'     => true
            ],
            [
                'email'      => 'admin@example.com',
                'password'   => 'ascent',
                'first_name' => 'Administrator',
                'last_name'  => 'Administrator',
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
