<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin_name", [$this, 'settings_link']);
    }

    public function settings_link($links)
    {
        // add custom settings link 
        $settings_link = '<a href="admin.php?page=wecoder_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
