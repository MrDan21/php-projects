<?php 

namespace App;

use App\Attack;

abstract class Weapon 
{

	protected $damage = 0;
	protected $magical = false;

	public function createAttack()
	{
		return new Attack($this->damage, $this->magical, $this->getDescriptionKey());
	}

	protected function getDescriptionKey()
	{
		return str_replace('App\Weapons\\', '', get_class($this).'Attack');
	}

}