<?php
/************************************/
/**** Related Projects Template  ****/ 
/************************************/
?>
<?php
	$related_posts = ac_portfolio_get_related();
	
	if ( count($related_posts) ) : ?>

		<section class='related-projects'>
			<h3 class='title uppercase margin-bottom-medium'><strong>Related Projects</strong></h3>			
			<?php
				$args = array(
					'column_count' => 3,
					'show_excerpt' => false,
					'image_aspect_ratio' => AC_IMAGE_RATIO_3BY2
				);
				echo ac_posts_grid( $args, $related_posts );
			?>
		</section>
	
<?php
	endif; // related posts
?>	