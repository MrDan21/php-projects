<?php

namespace App;

require('src/helpers.php');



/*
autoload sin composer
spl_autoload_register(function($className) {
	if(strpos($className, 'App\\') === 0) {
		
		$className = str_replace('App\\', '', $className);

		require("src/$className.php");
	}
});
*/

$armor = new BronzeArmor();

$ramm = new Soldier('Ramm');

$silence = new Archer('Silence');

$silence->attack($ramm);

$ramm->setArmor(new CursedArmor);

$silence->attack($ramm);

$ramm->attack($silence);