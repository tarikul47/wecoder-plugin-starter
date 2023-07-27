<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;


class TestimonialController extends BaseController
{
    public $settings;
    public $callbacks;
    public $subpages = array();

    public function register()
    {
        if (!$this->activated('testimonial_manager')) return;

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();
    }


    public function setSubPages()
    {
        $this->subpages = array(
            [
                'parent_slug' => 'wecoder_plugin',
                'page_title' => 'Testimonial Manager',
                'menu_title' => 'Testimonial Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_testimonial',
                'callback' => array($this->callbacks, 'adminCpt'),
            ],
        );
    }
}
