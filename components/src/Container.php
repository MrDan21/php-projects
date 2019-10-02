<?php

namespace Component;

use Closure;
use ReflectionClass;
use InvalidArgumentException;
use ReflectionException;

class Container
{

	protected $shared = [];
	protected $bindings = [];

	public function bind($name, $resolver)
	{
		$this->bindings[$name] = [
			'resolver' => $resolver
		];
	}

	public function instance($name, $object)
	{
		$this->shared[$name] = $object;
	}

	public function make($name) 
	{
		if(isset($this->shared[$name])) {
			return $this->shared[$name];
		}

		if(isset($this->bindings[$name])) {
			$resolver = $this->bindings[$name]['resolver'];
		} else {
			$resolver = $name;
		}

		if($resolver instanceof Closure) {
			$object = $resolver($this);
		} else {
			$object = $this->build($resolver);
		}

		return $object;
	}


	public function build($name)
	{
		$reflection = new ReflectionClass($name);

		if(!$reflection->isInstantiable()) {
			throw new InvalidArgumentException("$name is not instantiable");
		}

		$constructor = $reflection->getConstructor();

		if(is_null($constructor)) {
			return new $name;
		}

		$constructorParameters = $constructor->getParameters();

		$arguments = [];

		foreach($constructorParameters as $constructorParameter) {
			try {
				$parameterClass = $constructorParameter->getClass();
			} catch(ReflectionException $e) {
				throw new ContainerException("Unable to build [$name]: ".$e->getMessage(), null, $e);
			}

			if($parameterClass != null) {
				$parameterClassName = $parameterClass->getName();
				$arguments[] = $this->build($parameterClassName);
			}
		}

		return $reflection->newInstanceArgs($arguments);
	}
}