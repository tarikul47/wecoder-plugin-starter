<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use \Inc\Base\BaseController;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();
    public $subpages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();

        $this->pages = array(
            [
                'page_title' => 'Wecoder Plugin Page',
                'menu_title' => 'Wecoder Menu',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_plugin',
                'callback' => function () {
                    echo "Hello World";
                },
                'icon_url' => '',
                'position' => 50,
            ],
        );

        $this->subpages = array(
            [
                'parent_slug' => 'wecoder_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_cpt',
                'callback' => function () {
                    echo '<h1>CPT Manager</h1>';
                },
            ],
            [
                'parent_slug' => 'wecoder_plugin',
                'page_title' => 'Custom Taxonmies',
                'menu_title' => 'Taxonmies',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_taxonmies',
                'callback' => function () {
                    echo '<h1>Taxonmies Manager</h1>';
                },
            ],
            [
                'parent_slug' => 'wecoder_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_widgets',
                'callback' => function () {
                    echo '<h1>Widgets Manager</h1>';
                },
            ],
        );
    }

    public function register()
    {
        $this->settings->AddPages($this->pages)->withSubPage('Dashabord')->addSubPages($this->subpages)->register();
    }
}
