<?php

$factory('WITR\User', [
    'name' => 'Test User',
    'dj_name' => 'Dee Testable',
    'username' => $faker->username,
    'password' => Hash::make('test'),
    'email' => $faker->email
]);

$factory('WITR\User', 'test_user', [
    'name' => 'Test User',
    'dj_name' => 'Dee Testable',
    'username' => 'test',
    'password' => Hash::make('test'),
    'email' => 'test@test.com'
]);

$factory('WITR\User', 'legacy_user', [
    'name' => 'Legacy User',
    'dj_name' => 'Legacy Dee Testable',
    'username' => 'legacy',
    'password' => md5('test'),
    'email' => 'legacy@test.com'
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
