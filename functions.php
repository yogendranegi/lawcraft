	<?php
2	/**
3	 * lawcraft functions and definitions.
4	 *
5	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
6	 *
7	 * @package lawcraft
8	 */
9	
10	/**
11	 *  Defining Constants
12	 */
13	
14	// Core Constants
15	define('LAWCRAFT_REQUIRED_PHP_VERSION', '5.6' );
16	define('LAWCRAFT_DIR_PATH', get_template_directory());
17	define('LAWCRAFT_DIR_URI', get_template_directory_uri());
18	define('LAWCRAFT_THEME_AUTH','#');
19	define('LAWCRAFT_THEME_URL','#');
20	define('LAWCRAFT_THEME_PRO_URL','#');
21	define('LAWCRAFT_THEME_DOC_URL','#');
22	define('LAWCRAFT_THEME_VIDEOS_URL','#');
23	define('LAWCRAFT_THEME_SUPPORT_URL','https://wordpress.org/support/theme/lawcraft/');
24	define('LAWCRAFT_THEME_RATINGS_URL','https://wordpress.org/support/theme/lawcraft/reviews/');
25	define('LAWCRAFT_THEME_CHANGELOGS_URL','https://themes.trac.wordpress.org/log/lawcraft/');
26	define('LAWCRAFT_THEME_CONTACT_URL','#');
27	
28	
29	// Register Custom Navigation Walker
30	//require_once(get_template_directory() .'/inc/wp_bootstrap_navwalker.php');
31	
32	//Register Required plugin
33	//require_once(get_template_directory() .'/inc/class-tgm-plugin-activation.php');
34	
35	/**
36	* Check for minimum PHP version requirement
37	*
38	*/
39	function lawcraft_check_theme_setup( $oldtheme_name, $oldtheme ){
40	        // Compare versions.
41	        if ( version_compare(phpversion(), LAWCRAFT_REQUIRED_PHP_VERSION, '<') ) :
42	        // Theme not activated info message.
43	        add_action( 'admin_notices', 'lawcraft_php_admin_notice' );
44	        function lawcraft_php_admin_notice() {
45	                ?>
46	                        <div class="update-nag">
47	                                <?php esc_html_e( 'You need to update your PHP version to a minimum of 5.6 to run LawCraft WordPress Theme.', 'lawyer' ); ?> <br />
48	                                <?php esc_html_e( 'Actual version is:', 'lawyer' ) ?> <strong><?php echo phpversion(); ?></strong>, <?php esc_html_e( 'required is', 'lawyer' ) ?> <strong><?php echo LAWCRAFT_REQUIRED_PHP_VERSION; ?></strong>
49	                        </div>
50	                <?php
51	        }
52	        // Switch back to previous theme.
53	        switch_theme( $oldtheme->stylesheet );
54	                return false;
55	        endif;
56	}
57	add_action( 'after_switch_theme', 'lawcraft_check_theme_setup', 10, 2  );
58	
59	if ( ! function_exists( 'lawcraft_setup' ) ) :
60	/**
61	 * Sets up theme defaults and registers support for various WordPress features.
62	 *
63	 * Note that this function is hooked into the after_setup_theme hook, which
64	 * runs before the init hook. The init hook is too late for some features, such
65	 * as indicating support for post thumbnails.
66	 */
67	function lawcraft_setup() {
68	        /*
69	         * Make theme available for translation.
70	         * Translations can be filed in the /languages/ directory.
71	         * If you're building a theme based on lawcraft, use a find and replace
72	         * to change 'lawcraft' to the name of your theme in all the template files.
73	         */
74	        load_theme_textdomain( 'lawcraft', get_template_directory() . '/languages' );
75	
76	        // Add default posts and comments RSS feed links to head.
77	        add_theme_support( 'automatic-feed-links' );
78	
79	        /*
80	         * Let WordPress manage the document title.
81	         * By adding theme support, we declare that this theme does not use a
82	         * hard-coded <title> tag in the document head, and expect WordPress to
83	         * provide it for us.
84	         */
85	        add_theme_support( 'title-tag' );
86	
87	        /*
88	         * Enable support for Post Thumbnails on posts and pages.
89	         *
90	         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
91	         */
92	        add_theme_support( 'post-thumbnails' );
93	
94	        // This theme uses wp_nav_menu() in one location.
95	        register_nav_menus( array(
96	                'primary' => esc_html__( 'Primary', 'lawcraft' ),
97	        ) );
98	
99	        /*
100	         * Switch default core markup for search form, comment form, and comments
101	         * to output valid HTML5.
102	         */
103	        add_theme_support( 'html5', array(             
104	                'comment-form',
105	                'comment-list',
106	                'gallery',
107	                'caption',
108	        ) );
109	
110	        // Gallery post format
111	        add_theme_support( 'post-formats', array( 'gallery' ));
112	
113	        // Add theme support for selective refresh for widgets.
114	        add_theme_support( 'customize-selective-refresh-widgets' );
115	
116	        // Remove theme support for new widgets block editor
117	        remove_theme_support( 'widgets-block-editor' );
118	
119	        /**
120	         * Lawcraft theme info
121	         */
122	        //require get_template_directory() . '/inc/theme-info.php';
123	
124	        /*
125	        * About page instance
126	        */
127	        
            /*
            $config = array();
128	        //LawCraft_About_Page::lawcraft_init( $config );
129	
130	        if ( is_customize_preview() ) {
131	                require get_template_directory() . '/inc/starter-content.php';
132	                add_theme_support( 'starter-content', lawcraft_get_starter_content() );
133	        }
            */
134	
135	}
136	endif;
137	add_action( 'after_setup_theme', 'lawcraft_setup' );
