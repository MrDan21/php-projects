<?php

namespace App\Armors;

use App\Armor;

use App\Attack;

class CursedArmor extends Armor {

	public function absorbDamage(Attack $attack) {
		return $attack->getDamage() * 3;
	}

}
