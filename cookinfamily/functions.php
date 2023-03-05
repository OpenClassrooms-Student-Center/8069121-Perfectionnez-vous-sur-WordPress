<?php
    function cookinfamily_add_admin_pages() {
        add_menu_page(__('CookInFamily', 'cookinfamily'), __('CookInFamily', 'cookinfamily'), 'manage_options', 'cookinfamily-settings', 'cookinfamily_theme_settings', 'dashicons-admin-settings', 60); 
    }

    function cookinfamily_theme_settings() {
        echo '<h1>'.__('Paramètres du thème CookInFamily', 'cookinfamily').'</h1>';
        echo '<form action="options.php" method="post" name="cookinfamily_settings">';
        echo '<div>';
  
        settings_fields('cookinfamily_settings_fields');
        do_settings_sections('cookinfamily_settings_section');
  
        echo '</div>';
        echo '<br />';
        echo '<input name="submit" class="button button-primary" type="submit" value="'.__('Enregistrer', 'cookinfamily').'" />';
        echo '</form>';
    }

    function cookinfamily_settings_register() {
        register_setting('cookinfamily_settings_fields', 'cookinfamily_settings_fields', 'cookinfamily_settings_fields_validate');
        add_settings_section('cookinfamily_settings_section', __('Paramètres', 'cookinfamily'), 'cookinfamily_settings_section_introduction', 'cookinfamily_settings_section');
        add_settings_field('cookinfamily_settings_field_introduction', __('Introduction', 'cookinfamily'), 'cookinfamily_settings_field_introduction_output', 'cookinfamily_settings_section', 'cookinfamily_settings_section');
        add_settings_field('cookinfamily_settings_field_phone_number', __('Numéro de téléphone', 'cookinfamily'), 'cookinfamily_settings_field_phone_number_output', 'cookinfamily_settings_section', 'cookinfamily_settings_section');
        add_settings_field('cookinfamily_settings_field_email', __('Email', 'cookinfamily'), 'cookinfamily_settings_field_email_output', 'cookinfamily_settings_section', 'cookinfamily_settings_section');
    }

    function cookinfamily_settings_section_introduction() {
      echo __('Paramètrez les différentes options de votre thème CookInFamily.', 'cookinfamily');
    }

    function cookinfamily_settings_fields_validate($inputs) {  
      if(isset($_POST) && !empty($_POST)):
        if(isset($_POST['cookinfamily_settings_field_introduction']) && !empty($_POST['cookinfamily_settings_field_introduction'])):
          update_option('cookinfamily_settings_field_introduction', $_POST['cookinfamily_settings_field_introduction']);
        endif;
        if(isset($_POST['cookinfamily_settings_field_phone_number']) && !empty($_POST['cookinfamily_settings_field_phone_number'])):
          update_option('cookinfamily_settings_field_phone_number', $_POST['cookinfamily_settings_field_phone_number']);
        endif;
        if(isset($_POST['cookinfamily_settings_field_email']) && !empty($_POST['cookinfamily_settings_field_email'])):
          update_option('cookinfamily_settings_field_email', $_POST['cookinfamily_settings_field_email']);
        endif;
      endif;

      return $inputs;
    }

    function cookinfamily_settings_field_introduction_output() {
      $value = get_option('cookinfamily_settings_field_introduction');

      echo '<input name="cookinfamily_settings_field_introduction" type="text" value="'.$value.'" />';
     }
     
     function cookinfamily_settings_field_phone_number_output() {
      $value = get_option('cookinfamily_settings_field_phone_number');

      echo '<input name="cookinfamily_settings_field_phone_number" type="text" value="'.$value.'" />';
     }
     
     function cookinfamily_settings_field_email_output() {
      $value = get_option('cookinfamily_settings_field_email');

      echo '<input name="cookinfamily_settings_field_email" type="text" value="'.$value.'" />';
     }

    /***** Actions *****/
    add_action('admin_menu', 'cookinfamily_add_admin_pages', 10);
    add_action('admin_init', 'cookinfamily_settings_register');
?>