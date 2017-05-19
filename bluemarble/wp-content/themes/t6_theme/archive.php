<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_category() ) :
						printf( __( 'Category Archives: %s', 't6_theme' ), single_cat_title( '', false ) );

					elseif ( is_tag() ) :
						printf( __( 'Tag Archives: %s', 't6_theme' ), single_tag_title( '', false ) );

					elseif ( is_author() ) :
						the_post();
						printf( __( 'Author Archives: %s', 't6_theme' ), '<span class="vcard">' . get_the_author() . '</span>' );
						rewind_posts();

					elseif ( is_day() ) :
						printf( __( 'Daily Archives: %s', 't6_theme' ), get_the_date() );

					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 't6_theme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 't6_theme' ) ) );

					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 't6_theme' ), get_the_date( _x( 'Y', 'yearly archives date format', 't6_theme' ) ) );

					else :
						_e( 'Archives', 't6_theme' );

					endif;
				?></h1>
				<?php
				
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="archive-meta">%s</div>', $term_description );
					endif;
					if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
						<div class="archive-meta">
							<p><?php the_author_meta( 'description' ); ?></p>
						</div><!-- .archive-meta -->
					<?php endif; ?>
			</header><!-- .archive-header -->

			<?php?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php t6_theme_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>