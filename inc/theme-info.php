<?php
/**
 * Theme information lawcraft
 *
 * @package lawcraft
 */




 define('LAWCRAFT_THEME_URL','https://spiraclethemes.com/lawcraft-theme/');
 define('LAWCRAFT_THEME_PRO_URL','https://spiraclethemes.com/lawcraft-theme/');
 define('LAWCRAFT_THEME_DOC_URL','https://spiraclethemes.com/lawcraft-theme/');
 define('LAWCRAFT_THEME_VIDEOS_URL','https://spiraclethemes.com/lawcraft-theme/');
 define('LAWCRAFT_THEME_SUPPORT_URL','https://wordpress.org/support/theme/lawcraft/');
 define('LAWCRAFT_THEME_RATINGS_URL','https://wordpress.org/support/theme/lawcraft/reviews/');
 define('LAWCRAFT_THEME_CHANGELOGS_URL','https://themes.trac.wordpress.org/log/lawcraft/');
 define('LAWCRAFT_THEME_CONTACT_URL','https://spiraclethemes.com/contact/');
 


if ( ! class_exists( 'Lawcraft_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Lawcraft_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Lawcraft_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Lawcraft_About_Page
		 *
		 * @var Lawcraft_About_Page $instance The Lawcraft_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Lawcraft_About_Page instance.
		 *
		 * We make sure that only one instance of Lawcraft_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function lawcraft_init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Lawcraft_About_Page ) ) {
				self::$instance = new Lawcraft_About_Page;				
				self::$instance->config = $config;
				self::$instance->lawcraft_setup_config();	
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function lawcraft_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
				
		}	
	}
}


/**
 *  Adding a About page 
 */
add_action('admin_menu', 'lawcraft_add_menu');

function lawcraft_add_menu() {
     add_theme_page(esc_html__('About Law Craft Theme','lawcraft'), esc_html__('LawCraft Info','lawcraft'),'manage_options', esc_html__('lawcraft-theme-info','lawcraft'), esc_html__('lawcraft_theme_info','lawcraft'));
}

/**
 *  Callback
 */
function lawcraft_theme_info() {
	$theme = wp_get_theme();
?>
	<div class="theme-info">
		<div class="top-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<h1><?php esc_html_e( 'LawCraft WordPress Theme', 'lawcraft' ); ?> <span><?php echo $theme->get( 'Version' ); ?></span> </h1>
							<p><?php esc_html_e( 'Easy to use, fast and SEO Optimzed WordPress theme for lawyer websites', 'lawcraft' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="middle-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="quick-links">
							<h2><?php esc_html_e( 'Quick Customizer Settings', 'lawcraft' ); ?> </h2>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-format-image"></span>
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=custom_logo')) ?>"> <?php esc_html_e( 'Upload Logo', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-admin-tools"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=colon_header_settings_panel')) ?>"> <?php esc_html_e( 'Header Settings', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-admin-customizer"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_site_primary_color')) ?>"> <?php esc_html_e( 'Color Settings', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-grid-view"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_layout_content_width_settings')) ?>"> <?php esc_html_e( 'Layout Settings', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-media-default"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_enable_page_title')) ?>"> <?php esc_html_e( 'Page Settings', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-columns"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_footer_copyright_text')) ?>"> <?php esc_html_e( 'Footer Settings', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-image-filter"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_enable_preloader')) ?>"> <?php esc_html_e( 'Preloader Settings', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-edit-large"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=colon_blog_settings_panel')) ?>"> <?php esc_html_e( 'Blog Settings', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-admin-generic"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_enable_block_styles')) ?>"> <?php esc_html_e( 'Misc Settings', 'lawcraft' ); ?> </a>
										</h3>
									</div>
								</div>
							</div>
						</div>

						<div class="comp-box">
							<center><h2 class="table-heading"><?php esc_html_e( 'Why should you Upgrade to our PRO Addon ?', 'lawcraft' ); ?></h2></center>
							<div class="comp-table">
								<table>
									<thead> 
										<tr> 
										 	<td class="thead-column1"><strong><h4><?php esc_html_e( 'Feature', 'lawcraft' ); ?></h4></strong></td>
											<td class="thead-column2"><strong><h4><?php esc_html_e( 'LawCraft Free', 'lawcraft' ); ?></h4></strong></td>
											<td class="thead-column3"><strong><h4><?php esc_html_e( 'Pro Addon Plugin', 'lawcraft' ); ?></h4></strong></td>
										</tr> 
									</thead>
									<tbody>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Customizer Theme Options', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Custom Widgets', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Top Bar', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Preloader Option', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Breadcrumbs display', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Menu Button', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Layout Width Settings', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Page Sidebar', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Blog Sidebar', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Transparent Header', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Responsive Design', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'RTL Support', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Footer Columns (1,2,3,4)', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Sidebar Options (Full, Left and Right)', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( '1 Click Demo Import', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Color Settings', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><?php esc_html_e( 'Limited', 'lawcraft' ); ?></td>
						 					<td class="tbody-column3"><?php esc_html_e( 'Extended', 'lawcraft' ); ?></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( '800+ Google Fonts', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Social Sharing Icons', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Author Details in Single Post', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Author Widget with Social Icons', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'WooCommerce', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Menu Cart', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Sticky Header', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Header Styles', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Related Posts', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Top Bar Extra Settings', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Blog Extra Settings', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Header Slider', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Header Search', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Social Icons', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Popular Posts Widget', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Performance Settings', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Footer Credits Editor', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Extra PRO Demos', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Priority Support', 'lawcraft' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr> 
										<tr class="last-row"> 
						 					<td class="tbody-column1"></td>
						 					<td class="tbody-column2"></td>
						 					<td class="tbody-column3"><a class="button button-primary button-large" href="<?php echo esc_url(LAWCRAFT_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'Upgrade to PRO', 'lawcraft' ); ?></a></td>
										</tr> 
					   				</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-3 sidebar-right">
						<div class="sidebar">
							<div class="section-box first">
								<div class="icon">
									<span class="dashicons dashicons-visibility"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(LAWCRAFT_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DEMOS', 'lawcraft' ); ?></a></h3>
								</div>	
							</div>	

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-star-filled"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(LAWCRAFT_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'RATE OUR THEME', 'lawcraft' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-format-aside"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(LAWCRAFT_THEME_DOC_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DOCUMENTATION', 'lawcraft' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-video-alt2"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(LAWCRAFT_THEME_VIDEOS_URL); ?>" target="_blank"><?php esc_html_e( 'VIDEO TUTORIALS', 'lawcraft' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-sos"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(LAWCRAFT_THEME_SUPPORT_URL); ?>" target="_blank"><?php esc_html_e( 'ASK FOR SUPPORT', 'lawcraft' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-admin-tools"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(LAWCRAFT_THEME_CHANGELOGS_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW CHANGELOGS', 'lawcraft' ); ?></a></h3>
								</div>						
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<div class="review-content">
								<p><?php esc_html_e( ' Please ', 'lawcraft' )  ?>
									<a href="<?php echo esc_url(LAWCRAFT_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'rate our theme', 'lawcraft' ); ?></a>
									<span>★★★★★</span>
									<?php esc_html_e( ' to help us spread the word. Thank you from the Spiracle Themes team!', 'lawcraft' ); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
<?php
}
