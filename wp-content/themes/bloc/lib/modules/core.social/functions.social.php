<?php

function shoestrap_get_social_links() {
  // An array of the available networks
  $networks   = array();

  // Started on the new stuff, not done yet.
  $networks[] = array( 'url' => shoestrap_getVariable( 'behance_link' ),      'icon' => 'behance',    'fullname' => 'Behance' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'blogger_link' ),      'icon' => 'blogger',    'fullname' => 'Blogger' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'deviantart_link' ),   'icon' => 'deviantart', 'fullname' => 'DeviantART' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'digg_link' ),         'icon' => 'digg',       'fullname' => 'Digg' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'dribbble_link' ),     'icon' => 'dribbble',   'fullname' => 'Dribbble' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'facebook_link' ),     'icon' => 'facebook',   'fullname' => 'Facebook' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'flickr_link' ),       'icon' => 'flickr',     'fullname' => 'Flickr' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'github_link' ),       'icon' => 'github',     'fullname' => 'GitHub' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'google_plus_link' ),  'icon' => 'googleplus', 'fullname' => 'Google+' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'instagram_link' ),  	'icon' => 'instagram', 	'fullname' => 'Instagram' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'linkedin_link' ),     'icon' => 'linkedin',   'fullname' => 'LinkedIn' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'myspace_link' ),      'icon' => 'myspace',    'fullname' => 'Myspace' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'pinterest_link' ),    'icon' => 'pinterest',  'fullname' => 'Pinterest' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'reddit_link' ),       'icon' => 'reddit',     'fullname' => 'Reddit' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'rss_link' ),          'icon' => 'rss',        'fullname' => 'RSS' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'skype_link' ),        'icon' => 'skype',      'fullname' => 'Skype' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'soundcloud_link' ),   'icon' => 'soundcloud', 'fullname' => 'SoundCloud' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'tumblr_link' ),       'icon' => 'tumblr',     'fullname' => 'Tumblr' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'twitter_link' ),      'icon' => 'twitter',    'fullname' => 'Twitter' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'vimeo_link' ),        'icon' => 'vimeo',      'fullname' => 'Vimeo' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'vkontakte' ),         'icon' => 'vkontakte',  'fullname' => 'Vkontakte' );
  $networks[] = array( 'url' => shoestrap_getVariable( 'youtube_link' ),      'icon' => 'youtube',    'fullname' => 'YouTube' );

  return $networks;
}

$socialShares = array();
// An array of the available/enabled networks for social sharing
function shoestrap_get_social_shares() {
  global $socialShares;
  if ( !empty( $socialShares ) )
    return $socialShares;

  $networks   = array();
  if ( shoestrap_getVariable( 'facebook_share' ) == 1 )
    $networks['facebook'] = array(
      'icon'      => 'facebook',
      'fullname'  => 'Facebook',
      'url'       => 'http://www.facebook.com/sharer.php?u=' . get_permalink() . '&amp;title=' . get_the_title()
    );

  if ( shoestrap_getVariable( 'twitter_share' ) == 1 ) {
    $networks['twitter'] = array(
      'icon'      => 'twitter',
      'fullname'  => 'Twitter',
      'url'       => 'http://twitter.com/home/?status=' . get_the_title() . ' - ' . get_permalink()
    );
    
    $twittername = shoestrap_get_twitter_username();

    if ( $twittername != '' )
      $network['twitter']['username'] = $twittername;
      $networks['twitter']['url'] .= ' via @' . $twittername;

  }

  if ( shoestrap_getVariable( 'reddit_share' ) == 1 )
    $networks['reddit'] = array(
      'icon'      => 'reddit',
      'fullname'  => 'Reddit',
      'url'       => 'http://reddit.com/submit?url=' .get_permalink() . '&amp;title=' . get_the_title()
    );

  if ( shoestrap_getVariable( 'linkedin_share' ) == 1 )
    $networks['linkedin'] = array(
      'icon'      => 'linkedin',
      'fullname'  => 'LinkedIn',
      'url'       => 'http://linkedin.com/shareArticle?mini=true&amp;url=' .get_permalink() . '&amp;title=' . get_the_title()
    );

  if ( shoestrap_getVariable( 'google_plus_share' ) == 1 )
    $networks['googleplus'] = array(
      'icon'      => 'googleplus',
      'fullname'  => 'Google+',
      'url'       => 'https://plus.google.com/share?url=' . get_permalink()
    );

  if ( shoestrap_getVariable( 'tumblr_share' ) == 1 )
    $networks['tumblr'] = array(
      'icon'      => 'tumblr',
      'fullname'  => 'Tumblr',
      'url'       =>  'http://www.tumblr.com/share/link?url=' .urlencode(get_permalink()) . '&amp;name=' . urlencode(get_the_title()) . "&amp;description=".urlencode(the_excerpt())
    );

  if ( shoestrap_getVariable( 'pinterest_share' ) == 1 )
    $networks['pinterest'] = array(
      'icon'      => 'pinterest',
      'fullname'  => 'Pinterest',
      'url'       => 'http://pinterest.com/pin/create/button/?url=' . get_permalink()
    );

  if ( shoestrap_getVariable( 'email_share' ) == 1 )
    $networks['email'] = array(
      'icon'      => 'envelope',
      'fullname'  => 'Email',
      'url'       => 'mailto:?subject=' .get_the_title() . '&amp;body=' . get_permalink()
    );

  if ( !empty( $networks ) )
    return $networks;
}

