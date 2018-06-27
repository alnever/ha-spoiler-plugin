<?php

/*
 * A simpe class to parse twig-like files
 * @link
 * @since 1.0
 *
 * @package ha-spoiler-plugin
 * @subpackage ha-spoiler-plugin
 */

namespace HaSpoilerPlugin;

class Ha_Spoiler_Parser {

	public function __construct() {

	}

	/*
		A static function to parse pseudo twig template
	*/
	public static function parse($str = "", $args = array()) {
		// replace all tokens in the template with given values
		foreach($args as $key => $value) {
			$str = str_replace("{{ $key }}",$value,$str);
		}

		return $str;
	}
}