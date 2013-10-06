<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $metalPet['bootstrap_css'] ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
	/* Move down content because we have a fixed navbar that is 50px tall */
	body {
	  padding-top: 50px;
	  padding-bottom: 20px;
	}
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo _BOOTSTRAP_URL_; ?>docs-assets/js/html5shiv.js"></script>
      <script src=".<?php echo _BOOTSTRAP_URL_; ?>docs-assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
<?php
//template goes here