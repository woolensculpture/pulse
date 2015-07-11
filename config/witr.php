<?php

return [

	/*
	|--------------------------------------------------------------------------
	| IP Whitelist Range
	|--------------------------------------------------------------------------
	|
	| Internal DJ Components should be accessible to certain IP Ranges
	| without requiring the user to authenticate first
	|
	*/

	'whitelist' => [
		'start' => env('WHITELIST_START', '127.0.0.1'),
		'end' => env('WHITELIST_END', '127.0.0.1')
	],

	/*
	|--------------------------------------------------------------------------
	| Icecast Server Information
	|--------------------------------------------------------------------------
	|
	| Server Information and credentials used to access streaming server.
	| Also includes lists of the mounts used for reporting display
	|
	*/

	'icecast' => [
		'hostname' => env('ICECAST_HOSTNAME'),

		'credentials' => [
			env('ICECAST_USERNAME'),
			env('ICECAST_PASSWORD'),
		],

		'mounts' => [
			'studio-x' => [
				'192 kb MP3' => 'witr-mp3-192',
				'80 kb MP3' => 'witr-mp3-80',
				'64 kb AAC' => 'witr-mobile',
			],
			'studio-a' => [
				'192 kb MP3' => 'witr-undrgnd-mp3-192',
				'64 kb AAC' => 'witr-undrgnd-mobile',
			]
		]
	],

	/*
	|--------------------------------------------------------------------------
	| DJ Form Locations
	|--------------------------------------------------------------------------
	*/

	'ticket_recipient' => [
		'name' => 'WITR Engineering',
		'email' => env('TICKET_EMAIL', 'test@example.com')
	],

	'askdestler_recipient' => [
		'name' => 'WITR Programming Director',
		'email' => env('ASKDESTLER_EMAIL', 'test@example.com')
	]

];
