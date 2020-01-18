<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'plano' => [
        'title' => 'Plano',

        'actions' => [
            'index' => 'Plano',
            'create' => 'New Plano',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            
        ],
    ],

    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'plano' => [
        'title' => 'Planos',

        'actions' => [
            'index' => 'Planos',
            'create' => 'New Plano',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'plano' => [
        'title' => 'Plano',

        'actions' => [
            'index' => 'Plano',
            'create' => 'New Plano',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];