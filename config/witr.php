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
	]

];
