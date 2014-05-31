<?php
/*
Plugin Name: Minit Min
Plugin URI: https://github.com/bjornjohansen/minit-min
Description: Adds minification to the Minit plugin by Kaspars Dambis
Version: 0.0.1
Author: Bjørn Johansen
Author URI: https://bjornjohansen.no
*/

if ( ! class_exists( 'Minify_CSS_Compressor' ) ) {
	require_once( 'Minify_CSS_Compressor/Compressor.php' );
}

require_once( 'JShrink/Minifier.php' );

new Minit_Min;

class Minit_Min {

	function __construct() {
		add_filter( 'minit-content-css', array( $this, 'minit_content_css' ), 11, 3 );
		add_filter( 'minit-content-js', array( $this, 'minit_content_js' ), 11, 3 );
	}

	public function minit_content_css( $content = '', $object = '', $script = '' ) {
		return Minify_CSS_Compressor::process( $content );
	}

	public function minit_content_js( $content = '', $object = '', $script = '' ) {
		return \JShrink\Minifier::minify( $content );
	}

}
