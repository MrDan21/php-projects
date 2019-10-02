<?php

require(__DIR__.'/../bootstrap/start.php');

$data = [
	'user_data' => [
		'name' => 'Dan',
		'role' => 'student'
	]
];

$driver = new \Component\SessionArrayDriver($data);
$session = new \Component\SessionManager($driver);
$auth = new \Component\Authenticator($session);
$access = new \Component\AccessHandler($auth);

view('index', compact('access'));