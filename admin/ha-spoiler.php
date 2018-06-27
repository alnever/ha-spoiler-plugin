<?php
/*
 * Administrative panel for Ha! Spoiler Plugin
 * @link
 * @since 1.0
 *
 * @package ha-spoiler-plugin
 * @subpackage ha-spoiler-plugin
*/

namespace HaSpoilerPlugin\Admin;

class Ha_Spoiler {

	private $options;

	public function __construct() {
		// add admin page
		add_action('admin_menu', array($this,'add_admin_page'));
		// register options
		add_action('admin_init', array($this,'register_settings'));
	}

	public function add_admin_page() {
		add_options_page(
			'Settings Admin 2',
			'Ha! Spoiler Plugin Settings',
			'manage_options',
			'ha-spoiler-admin',
			array($this,'options_page')
		);
	}

	public function register_settings() {
		register_setting(
			'ha_spoiler_options_group', // options group
			'ha_spoiler_options'		// options slug
		);

		add_settings_section(
			'ha_spoiler_options_section',
			'Ha! Spoiler settings',
			array($this,'options_section'),
			'ha-spoiler-admin'
		);

		add_settings_field(
			'custom_css',
			'Custom CSS',
			array($this, 'custom_css'),
			'ha-spoiler-admin',
			'ha_spoiler_options_section'
		);
	}

	public function options_page() {
		// Get options of the plugin by the slug
		$this->options = get_option('ha_spoiler_options'); 
        ?>
        <div class="wrap">
            <h1>Ha! Spoiler Plugin</h1>
            <form method="post" action="options.php">
            <?php
                // Output settings fields
                settings_fields( 'ha_spoiler_options_group' );
                // Do the settings section
                do_settings_sections( 'ha-spoiler-admin' );
                // Crete a submit button
                submit_button();
            ?>
            </form>
        </div>
        <?php		
	}

	public function options_section() {
		print '<p>Enter your custom CSS into the field below.</p>';
		print '<p style="color:red; font-weigh: bolder">Caution! Just expierncies user shoud use this option!</p>';
	}

	public function custom_css() {
        printf(
            '<textarea id="custom_css" name="ha_spoiler_options[custom_css]" style="width:800px; height:400px;">%s</textarea>',
            isset( $this->options['custom_css'] ) ? esc_attr( $this->options['custom_css']) : ''
        );
	}
}