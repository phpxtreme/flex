<?php
return [

    'name' => 'Sistema',

    'init' => [

        'roles' => [
            [
                'name'   => 'Admin',
                'active' => true
            ],
            [
                'name'   => 'User',
                'active' => true
            ]
        ],

        'users' => [
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
        ]
    ]
];
