<?php

$factory('WITR\User', function($faker) {
    $password = Hash::make('test');
    $roles = DB::table('user_roles')->lists('id');
    return [
        'name' => $faker->name,
        'username' => $faker->username,
        'password' => $password,
        'email' => $faker->email,
        'user_role' => $roles[array_rand($roles)]
    ];
});

$factory('WITR\User', 'normal_user', [
    'name' => 'Test User',
    'username' => 'test',
    'password' => Hash::make('test'),
    'email' => 'normal@example.com',
    'user_role' => 1
]);

$factory('WITR\User', 'editor_user', [
    'name' => 'Editor',
    'username' => 'editor',
    'password' => Hash::make('test'),
    'email' => 'editor@example.com',
    'user_role' => 2
]);

$factory('WITR\User', 'admin_user', [
    'name' => 'Admin',
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
    'dj' => 'factory:WITR\DJ',
    'hour' => 1
]);

$factory('WITR\Eboard', [
    'position' => 'Test Position',
    'name' => $faker->name,
    'email' => $faker->email,
    'hours' => 'MW 2 - 4 PM EST'
]);

$factory('WITR\Video', [
    'artist' => $faker->company,
    'song' => $faker->text(45),
    'album' => $faker->text(45),
    'review' => $faker->paragraph,
    'url_tag' => $faker->randomNumber
]);

$factory('WITR\Event', [
    'name' => $faker->text(45),
    'date' => $faker->date('m/d/Y'),
    'picture' => 'default.jpg',
    'url' => $faker->url
]);

$factory('WITR\AlbumReview', [
    'band_name' => $faker->company,
    'album_name' => $faker->text(45),
    'review' => $faker->paragraph,
    'img_name' => 'default.jpg'
]);

$factory('WITR\DJ', [
    'name' => $faker->name,
    'picture' => 'default.jpg'
]);