function shoestrap_navbar_social_links() {

  // Get all the social networks the user is using
  $networks = shoestrap_get_social_links();

  // The base class for icons that will be used
  $baseclass  = 'icon el-icon-';

  // Build the content
  $content = '';
  $content .= '<ul class="nav navbar-nav pull-left">';
  $content .= '<li class="dropdown">';
  $content .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
  $content .= '<i class="' . $baseclass . 'network"></i>';
  $content .= '<b class="caret"></b>';
  $content .= '</a>';
  $content .= '<ul class="dropdown-menu dropdown-social">';

  // populate the networks
  foreach ( $networks as $network ) {
    if ( strlen( $network['url'] ) > 7 ) {
      // add the $show variable to check if the user has actually entered a url in any of the available networks
      $show     = true;
      $content .= '<li>';
      $content .= '<a href="' . $network['url'] . '" target="_blank">';
      $content .= '<i class="' . $baseclass . $network['icon'] . '"></i> ';
      $content .= $network['fullname'];
      $content .= '</a></li>';
    }
  }
  $content .= '</ul></li></ul>';

  echo $content;
}
// If the user has selected to show social links as DROPDOWN in the navbar echo the content.
if ( shoestrap_getVariable( 'navbar_social' ) == 1 && shoestrap_getVariable( 'navbar_social_style' ) == 0 )
  add_action( 'shoestrap_inside_nav_end', 'shoestrap_navbar_social_links' );

// That's for inline icon links
function shoestrap_navbar_social_bar() {

  // Get all the social networks the user is using
  $networks = shoestrap_get_social_links();

  // The base class for icons that will be used
  $baseclass  = 'icon el-icon-';

  // Build the content
  $content = '';
  $content .= '<div id="navbar_social_bar">';

  // populate the networks
  foreach ( $networks as $network ) {
    if ( strlen( $network['url'] ) > 7 ) {
      // add the $show variable to check if the user has actually entered a url in any of the available networks
      $show     = true;
      $content .= '<a class="btn btn-link navbar-btn" href="' . $network['url'] . '" target="_blank" title="'. $network['icon'] .'">';
      $content .= '<i class="' . $baseclass . $network['icon'] . '"></i> ';
      $content .= '</a>';
    }
  }
  $content .= '</div>';

  echo $content;
}
// If the user has selected to show social INLINE links in the navbar echo the content.
if ( shoestrap_getVariable( 'navbar_social' ) == 1 && shoestrap_getVariable( 'navbar_social_style' ) == 1 )
  add_action( 'shoestrap_inside_nav_end', 'shoestrap_navbar_social_bar' );

// Properly parses the twitter URL if set
function shoestrap_get_twitter_username() {
  $twittername = '';
  $twitter_link = shoestrap_getVariable ( 'twitter_link' );

  if ( $twitter_link != "" ) {
    $twitter_link = explode( '/', rtrim( $twitter_link, '/' ) );
    $twittername = end( $twitter_link );
  }

  return $twittername;
}

