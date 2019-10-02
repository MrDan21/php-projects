<?php

class Person {

	private $firstName;
	private $lastName;
	private $nickname;
	private $changedNickName = 0;

	function __construct($firstName, $lastName) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setNickName($nickname) {
		if($this->changedNickName >= 2) {
			throw new Exception("You can't change a nickname more than 2 times");
		}

		$this->nickname = $nickname;
			
		$this->changedNickName++;
	}

	public function getNickName() {
		return strtolower($this->nickname);
	}

	public function getFullName() {
		return $this->firstName.' '.$this->lastName;
	}

}

$person1 = new Person('Duilio', 'Palacios');

$person1->setFirstName('Dan');

$person1->setNickName('MrDan21');
$person1->setNickName('MrDan21');
$person1->setNickName('MrDan21');

echo $person1->getNickName();
