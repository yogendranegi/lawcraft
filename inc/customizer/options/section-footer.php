<?php
/**
 * Theme Customizer Controls
 *
 * @package lawfiz
 */


if ( ! function_exists( 'lawfiz_customizer_footer_register' ) ) :
function lawfiz_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'lawfiz_footer_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'lawfiz' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'lawfiz_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Settings', 'lawfiz' ),
		    'section'     => 'lawfiz_footer_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'lawfiz_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'lawfiz_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'lawfiz_footer_copyright_text',
        array(
            'settings'      => 'lawfiz_footer_copyright_text',
            'section'       => 'lawfiz_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'lawfiz' ),
            'description'   => esc_html__( 'Copyright text to be displayed in the footer. No HTML allowed.', 'lawfiz' )
        )
    ); 

}
endif;

add_action( 'customize_register', 'lawfiz_customizer_footer_register' );