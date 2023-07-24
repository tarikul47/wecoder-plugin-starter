<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;


class WidgetController extends BaseController
{
    public $settings;
    public $callbacks;
    public $subpages = array();

    public function register()
    {
        //var_dump($this->managers['cpt_manager']);

        if (!$this->activated('chat_manager')) return;

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
                'page_title' => 'Chat Manager',
                'menu_title' => 'Chat Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'wecoder_cpt',
                'callback' => array($this->callbacks, 'adminCpt'),
            ],
        );
    }
}
