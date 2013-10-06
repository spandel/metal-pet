<?php
	define('_BASE_URL_', dirname(__FILE__)."/");
	define('_HTTP_URL_', "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	include(_BASE_URL_."src/config.php");
	include(_BASE_URL_."views/pages/index.php");