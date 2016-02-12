<?php
/**********************************/
/****  Demo Data Options  ****/ 
/**********************************/

if ( !function_exists( 'shoestrap_module_demodata_options' ) ) :
function shoestrap_module_demodata_options( $sections ) {

  $fields = array();
  $section = array(
    'title' => __( 'Demo Data', 'shoestrap' ),
    'icon' => 'el-icon-cogs icon-large'
  );
  
	$fields[] = array( 
	    'id'       => 'opt-raw',
	    'type'     => 'raw',
 	    'content'  => ac_demo_data_for_redux()
	);  
 
  $section['fields'] = $fields;
  
  $sections[] = $section;
  return $sections;
}
endif;
add_filter( 'redux/options/'.REDUX_OPT_NAME.'/sections', 'shoestrap_module_demodata_options', 101 );

include_once( dirname( __FILE__ ).'/functions.demo-data.php' );