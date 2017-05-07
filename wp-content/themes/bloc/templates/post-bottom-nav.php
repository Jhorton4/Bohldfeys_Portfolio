<?php
/*************************/
/**** Post Navigation ****/ 
/*************************/
// Include at the bottom of posts
?>
<div class='post-bottom-nav'>
	<div class='prev'><?php previous_post_link('%link', 'Next &nbsp;&nbsp;&nbsp;<span class="entypo-icon-right-open"></span>'); ?></div>
  <div class='next'><?php next_post_link('%link', '<span class="entypo-icon-left-open"></span>&nbsp;&nbsp;&nbsp; Prev'); ?></div>
  <div class="clearfix"></div>
</div>