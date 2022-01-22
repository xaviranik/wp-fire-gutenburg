<?php

namespace WpFireGutenburg;

/**
 * Gutenberg Block Initialization.
 *
 * @package WpFireGutenburg
 */
class Block {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'register_block' ] );
	}

	/**
	 * Register block type.
	 *
	 * @return void
	 */
	public function register_block() {
		$this->register_scripts();

		register_block_type(
			'wp-fire-gutenburg/fire-block',
			[
				'editor_script' => 'wp-fire-block-editor-script',
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
		// Block frontend style.
		wp_register_style(
			'wp-fire-block-frontend-style',
			FIRE_GUTENBURG_URL . '/assets/css/style.css',
			[ 'wp-edit-blocks' ],
			filemtime( FIRE_GUTENBURG_PATH . '/assets/css/style.css' )
		);

		// Block editor style.
		wp_register_style(
			'wp-fire-block-editor-style',
			FIRE_GUTENBURG_URL . '/assets/css/editor.css',
			[ 'wp-edit-blocks' ],
			filemtime( FIRE_GUTENBURG_PATH . '/assets/css/editor.css' )
		);

		// Block editor script.
		wp_register_script(
			'wp-fire-block-editor-script',
			FIRE_GUTENBURG_URL . '/assets/js/fire-block.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components' ],
			filemtime( FIRE_GUTENBURG_PATH . '/assets/js/fire-block.js' )
		);
	}
}