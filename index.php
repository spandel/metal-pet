<?php

	define('_BASE_URL_', dirname(__FILE__)."/");
	define('_HTTP_URL_', "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/");
	include(_BASE_URL_."src/config.php");
	$pages=_BASE_URL_."views/pages/";
	
	if(isset($_GET['p']) && !empty($_GET['p']))
	{
		$metalPet['page'] = "404";		
		if(!isset($_GET['p1'])) {
			if(is_file($pages.$_GET['p'].".php") ) {
				$metalPet['page']=$_GET['p'];
			} else if (is_dir($pages.$_GET['p']) && is_file($pages.$_GET['p']."/index.php") ) {
				$metalPet['page']=$_GET['p']."/index";
			}
		} else if(isset($_GET['p1']) && is_dir($pages.$_GET['p'])) {
			if(is_file($pages.$_GET['p']."/".$_GET['p1'].".php")) {				
				$metalPet['page'] = $_GET['p']."/".$_GET['p1'];
			} else if (is_file($pages.$_GET['p']."/index.php")) {
				$metalPet['page'] = $_GET['p']."/index";
			}
		}
	} else 
	{
		$metalPet['page']='home';
	}
	$metalPet['title']=ucfirst(str_replace('-', ' ', $metalPet['page'])).$metalPet['title_append'];
	if(is_file($metalPet['theme_server_url']."functions.php")) {
		include($metalPet['theme_server_url']."functions.php");
	}
	include(_BASE_URL_."views/pages/".$metalPet['page'].".php");
	//echo("<pre>".print_r($_SERVER, true)."</pre>");


/*

case 1
	om p ÄR satt och p2 INTE är satt
		om p.php finns: page= p
		ANNARS
		om p är directory och p/index.php finns: page= p/index
		else : page= 404
case 2
	p är satt och p2 är satt
		om p är dir och p2 är fil : page=p/p2
		ANNARS
		om p är dir och p2 inte är fil, men p/index.php är fil : page=p/index
		ANNARS
		om p är dir och p2 inte är fil och p/index inte finns : page=404
case 0 (ANNARS)
	p är INTE satt : page=home
		


*/