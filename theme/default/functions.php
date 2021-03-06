<?php
function createMenu($menu, $currentPage, $rewrite_queries) {
	$rendered_menu = "<ul class='nav navbar-nav'>\n";

	foreach($menu as $name => $val) {
		$active="";
		if($currentPage==$val) {
			$active=" class='active'";
		}
		if(is_array($val)) {						 
			$dropdown_txt="";
			foreach ($val as $dname => $dval) {
				$active="";
				if($currentPage==$dval) {
					$active=" class='active'";
				}if($dname=='divider') {
					$dropdown_txt.="<li class='divider'></li>\n";
				} else if($dname=='dropdown-header') {
					$dropdown_txt.="<li class='dropdown-header'>".$dval."</li>\n";
				} else {
					$dropdown_txt.="<li><a href='".create_url($dval)."'>".$dname."</a></li>\n";
				}
			}
			$rendered_menu.= "<li class='dropdown'>\n".
				"<a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$name." <b class='caret'></b></a>\n".
			"<ul class='dropdown-menu'>\n";
			$rendered_menu.= $dropdown_txt;
			$rendered_menu.= "</ul>\n</li>";
		} else {
			$rendered_menu.= "<li".$active."><a href='".create_url($val)."'>".$name."</a></li>\n";
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

function fillDatabaseWithDummyStuff () {
	$url=_SRC_URL_."db/db.sqlite";
	$arrr=array(
			'id'=>"INTEGER PRIMARY KEY",
			'username'=>'TEXT' ,
			'fullname'=>'TEXT',
			'password'=>'TEXT',
			'since'=>'INTEGER',
			'salt'=>'TEXT'
			);
	$MPDB = new MP_Database('sqlite', $url);
	$MPDB->createTable('users', $arrr);

	// Array with some test data to insert to database
	$users = array(
	              array('username' => 'daniel',
	                    'fullname' => 'Daniel Spandel',
	                    'password' => 'groda',
	                    'since' => time(),
	                    'salt' => 'adorg',
	                    ),
	              array('username' => 'doe',
	                    'fullname' => 'John Doe',
	                    'password' => 'doe',
	                    'since' => time(),
	                    'salt' => 'eod',
	                    ),
	              array('username' => 'test',
	                    'fullname' => 'Test Testsson',
	                    'password' => 'test',
	                    'since' => time(),
	                    'salt' => 'tset',
	                    ),
	            );

	$MPDB->insertValues('users', $users);

	$res=$MPDB->queryFromTable("SELECT * FROM users");
	foreach($res as $row) {
		//echo "Username: " . $row['username'] . "\n";
		echo"<pre>".print_r($row, true)."</pre>";
	}
	$MPDB->dropTable('users');
	$MPDB->closeConnection();
}