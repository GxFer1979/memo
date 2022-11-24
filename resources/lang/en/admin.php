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

    'medium' => [
        'title' => 'Media',

        'actions' => [
            'index' => 'Media',
            'create' => 'New Medium',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'model_type' => 'Model type',
            'model_id' => 'Model',
            'uuid' => 'Uuid',
            'collection_name' => 'Collection name',
            'name' => 'Name',
            'file_name' => 'File name',
            'mime_type' => 'Mime type',
            'disk' => 'Disk',
            'conversions_disk' => 'Conversions disk',
            'size' => 'Size',
            'manipulations' => 'Manipulations',
            'custom_properties' => 'Custom properties',
            'generated_conversions' => 'Generated conversions',
            'responsive_images' => 'Responsive images',
            'order_column' => 'Order column',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];