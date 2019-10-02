<?php

namespace Component;

class Authenticator implements AuthenticatorInterface
{

	protected $user;

	/**
	* @var \Component\SessionManager
	*/
	protected $session;

	/**
	* @param \Component\SessionManager $session
	*/
	public function __construct(SessionManager $session)
	{
		$this->session = $session;
	}

	public function check()
	{
		return $this->user() != null;
	}

	public function user()
	{

		if($this->user != null) {
			return $this->user;
		}

		$data = $this->session->get('user_data');
		
		if(!is_null($data)) {
			return $this->user = new \Component\User($data);
		}

		return null;
	}
}