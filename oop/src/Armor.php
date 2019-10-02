<?php 

namespace App;

abstract class Armor {

	public function absorbDamage(Attack $attack)
	{
		if($attack->isMagical()) {
			return $this->absorbMagicalDamage($attack);
		}

		return $this->absorbPhysicalDamage($attack);
	}

	public function absorbPhysicalDamage(Attack $attack) {
		
		return $attack->getDamage() / 3;
	
	}

	public function absorbMagicalDamage(Attack $attack) {

		return $attack->getDamage();
	
	}

}