<?php

function t6_theme_custom_header_setup() {
	$args = array(
		
		'default-text-color'     => '',

		'flex-width'             => true,
		'width'                  => 960,
		'flex-height'            => true,
		'height'                 => 180,

	
		'wp-head-callback'       => 't6_theme_header_style',
		'admin-head-callback'    => 't6_theme_admin_header_style',
		'admin-preview-callback' => 't6_theme_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 't6_theme_custom_header_setup' );

function t6_theme_custom_header_fonts() {
	wp_enqueue_style( 't6_theme-fonts', t6_theme_fonts_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 't6_theme_custom_header_fonts' );

function t6_theme_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();


	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;


	?>
	<style type="text/css" id="t6_theme-header-css">
	<?php
		if ( ! empty( $header_image ) && display_header_text() ) :
	?>
		.site-header {
			background-image: url(<?php header_image(); ?>);
			background-repeat: no-repeat;
			background-attachment: scroll;
			background-position: top;
		}
	<?php
		endif;

		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}

		.site-header .home-link {
			min-height: 0;
		}
	<?php

		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}

function t6_theme_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="t6_theme-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		background-color: #000;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll top;';
		} ?>
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		display: block;
		margin: 0 auto;
		max-width: 960px;
		<?php
		if ( ! empty( $header_image ) || display_header_text() ) {
			echo 'min-height: 180px;';
		} ?>
		text-align: center;
		text-decoration: none;
		width: 100%;
	}
	<?php if ( ! display_header_text() ) : ?>
	#headimg h1,
	#headimg h2 {
		position: absolute !important;
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php endif; ?>
	#headimg h1 {
		color: #fff;
		font-family: Lato, sans-serif;
		font-size: 80px;
		font-weight: 300;
		letter-spacing: 5px;
		line-height: 1;
		margin: 0;
		padding: 40px 0 5px;
		text-transform: uppercase;
	}
	#headimg h1 a,
	#headimg h1 a:hover {
		color: #fff;
		text-decoration: none;
	}
	#headimg h2 {
		color: #666;
		font: normal 14px "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;
		letter-spacing: 2px;
		margin: 0;
		padding: 0;
		text-shadow: none;
	}
	.default-header img {
		max-width: 220px;
		width: auto;
	}
	</style>
<?php
}

function t6_theme_admin_header_image() {
	$header       = '';
	$style        = '';
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();
	if ( ! empty( $header_image ) )
		$header = '  style="background: url(' . $header_image . ') no-repeat scroll top;"';
	if ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) )
		$style = ' style="color: #' . $text_color . ';"';
?>
	<div id="headimg"<?php echo $header; ?>>
		<div class="home-link">
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="#"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
		</div>
	</div>
<?php }
