<?php
return [
    'title' => 'Register',
    'fill_all' => 'Please complete all information',
    'username' => [
        'length' => 'Length 1-50',
        'regex-msg' => 'Username must be string or integer',
        'require-msg' => 'The username field is required.',
        'placeholder' => 'Username',
    ],
    'password' => [
        'length' => 'Length 8-50',
        'require-msg' => 'The password field is required.',
        'placeholder' => 'Password',
    ],
    'full_name' => [
        'length' => 'Length 8-50',
        'require-msg' => 'The Fullname field is required.',
        'placeholder' => 'Fullname',
    ],
    'gender' => [
        'require-msg' => 'The Gender field is required.',
        'male' => 'Male',
        'female' => 'Female'

    ],
    'phone' => [
        'length' => 'Length 1-20',
        'regex-msg' => 'Phone number is not formatted correctly',
        'require-msg' => 'The Phone field is required.',
        'placeholder' => 'Phone',
    ],
    'email' => [
        'regex-msg' => 'Email is not formatted correctly',
        'require-msg' => 'The Email field is required.',
        'placeholder' => 'Email',
    ],

];
