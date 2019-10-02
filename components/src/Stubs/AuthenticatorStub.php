<?php

namespace Component\Stubs;

use Component\AuthenticatorInterface;

use Component\User;

class AuthenticatorStub implements AuthenticatorInterface
{

	protected $logged;

	public function __construct($logged = true) 
	{
		$this->logged = $logged;
	}

	public function user()
	{
		return new User([
			'role' => 'admin'
		]);
	}

	public function check()
	{
		return $this->logged;
	}
}