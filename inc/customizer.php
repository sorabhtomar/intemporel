<?php
/**
 * Intemporel Theme Customizer
 *
 * @package Intemporel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function intemporel_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Custom Settings
	 * 
	 * Theme options for changing theme colors
	 */

	// Section - Theme Colors
	/*$wp_customize->add_section(
		'colors',
		array (
			'title'			=> __( 'Theme Colors', 'intemporel' ),
			'description'	=> __('Change Theme Colors', 'intemporel' ),
			'priority'		=> 100
		)
	);*/

	// Setting - Primary Light Color
	$wp_customize->add_setting(
		'intemporel_primary_light',
		array(
			'default'		=> '#3F51B5',
			'transport'		=> 'refresh',
		)
	);

	// Control - Primary Light Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'intemporel_primary_light',
			array (
				'label'		=> __( 'Primary Light Color', 'intemporel' ),
				'section'	=> 'colors',
				'settings'	=> 'intemporel_primary_light',
				'priority'	=> 1
			)
		)
	);

	// Setting - Primary Dark Color
	$wp_customize->add_setting(
		'intemporel_primary_dark',
		array(
			'default'		=> '#1A237E',
			'transport'		=> 'refresh',
		)
	);

	// Control - Primary Dark Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'intemporel_primary_dark',
			array (
				'label'		=> __( 'Primary Dark Color', 'intemporel' ),
				'section'	=> 'colors',
				'settings'	=> 'intemporel_primary_dark',
				'priority'	=> 2
			)
		)
	);

	// Setting - Secondary light Color
	$wp_customize->add_setting(
		'intemporel_secondary_light',
		array(
			'default'		=> '#E91E63',
			'transport'		=> 'refresh',
		)
	);

	// Control - Secondary light Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'intemporel_secondary_light',
			array (
				'label'		=> __( 'Secondary light Color', 'intemporel' ),
				'section'	=> 'colors',
				'settings'	=> 'intemporel_secondary_light',
				'priority'	=> 3
			)
		)
	);

	// Setting - Secondary Dark Color
	$wp_customize->add_setting(
		'intemporel_menu_hover_border',
		array(
			'default'		=> '#FFC107',
			'transport'		=> 'refresh',
		)
	);

	// Control - Secondary Dark Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'intemporel_menu_hover_border',
			array (
				'label'		=> __( 'Menu Hover Border', 'intemporel' ),
				'section'	=> 'colors',
				'settings'	=> 'intemporel_menu_hover_border',
				'priority'	=> 4
			)
		)
	);

	// Setting - Text Color
	$wp_customize->add_setting(
		'intemporel_text_color',
		array(
			'default'		=> '#404040',
			'transport'		=> 'postMessage',
		)
	);

	// Control - Text Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'intemporel_text_color',
			array (
				'label'		=> __( 'Text Color', 'intemporel' ),
				'section'	=> 'colors',
				'settings'	=> 'intemporel_text_color',
				'priority'	=> 1
			)
		)
	);
	if ( $wp_customize->is_preview() && ! is_admin() )
    add_action( 'wp_footer', 'intemporel_customize_preview_js', 21);
}
add_action( 'customize_register', 'intemporel_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function intemporel_customize_preview_js() {
	wp_enqueue_script( 'intemporel-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'jquery' ), '', true );
}
add_action( 'customize_preview_init', 'intemporel_customize_preview_js' );

function intemporel_customize_css() {
	?>
		<style type="text/css">
			body,
			input,
			select,
			textarea {
				color: <?php echo get_theme_mod( 'intemporel_text_color' ); ?>;
			}

			/* Primary Light Color */

			a,
			.entry-title a:hover {
				color: <?php echo get_theme_mod( 'intemporel_primary_light' ); ?>;
			}

			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.site-branding {
				background-color: <?php echo get_theme_mod( 'intemporel_primary_light' ); ?>;
			}

			.site-footer {
				border-top-color: <?php echo get_theme_mod( 'intemporel_primary_light' ); ?>;
			}

			/* Primary Dark Color */

			button:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			.menu-toggle:hover span,
			.menu-toggle:active span,
			.search-toggle:hover span,
			.search-toggle:active span,
			.search-field {
				background-color: <?php echo get_theme_mod( 'intemporel_primary_dark' ); ?>;
			}

			.search-field {
				border-bottom-color: <?php echo get_theme_mod( 'intemporel_primary_dark' ); ?> !important;
			}

			/* Secondary Light Color */

			a:hover,
			a:focus,
			a:active,
			.excerpt .entry-meta a {
				color: <?php echo get_theme_mod( 'intemporel_secondary_light' ); ?>;
			}

			.main-navigation .current_page_item > a,
			.main-navigation .current-menu-item > a,
			.main-navigation .current_page_ancestor > a {
				border-bottom-color: <?php echo get_theme_mod( 'intemporel_secondary_light' ); ?>;
			}

			/* Menu Hover Border */
			.main-navigation a:hover {
				border-bottom-color: <?php echo get_theme_mod( 'intemporel_menu_hover_border' ); ?>;
			}
		</style>
	<?php
}
add_action( 'wp_head', 'intemporel_customize_css' );