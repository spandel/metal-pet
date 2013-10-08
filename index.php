<?php

	define('_BASE_URL_', dirname(__FILE__)."/");
	define('_HTTP_URL_', "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/");
	include(_BASE_URL_."src/config.php");

	if(isset($_GET['p'])) {
		if(is_file(_BASE_URL_."views/pages/".$_GET['p'].".php")){
			$metalPet['page']=$_GET['p'];
		} else {
			$metalPet['page']='404';
		}
	} else {
		$metalPet['page']='index';
	}
	$metalPet['title']=ucfirst(str_replace('-', ' ', $metalPet['page'])).$metalPet['title_append'];
	if(is_file($metalPet['theme_server_url']."functions.php")) {
		include($metalPet['theme_server_url']."functions.php");
	}
	include(_BASE_URL_."views/pages/".$metalPet['page'].".php");
	//echo("<pre>".print_r($_SERVER, true)."</pre>");