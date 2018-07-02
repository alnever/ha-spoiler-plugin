<?php
/*
 * Shortcode definition
 * @link
 * @since 1.0
 *
 * @package ha-spoiler-plugin
 * @subpackage ha-spoiler-plugin
*/

namespace HaSpoilerPlugin;


class Ha_Spoiler {
	public function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
		add_shortcode('ha_spoiler', array($this, 'shortcode'));
	}

	public function enqueue_scripts() {
		wp_enqueue_script('ha-spoiler-script',
				plugin_dir_url(__FILE__)."/js/ha-spoiler.js",
				array('jquery'),
				false, false
			);
	}

	public function enqueue_styles() {
		wp_enqueue_style('ha-spoiler-style',
				plugin_dir_url(__FILE__)."/css/ha-spoiler.css",
				null, null, 'all'
			);
	}

	public function shortcode($atts = [], $content = "", $tag = null) {
		// make attributes' keys lower case	
		$atts = array_change_key_case((array)$atts, CASE_LOWER);

		if ( $content != null) {
			return Ha_Spoiler_Parser::parse(
					file_get_contents(dirname(__FILE__)."/partial/ha-spoiler-template.twig"),
					array(
						'custom_css' => isset(get_option('ha_spoiler_options')['custom_css']) ? get_option('ha_spoiler_options')['custom_css'] : "",
						'content' => $content,
						'header' => isset($atts['header']) && $atts['header'] != null ? $atts['header'] : 'Spoiler',
						'image' => plugin_dir_url(__FILE__)."/img/close-icon.png"
					)
				);
		}
		
	}


}