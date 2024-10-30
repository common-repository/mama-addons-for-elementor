<?php
namespace MamaAddonsElementor;

/**
 * Class Plugin
 *
 * Mmaman Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}


	/** @var \Elementor\Elements_Manager $elements_manager */
	public function mama_category_registered($elements_manager){
		$categories = $elements_manager->get_categories();
		if (!key_exists('mama-elements',$categories)) {
			$elements_manager->add_category(
				'mama-elements',
				array(
					'title' => esc_html__('Mama Widgets', 'mama-elementor'),
					'icon'  => 'fa fa-plug'
				)
			);
		}
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_enqueue_style( 'mama-animate', MAMA_ASSETS_URL . 'css/animate.min.css', MAMA_VERSION );
		wp_enqueue_style( 'mama-bootstrap', MAMA_ASSETS_URL . 'css/bootstrap.min.css', MAMA_VERSION );
		wp_enqueue_style( 'mama-slick', MAMA_ASSETS_URL . 'css/slick.css', MAMA_VERSION );
		wp_enqueue_style( 'mama-style', MAMA_ASSETS_URL . 'css/style.css', MAMA_VERSION );
		wp_enqueue_style( 'mama-responsive', MAMA_ASSETS_URL . 'css/responsive.css', MAMA_VERSION );

		wp_enqueue_script( 'mama-bootstrap', MAMA_ASSETS_URL . 'js/bootstrap.min.js', array('jquery'),MAMA_VERSION, true );
		wp_enqueue_script( 'mama-chart', MAMA_ASSETS_URL . 'js/chart.min.js', array('jquery'),MAMA_VERSION, true );
		wp_enqueue_script( 'mama-slick', MAMA_ASSETS_URL . 'js/slick.min.js', array('jquery'),MAMA_VERSION, true );
		wp_enqueue_script( 'mama-scripts', MAMA_ASSETS_URL . 'js/scripts.js', array('jquery'), MAMA_VERSION, true );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( MAMA_PATH . '/widgets/hero-banner.php' );
		require_once( MAMA_PATH . '/widgets/about-us.php' );
		require_once( MAMA_PATH . '/widgets/icon-box.php' );
		require_once( MAMA_PATH . '/widgets/image-box.php' );
		require_once( MAMA_PATH . '/widgets/cta.php' );
		require_once( MAMA_PATH . '/widgets/contact-details.php' );
		require_once( MAMA_PATH . '/widgets/fancy-box.php' );
		require_once( MAMA_PATH . '/widgets/feature-lists.php' );
		require_once( MAMA_PATH . '/widgets/info-card.php' );
		require_once( MAMA_PATH . '/widgets/interactive-card.php' );
		require_once( MAMA_PATH . '/widgets/line-chart.php' );
		require_once( MAMA_PATH . '/widgets/round-chart.php' );
		require_once( MAMA_PATH . '/widgets/pricing-table.php' );
		require_once( MAMA_PATH . '/widgets/review.php' );
		require_once( MAMA_PATH . '/widgets/road-map.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', array(&$this, 'widget_scripts') );
        // Register Category
		add_action( 'elementor/elements/categories_registered', array(&$this, 'mama_category_registered') );
		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', array(&$this, 'register_widgets') );

	}
}

// Instantiate Plugin Class
Plugin::instance();
