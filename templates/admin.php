<div class="wrap">
    <h1>Wecoder Plugin</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields('wecoder_options_group');
            do_settings_sections('wecoder_plugin');
            submit_button();
        ?>
    </form>
</div>