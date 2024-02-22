<?php
/**
 * Theme Customizer Controls
 *
 * @package lawcraft
 */


if ( ! function_exists( 'lawcraft_customizer_preloader_register' ) ) :
function lawcraft_customizer_preloader_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'lawcraft_preloader_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Preloader Settings', 'lawcraft' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'lawcraft_label_preloader_settings_title', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_preloader_settings_title', 
		array(
		    'label'       => esc_html__( 'Preloader Settings', 'lawcraft' ),
		    'section'     => 'lawcraft_preloader_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_preloader_settings_title',
		) 
	));

	// Add an option to enable the preloader
	$wp_customize->add_setting( 
		'lawcraft_enable_preloader', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_preloader', 
		array(
		    'label'       => esc_html__( 'Show Preloader', 'lawcraft' ),
		    'section'     => 'lawcraft_preloader_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_preloader',
		) 
	));

}
endif;

add_action( 'customize_register', 'lawcraft_customizer_preloader_register' );