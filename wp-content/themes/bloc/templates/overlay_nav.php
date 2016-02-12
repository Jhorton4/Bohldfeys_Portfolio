<?php
/***********************/
/****  Overlay Nav  ****/ 
/***********************/

// Overlay
?>
<div class="overlay-nav" >
	<div class='inner'>
		<nav class="nav-main" role="navigation">
			<ul class='nav'>
			<?php
				// Render the menu				
	      wp_nav_menu( array( 
	      	'theme_location' => 'primary_navigation', 
	      	'menu_class' 	=> shoestrap_nav_class_pull(), 
	      	'container' 	=> '', 
	      	'items_wrap' 	=> '%3$s',
	      	'depth'				=> 10
	      ));
	    ?>				        	
			</ul>
		</nav>
		
		<div class='overlay-search'>
			<form action="<?php echo home_url(); ?>" method="GET">
	    	<input type="text" name="s" value="" placeholder="<?php _e('Search', 'alleycat'); ?> <?php bloginfo('name'); ?>" /> <button type="submit" id="searchsubmitnav" class="ac-transparent-btn searchsubmit"><i class="entypo-icon-search"></i></button>
			</form> 			
		</div>
		
	</div>
</div>

<?php //Close ?>
<a id="menu-closer" href="#" class="active">
	<svg class="menu-closer-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
		<g>
			<rect x="18" y="28" transform="matrix(0.7071 0.7071 -0.7071 0.7071 30.1464 -12.78)" width="25" height="4"></rect>
			<rect x="18" y="28" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -12.28 30.3536)" width="25" height="4"></rect>
		</g>
	</svg>
</a>