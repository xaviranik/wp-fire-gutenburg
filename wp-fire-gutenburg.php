<?php
/**
 * Plugin Name: WP Fire Gutenburg
 * Description: Custom gutenberg blocks
 * URI: https://zabiranik.com
 * Author: Zabir Anik
 * Author URI: https://zabiranik.com
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-fire-gutenburg
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * FireGutenburg Class.
 */
final class FireGutenburg {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	private $version = '1.0.0';

	/**
	 * FireGutenburg Constructor.
	 */
	public function __construct() {
		// Defines constants.
		$this->define_constants();

		// Initialize the plugin.
		add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
	}

	/**
	 * Define plugin constants.
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'FIRE_GUTENBURG_VERSION', $this->version );
		define( 'FIRE_GUTENBURG_FILE', __FILE__ );
		define( 'FIRE_GUTENBURG_PATH', dirname( FIRE_GUTENBURG_FILE ) );
		define( 'FIRE_GUTENBURG_INCLUDES', FIRE_GUTENBURG_PATH . '/includes' );
		define( 'FIRE_GUTENBURG_URL', plugins_url( '', FIRE_GUTENBURG_FILE ) );
		define( 'FIRE_GUTENBURG_ASSETS', FIRE_GUTENBURG_URL . '/assets' );
	}

	/**
	 * Initializes the FireGutenburg class.
	 *
	 * Checks for an existing FireGutenburg instance
	 * and if it doesn't find one, creates it.
	 *
	 * @return FireGutenburg
	 */
	public static function instance() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Initialize the plugin.
	 *
	 * @return void
	 */
	public function init_plugin() {
		new WpFireGutenburg\FireBlock();
		new WpFireGutenburg\IceBlock();
	}
}

/**
 * Return the instance.
 *
 * @return FireGutenburg
 */
function fireGutenburg() {
	return FireGutenburg::instance();
}

// let's get started
fireGutenburg();
