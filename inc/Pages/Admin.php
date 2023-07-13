<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;


class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

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

    public function setSubPages()
    {
        $this->subpages = array(
            [
                'parent_slug' => 'wecoder_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_cpt',
                'callback' => array($this->callbacks, 'adminCpt'),
            ],
            [
                'parent_slug' => 'wecoder_plugin',
                'page_title' => 'Custom Taxonmies',
                'menu_title' => 'Taxonmies',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_taxonmies',
                'callback' => array($this->callbacks, 'adminTaxonomy'),
            ],
            [
                'parent_slug' => 'wecoder_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_widgets',
                'callback' => array($this->callbacks, 'adminWidget'),
            ],
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'wecoder_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'wecoderOptionsGroup'),
            ),
            array(
                'option_group' => 'wecoder_options_group',
                'option_name' => 'first_name',
            ),
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'wecoder_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'wecoderAdminSection'),
                'page' => 'wecoder_plugin',
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'text Example',
                'callback' => array($this->callbacks, 'wecoderTextExample'),
                'page' => 'wecoder_plugin',
                'section' => 'wecoder_admin_index',
                'args' => array(
                    'lable_for' => 'text_example',
                    'class' => 'example-class'
                ),
            ),
            array(
                'id' => 'first_name',
                'title' => 'First Name',
                'callback' => array($this->callbacks, 'wecoderFirstName'),
                'page' => 'wecoder_plugin',
                'section' => 'wecoder_admin_index',
                'args' => array(
                    'lable_for' => 'first_name',
                    'class' => 'example-class'
                ),
            ),
        );

        $this->settings->setFields($args);
    }
}
