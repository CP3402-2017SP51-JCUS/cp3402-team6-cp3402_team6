<?php

if ( ! isset( $content_width ) )
	$content_width = 620;

require get_template_directory() . '/inc/custom-header.php';

function T6_Theme_setup() {

	load_theme_textdomain( 'T6_Theme', get_template_directory() . '/languages' );

	add_editor_style( array( T6_Theme_fonts_url() ) );

	add_theme_support( 'title-tag' );

	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	
	register_nav_menu( 'primary', __( 'Navigation Menu', 'T6_Theme' ) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 620, 9999 );

	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'T6_Theme_setup' );

function T6_Theme_fonts_url() {
	$fonts_url = '';

	$lato = _x( 'on', 'Lato font: on or off', 'T6_Theme' );

	if ( 'off' !== $lato ) {
		$font_families = array();

		if ( 'off' !== $lato )
			$font_families[] = 'Lato:300,400';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

function T6_Theme_scripts_styles() {

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( 'T6_Theme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-10-20', true );

	wp_enqueue_style( 'T6_Theme-fonts', T6_Theme_fonts_url(), array(), null );

	wp_enqueue_style( 'T6_Theme-style', get_stylesheet_uri(), array(), '2013-10-20' );
}
add_action( 'wp_enqueue_scripts', 'T6_Theme_scripts_styles' );


function T6_Theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'T6_Theme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'T6_Theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer One', 'T6_Theme' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears in the footer section of the site.', 'T6_Theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Two', 'T6_Theme' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears in the footer section of the site.', 'T6_Theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Three', 'T6_Theme' ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears in the footer section of the site.', 'T6_Theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'T6_Theme_widgets_init' );

if ( ! function_exists( 'T6_Theme_paging_nav' ) ) :

function T6_Theme_paging_nav() {
	global $wp_query;

	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'T6_Theme' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&rarr;</span>', 'T6_Theme' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'T6_Theme_post_nav' ) ) :

function T6_Theme_post_nav() {
	global $post;
	
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'T6_Theme' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'T6_Theme' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'T6_Theme_entry_meta' ) ) :

function T6_Theme_entry_meta() {

	$categories_list = get_the_category_list( __( ', ', 'T6_Theme' ) );


	$tag_list = get_the_tag_list( '', __( ', ', 'T6_Theme' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'T6_Theme' ), get_the_author() ) ),
		get_the_author()
	);

	if ( $tag_list ) {
		$utility_text = __( 'Posted in %1$s and tagged %2$s<span class="on-date"> on %3$s</span><span class="by-author"> by %4$s</span>.', 'T6_Theme' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'Posted in %1$s<span class="on-date"> on %3$s</span><span class="by-author"> by %4$s</span>.', 'T6_Theme' );
	} else {
		$utility_text = __( '<span class="on-date">Posted on %3$s</span><span class="by-author"> by %4$s</span>.', 'T6_Theme' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

if ( ! function_exists( 'T6_Theme_entry_date' ) ) :

function T6_Theme_entry_date( $echo = true ) {
	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'T6_Theme' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( get_the_date() )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'T6_Theme_the_attached_image' ) ) :

function T6_Theme_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'T6_Theme_attachment_size', array( 940, 940 ) );
	$next_attachment_url = wp_get_attachment_url();

	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

function T6_Theme_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'template-full-width.php' ) )
		$classes[] = 'full-width';

	$num_sidebars = 0;

	if ( is_active_sidebar( 'footer-1' ) )
		$num_sidebars++;

	if ( is_active_sidebar( 'footer-2' ) )
		$num_sidebars++;

	if ( is_active_sidebar( 'footer-3' ) )
		$num_sidebars++;

	switch( $num_sidebars ) :

		case 1:
			$classes[] = 'one-footer-sidebar';
			break;

		case 2:
			$classes[] = 'two-footer-sidebars';
			break;

		case 3:
			$classes[] = 'three-footer-sidebars';
			break;

		default:
			$classes[] = 'no-footer-sidebar';

	endswitch;

	return $classes;
}
add_filter( 'body_class', 'T6_Theme_body_class' );

function T6_Theme_content_width() {
	if ( is_page_template( 'template-full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 940;
	}
}
add_action( 'template_redirect', 'T6_Theme_content_width' );

function T6_Theme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer_widgets' => array( 'footer-1', 'footer-2', 'footer-3' ),
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'T6_Theme_jetpack_setup' );

function T6_Theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'T6_Theme_customize_register' );

function T6_Theme_customize_preview_js() {
	wp_enqueue_script( 'T6_Theme-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20131020', true );
}
add_action( 'customize_preview_init', 'T6_Theme_customize_preview_js' );