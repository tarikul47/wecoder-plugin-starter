<?php

/**
 * @package WecoderPlugin 
 */

/*
 * Plugin Name:       Wecoder Plugin
 * Plugin URI:        https://onlytarikul.com 
 * Description:       Handle the custom basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Tarikul Islam 
 * Author URI:        https://onlytarikul.com 
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://onlytarikul.com/wecoder-plugin 
 * Text Domain:       wecoder-plugin
 * Domain Path:       /languages
 */


/*
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

// if (!defined('ABSPATH')) {
//     die;
// }

// if (!function_exists('add_action')) {
//     echo 'Hey, you can\t access this file, you silly human!';
//     exit;
// }

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate_wecoder_plugin()
{
    Activate::activate();
}
function deactivate_wecoder_plugin()
{
    Deactivate::deactivate();
}

// activation deactivation 
register_activation_hook(__FILE__, 'activate_wecoder_plugin');
register_deactivation_hook(__FILE__, 'deactivate_wecoder_plugin');


if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
