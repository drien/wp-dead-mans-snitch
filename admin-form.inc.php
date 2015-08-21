<div class="wrap">
    <h2>Dead Man's Snitch Settings</h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'deadmans-snitch-options' ); ?>
        <?php do_settings_sections( 'deadmans-snitch-options' ); ?>
        <div>
            <label for="url">Snitch URL</label>
            <input type="text" name="wpdms_url" value="<?php echo get_option('wpdms_url') ?>">
        </div>
        <br>
        <div>
            Active: <input type="radio" name="wpdms_is_active" value="on" <?php checked( get_option('wpdms_is_active'), 'on'); ?> >
            Disabled: <input type="radio" name="wpdms_is_active" value="off"  <?php checked( get_option('wpdms_is_active'), 'off'); ?> >
        </div>

        <?php submit_button(); ?>
    </form>
</div>
