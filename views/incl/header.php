<!DOCTYPE html>
<html lang="<?=$metalPet['lang']?>">
	<head>
		<meta charset="<?=$metalPet['encoding']?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?=$metalPet['title']?></title>
		<?=include_favicon()?>
		<?=include_css()?>
		<?=include_js_before()?>
	</head>
	 <body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">		
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				    <span class="sr-only">Toggle navigation</span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					</button>			
					<a class="navbar-brand" href="<?=create_url('home')?>"><?=$metalPet['site_name']?></a>
				</div>
				<div class="navbar-collapse collapse">
				<?php 
					if(isset($metalPet['menu']) && is_array($metalPet['menu'])) {
						echo createMenu($metalPet['menu'], $metalPet['page'], $metalPet['rewrite_queries']);
					}
					if(isset($metalPet['login']) && $metalPet['login']==true) {
						echo createLogin();
					}
					if(isset($metalPet['searchbar']) && $metalPet['searchbar']==true) {
						echo createSearchbar();
					}				
				?>					
				</div><!--/.navbar-collapse -->
			</div>
		</div>
