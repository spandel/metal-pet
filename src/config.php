<?php
//here goes the configurations of the specific website
$metalPet['theme']			=	"default";					//sets which theme to use
$metalPet['develop']		=	true;						//sets if project is in production phase or not. Overrides 'debug'
$metalPet['debug']			=	false;						//to display debugging messages
$metalPet['log']			=	"\t==START OF LOG==\t\n";	//place to store logging
$metalPet['lang']			=	"sv";						//Language of the site
$metalPet['encoding']		=	"utf-8";					//Encoding 
$metalPet['site_name']		=	"Metal Pet";				//site name
$metalPet['title_append']	=	" - ".$metalPet['site_name'];	//Main title of the site (will append after site specific titles)
$metalPet['use_bootstrap']	=	true;						//If css framework bootstrap should be included
$metalPet['use_fontAwesome']=	true;						//If icon set font entypo and entypo-social should be included
$metalPet['login']			=	false;						//If create a login menu (related to current theme)
$metalPet['searchbar']		=	false;						//If create a search bar (related to current theme)
$metalPet['copyright'] 		= 	"Daniel Spandel &copy; 2013";//Disclaimer displayed at the footer
$metalPet['rewrite_queries']= 	true;						//if queries are rewritten, for example by mod_rewrite in .htaccess
$metalPet['favicon']		=	_SRC_URL_."imgs/metal-pet-black-crop.png";	//Path to favicon
$metalPet['indexPage']		=	'home';						//Which page to use as index
$metalPet['404Page']		=	'404';						//Which page to redirect to when queried url is not found

$metalPet['menu'] 			=	array(	'Home'=>'home',		//Creating a menu bar. Rendered by function in theme.
									'About'=>'#about',
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
//configure how to set page titles.
function set_title() {
	global $metalPet;
	$metalPet['title']=ucfirst(str_replace('-', ' ', $metalPet['page'])).$metalPet['title_append'];
}