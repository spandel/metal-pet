<?php
function print_log() {
	global $metalPet;
	$log="";
	if($metalPet['debug']) {
		$log.="<pre>".print_r($metalPet['log'], true)."</pre>";
	}
	return $log;
}

function create_url($url) {
	global $metalPet;

	$standard_prepend="?p=";
	$suffix="";
	$baseurl=_HTTP_URL_;

	if($metalPet['rewrite_queries']) {
		$standard_prepend="";
		$suffix="/";
	}	
	$prependix=$baseurl.$standard_prepend;
	if(substr($url, 0, 8 ) === "https://" || substr($url, 0, 7 ) === "http://" || substr($url, 0, 1 ) === "#") {
		$prependix="";
		$suffix="";
	} 
	if(substr($url, -1) === '/' || strpos($url, '#') !== FALSE ) {
		$suffix="";
	}
	return $prependix.$url.$suffix;
}