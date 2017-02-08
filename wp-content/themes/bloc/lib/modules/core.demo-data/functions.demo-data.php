<?php
/******************************/
/****  Demo Data Functions  ****/ 
/******************************/

require_once ABSPATH.'wp-admin/includes/template.php';

// Code inserted into the Redux page
function ac_demo_data_for_redux() {
		
 	ob_start();

/*
	 echo '<div id="ac_demo_data_default_section_group' . '" class="redux-group-tab">';
	  echo '<h3>' . __( 'Import Demo Data Page', 'ac' ) . '</h3>';
*/
	  ?>                 
	  <div class="ac-setup-options">
			<div class="ac-setup-option">
				<img src="<?php echo AC_TEMPLATE_URI; ?>/assets/img/setup_demo.gif" alt="Demo Data" height="100%" width="100%"/>
				<h2><?php _e('Import Demo Data', 'roots'); ?></h2>
				<p><?php _e('Import all the data from the demo site: pages, posts, theme options and placeholder images. Up and running in seconds', 'roots'); ?></p>
				<p><?php _e("Note: The demo website uses the following plugins and it's highly recommended that you install these plugins before importing the demo data.", 'roots'); ?></p>
				<h4><?php _e('Recommended Plugins', 'roots'); ?></h4>
				<table class='dd-plugin-check'>
					<tr>
						<td>Visual Composer</td>
						<td><?php echo ac_activation_get_plugin_status( ac_visual_composer_is_installed() ); ?></td>
					</tr>
	<?php /*											<tr>
						<td>Ultimate Addons for VC</td>
						<td><?php echo ac_activation_get_plugin_status( ac_vc_ultimate_addons_is_installed() ); ?></td>
					</tr>
					<tr>
						<td>VC Pricing Boxes</td>
						<td><?php echo ac_activation_get_plugin_status( ac_vc_mnku_pricing_boxes_is_installed() ); ?></td>
					</tr> */ ?>
					<tr> 
						<td>Meta Box</td>
						<td><?php echo ac_activation_get_plugin_status( ac_meta_box_is_installed() ); ?></td>
					</tr>
	<?php /*											<tr>
						<td>Revolution Slider</td>
						<td><?php echo ac_activation_get_plugin_status( ac_revslider_is_installed() ); ?></td>
					</tr>    			*/ ?>
					<tr>
						<td>Contact Form 7</td>
						<td><?php echo ac_activation_get_plugin_status( ac_cf7_is_installed() ); ?></td>
					</tr>
	<?php /*											<tr>
						<td>bbPress</td>
						<td><?php echo ac_activation_get_plugin_status( ac_is_bb_press_installed() ); ?></td>
					</tr> */ ?>			
					<tr>
						<td>WooCommerce</td>
						<td><?php echo ac_activation_get_plugin_status( ac_woocommerce_is_active() ); ?></td>
					</tr>
				</table>
				<?php
					// -- Check if the demo data files exist --
					$missing_demo_files = false;
					$missing_demo_files_message = '';
					// Options
					if ( ! file_exists( AC_DD_THEME_OPTIONS_TXT_PATH ) ) {
						$missing_demo_files_message .= "<div class='demo-data-file-missing'>The demo data Options file is missing</div>";
						$missing_demo_files = true;
					}
					// Widgets
					if ( ! file_exists( AC_DD_WIDGETS_PATH ) ) {
						$missing_demo_files_message .= "<div class='demo-data-file-missing'>The demo data Widgets file is missing</div>";
						$missing_demo_files = true;
					}				
					// XML
					if ( ! file_exists( AC_DD_THEME_XML_PATH ) ) {
						$missing_demo_files_message .= "<div class='demo-data-file-missing'>The demo data XML file is missing</div>";
						$missing_demo_files = true;
					}
					
					if ($missing_demo_files) {
						// Demo data files are missing
						?> 
						<hr>
						<div class='demo-data-missing-files'>
							<p>It is not possible to import the demo data as files are missing:</p>
							<?php echo $missing_demo_files_message; ?><br>
							<p><a class='button button-primary' href='http://alleycatthemes.com/support/forum/theme/bloc/' target='_blank'>Contact Support and let them know</a></p>
						</div>
						<?php								
					}
					else {
						// Demo data files are all good
						$import_url = add_query_arg( array('ac_do_demo_data'=>'1') );												
	
						// Check if demo data already imported
						$ac_demo_data_imported = get_option( 'ac_demo_data_imported' );
						if ( $ac_demo_data_imported == '1' ) {
							?> <a class='button button-primary ac-multi-line-button ac-disable-on-click' href='<?php echo $import_url; ?>'>NOTE:  You have already imported the data.<br>Import Demo Data again</a> <?php
						}
						else {
							?> <a class='button button-primary' href='<?php echo $import_url; ?>'>Import Demo Data</a> <?php
						}												
					}										
				?>
			</div>
	  	<div class="ac-setup-option">
	    	<img src="<?php echo AC_TEMPLATE_URI; ?>/assets/img/setup_basic.gif" alt="Demo Data" height="100%" width="100%"/>
	  		<h2><?php _e('Basic Setup', 'roots'); ?></h2>
	  		<p><?php _e('Quickstart by automatically setting up the Front page, Blog page, Permalinks and the navigation menu.', 'roots'); ?></p>
				<?php submit_button('Basic Setup', 'primary', 'ac_do_basic_setup', false); ?>
	  	</div>
	  </div>                
	  <?php
// 	  echo '</div>';
	  
	  
	$output = ob_get_contents();
	ob_end_clean();
	return $output;				
}