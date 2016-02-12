<?php
/**********************/
/****  Slideshows  ****/ 
/**********************/

// Prepares posts and args to render the slider
function ac_render_posts_slideshow($args, $posts = null) {
	
	// Define the defaults
	$defaults = array(
		'posts_per_page' => 5,
		'meta_key' => '_thumbnail_id', // only include posts with thumbnail
		'cat' => '',
		'ac_order' => 'order_date_desc',
		'show_title' => true,
		'show_excerpt' => true,
		'excerpt_length' => '',
	);
		
	// Merge in the options
	$args = wp_parse_args( $args, $defaults );	
	
	// Params to variables
	extract($args);
	
	// Generate our posts if not passed in
	if ($posts == null) {
	
		ac_prepare_args_for_get_posts($args);	
			
		// Get our posts
		$posts = get_posts($args);
		
	}
		
	// Clean up the bool values.  Might be "true"
	$show_title = filter_var($show_title, FILTER_VALIDATE_BOOLEAN);
	$show_excerpt = filter_var($show_excerpt, FILTER_VALIDATE_BOOLEAN);

	// Capture and render the output			
	ob_start();
	ac_render_royalslider_from_posts($posts, $args);
	$output = ob_get_contents();
	ob_end_clean();	

	return $output;	
}



// -- SLICK CAROUSEL --

// Display a Slick Carousel
function ac_render_slick_carousel($args, $posts = null) {
	
	// Define the defaults
	$defaults = array(
		'posts_per_page' => 5,
		'meta_key' => '_thumbnail_id', // only include posts with thumbnail
		'cat' => '',
		'ac_order' => 'order_date_desc',
		'show_title' => true,
		'show_excerpt' => true,
		'excerpt_length' => '',
	);
		
	// Merge in the options
	$args = wp_parse_args( $args, $defaults );	
	
	// Params to variables
	extract($args);
	
	// Generate our posts if not passed in
	if ($posts == null) {
	
		ac_prepare_args_for_get_posts($args);	
			
		// Get our posts
		$posts = get_posts($args);
		
	}
			
	// Clean up the bool values.  Might be "true"
	$show_title = filter_var($show_title, FILTER_VALIDATE_BOOLEAN);
	$show_excerpt = filter_var($show_excerpt, FILTER_VALIDATE_BOOLEAN);

	// Capture and render the output			
	ob_start();
	ac_render_slick_carousel_from_posts($posts, $args);
	$output = ob_get_contents();
	ob_end_clean();	

	return $output;	
}


// Renders posts as a Slick Carousel from posts
// $posts should already be load
// $args contains options  
function ac_render_slick_carousel_from_posts( $posts, $args ) {
		
	// Do nothing if no posts
	if (empty($posts)) {
		return;
	}

	global $post;
	
	// Params to variables
	extract($args);
				
	// Classes
	$classes = '';
	if (isset($args['class'])) {
		$classes .= ' ' .$args['class'].' ';		
	}
?>
	
  <div class="ac-slick-carousel clearfix <?php echo $classes; ?>">
		<?php
		
		// Render each image
		foreach ($posts as $post):setup_postdata($post);
					
			// Get the image ID.  Some are featured image, some are the actualy post
			$image_id = ac_get_post_thumbnail_id($post);
			
			$img = ac_resize_image_for_height(array(
				'image_id' => $image_id,
				'height' => 495,
				'ratio'  => AC_IMAGE_RATIO_PRESERVE
			));
																											
			?>					
		  <div class="slick-slide">
		    <img class="slick-slide-img" src="<?php echo $img['url']; ?>" alt="<?php esc_attr(the_title()); ?>" />
		  </div>
			
		<?php
		endforeach; // image
		
		wp_reset_postdata();
			
		?>
							
	</div>
			    
<?php		   
	
}


// Renders posts as a Slick Carousel from an array of images
// $posts should already be load
// $args contains options  
// todo: the post version above should use this
function ac_render_slick_carousel_from_images( $images, $args = array() ) {
		
	// Do nothing if no images
	if (empty($images)) {
		return;
	}

	// Params to variables
	extract($args);
			
	// Classes
	$classes = '';
	if (isset($args['class'])) {
		$classes .= ' ' .$args['class'].' ';		
	}	
?>
	
  <div class="ac-slick-carousel clearfix <?php echo $classes; ?>">
		<?php
		
		// Render each image
		foreach ($images as $image_id) :
		
			$img = ac_resize_image_for_height(array(
				'image_id' => $image_id,				
				'height' => 495,
				'ratio'  => AC_IMAGE_RATIO_PRESERVE
			));
																											
			?>					
		  <div class="slick-slide">
		    <img class="slick-slide-img" src="<?php echo $img['url']; ?>" alt="<?php esc_attr(the_title()); ?>" />
		  </div>			  
						
		<?php
		endforeach; // image
			
		?>
							
	</div>
			    
<?php		   
	
}