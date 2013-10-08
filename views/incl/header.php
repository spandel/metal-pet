<!DOCTYPE html>
<html lang="<?=$metalPet['lang']?>">
	<head>
		<meta charset="<?=$metalPet['encoding']?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?=$metalPet['title']?></title>

		<!-- Bootstrap core CSS -->
		<link href="<?php echo $metalPet['bootstrap_css'] ?>" rel="stylesheet">

		<?php 
			//Custom css for this theme
			if(is_file($metalPet['theme_server_url'].'css/style.css')) {
				echo "<!-- Custom css for this theme -->\n".
				"<link href=\"". $metalPet['theme_url']."css/style.css \" rel=\"stylesheet\">\n";
			}
			//Custom css for this page
			if(is_file(_VIEW_SERVER_URL_.'css/'.$metalPet['page'].'.css')) {
				echo "<!-- Custom css for this page -->\n".
					"<link href=\"". _VIEW_URL_."css/". $metalPet['page'] .".css \" rel=\"stylesheet\">\n";
			}
		?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo _BOOTSTRAP_URL_ ; ?>docs-assets/js/html5shiv.js"></script>
			<script src=".<?php echo _BOOTSTRAP_URL_ ; ?>docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	 <body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><?=$metalPet['site_name']?></a>
				</div>
				<div class="navbar-collapse collapse">
				<?php 
				if(isset($metalPet['menu']) && is_array($metalPet['menu'])) {
					echo createMenu($metalPet['menu'], $metalPet['page']);
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