<?php

use PHPUnit\Framework\TestCase;
use Dan\Component\Container;
use Dan\Component\ContainerException;

class ContainerTest extends TestCase
{

	public function test_bind_from_clousure()
	{
		$container = new Container();

		$container->bind('key', function() {
			return 'Object';
		});

		$this->assertSame('Object', $container->make('key'));
	}

	public function test_bind_instance()
	{
		$container = new Container();

		$stdClass = new StdClass();

		$container->instance('key', $stdClass);

		$this->assertSame($stdClass, $container->make('key'));
	}

	public function test_bind_from_class_name()
	{
		$container = new Container();

		$container->bind('key', 'Foo');

		$this->assertInstanceOf('Foo', $container->make('key'));
	}

	/**
	* @expectedException Dan\Component\ContainerException
	* @expectedExceptionMessage Unable to build [Qux]: Class Norf does not exist
	*/
	public function test_expected_container_exception_if_dependency_does_not_exist()
	{
		/** $this->setExpectedException(
			ContainerException::class,
			'Unable to build [Qux]: Class Norf does not exist '
		); */

		$container = new Container();

		$container->bind('qux', 'Qux');

		$container->make('qux');
	}

	public function test_class_does_not_exist()
	{
		$container = new Container();

		$container->bind('norf', 'Norf');

		$container->make('Norf');
	}

}


class Foo
{

}