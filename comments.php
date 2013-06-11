<?php
/**
* The template for displaying comments
* 
* The area of the page that contains both current comments
* and the comment form. The actual display of comments is
* handled by a callback to FCN_comment() in inc/template-tags.php
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?>

<?php 
/*
* If the current post is protected by a password and
* the visitor hasn't entered the password, return early
* without loading comments
*/
if( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">
	<?php //you can start editing here -- including this comment ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">COMMENTS
			<?php
				//printf( _n( 'One thought on &ldquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'FCN'), 
					//number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );

			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation? ?>
		<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'FCN' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( _( '$larr; Older Comments', 'FCN' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'FCN' ) ); ?></div>
		</nav> <!-- End comment navigation -->
	<?php endif; //check for comment navigation ?>

<ol class="commentlist">
	<?php
			/* Loop thrrough and list comments. Tell wp_list_comments() to 
			* use FCN_comment() to format the comments. If you want to overload
			* this in a child theme then you can define FCN_comment() and that
			* will be used instead.
			*/
			wp_list_comments( array( 'callback' => 'FCN_comment' ) );
			?>
		</ol><!-- End comment list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments') ) : //are there comments to through? If so, show navigation ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'FCN' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( 'l&arr; Older Comments', 'FCN' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'New Comments &rarr;', 'FCN' ) ); ?></div>
		</nav><!-- End lower comment navigation -->
	<?php endif; //check for comment navigation ?>

<?php endif; // have_comments() ?>

<?php
//if comments are closed and there aren't any comments, leave a note
if( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
<p class="nocomments"><?php _e( 'Comments are closed.', 'FCN' ); ?></p>
<?php endif; ?>

<?php comment_form( array( 'comment_notes_after' => '' ) ); ?>
</div> <!-- End comments area -->