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
            'last_login_at' => 'Last login',
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

    'dependency' => [
        'title' => 'Dependencies',

        'actions' => [
            'index' => 'Dependencies',
            'create' => 'New Dependency',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'ncl' => 'Ncl',
            
        ],
    ],

    'memo' => [
        'title' => 'Memo',

        'actions' => [
            'index' => 'Memo',
            'create' => 'New Memo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'odependency_id' => 'Odependency',
            'number_memo' => 'Number memo',
            'ref_obs' => 'Ref obs',
            'date_doc' => 'Date doc',
            'date_entry' => 'Date entry',
            'date_exit' => 'Date exit',
            'ddependency_id' => 'Ddependency',
            'admin_user_id' => 'Admin user',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];