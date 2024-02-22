<?php
/**
 * Theme Customizer Controls
 *
 * @package lawcraft
 */


if ( ! function_exists( 'lawcraft_customizer_footer_register' ) ) :
function lawcraft_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'lawcraft_footer_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'lawcraft' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'lawcraft_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Settings', 'lawcraft' ),
		    'section'     => 'lawcraft_footer_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'lawcraft_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'lawcraft_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'lawcraft_footer_copyright_text',
        array(
            'settings'      => 'lawcraft_footer_copyright_text',
            'section'       => 'lawcraft_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'lawcraft' ),
            'description'   => esc_html__( 'Copyright text to be displayed in the footer. No HTML allowed.', 'lawcraft' )
        )
    ); 

}
endif;

add_action( 'customize_register', 'lawcraft_customizer_footer_register' );