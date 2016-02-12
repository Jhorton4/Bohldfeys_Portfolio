<?php
/*******************/
/**** Side Meta ****/ 
/*******************/

// Variables
$show_portfolio_sidebar = ac_get_meta("show_portfolio_sidebar");

?>

<?php 
// Do we show the meta data?
if ( ($show_portfolio_sidebar == 'meta') || ($show_portfolio_sidebar == 'both') ) : ?>
<ul class='meta-data'> 
	<!-- <li class='date'><span>Date: </span><?php the_date(); ?></li>  -->
	
	<?php
	// Check for client
	$client = ac_get_meta('client');
	if ( $client ) : ?>
		<li class='portolio-client' ><span>Client: </span><?php echo $client; ?></li> <?php
	endif; 
	?>

	<?php
	// Check for agency
	$agency = ac_get_meta('agency');
	if ( $agency ) : ?>
		<li class='portolio-agency' ><span>Agency: </span><?php echo $agency; ?></li> <?php
	endif; 
	?>
	
	<?php 
	// Terms
		$terms = get_the_term_list($post->ID, 'portfolio-category', '', ', ', '' );
		if ($terms) : ?>
			<li><span>Type: </span>
	<?php
			echo $terms;
		?></li><?php
		endif;
	?>
	
	<?php
	// Check for external URL
	$url = ac_get_meta('url');
	if ( $url ) : ?>
		<li class='portolio-link' ><span>Link: </span><a id="portfolio-link" href='<?php echo esc_url($url); ?>' target='_blank'>View Project</a></li> <?php
	endif; 
	?>

</ul>
<?php
endif; // Show meta

// Do we show the sidebar widgets?
if ( ($show_portfolio_sidebar == 'sidebar') || ($show_portfolio_sidebar == 'both') ) : ?>
	<section class='sidemeta-sidebar'>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-portfolio') ) :  endif; ?>
	</section>
<?php 
endif;
?>