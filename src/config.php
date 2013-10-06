<?php
//here goes the configurations of the specific site


//defining paths to important folders
define('_BASE_URL_', __DIR__.'/..');
define('_3PP_URL_', _BASE_URL_.'3pp/');
define('_SRC_URL', _BASE_URL_."src/");
define('_THEME_URL_', _BASE_URL_."theme/");
define('_CORE_URL_',_BASE_URL_."app/core/");
define('_MODULES_URL_',_BASE_URL_."app/modules/");

$config=array();
$config['theme']="default";								//sets which theme to use
$config['theme_url']=_THEME_URL_.$config['theme'];		//sets path to theme
$config['develop']=true;								//sets if project is in production phase or not
$config['debug']=true;									//to display debugging messages

if($config['develop']) {	
	$config['jquery_url']=_3PP_URL_."jquery-2.0.3.js";
	$config['bootstrap_js']=_3PP_URL_."bootstrap/js/bootstrap.js";
	$config['bootstrap_css']=_3PP_URL_."bootstrap/css/bootstrap.css";
} else {
	$config['jquery_url']=_3PP_URL_."jquery-2.0.3.min.js";
	$config['bootstrap_js']=_3PP_URL_."bootstrap/js/bootstrap.min.js";
	$config['bootstrap_css']=_3PP_URL_."bootstrap/css/bootstrap.min.css";
	$config['debug']=false;
}
