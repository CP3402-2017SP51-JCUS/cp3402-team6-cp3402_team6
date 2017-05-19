<?php

if ( ! is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-2' ) && ! is_active_sidebar( 'footer-3' ) )
	return;

?>
<div id="tertiary" class="sidebar-container" role="complementary">
	<div class="sidebar-inner">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div><!-- .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div><!-- .widget-area -->
		<?php endif; ?>
	</div><!-- .sidebar-inner -->
</div><!-- #tertiary -->