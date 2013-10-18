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