if ( !function_exists( 'shoestrap_social_sharing' ) ) :
function shoestrap_social_sharing() {
	
	global $post;
	
  // An array of the available networks
  $networks   = array();
  $networks[] = array( 'on' => shoestrap_getVariable( 'facebook_share' ),     'icon' => 'facebook',   'fullname' => 'Facebook' );
  $networks[] = array( 'on' => shoestrap_getVariable( 'twitter_share' ),      'icon' => 'twitter',    'fullname' => 'Twitter' );
  $networks[] = array( 'on' => shoestrap_getVariable( 'reddit_share' ),       'icon' => 'reddit',     'fullname' => 'Reddit' );
  $networks[] = array( 'on' => shoestrap_getVariable( 'linkedin_share' ),     'icon' => 'linkedin',   'fullname' => 'LinkedIn' );
  $networks[] = array( 'on' => shoestrap_getVariable( 'google_plus_share' ),  'icon' => 'googleplus', 'fullname' => 'Google+' );
  $networks[] = array( 'on' => shoestrap_getVariable( 'tumblr_share' ),       'icon' => 'tumblr',     'fullname' => 'Tumblr' );
  $networks[] = array( 'on' => shoestrap_getVariable( 'pinterest_share' ),    'icon' => 'pinterest',  'fullname' => 'Pinterest' );
  $networks[] = array( 'on' => shoestrap_getVariable( 'email_share' ),        'icon' => 'envelope',   'fullname' => 'Email' );

  $twittername = shoestrap_get_twitter_username();

  // The base class for icons that will be used
  $baseclass  = 'icon el-icon-';

  // Don't show by default
  $show = false;

  // Button class
//  $button_class = shoestrap_getVariable( 'social_sharing_button_class' );
  $button_class = 'btn-default'; // AC override due to removed feature

  // Button Text
  $text = shoestrap_getVariable( 'social_sharing_text' );
  
  // Image
  $media = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

  // Build the content
  $content = '';
  $content .= '<div class="btn-group social-share">';
  $content .= '<button class="social-share-main btn '.$button_class.' btn-small">' . $text . '</button>';

  foreach ( $networks as $network ) {
    if ( $network['on'] == 1 ) {
      $show = true;

      if ( $network['icon'] == 'facebook' )
        $url    = 'http://www.facebook.com/sharer.php?u=' . get_permalink() . '&amp;title=' . get_the_title();
      elseif ( $network['icon'] == 'twitter' ) {
	      
	      // The standard url
	      $url    = 'http://twitter.com/home/?status=' . urlencode(html_entity_decode(get_the_title()) . ' - ' . get_permalink());
	      // Add the user name if given
				if ( $twittername != "" ) {
	        $url .=  ' via @' . $twittername;
				}
	      
      }
      elseif ( $network['icon'] == 'linkedin' )
        $url    = 'http://linkedin.com/shareArticle?mini=true&amp;url=' .get_permalink() . '&amp;title=' . get_the_title();
      elseif ( $network['icon'] == 'reddit' )
        $url    = 'http://reddit.com/submit?url=' .get_permalink() . '&amp;title=' . get_the_title();
      elseif ( $network['icon'] == 'tumblr' )
        $url    = 'http://www.tumblr.com/share/link?url=' .urlencode( get_permalink() ) . '&amp;name=' . urlencode( get_the_title() );
      elseif ( $network['icon'] == 'envelope' )
        $url    = 'mailto:?subject=' .get_the_title() . '&amp;body=' . get_permalink();
      elseif ( $network['icon'] == 'googleplus' )
        $url    = 'https://plus.google.com/share?url=' . get_permalink();
      elseif ( $network['icon'] == 'pinterest' ) {
	      if ($media) {
		      $media = '&amp;media='.$media;
	      }
        $url    = 'http://pinterest.com/pin/create/button/?url=' . get_permalink().'&amp;description=' . urlencode( get_the_title() ). $media;
      }

      $content .= '<a class="social-link btn '.$button_class.' btn-small" href="' . $url . '" target="_blank">';
      $content .= '<i class="' . $baseclass . $network['icon'] . '"></i>';
      $content .= '</a>';

    }
  }
  $content .= '</div>';

  // If at least ONE social share option is enabled then echo the content
  if ( $show == 1 ) {
		?><div class="clearfix"></div><?php  
    echo $content;
		?><div class="clearfix"></div><?php
  }
}
endif;

// Renders the social sharing buttons if applicable for this page
function ac_social_sharing($post_type = '') {

	// Render if the page option is true
	if ( is_singular($post_type) && ac_get_meta('page_show_share_buttons')) {
		shoestrap_social_sharing(); 			
	}
	
}
