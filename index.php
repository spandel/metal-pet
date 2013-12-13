<?php
	define('_BASE_URL_', dirname(__FILE__)."/");
	$dirname=dirname($_SERVER['SCRIPT_NAME']);
	if(substr($dirname,-1) ==="/") {
		$dirname=substr($dirname ,0,-1);
	}
	define('_HTTP_URL_', "http://".$_SERVER['HTTP_HOST'].$dirname."/");
	include(_BASE_URL_."app/core/bootstrap.php");

	$pages=_BASE_URL_."views/pages/";
	
	if(isset($_GET['p']) && !empty($_GET['p'])) {
		$metalPet['page'] = $metalPet['404Page'];		
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
		$metalPet['page']=$metalPet['indexPage'];
	}
	set_title();
	add_css_and_js();
	
	include(_BASE_URL_."views/pages/".$metalPet['page'].".php");