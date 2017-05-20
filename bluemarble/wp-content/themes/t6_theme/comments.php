<?php
/**
 * The template for displaying Comments.
 * @package T6_Theme
 * @since T6_Theme 1.0
 */

if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 't6_theme' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 40,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 't6_theme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 't6_theme' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif;?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 't6_theme' ); ?></p>
		<?php endif; ?>

	<?php endif;?>

	<?php comment_form(); ?>

</div><!-- #comments -->