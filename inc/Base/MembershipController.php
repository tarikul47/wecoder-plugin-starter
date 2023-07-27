<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;


class MembershipController extends BaseController
{
    public $settings;
    public $callbacks;
    public $subpages = array();

    public function register()
    {
        if (!$this->activated('membership_manager')) return;

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
                'page_title' => 'Membership Manager',
                'menu_title' => 'Membership Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_membership',
                'callback' => array($this->callbacks, 'adminCpt'),
            ],
        );
    }
}
