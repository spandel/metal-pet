<?php
//here goes the configurations of the specific website

//defining paths to important folders
//define('_BASE_URL_', "http://" . $_SERVER['HTTP_HOST']."/metal-pet/");
define('_BASE_URL_', __DIR__."/../");
//define('_BASE_URL_', 'http://localhost/metal-pet/');
define('_3PP_URL_', _BASE_URL_.'3pp/');
define('_SRC_URL_', _BASE_URL_."src/");
define('_THEME_URL_', _BASE_URL_."theme/");
define('_CORE_URL_',_BASE_URL_."app/core/");
define('_MODULES_URL_',_BASE_URL_."app/modules/");

$metalPet=array();
$metalPet['theme']="default";				//sets which theme to use
$metalPet['theme_url']=_THEME_URL_.$metalPet['theme'];		//sets path to theme
$metalPet['develop']=true;					//sets if project is in production phase or not
$metalPet['debug']=true;					//to display debugging messages
$metalPet['log']="\t==START OF LOG==\t\n";	//place to store logging
$metalPet['lang']="sv";						//Language of the site
$metalPet['encoding']="utf-8";				//Encoding 
$metalPet['title']=" - Metal Pet";			//Main title of the site (will append after site specific titles)
$metalPet['use_bootstrap']=true;			//If css framework bootstrap should be used.

if($metalPet['develop']) {	
	$metalPet['jquery_url']=_3PP_URL_."jquery/jquery-2.0.3.js";
	$metalPet['bootstrap_js']=_3PP_URL_."bootstrap/js/bootstrap.js";
	$metalPet['bootstrap_css']=_3PP_URL_."bootstrap/css/bootstrap.css";
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
} else {
	$metalPet['jquery_url']=_3PP_URL_."jquery/jquery-2.0.3.min.js";
	$metalPet['bootstrap_js']=_3PP_URL_."bootstrap/js/bootstrap.min.js";
	$metalPet['bootstrap_css']=_3PP_URL_."bootstrap/css/bootstrap.min.css";
	error_reporting(0);
	ini_set('display_errors', 0);
	$metalPet['debug']=false;
}

include(_CORE_URL_."bootstrap.php");

//Start a session
session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();