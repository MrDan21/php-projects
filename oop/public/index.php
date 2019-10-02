<?php

namespace App;

require('../vendor/autoload.php');

Translator::set([
	'BasicBowAttack' => ':unit dispara una flecha :opponent',
	'BasicSwordAttack' => ':unit ataca con la espada :opponent',
	'CrossBowAttack' => ':unit dispara una flecha :opponent',
	'FireBowAttack' => ':unit dispara una flecha de fuego a :opponent',
]);

Log::setLogger(new HtmlLogger());

/*
autoload sin composer
spl_autoload_register(function($className) {
	if(strpos($className, 'App\\') === 0) {
		
		$className = str_replace('App\\', '', $className);

		require("src/$className.php");
	}
});
*/

$ramm = Unit::createSoldier()
	->setWeapon(new Weapons\BasicSword)
	->setArmor(new Armors\BronzeArmor);

$silence = new Unit('Silence', new Weapons\FireBow);

$silence->attack($ramm);

$silence->attack($ramm);

$ramm->attack($silence);