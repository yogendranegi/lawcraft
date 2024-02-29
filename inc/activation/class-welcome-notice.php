<?php

/**
 * Welcome Notice class.
 */
class Lawfiz_Welcome_Notice {

	/**
	** Constructor.
	*/
	public function __construct() {
		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// Render Notice
		add_action( 'admin_notices', [$this, 'render_notice'] );

		// Enque AJAX Script
		add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_scripts'], 5 );

		// Dismiss
		add_action( 'admin_enqueue_scripts', [$this, 'notice_enqueue_scripts'], 5 );
		add_action( 'wp_ajax_lawfiz_dismissed_handler', [$this, 'dismissed_handler'] );

		// Reset
		add_action( 'switch_theme', [$this, 'reset_notices'] );
		add_action( 'after_switch_theme', [$this, 'reset_notices'] );

		// Install Plugins
		add_action( 'wp_ajax_lawfiz_install_activate_spiraclethemes_site_library', [$this, 'install_activate_spiraclethemes_site_library'] );
		add_action( 'wp_ajax_nopriv_lawfiz_install_activate_spiraclethemes_site_library', [$this, 'install_activate_spiraclethemes_site_library'] );

	}


	/**
	** Get plugin status.
	*/
	public function get_plugin_status( $plugin_path ) {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		if ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin_path ) ) {
			return 'not_installed';
		} else {
			$plugin_updates = get_site_transient( 'update_plugins' );
			$plugin_needs_update = is_object($plugin_updates) ? array_key_exists($plugin_path, $plugin_updates->response) : false;

			if ( in_array( $plugin_path, (array) get_option( 'active_plugins', array() ), true ) || is_plugin_active_for_network( $plugin_path ) ) {
				return $plugin_needs_update ? 'active_update' : 'active';
			} else {
				return $plugin_needs_update ? 'inactive_update' : 'inactive';
			}	
		}
	}

	/**
	** Install a plugin.
	*/
	public function install_plugin( $plugin_slug ) {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}
		if ( ! class_exists( 'WP_Upgrader' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}

		if ( false === filter_var( $plugin_slug, FILTER_VALIDATE_URL ) ) {
			$api = plugins_api(
				'plugin_information',
				[
					'slug'   => $plugin_slug,
					'fields' => [
						'short_description' => false,
						'sections'          => false,
						'requires'          => false,
						'rating'            => false,
						'ratings'           => false,
						'downloaded'        => false,
						'last_updated'      => false,
						'added'             => false,
						'tags'              => false,
						'compatibility'     => false,
						'homepage'          => false,
						'donate_link'       => false,
					],
				]
			);

			$download_link = $api->download_link;
		} else {
			$download_link = $plugin_slug;
		}

		// Use AJAX upgrader skin instead of plugin installer skin.
		// ref: function wp_ajax_install_plugin().
		$upgrader = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );

		$install = $upgrader->install( $download_link );

		if ( false === $install ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	** Update a plugin.
	*/
	public function update_plugin( $plugin_path ) {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}
		if ( ! class_exists( 'WP_Upgrader' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}

		// Use AJAX upgrader skin instead of plugin installer skin.
		// ref: function wp_ajax_install_plugin().
		$upgrader = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );

		$upgrade = $upgrader->upgrade( $plugin_path );

		if ( false === $upgrade ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	** Update all plugins.
	*/
	public function update_all_plugins() {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}
		if ( ! class_exists( 'WP_Upgrader' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}

		// Use AJAX upgrader skin instead of plugin installer skin.
		// ref: function wp_ajax_install_plugin().
		$upgrader = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );

		$upgrade = $upgrader->bulk_upgrade([
			'spiraclethemes-site-library/spiraclethemes-site-library.php'
		]);

		if ( false === $upgrade ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	** Activate a plugin.
	*/
	public function activate_plugin( $plugin_path ) {

		if ( ! current_user_can( 'install_plugins' ) ) {
			return false;
		}

		$activate = activate_plugin( $plugin_path, '', false, false ); // TODO: last argument changed to false instead of true

		if ( is_wp_error( $activate ) ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	** Install Spiraclethemes Site Library
	*/
	public function install_activate_spiraclethemes_site_library() {
		check_ajax_referer( 'nonce', 'nonce' );

		if ( ! current_user_can( 'install_plugins' ) ) {
			wp_send_json_error( esc_html__( 'Insufficient permissions to install the plugin.', 'lawfiz' ) );
			wp_die();
		}

		$plugin_status = $this->get_plugin_status( 'spiraclethemes-site-library/spiraclethemes-site-library.php' );

		if ( 'not_installed' === $plugin_status ) {
			$this->install_plugin( 'spiraclethemes-site-library' );
			$this->activate_plugin( 'spiraclethemes-site-library/spiraclethemes-site-library.php' );

		} else {
			if ( 'inactive' === $plugin_status ) {
				$this->activate_plugin( 'spiraclethemes-site-library/spiraclethemes-site-library.php' );
			} elseif ( 'inactive_update' === $plugin_status || 'active_update' === $plugin_status ) {
				$this->update_plugin( 'spiraclethemes-site-library/spiraclethemes-site-library.php' );
				$this->activate_plugin( 'spiraclethemes-site-library/spiraclethemes-site-library.php' );
			}
		}

		if ( 'active' === $this->get_plugin_status( 'spiraclethemes-site-library/spiraclethemes-site-library.php' ) ) {
			wp_send_json_success();
		}

		wp_send_json_error( esc_html__( 'Failed to initialize or activate importer plugin.', 'lawfiz' ) );

		wp_die();
	}

	/**
	** Render Notice
	*/
	public function render_notice() {
		global $pagenow;

		$screen = get_current_screen();

		if ( 'spiraclethemes-site-library' !== $screen->parent_base ) {
			$transient_name = sprintf( '%s_activation_notice', get_template() );

			if ( ! get_transient( $transient_name ) ) {
				?>
				<div class="lawfiz-notice notice notice-success is-dismissible" data-notice="<?php echo esc_attr( $transient_name ); ?>">
					<button type="button" class="notice-dismiss"></button>

					<?php $this->render_notice_content(); ?>
				</div>
				<?php
			}
		}
	}

	/**
	** Render Notice Content
	*/
	public function render_notice_content() {
		$action = 'install-activate';
		$redirect_url = 'admin.php?page=one-click-demo-import';
		$sslibrary_status = $this->get_plugin_status( 'spiraclethemes-site-library/spiraclethemes-site-library.php' );
		
		if ('active' === $sslibrary_status ) {
			$action = 'default';
		}

		$screen = get_current_screen();
		$flex_attr = '';
		$display_attr = 'display: inline-block !important';

		if ( 'appearance_page_about-lawfiz' === $screen->id ) {
			$flex_attr = 'display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center';
			$display_attr = 'display: none !important';
		}

		?>

		<div class="welcome-message" style="<?php echo esc_attr($flex_attr); ?>">
			<h1 style="<?php echo esc_attr($display_attr); ?>"><?php esc_html_e('Welcome to Lawfiz WordPress theme', 'lawfiz'); ?></h1>
			<p>
				
				<?php esc_html_e( 'Easily Customize all aspects of your WordPress site with Lawfiz WordPress Theme & Elementor Page Builder.', 'lawfiz' ); ?>
			
			</p>
			
			<div class="action-buttons">
				<a href="<?php echo esc_url(admin_url($redirect_url)); ?>" class="getstarted-button" data-action="<?php echo esc_attr($action); ?>">
					<?php echo sprintf( esc_html__( 'Get Started with lawfiz %s', 'lawfiz' ), '<span class="dashicons dashicons-arrow-right-alt"></span>' ); ?>
				</a>
			</div>
		</div>

		<div class="image-wrap">
			<img src="<?php echo esc_url(get_template_directory_uri()) . '/inc/activation/img/welcome-banner.png'; ?>" alt="">
		</div>

		<?php
	}

	/**
	** Reset Notice.
	*/
	public function reset_notices() {
		delete_transient( sprintf( '%s_activation_notice', get_template() ) );
	}

	/**
	** Dismissed handler
	*/
	public function dismissed_handler() {
		wp_verify_nonce( null );

		if ( isset( $_POST['notice'] ) ) {
			set_transient( sanitize_text_field( wp_unslash( $_POST['notice'] ) ), true, 0 );
		}
	}

	/**
	** Notice Enqunue Scripts
	*/
	public function notice_enqueue_scripts( $page ) {
		
		wp_enqueue_script( 'jquery' );

		ob_start();
		?>
		<script>
			jQuery(function($) {
				$( document ).on( 'click', '.lawfiz-notice .notice-dismiss', function () {
					jQuery.post( 'ajax_url', {
						action: 'lawfiz_dismissed_handler',
						notice: $( this ).closest( '.lawfiz-notice' ).data( 'notice' ),
					});
					$( '.lawfiz-notice' ).hide();
				} );
			});
		</script>
		<?php
		$script = str_replace( 'ajax_url', admin_url( 'admin-ajax.php' ), ob_get_clean() );

		wp_add_inline_script( 'jquery', str_replace( ['<script>', '</script>'], '', $script ) );
	}

	/**
	** Register scripts and styles for welcome notice.
	*/
	public function admin_enqueue_scripts( $page ) {
		// Enqueue Scripts
		wp_enqueue_script( 'welcome-notic-js', get_template_directory_uri() . '/inc/activation/js/welcome-notice.js', ['jquery'], false, true );

		wp_localize_script( 'welcome-notic-js', 'lawfiz_localize', [
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'spiraclethemes_site_library_nonce' => wp_create_nonce( 'nonce' ),
			'failed_message' => esc_html__( 'Something went wrong, contact support.', 'lawfiz' ),
		] );

		// Enqueue Styles.
		wp_enqueue_style( 'welcome-notic-css', get_template_directory_uri() . '/inc/activation/css/welcome-notice.css' );
	}

}

new Lawfiz_Welcome_Notice();