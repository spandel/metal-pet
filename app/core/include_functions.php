<?php
function include_js_before() {
	global $metalPet;
	$js="";
	foreach ($metalPet['js_before'] as $key => $url) {
		$js.= "<script src='".$url."''></script>\n";		
	}
	foreach ($metalPet['js_ie_before'] as $version => $array) {
		$js.= "<!--[if lt IE ".$version."]>\n";
		foreach ($array as $url) {
			# code...
			$js.= "<script src='".$url."''></script>\n";
		}
		$js.="<![endif]-->\n";
	}
	return $js;
}
function include_favicon() {
	global $metalPet;
	$favicon="";
	if(isset($metalPet['favicon']) && $metalPet['favicon'] && $metalPet['favicon']!="") {
		$favicon="<link rel='shortcut icon' href='".$metalPet['favicon']."'/>";
	}
	return $favicon;
}
function add_css_and_js() {
	global $metalPet;

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
}
function include_js_after() {
	global $metalPet;
	$js="";
	foreach ($metalPet['js_after'] as $key => $url) {
		$js.= "<script src='".$url."''></script>\n";		
	}
	foreach ($metalPet['js_ie_after'] as $version => $array) {
		$js.= "<!--[if lt IE ".$version."]>\n";
		foreach ($array as $url) {
			# code...
			$js.= "<script src='".$url."''></script>\n";
		}
		$js.="<![endif]-->\n";
	}
	return $js;
}
function include_css() {
	global $metalPet;
	$css="";
	foreach ($metalPet['css'] as $key => $url) {
		$css.="<link href='". $url ."' rel='stylesheet'>\n";
	}

	foreach ($metalPet['css_ie'] as $version => $array) {
		$css.="<!--[if lt IE ".$version."]>\n";

		foreach ($array as $url) {
			# code...
			$css.="<link href='". $url ."' rel='stylesheet'>\n";
		}

		$css.="<![endif]-->\n";
		
	}
	return $css;
}