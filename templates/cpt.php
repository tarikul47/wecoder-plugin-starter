<h1>Wecoder Plugin Manager - CPT page</h1>

<div class="wrap">
    <h1>Wecoder Plugin</h1>
    <?php settings_errors(); ?>

    <div id="" class="tab">
        <form method="post" action="options.php">
            <?php

          //  var_dump(settings_fields('wecoder_plugin_cpt_settings'));

            settings_fields('wecoder_cpt_settings');
            do_settings_sections('wecoder_cpt');
            submit_button();
            ?>
        </form>

    </div>

</div>