<?php
//defining paths to important folders
define('_3PP_URL_'			, _HTTP_URL_.'3pp/');
define('_SRC_URL_'			, _BASE_URL_."src/");
define('_THEME_URL_'		, _HTTP_URL_."theme/");
define('_CORE_URL_'			, _BASE_URL_."app/core/");
define('_MODULES_URL_'		, _BASE_URL_."app/modules/");
define('_VIEW_URL_'			, _HTTP_URL_.'views/');
define('_VIEW_SERVER_URL_'	, _BASE_URL_.'views/');

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



$metalPet=array();

$metalPet['css']				=	array();
$metalPet['css_ie']				=	array();
$metalPet['css_ie']['7'] 		=	array();
$metalPet['js_before']			=	array();
$metalPet['js_after']			=	array();
$metalPet['js_ie_before']		=	array();
$metalPet['js_ie_after']		=	array();
$metalPet['js_ie_before']['9']	=	array();

include(_BASE_URL_."src/config.php");

$metalPet['theme_url']			=	_THEME_URL_.$metalPet['theme'].'/';				//sets path to theme(client side)
$metalPet['theme_server_url']	=	_BASE_URL_.'theme/'.$metalPet['theme'].'/';		//sets path to theme(server side)


if($metalPet['develop']) {	
	$metalPet['fontAwesome_ie7_url']=	_3PP_URL_."font-awesome/css/font-awesome-ie7.css";
	$metalPet['fontAwesome_url']	=	_3PP_URL_."font-awesome/css/font-awesome.css";
	$metalPet['jquery_url']			=	_3PP_URL_."jquery/jquery-2.0.3.js";
	$metalPet['bootstrap_js']		=	_3PP_URL_."bootstrap/js/bootstrap.js";
	$metalPet['bootstrap_css']		=	_3PP_URL_."bootstrap/css/bootstrap.css";
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
} else {
	$metalPet['fontAwesome_ie7_url']=	_3PP_URL_."font-awesome/css/font-awesome-ie7.min.css";
	$metalPet['fontAwesome_url']	=	_3PP_URL_."font-awesome/css/font-awesome.min.css";
	$metalPet['jquery_url']			=	_3PP_URL_."jquery/jquery-2.0.3.min.js";
	$metalPet['bootstrap_js']		=	_3PP_URL_."bootstrap/js/bootstrap.min.js";
	$metalPet['bootstrap_css']		=	_3PP_URL_."bootstrap/css/bootstrap.min.css";
	error_reporting(0);
	ini_set('display_errors', 0);
	$metalPet['debug']=false;
}

array_unshift($metalPet['js_after'], $metalPet['jquery_url']);

if($metalPet['use_bootstrap']) {
	array_push($metalPet['css'], $metalPet['bootstrap_css']);
	array_push($metalPet['js_after'], $metalPet['bootstrap_js']);
	array_push($metalPet['js_ie_before']['9'], _3PP_URL_."bootstrap/docs-assets/js/html5shiv.js");
	array_push($metalPet['js_ie_before']['9'], _3PP_URL_."bootstrap/docs-assets/js/respond.min.js");
}
if($metalPet['use_fontAwesome']) {
	array_push($metalPet['css'], $metalPet['fontAwesome_url']);
	array_push($metalPet['css_ie']['7'], $metalPet['fontAwesome_ie7_url']);
}


$metalPet['log'].="\n\t==\$_SERVER==\t\n".print_r($_SERVER, true)."\n";

//Start a session
session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();
