<?php 

namespace App\Armors;

use App\Armor;

use App\Attack;

class SilverArmor extends Armor {

	public function absorbPhysicalDamage(Attack $attack) {
		
		return $attack->getDamage() / 3;
	
	}

} 