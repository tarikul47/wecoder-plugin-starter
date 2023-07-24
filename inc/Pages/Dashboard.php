<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
    public $settings;

    public $callbacks;

    public $callbacks_mngr;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

     //   $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();


        $this->settings->AddPages($this->pages)->withSubPage('Dashabord')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            [
                'page_title' => 'Wecoder Plugin Page',
                'menu_title' => 'Wecoder Menu',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => '',
                'position' => 50,
            ],
        );
    }

    // public function setSubPages()
    // {
    //     $this->subpages = array(
    //         [
    //             'parent_slug' => 'wecoder_plugin',
    //             'page_title' => 'Custom Post Types',
    //             'menu_title' => 'CPT',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'wecoder_cpt',
    //             'callback' => array($this->callbacks, 'adminCpt'),
    //         ],
    //         [
    //             'parent_slug' => 'wecoder_plugin',
    //             'page_title' => 'Custom Taxonmies',
    //             'menu_title' => 'Taxonmies',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'wecoder_taxonmies',
    //             'callback' => array($this->callbacks, 'adminTaxonomy'),
    //         ],
    //         [
    //             'parent_slug' => 'wecoder_plugin',
    //             'page_title' => 'Custom Widgets',
    //             'menu_title' => 'Widgets',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'wecoder_widgets',
    //             'callback' => array($this->callbacks, 'adminWidget'),
    //         ],
    //     );
    // }

    public function setSettings()
    {

        $args = array(
            array(
                'option_group' => 'wecoder_plugin_settings',
                'option_name' => 'wecoder_plugin',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            )
        );

        // foreach ($this->managers as $key => $value) {
        //     $args[] = array(
        //         'option_group' => 'wecoder_plugin_settings',
        //         'option_name' => $key,
        //         'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
        //     );
        // }

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'wecoder_admin_index',
                'title' => 'Settings Manager [ From Section ]',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'wecoder_plugin',
            ),
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {

        $args = array();

        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wecoder_plugin',
                'section' => 'wecoder_admin_index',
                'args' => array(
                    'option_name' => 'wecoder_plugin',
                    'label_for' => $key,
                    'class' => 'ui-toggle'
                )
            );
        }

        $this->settings->setFields($args);
    }
}
