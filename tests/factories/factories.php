<?php

$factory('WITR\User', [
    'name' => 'Test User',
    'dj_name' => 'Dee Testable',
    'username' => $faker->username,
    'password' => Hash::make('test'),
    'email' => $faker->email
]);

$factory('WITR\User', 'normal_user', [
    'name' => 'Test User',
    'dj_name' => 'Dee Testable',
    'username' => 'test',
    'password' => Hash::make('test'),
    'email' => 'normal@example.com',
    'user_role' => 1
]);

$factory('WITR\User', 'editor_user', [
    'name' => 'Editor',
    'dj_name' => 'Editor',
    'username' => 'editor',
    'password' => Hash::make('test'),
    'email' => 'editor@example.com',
    'user_role' => 2
]);

$factory('WITR\User', 'admin_user', [
    'name' => 'Admin',
    'dj_name' => 'Admin',
    'username' => 'admin',
    'password' => Hash::make('test'),
    'email' => 'admin@example.com',
    'user_role' => 3
]);

$factory('WITR\Show', [
    'name' => 'The Pulse Of Music', 
    'active' => true,
    'style' => 'display: none;',
    'show_picture' => 'show.jpg',
    'slider_picture' => 'slider.jpg',
]);

$factory('WITR\TimeSlot', [
    'show' => 'factory:WITR\Show',
    'day' => 1,
    'dj' => 'factory:WITR\User',
    'hour' => 1
]);
