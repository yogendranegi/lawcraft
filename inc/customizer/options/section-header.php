<?php
/**
 * Theme Customizer Controls
 *
 * @package lawfiz
 */


if ( ! function_exists( 'lawfiz_customizer_header_register' ) ) :
function lawfiz_customizer_header_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'lawfiz_header_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'lawfiz' ),
        )
    );

	// Section Posts
    $wp_customize->add_section(
        'lawfiz_topbar_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Top Bar', 'lawfiz' ),
            'panel'          => 'lawfiz_header_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'lawfiz_label_topbar_info_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_topbar_info_show', 
		array(
		    'label'       => esc_html__( 'Top Bar', 'lawfiz' ),
		    'section'     => 'lawfiz_topbar_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_topbar_info_show',
		) 
	));

	// Add an option to enable the topbar
	$wp_customize->add_setting( 
		'lawfiz_enable_topbar', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_topbar', 
		array(
		    'label'       => esc_html__( 'Show Top Bar', 'lawfiz' ),
		    'section'     => 'lawfiz_topbar_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_topbar',
		) 
	));

    //=========================================================================

	// Section Header Styles
    $wp_customize->add_section(
        'lawfiz_header_styles_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Styles', 'lawfiz' ),
            'panel'          => 'lawfiz_header_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'lawfiz_label_header_styles_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_header_styles_show', 
		array(
		    'label'       => esc_html__( 'Header Styles', 'lawfiz' ),
		    'section'     => 'lawfiz_header_styles_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_header_styles_show',
		) 
	));

}
endif;

add_action( 'customize_register', 'lawfiz_customizer_header_register' );