<?php
/**
 * Theme Customizer Controls
 *
 * @package lawcraft
 */


if ( ! function_exists( 'lawcraft_customizer_blog_register' ) ) :
function lawcraft_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'lawcraft_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'lawcraft' ),
        )
    );

	// Section Posts
    $wp_customize->add_section(
        'lawcraft_posts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'lawcraft' ),
            'panel'          => 'lawcraft_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'lawcraft_label_post_category_show', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_post_category_show', 
		array(
		    'label'       => esc_html__( 'Posts Category', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'lawcraft_enable_posts_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_posts_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_posts_cat',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'lawcraft_label_post_meta_show', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_post_meta_show', 
		array(
		    'label'       => esc_html__( 'Posts Meta', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_post_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'lawcraft_enable_posts_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_posts_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_posts_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'lawcraft_enable_posts_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_posts_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_posts_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'lawcraft_enable_posts_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_posts_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_posts_meta_comments',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'lawcraft_label_post_meta_content_settings', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_post_meta_content_settings', 
		array(
		    'label'       => esc_html__( 'Posts Meta Text Settings', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_post_meta_content_settings',
		) 
	));

	// add Posted by textbox
    $wp_customize->add_setting(
        'lawcraft_post_posted_by_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Posted by', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_post_posted_by_text',
        array(
            'settings'      => 'lawcraft_post_posted_by_text',
            'section'       => 'lawcraft_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Posted by Text', 'lawcraft' ),
            'description'         => esc_html__( 'You can change the Author Posted by text displayed in the posts meta and blog posts meta', 'lawcraft' ),
        )
    );

	// add Posted on textbox
    $wp_customize->add_setting(
        'lawcraft_post_posted_on_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Posted on', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_post_posted_on_text',
        array(
            'settings'      => 'lawcraft_post_posted_on_text',
            'section'       => 'lawcraft_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Posted on Text', 'lawcraft' ),
            'description'         => esc_html__( 'You can change the Date Posted by text displayed in the posts meta and blog posts meta', 'lawcraft' ),
        )
    );

    // add comments textbox
    $wp_customize->add_setting(
        'lawcraft_post_comments_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Comments', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_post_comments_text',
        array(
            'settings'      => 'lawcraft_post_comments_text',
            'section'       => 'lawcraft_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Comments Text', 'lawcraft' ),
            'description'         => esc_html__( 'You can change the Comments text displayed in the posts meta and blog posts meta', 'lawcraft' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'lawcraft_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'lawcraft_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'lawcraft_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Lawcraft_Radio_Image_Control( $wp_customize,'lawcraft_blog_sidebar_layout',
            array(
                'settings'		=> 'lawcraft_blog_sidebar_layout',
                'section'		=> 'lawcraft_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'lawcraft' ),
                'choices'		=> array(
                    'right'	        => LAWCRAFT_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => LAWCRAFT_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => LAWCRAFT_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );


    // Title label
	$wp_customize->add_setting( 
		'lawcraft_label_blog_excerpt', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_blog_excerpt', 
		array(
		    'label'       => esc_html__( 'Post Excerpt', 'lawcraft' ),
		    'section'     => 'lawcraft_posts_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_blog_excerpt',
		) 
	));

	// add post excerpt textbox
    $wp_customize->add_setting(
        'lawcraft_posts_excerpt_length',
        array(
            'type' => 'theme_mod',
            'default'           => 70,
            'sanitize_callback' => 'lawcraft_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'lawcraft_posts_excerpt_length',
        array(
            'settings'      => 'lawcraft_posts_excerpt_length',
            'section'       => 'lawcraft_posts_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Excerpt Length', 'lawcraft' ),
        )
    );

    // add readmore textbox
    $wp_customize->add_setting(
        'lawcraft_posts_readmore_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'READ MORE', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_posts_readmore_text',
        array(
            'settings'      => 'lawcraft_posts_readmore_text',
            'section'       => 'lawcraft_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Read More Text', 'lawcraft' ),
        )
    );

    //=========================================================================

	// Section Single Post
    $wp_customize->add_section(
        'lawcraft_single_post_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'lawcraft' ),
            'panel'          => 'lawcraft_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'lawcraft_label_single_post_category_show', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_single_post_category_show', 
		array(
		    'label'       => esc_html__( 'Post Category', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_single_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'lawcraft_enable_single_post_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_single_post_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_single_post_cat',
		) 
	));

	// add category textbox
    $wp_customize->add_setting(
        'lawcraft_single_post_category_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_single_post_category_text',
        array(
            'settings'      => 'lawcraft_single_post_category_text',
            'section'       => 'lawcraft_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Category Text', 'lawcraft' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'lawcraft_label_single_post_tag_show', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_single_post_tag_show', 
		array(
		    'label'       => esc_html__( 'Post Tags', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_single_post_tag_show',
		) 
	));

	// Add an option to enable the tags
	$wp_customize->add_setting( 
		'lawcraft_enable_single_post_tags', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_single_post_tags', 
		array(
		    'label'       => esc_html__( 'Show Tags', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_single_post_tags',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'lawcraft_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_single_pos_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'lawcraft_enable_single_post_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_single_post_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_single_post_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'lawcraft_enable_single_post_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_single_post_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_single_post_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'lawcraft_enable_single_post_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_single_post_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_single_post_meta_comments',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'lawcraft_label_single_post_content_settings', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_single_post_content_settings', 
		array(
		    'label'       => esc_html__( 'Text Settings', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_single_post_content_settings',
		) 
	));

	// add Posted by textbox
    $wp_customize->add_setting(
        'lawcraft_single_post_posted_by_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Posted by', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_single_post_posted_by_text',
        array(
            'settings'      => 'lawcraft_single_post_posted_by_text',
            'section'       => 'lawcraft_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Posted by Text', 'lawcraft' ),
            'description'         => esc_html__( 'You can change the Author Posted by text displayed in the single posts meta and blog posts meta', 'lawcraft' ),
        )
    );

    // add Posted on textbox
    $wp_customize->add_setting(
        'lawcraft_single_post_posted_on_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Posted on', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_single_post_posted_on_text',
        array(
            'settings'      => 'lawcraft_single_post_posted_on_text',
            'section'       => 'lawcraft_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Posted on Text', 'lawcraft' ),
            'description'         => esc_html__( 'You can change the Date Posted by text displayed in the single posts meta and blog posts meta', 'lawcraft' ),
        )
    );

    // add comments textbox
    $wp_customize->add_setting(
        'lawcraft_single_post_comments_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Comments', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_single_post_comments_text',
        array(
            'settings'      => 'lawcraft_single_post_comments_text',
            'section'       => 'lawcraft_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Comments Text', 'lawcraft' ),
            'description'         => esc_html__( 'You can change the Comments text displayed in the single posts meta and blog posts meta', 'lawcraft' ),
        )
    );

    // add next article textbox
    $wp_customize->add_setting(
        'lawcraft_single_post_next_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Next Article', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_single_post_next_article_text',
        array(
            'settings'      => 'lawcraft_single_post_next_article_text',
            'section'       => 'lawcraft_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Next Article Text', 'lawcraft' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'lawcraft' ),
        )
    );

    // add previous article textbox
    $wp_customize->add_setting(
        'lawcraft_single_post_previous_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Previous Article', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_single_post_previous_article_text',
        array(
            'settings'      => 'lawcraft_single_post_previous_article_text',
            'section'       => 'lawcraft_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Previous Article Text', 'lawcraft' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'lawcraft' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'lawcraft_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'lawcraft_blog_single_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'lawcraft_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Lawcraft_Radio_Image_Control( $wp_customize,'lawcraft_blog_single_sidebar_layout',
            array(
                'settings'		=> 'lawcraft_blog_single_sidebar_layout',
                'section'		=> 'lawcraft_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'lawcraft' ),
                'choices'		=> array(
                    'right'	        => LAWCRAFT_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => LAWCRAFT_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => LAWCRAFT_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

    //single post width options
    $wp_customize->add_setting(
        'lawcraft_single_post_width',
        array(
            'type' => 'theme_mod',
            'default'           => 65,
            'sanitize_callback' => 'lawcraft_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'lawcraft_single_post_width',
        array(
            'settings'      => 'lawcraft_single_post_width',
            'section'       => 'lawcraft_single_post_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Layout Width (%)', 'lawcraft' ),
            'description'   => esc_html__( 'Default is 65', 'lawcraft' ),
            'active_callback' => 'lawcraft_single_post_no_sidebar_enable_full_width_disable',
        )
    );
    

    // full width single post
    $wp_customize->add_setting( 
		'lawcraft_enable_single_post_full_width', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_single_post_full_width', 
		array(
		    'label'       => esc_html__( 'Show Full Width Post', 'lawcraft' ),
		    'section'     => 'lawcraft_single_post_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_single_post_full_width',
		    'active_callback'  => 'lawcraft_single_post_no_sidebar_enable',
		) 
	));

	//=========================================================================

	// Section archive Post
    $wp_customize->add_section(
        'lawcraft_archive_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Archives', 'lawcraft' ),
            'panel'          => 'lawcraft_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'lawcraft_label_category_archives_show', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_category_archives_show', 
		array(
		    'label'       => esc_html__( 'Category Archives', 'lawcraft' ),
		    'section'     => 'lawcraft_archive_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_category_archives_show',
		) 
	));

	// Add an option to enable the category archive settings
	$wp_customize->add_setting( 
		'lawcraft_enable_cat_archive_settings', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawcraft_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Toggle_Control( $wp_customize, 'lawcraft_enable_cat_archive_settings', 
		array(
		    'label'       => esc_html__( 'Show Category Title Options', 'lawcraft' ),
		    'section'     => 'lawcraft_archive_settings',
		    'type'        => 'lawcraft-toggle',
		    'settings'    => 'lawcraft_enable_cat_archive_settings',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'lawcraft_label_category_archives_title_show', 
		array(
		    'sanitize_callback' => 'lawcraft_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawcraft_Title_Info_Control( $wp_customize, 'lawcraft_label_category_archives_title_show', 
		array(
		    'label'       => esc_html__( 'Category Title Settings', 'lawcraft' ),
		    'section'     => 'lawcraft_archive_settings',
		    'type'        => 'lawcraft-title',
		    'settings'    => 'lawcraft_label_category_archives_title_show',
		    'active_callback'  => 'lawcraft_cat_archive_enable',
		) 
	));

	// add category title textbox
    $wp_customize->add_setting(
        'lawcraft_cat_archive_title_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'lawcraft' ),
            'sanitize_callback' => 'lawcraft_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawcraft_cat_archive_title_text',
        array(
            'settings'      => 'lawcraft_cat_archive_title_text',
            'section'       => 'lawcraft_archive_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Text Before Title', 'lawcraft' ),
            'active_callback'  => 'lawcraft_cat_archive_enable',
        )
    );

    $wp_customize->add_setting( 
        'lawcraft_label_cat_archive_title_info_settings', 
        array(
            'sanitize_callback' => 'lawcraft_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Lawcraft_Info_Control( $wp_customize, 'lawcraft_label_cat_archive_title_info_settings', 
        array(
            'label'       => esc_html__( "If you do not see any changes in preview after changing options then click on publish button and then refresh the page again. ", 'lawcraft' ),
            'section'     => 'lawcraft_archive_settings',
            'type'        => 'lawcraft-title',
            'settings'    => 'lawcraft_label_cat_archive_title_info_settings',
        ) 
    ));

}
endif;

add_action( 'customize_register', 'lawcraft_customizer_blog_register' );