<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Pages;

class Admin
{
    public function register()
    {
        add_action('admin_menu', [$this, 'add_admin_pages']);
        //   add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);
    }

    public function add_admin_pages()
    {
        add_menu_page('Wecoder Plugin', 'Wecoder', 'manage_options', 'wecoder_plugin', [$this, 'admin_index'], '', null);
    }

    public function admin_index()
    {
        // require template 
        require PLUGIN_PATH . '/templates/admin.php';
    }
}