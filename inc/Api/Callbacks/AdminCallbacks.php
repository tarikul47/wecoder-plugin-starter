<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminCpt()
    {
        return require_once("$this->plugin_path/templates/cpt.php");
    }

    public function adminTaxonomy()
    {
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function adminWidget()
    {
        return require_once("$this->plugin_path/templates/widget.php");
    }

    public function wecoderTextExample()
    {
        $value = esc_attr(get_option('cpt_manager'));
        echo '<input type="text" class="regular-text" name="cpt_manager" value="' . $value . '" placeholder="Write Something Here"/>';
    }
    public function wecoderFirstName()
    {
        $value = esc_attr(get_option('taxonomy_manager'));
        echo '<input type="text" class="regular-text" name="taxonomy_manager" value="' . $value . '" placeholder="First Name"/>';
    }
}
