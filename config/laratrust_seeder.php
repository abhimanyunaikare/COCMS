<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'manager' => [
            'users' => 'c,r',
            'profile' => 'r,u'
        ],
        'hr' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'employee' => [         // user
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [   //Specific user with different permissions
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
