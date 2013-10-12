<?php
//here goes the configurations of the specific website
$metalPet['theme']="default";				//sets which theme to use
$metalPet['develop']=true;					//sets if project is in production phase or not
$metalPet['debug']=true;					//to display debugging messages
$metalPet['log']="\t==START OF LOG==\t\n";	//place to store logging
$metalPet['lang']="sv";						//Language of the site
$metalPet['encoding']="utf-8";				//Encoding 
$metalPet['site_name']="Metal Pet";			//site name
$metalPet['title_append']=" - ".$metalPet['site_name'];		//Main title of the site (will append after site specific titles)
$metalPet['use_bootstrap']=true;			//If css framework bootstrap should be included
$metalPet['login']=false;
$metalPet['searchbar']=true;
$metalPet['copyright'] = "Daniel Spandel &copy; 2013";
$metalPet['rewrite_queries'] = true;
$metalPet['sqlite_url'] = _SRC_URL_."db/db.sqlite";

$metalPet['menu'] =array(
	'Home'=>'home',
	'About'=>'about',
	'GitHub'=>'http://github.com/spandel/metal-pet',
	'Dropdown'=>array(
		'Action'=>'home#php-in-the-ground',
		'Another action'=>'#',
		'Something else here...'=>'#',
		'divider'=>'divider',
		'dropdown-header'=>'Nav header',
		'Separated link'=>'#',
		'One more separated link'=>'#',
		),);