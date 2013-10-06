<?php

//Autoloading classes 
function metalPetAutoLoader($class) {
	$file=_MODULES_URL_."{$class}/{$class}.php";
	if(is_file($file)) {
		include($file);
	} else if($metalPet['log']) {
		$metalPet['log'].="Class:".$class." does not appear to exist.\n";
	}
}
spl_autoload_register('metalPetAutoLoader');