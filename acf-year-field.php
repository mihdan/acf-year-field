<?php
/**
 * Plugin Name: Advanced Custom Fields: Year Field
 * Plugin URI: https://github.com/mihdan/acf-year-field
 * Description: The year field lets you add a select field to Advanced Custom Fields with pre-populated years as a list to choose from.
 * Version: 1.0.1
 * Author: Mikhail Kobzarev
 * Author URI: http://kobzarev.com
 * License: GPL2
 * Text Domain: acf-year-field
 * Domain Path: /lang/
 */
class acf_field_year_plugin
{
    var $settings;

    public function __construct()
    {
        $this->settings = array(
            'path'				=> apply_filters('acf/helpers/get_path', __FILE__),
            'dir'				=> apply_filters('acf/helpers/get_dir', __FILE__)
        );

        // TODO: load_textdomain('acf-year', $this->settings['path'] . 'lang/acf-' . get_locale() . '.mo');

        add_action('acf/register_fields', array($this, 'register_fields'));
    }

    public function register_fields()
    {
        include_once 'register-fields.php';
    }
}

new acf_field_year_plugin();
