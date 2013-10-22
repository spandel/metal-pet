<?php
	define('_BASE_URL_', dirname(__FILE__)."/");
	define('_HTTP_URL_', "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/");
	include(_BASE_URL_."app/core/bootstrap.php");

	$pages=_BASE_URL_."views/pages/";
	
	if(isset($_GET['p']) && !empty($_GET['p'])) {
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
	} else {
		$metalPet['page']='home';
	}
	$metalPet['title']=ucfirst(str_replace('-', ' ', $metalPet['page'])).$metalPet['title_append'];
	if(is_file($metalPet['theme_server_url']."functions.php")) {
		include($metalPet['theme_server_url']."functions.php");
	}
	if(is_file($metalPet['theme_server_url'].'css/style.css')) {
		array_push($metalPet['css'], $metalPet['theme_url']."css/style.css");
	}
	if(is_file(_VIEW_SERVER_URL_.'css/'.$metalPet['page'].'.css')) {		
		array_push($metalPet['css'], _VIEW_URL_."css/". $metalPet['page'] .".css");
	}
	if (is_file($metalPet['theme_server_url'].'js/main.js')) {
        array_push($metalPet['js_after'], $metalPet['theme_url']."js/main.js");
    }
   	if (is_file(_VIEW_SERVER_URL_.'js/'.$metalPet['page'].'.js')) {
    	array_push($metalPet['js_after'], _VIEW_URL_."js/".$metalPet['page'].".js");
    }

	
	include(_BASE_URL_."views/pages/".$metalPet['page'].".php");