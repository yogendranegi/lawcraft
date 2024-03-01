<?php
/**
 * Lawfiz Theme Customizer
 *
 * @package lawfiz
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'lawfiz_customize_register' ) ) :
function lawfiz_customize_register( $wp_customize ) {

    // Add custom controls.
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-title-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/toggle-button/class-login-designer-toggle-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/radio-images/class-radio-image-control.php' );

    // Register the custom control type.
    $wp_customize->register_control_type( 'Lawfiz_Toggle_Control' );


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'lawfiz_site_title_callback',
            'fallback_refresh'    => false,
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'lawfiz_site_description_callback',
            'fallback_refresh'    => false, 
        ) );
    }

    // Display Site Title and Tagline
    $wp_customize->add_setting( 
        'lawfiz_display_site_title_tagline', 
        array(
            'default'           => true,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'lawfiz_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_display_site_title_tagline', 
        array(
            'label'       => esc_html__( 'Display Site Title and Tagline', 'lawfiz' ),
            'section'     => 'title_tagline',
            'type'        => 'lawfiz-toggle',
            'settings'    => 'lawfiz_display_site_title_tagline',
        ) 
    ));
}
endif;
add_action( 'customize_register', 'lawfiz_customize_register' );

//blog settings
get_template_part( 'inc/customizer/options/section-blog' );

//header settings
get_template_part( 'inc/customizer/options/section-header' );

//footer settings
get_template_part( 'inc/customizer/options/section-footer' );

//preloader settings
get_template_part( 'inc/customizer/options/section-preloader' );

//customizer helper
get_template_part( 'inc/customizer/customizer-helpers' );

//data sanitization
get_template_part( 'inc/customizer/data-sanitization' );



/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'lawfiz_enqueue_customizer_stylesheets' ) ) :
function lawfiz_enqueue_customizer_stylesheets() {
    wp_register_style( 'lawfiz-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/customizer.css', array(), '1.0.9', 'all' );
    wp_enqueue_style( 'lawfiz-customizer-css' );
    wp_enqueue_script( 'lawfiz-customizer-js', get_template_directory_uri(). '/inc/customizer/assets/js/customizer.js' , array('jquery'), false, true);
}
endif;
add_action( 'customize_controls_print_styles', 'lawfiz_enqueue_customizer_stylesheets' );