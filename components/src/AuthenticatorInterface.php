<?php

namespace Component;

interface AuthenticatorInterface
{
	public function check();

	public function user();
}