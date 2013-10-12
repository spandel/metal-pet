    <div class="container">
    <hr>
      <footer>
        <p><?=$metalPet['copyright']?></p>
      </footer>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $metalPet['jquery_url'] ?>"></script>
    <?php
        if($metalPet['use_bootstrap']) {
            ?>
             <script src="<?php echo $metalPet['bootstrap_js'] ?>"></script>  
            <?php
        }    
    	//Custom js for this theme
    	if (is_file($metalPet['theme_server_url'].'js/main.js')) {
    		echo "<!-- Custom js for this page -->\n".
                 "<script src='".$metalPet['theme_url']."js/main.js'></script>\n";
    			//"<link href=\"". $metalPet['theme_url']."js/main.js \" rel=\"stylesheet\">\n";
    	}
    	//Custom js for this page
    	if (is_file(_VIEW_SERVER_URL_.'js/'.$metalPet['page'].'.js')) {
    		echo "<!-- Custom js for this page -->\n".
                 "<script src='".$metalPet['theme_url']."js/".$metalPet['page'].".js'></script>\n";
    			//"<link href=\"". _VIEW_URL_."js/". $metalPet['page'] .".js \" rel=\"stylesheet\">\n";
    	}
        if ($metalPet['debug']) {
            echo "<pre>".$metalPet['log']."\t==END OF LOG==\t\n"."</pre>";
        }
    ?>
  </body>
</html>
