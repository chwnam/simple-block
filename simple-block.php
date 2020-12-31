<?php
/*
 * Plugin Name: Simple Block (i18n 실험용)
 * Description: 워드프레스 커스텀 블록 테스트.
 * Text Domain: simple-block
 */

function simple_block_register_script() {
	$file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';
	if ( file_exists( $file ) && is_file( $file ) && is_readable( $file ) ) {
		/**
		 * @var array<string, string> $asset
		 * @noinspection PhpIncludeInspection
		 */
		$asset = include $file;
		if ( is_array( $asset ) ) {
			wp_register_script(
				'simple-block',
				plugins_url( 'build/index.js', __FILE__ ),
				$asset['dependencies'] ?? [],
				$asset[' version'] ?? false
			);
			if ( function_exists( 'register_block_type' ) ) {
				register_block_type( 'simple-block/simple-block', [ 'editor_script' => 'simple-block' ] );
			}
		}
	}
}

add_action( 'init', 'simple_block_register_script' );


function simple_block_enqueue_script() {
	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations(
			'simple-block',
			'simple-block',
			plugin_dir_path( __FILE__ ) . 'languages'
		);
	}
}

add_action( 'enqueue_block_editor_assets', 'simple_block_enqueue_script' );
