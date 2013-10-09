<?php
function createMenu($menu, $currentPage, $rewrite_queries) {	
	$rendered_menu = '<ul class="nav navbar-nav">\n';
	$standard_prepend="?p=";
	if($rewrite_queries) {
		$standard_prepend="";
	}	
	foreach($menu as $name => $val) {
		$active="";
		$prependix=$standard_prepend;
		if($currentPage==$val) {
			$active=" class='active'";
		}
		if(is_array($val)) {						 
			$dropdown_txt="";
			foreach ($val as $dname => $dval) {
				$active="";
				$prependix=$standard_prepend;
				if(substr($dval, 0, 7 ) === "http://" || $dval[0]==='#')
					$prependix="";	
				if($currentPage==$dval) {
					$active=" class='active'";
				}if($dname=='divider') {
					$dropdown_txt.="<li class='divider'></li>\n";
				} else if($dname=='dropdown-header') {
					$dropdown_txt.="<li class='dropdown-header'>".$dval."</li>\n";
				} else {
					$dropdown_txt.="<li><a href='".$prependix.$dval."'>".$dname."</a></li>\n";
				}
			}
			$rendered_menu.= "<li class='dropdown'>\n".
				"<a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$name." <b class='caret'></b></a>\n".
			"<ul class='dropdown-menu'>\n";
			$rendered_menu.= $dropdown_txt;
			$rendered_menu.= "</ul>\n</li>";
		} else {
			if(substr( $val, 0, 7 ) === "http://" || $val[0]==='#')
				$prependix="";							
			$rendered_menu.= "<li".$active."><a href='".$prependix.$val."'>".$name."</a></li>\n";
		}
	}
	$rendered_menu.= "</ul>";	
	return $rendered_menu;
}

function createLogin() {
	$login = "<form class='navbar-form navbar-right'>".
					"		<div class='form-group'>".
					"		<input type='text' placeholder='Email' class='form-control'>".
					"	</div>".
					"	<div class='form-group'>".
					"		<input type='password' placeholder='Password' class='form-control'>".
					"	</div>".
					"	<button type='submit' class='btn btn-success'>Sign in</button>".
					"</form>";
	return $login;
}

function createSearchbar() {
	$searchbar =  "<form class='navbar-form navbar-right'>".
					"		<div class='form-group'>".
					"		<input type='text' placeholder='Search...' class='form-control'>".
					"	</div>".
					"	<button type='submit' class='btn btn-success'>Go!</button>".
					"</form>";
	return $searchbar;
}
