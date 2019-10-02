<?php

function view($template, array $vars = [])
{
	extract($vars);

	$path = __DIR__.'/../views/';

	ob_start();
	
	require($path.$template.'.php');

	$templateContent = ob_get_clean();

	require($path.'layout.php');
}

function abort404()
{
	http_response_code(404);

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

	view('page404', compact('access'));
	exit();
}