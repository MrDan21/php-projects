<?php

namespace App\Armors;

use App\Armor;

use App\Attack;

class MissingArmor extends Armor
{

	public function absorbDamage(Attack $attack)
	{
		return $attack->getDamage();
	}

}