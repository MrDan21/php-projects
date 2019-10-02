<?php

namespace Component;

class AccessHandler
{

	/**
	* @var \Component\Authenticator
	*/
	protected $auth;


	/**
	* @param \Component\Authenticator $auth
	*/
	public function __construct(AuthenticatorInterface $auth)
	{
		$this->auth = $auth;	
	}

	public function check($role)
	{
		return $this->auth->check() && $this->auth->user()->role === $role;
	}
}