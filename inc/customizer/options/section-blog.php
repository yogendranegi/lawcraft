<?php
/**
 * Theme Customizer Controls
 *
 * @package lawfiz
 */


if ( ! function_exists( 'lawfiz_customizer_blog_register' ) ) :
function lawfiz_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'lawfiz_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'lawfiz' ),
        )
    );

	// Section Posts
    $wp_customize->add_section(
        'lawfiz_posts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'lawfiz' ),
            'panel'          => 'lawfiz_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'lawfiz_label_post_category_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_post_category_show', 
		array(
		    'label'       => esc_html__( 'Posts Category', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'lawfiz_enable_posts_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_posts_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_posts_cat',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'lawfiz_label_post_meta_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_post_meta_show', 
		array(
		    'label'       => esc_html__( 'Posts Meta', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_post_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'lawfiz_enable_posts_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_posts_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_posts_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'lawfiz_enable_posts_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_posts_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_posts_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'lawfiz_enable_posts_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_posts_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_posts_meta_comments',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'lawfiz_label_post_meta_content_settings', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_post_meta_content_settings', 
		array(
		    'label'       => esc_html__( 'Posts Meta Text Settings', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_post_meta_content_settings',
		) 
	));

	// add Posted by textbox
    $wp_customize->add_setting(
        'lawfiz_post_posted_by_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Posted by', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_post_posted_by_text',
        array(
            'settings'      => 'lawfiz_post_posted_by_text',
            'section'       => 'lawfiz_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Posted by Text', 'lawfiz' ),
            'description'         => esc_html__( 'You can change the Author Posted by text displayed in the posts meta and blog posts meta', 'lawfiz' ),
        )
    );

	// add Posted on textbox
    $wp_customize->add_setting(
        'lawfiz_post_posted_on_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Posted on', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_post_posted_on_text',
        array(
            'settings'      => 'lawfiz_post_posted_on_text',
            'section'       => 'lawfiz_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Posted on Text', 'lawfiz' ),
            'description'         => esc_html__( 'You can change the Date Posted by text displayed in the posts meta and blog posts meta', 'lawfiz' ),
        )
    );

    // add comments textbox
    $wp_customize->add_setting(
        'lawfiz_post_comments_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Comments', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_post_comments_text',
        array(
            'settings'      => 'lawfiz_post_comments_text',
            'section'       => 'lawfiz_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Comments Text', 'lawfiz' ),
            'description'         => esc_html__( 'You can change the Comments text displayed in the posts meta and blog posts meta', 'lawfiz' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'lawfiz_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'lawfiz_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'lawfiz_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Lawfiz_Radio_Image_Control( $wp_customize,'lawfiz_blog_sidebar_layout',
            array(
                'settings'		=> 'lawfiz_blog_sidebar_layout',
                'section'		=> 'lawfiz_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'lawfiz' ),
                'choices'		=> array(
                    'right'	        => LAWFIZ_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => LAWFIZ_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => LAWFIZ_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );


    // Title label
	$wp_customize->add_setting( 
		'lawfiz_label_blog_excerpt', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_blog_excerpt', 
		array(
		    'label'       => esc_html__( 'Post Excerpt', 'lawfiz' ),
		    'section'     => 'lawfiz_posts_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_blog_excerpt',
		) 
	));

	// add post excerpt textbox
    $wp_customize->add_setting(
        'lawfiz_posts_excerpt_length',
        array(
            'type' => 'theme_mod',
            'default'           => 70,
            'sanitize_callback' => 'lawfiz_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'lawfiz_posts_excerpt_length',
        array(
            'settings'      => 'lawfiz_posts_excerpt_length',
            'section'       => 'lawfiz_posts_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Excerpt Length', 'lawfiz' ),
        )
    );

    // add readmore textbox
    $wp_customize->add_setting(
        'lawfiz_posts_readmore_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'READ MORE', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_posts_readmore_text',
        array(
            'settings'      => 'lawfiz_posts_readmore_text',
            'section'       => 'lawfiz_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Read More Text', 'lawfiz' ),
        )
    );

    //=========================================================================

	// Section Single Post
    $wp_customize->add_section(
        'lawfiz_single_post_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'lawfiz' ),
            'panel'          => 'lawfiz_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'lawfiz_label_single_post_category_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_single_post_category_show', 
		array(
		    'label'       => esc_html__( 'Post Category', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_single_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'lawfiz_enable_single_post_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_single_post_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_single_post_cat',
		) 
	));

	// add category textbox
    $wp_customize->add_setting(
        'lawfiz_single_post_category_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_single_post_category_text',
        array(
            'settings'      => 'lawfiz_single_post_category_text',
            'section'       => 'lawfiz_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Category Text', 'lawfiz' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'lawfiz_label_single_post_tag_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_single_post_tag_show', 
		array(
		    'label'       => esc_html__( 'Post Tags', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_single_post_tag_show',
		) 
	));

	// Add an option to enable the tags
	$wp_customize->add_setting( 
		'lawfiz_enable_single_post_tags', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_single_post_tags', 
		array(
		    'label'       => esc_html__( 'Show Tags', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_single_post_tags',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'lawfiz_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_single_pos_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'lawfiz_enable_single_post_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_single_post_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_single_post_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'lawfiz_enable_single_post_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_single_post_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_single_post_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'lawfiz_enable_single_post_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_single_post_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_single_post_meta_comments',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'lawfiz_label_single_post_content_settings', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_single_post_content_settings', 
		array(
		    'label'       => esc_html__( 'Text Settings', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_single_post_content_settings',
		) 
	));

	// add Posted by textbox
    $wp_customize->add_setting(
        'lawfiz_single_post_posted_by_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Posted by', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_single_post_posted_by_text',
        array(
            'settings'      => 'lawfiz_single_post_posted_by_text',
            'section'       => 'lawfiz_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Posted by Text', 'lawfiz' ),
            'description'         => esc_html__( 'You can change the Author Posted by text displayed in the single posts meta and blog posts meta', 'lawfiz' ),
        )
    );

    // add Posted on textbox
    $wp_customize->add_setting(
        'lawfiz_single_post_posted_on_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Posted on', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_single_post_posted_on_text',
        array(
            'settings'      => 'lawfiz_single_post_posted_on_text',
            'section'       => 'lawfiz_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Posted on Text', 'lawfiz' ),
            'description'         => esc_html__( 'You can change the Date Posted by text displayed in the single posts meta and blog posts meta', 'lawfiz' ),
        )
    );

    // add comments textbox
    $wp_customize->add_setting(
        'lawfiz_single_post_comments_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Comments', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_single_post_comments_text',
        array(
            'settings'      => 'lawfiz_single_post_comments_text',
            'section'       => 'lawfiz_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Comments Text', 'lawfiz' ),
            'description'         => esc_html__( 'You can change the Comments text displayed in the single posts meta and blog posts meta', 'lawfiz' ),
        )
    );

    // add next article textbox
    $wp_customize->add_setting(
        'lawfiz_single_post_next_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Next Article', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_single_post_next_article_text',
        array(
            'settings'      => 'lawfiz_single_post_next_article_text',
            'section'       => 'lawfiz_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Next Article Text', 'lawfiz' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'lawfiz' ),
        )
    );

    // add previous article textbox
    $wp_customize->add_setting(
        'lawfiz_single_post_previous_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Previous Article', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_single_post_previous_article_text',
        array(
            'settings'      => 'lawfiz_single_post_previous_article_text',
            'section'       => 'lawfiz_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Previous Article Text', 'lawfiz' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'lawfiz' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'lawfiz_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'lawfiz_blog_single_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'lawfiz_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Lawfiz_Radio_Image_Control( $wp_customize,'lawfiz_blog_single_sidebar_layout',
            array(
                'settings'		=> 'lawfiz_blog_single_sidebar_layout',
                'section'		=> 'lawfiz_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'lawfiz' ),
                'choices'		=> array(
                    'right'	        => LAWFIZ_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => LAWFIZ_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => LAWFIZ_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

    //single post width options
    $wp_customize->add_setting(
        'lawfiz_single_post_width',
        array(
            'type' => 'theme_mod',
            'default'           => 65,
            'sanitize_callback' => 'lawfiz_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'lawfiz_single_post_width',
        array(
            'settings'      => 'lawfiz_single_post_width',
            'section'       => 'lawfiz_single_post_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Layout Width (%)', 'lawfiz' ),
            'description'   => esc_html__( 'Default is 65', 'lawfiz' ),
            'active_callback' => 'lawfiz_single_post_no_sidebar_enable_full_width_disable',
        )
    );

    // full width single post
    $wp_customize->add_setting( 
		'lawfiz_enable_single_post_full_width', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_single_post_full_width', 
		array(
		    'label'       => esc_html__( 'Show Full Width Post', 'lawfiz' ),
		    'section'     => 'lawfiz_single_post_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_single_post_full_width',
		    'active_callback'  => 'lawfiz_single_post_no_sidebar_enable',
		) 
	));



	//=========================================================================

	// Section archive Post
    $wp_customize->add_section(
        'lawfiz_archive_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Archives', 'lawfiz' ),
            'panel'          => 'lawfiz_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'lawfiz_label_category_archives_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_category_archives_show', 
		array(
		    'label'       => esc_html__( 'Category Archives', 'lawfiz' ),
		    'section'     => 'lawfiz_archive_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_category_archives_show',
		) 
	));

	// Add an option to enable the category archive settings
	$wp_customize->add_setting( 
		'lawfiz_enable_cat_archive_settings', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'lawfiz_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Toggle_Control( $wp_customize, 'lawfiz_enable_cat_archive_settings', 
		array(
		    'label'       => esc_html__( 'Show Category Title Options', 'lawfiz' ),
		    'section'     => 'lawfiz_archive_settings',
		    'type'        => 'lawfiz-toggle',
		    'settings'    => 'lawfiz_enable_cat_archive_settings',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'lawfiz_label_category_archives_title_show', 
		array(
		    'sanitize_callback' => 'lawfiz_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Lawfiz_Title_Info_Control( $wp_customize, 'lawfiz_label_category_archives_title_show', 
		array(
		    'label'       => esc_html__( 'Category Title Settings', 'lawfiz' ),
		    'section'     => 'lawfiz_archive_settings',
		    'type'        => 'lawfiz-title',
		    'settings'    => 'lawfiz_label_category_archives_title_show',
		    'active_callback'  => 'lawfiz_cat_archive_enable',
		) 
	));

	// add category title textbox
    $wp_customize->add_setting(
        'lawfiz_cat_archive_title_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'lawfiz' ),
            'sanitize_callback' => 'lawfiz_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'lawfiz_cat_archive_title_text',
        array(
            'settings'      => 'lawfiz_cat_archive_title_text',
            'section'       => 'lawfiz_archive_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Text Before Title', 'lawfiz' ),
            'active_callback'  => 'lawfiz_cat_archive_enable',
        )
    );

    $wp_customize->add_setting( 
        'lawfiz_label_cat_archive_title_info_settings', 
        array(
            'sanitize_callback' => 'lawfiz_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Lawfiz_Info_Control( $wp_customize, 'lawfiz_label_cat_archive_title_info_settings', 
        array(
            'label'       => esc_html__( "If you do not see any changes in preview after changing options then click on publish button and then refresh the page again. ", 'lawfiz' ),
            'section'     => 'lawfiz_archive_settings',
            'type'        => 'lawfiz-title',
            'settings'    => 'lawfiz_label_cat_archive_title_info_settings',
        ) 
    ));

}
endif;

add_action( 'customize_register', 'lawfiz_customizer_blog_register' );