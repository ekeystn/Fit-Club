<?php
/**
* Template part to add email registration form
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/


$args = array( 'post_type' => 'FCN_aweber', 'posts_per_page' => 1 );
$loop = new WP_Query( $args );
while ($loop->have_posts() ) : $loop->the_post();
	echo '<fieldset id="aweber-form"><legend>Register</legend>';
	the_content();
	echo '</fieldset>';
	endwhile;

 ?>