<?php

namespace WpFireGutenburg;

/**
 * Class IceBlock
 *
 * @package WpIceGutenburg
 */
class IceBlock {

	/**
	 * IceBlock constructor.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'register_block' ], 20 );
	}

	/**
	 * Register block type.
	 *
	 * @return void
	 */
	public function register_block() {
		$this->register_scripts();

		register_block_type(
			'wp-ice-gutenburg/ice-block',
			[
				'editor_script' => 'wp-ice-block-editor-script',
				'editor_style'  => 'wp-fire-block-editor-style',
				'style'         => 'wp-fire-block-frontend-style',
			]
		);
	}

	/**
	 * Register scripts.
	 *
	 * @return void
	 */
	public function register_scripts() {
		// IceBlock editor script.
		wp_register_script(
			'wp-ice-block-editor-script',
			FIRE_GUTENBURG_URL . '/build/index.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components' ],
			filemtime( FIRE_GUTENBURG_PATH . '/build/index.js' )
		);
	}
}
