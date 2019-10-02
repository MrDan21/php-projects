<?php

class Person
{

	protected $name;

	public $table = 'people';

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function name()
	{
		return $this->name;
	}

	public function save()
	{
		echo "<p>Saving {$this->name} in the table ". $this->table."</p>";
	}

}

//exit(Person::name());

$ramon = new Person('Ramon');
$ramon->table = 'personas';
$ramon->save();

$duilio = new Person('Duilio');
$duilio->save();

echo "<p>{$duilio->name()}</p>";

echo "<p>{$ramon->name()}</p>";