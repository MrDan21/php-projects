<?php

namespace Component;

class SessionManager
{
	protected $loaded = false;
	
	protected $data = array();

	/**
	* @var \Component\SessionDriverInterface
	*/
	protected $driver;

	/**
	* @param \Component\SessionDriverInterface $sessionFileDriver
	*/
	public function __construct(SessionDriverInterface $driver)
	{
		$this->driver = $driver;

		$this->load();
	}

	protected function load()
	{
		$this->data = $this->driver->load();
	}

	public function get($key)
	{
		return isset($this->data[$key])
			? $this->data[$key]
			: null;
	}
}