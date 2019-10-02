<?php

use Dan\Component\AccessHandler as Access;
use PHPUnit\Framework\TestCase;
use Dan\Component\Stubs\AuthenticatorStub as Auth;

class AccessHandlerTest extends TestCase
{

	public function test_grant_access()
	{
		$auth = new AuthenticatorStub();
		$access = new Access($auth);

		$this->assertTrue(
			$access->check('admin')
		);
	}

	public function test_deny_access()
	{
		$auth = new AuthenticatorStub();
		$access = new Access($auth);

		$this->assertFalse(
			$access->check('Editor')
		);
	}

}