<?php

drupal_add_js(drupal_get_path('theme', 'illusion') . '/js/theme_settings.js');

/**
 * Implements hook_form_system_theme_settings_alter()
 */
function illusion_form_system_theme_settings_alter(&$form, &$form_state) {

	$background_image = theme_get_setting('background_image');
    if (file_uri_scheme($background_image) == 'public') {
        $background_image = file_uri_target($background_image);
    }

    // Main settings wrapper
    $form['options'] = array(
        '#type' => 'vertical_tabs',
        '#default_tab' => 'defaults',
        '#weight' => '-10',
        '#attached' => array(
            'css' => array(drupal_get_path('theme', 'illusion') . '/css/theme-options.css'),
        ),
    );

    // ----------- GENERAL -----------
    $form['options']['general'] = array(
        '#type' => 'fieldset',
        '#title' => t('General'),
    );

    // Breadcrumbs
    $form['options']['general']['breadcrumbs'] = array(
        '#type' => 'checkbox',
        '#title' => 'Breadcrumbs',
        '#default_value' => theme_get_setting('breadcrumbs'),
    );

    // SEO
    $form['options']['general']['seo'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">SEO</h3>',
    );

    // SEO Title
    $form['options']['general']['seo']['seo_title'] = array(
        '#type' => 'textfield',
        '#title' => 'Title',
        '#default_value' => theme_get_setting('seo_title'),
    );

    // SEO Description
    $form['options']['general']['seo']['seo_description'] = array(
        '#type' => 'textarea',
        '#title' => 'Description',
        '#default_value' => theme_get_setting('seo_description'),
    );

    // SEO Keywords
    $form['options']['general']['seo']['seo_keywords'] = array(
        '#type' => 'textarea',
        '#title' => 'Keywords',
        '#default_value' => theme_get_setting('seo_keywords'),
    );


    // ----------- LAYOUT -----------
    $form['options']['layout'] = array(
        '#type' => 'fieldset',
        '#title' => t('Layout'),
    );
	
	// ------ Header Settings ------
    $form['options']['layout']['header'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Header Settings</h3>',
    );
	
    $form['options']['layout']['header']['header_1'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 1',
		'#default_value' => theme_get_setting('header_1'),
    );
	$form['options']['layout']['header']['header_2'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 2',
		'#default_value' => theme_get_setting('header_2'),
    );
	$form['options']['layout']['header']['header_3'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 3',
		'#default_value' => theme_get_setting('header_3'),
    );
        $form['options']['layout']['header']['header_4'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 4',
		'#default_value' => theme_get_setting('header_4'),
    );
        $form['options']['layout']['header']['header_5'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 5',
		'#default_value' => theme_get_setting('header_5'),
    );
        $form['options']['layout']['header']['header_6'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 6',
		'#default_value' => theme_get_setting('header_6'),
    );
        $form['options']['layout']['header']['header_7'] = array(
        '#type' => 'textarea',
        '#title' => 'Coming Soon Header',
		'#default_value' => theme_get_setting('header_7'),
    );
	
	
	// ------ Footer Settings ------
    $form['options']['layout']['footer'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Footer Settings</h3>',
    );
	
    $form['options']['layout']['footer']['footer_1'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 1 (Full)',
		'#default_value' => theme_get_setting('footer_1'),
    );
	$form['options']['layout']['footer']['footer_2'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 2',
		'#default_value' => theme_get_setting('footer_2'),
    );
	$form['options']['layout']['footer']['footer_3'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 3',
		'#default_value' => theme_get_setting('footer_3'),
    );
	$form['options']['layout']['footer']['footer_4'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 4 (Hide Top Part Footer)',
		'#default_value' => theme_get_setting('footer_4'),
    );
	$form['options']['layout']['footer']['footer_5'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 5',
		'#default_value' => theme_get_setting('footer_5'),
    );
	$form['options']['layout']['footer']['footer_6'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 6 (Page Shop)',
		'#default_value' => theme_get_setting('footer_6'),
    );
	

	// -------- Projects Layout Settings ----------
    /*$form['options']['layout']['projects'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Projects Page Layout</h3>',
    );
	
	$form['options']['layout']['projects']['projects_fulllayout'] = array(
        '#type' => 'textarea',
        '#title' => 'Projects Page Style: Full Layout',
		'#default_value' => theme_get_setting('projects_fulllayout'),
    );*/
	
    // Projects Layout
    /*$form['options']['layout']['projects']['projects_layout'] = array(
        '#type' => 'radios',
        '#title' => 'Select a projects layout:',
        '#default_value' => theme_get_setting('projects_layout'),
        '#options' => array(
            '2_columns' => '2 Columns',
            '3_columns' => '3 Columns',
            '4_columns' => '4 Columns (default)',
			'2_columns_boxed' => '2 Columns Boxed',
            '3_columns_boxed' => '3 Columns Boxed',
            '4_columns_boxed' => '4 Columns Boxed',
			'3_columns_full' => '3 Columns Full Width',
            '4_columns_full' => '4 Columns Full Width',
            '6_columns_full' => '6 Columns Full Width',
        ),
    );*/
	
	
	// ----------- DESIGN -----------
    $form['options']['design'] = array(
        '#type' => 'fieldset',
        '#title' => 'Design',
    );
	
	// Switcher
    $form['options']['design']['switcher'] = array(
        '#type' => 'checkbox',
        '#title' => 'Show Switcher Control',
        '#default_value' => theme_get_setting('switcher'),
    );
	
	// Layout Option
    $form['options']['design']['layout_style'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Layout Style</h3>',
    );
	
	$form['options']['design']['layout_style']['layout_option'] = array(
        '#type' => 'radios',
        '#title' => 'Select a layout style:',
        '#default_value' => theme_get_setting('layout_option'),
        '#options' => array(
            'boxed' => 'Boxed',
            'wide' => 'Wide (default)',
        ),
    );
	
	// Menu type
    $form['options']['design']['menu_type'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Menu Type</h3>',
    );
	
    // Menu type
    $form['options']['design']['menu_type']['menu_option'] = array(
        '#type' => 'radios',
        '#title' => 'Select a menu type option:',
        '#default_value' => theme_get_setting('menu_option'),
        '#options' => array(
            'sticky_menu' => 'Sticky Menu (default)',
            'side_menu' => 'Side Menu',
        ),
    );
	
	// Header Option
    $form['options']['design']['header_style'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Header Style</h3>',
    );
	
    // Header Option
    $form['options']['design']['header_style']['header_option'] = array(
        '#type' => 'radios',
        '#title' => 'Select a header style option:',
        '#default_value' => theme_get_setting('header_option'),
        '#options' => array(
            'header_1' => 'Header 1 (default)',
            'header_2' => 'Header 2',
            'header_3' => 'Header 3',
            'header_4' => 'Header 4',
            'header_5' => 'Header 5',
            'header_6' => 'Header 6',
        ),
    );
	
	// Footer Option
    $form['options']['design']['footer_style'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Footer Style</h3>',
    );
	
    // Footer Option
    $form['options']['design']['footer_style']['footer_option'] = array(
        '#type' => 'radios',
        '#title' => 'Select a footer style option:',
        '#default_value' => theme_get_setting('footer_option'),
        '#options' => array(
            'footer1' => 'Footer 1 (default)',
            'footer2' => 'Footer 2',
            'footer3' => 'Footer 3',
            'footer4' => 'Footer 4',
            'footer5' => 'Footer 5',
            'footer6' => 'Footer 6',
        ),
    );

    // Background
    $form['options']['design']['background'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Background layout</h3>',
    );
	
	// Background Type
	$form['options']['design']['background']['background_type'] = array(
        '#type' => 'select',
        '#title' => 'Background Type',
        '#default_value' => theme_get_setting('background_type'),
        '#options' => array(
            'color' => 'Background Color (default)',
            'image' => 'Background Image',
        ),
    );
	
	// Background Color
    $form['options']['design']['background']['background_color'] = array(
		'#type' => 'textfield',
        '#title' => 'Enter a background color:',
        '#default_value' => theme_get_setting('background_color'),
		'#states' => array (
          'visible' => array(
            'select[name = background_type]' => array('value' => 'color')
          )
        )
    );

    // Background Image
	$form['options']['design']['background']['background_image'] = array(
        '#type' => 'textfield',
        '#title' => 'Path to background',
        '#default_value' => $background_image,
        '#disabled' => TRUE,
        '#states' => array (
          'visible' => array(
            'select[name=background_type]' => array('value' => 'image')
          )
        )
    );

    $form['options']['design']['background']['background_upload'] = array(
        '#type' => 'file',
        '#title' => 'Upload background',
        '#description' => 'Upload a new background image.',
        '#states' => array (
          'visible' => array(
            'select[name=background_type]' => array('value' => 'image')
          )
        )
    );

    // CSS
    $form['options']['design']['css'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">CSS</h3>',
    );

    // User CSS
    $form['options']['design']['css']['user_css'] = array(
        '#type' => 'textarea',
        '#title' => 'Add your own CSS',
        '#default_value' => theme_get_setting('user_css'),
    );
	
	// Submit Button
    $form['#submit'][] = 'illusion_settings_submit';
}

function illusion_settings_submit($form, &$form_state) {
    // Get the previous value
    $previous = 'public://' . $form['options']['design']['background']['background_image']['#default_value'];

    $file = file_save_upload('background_upload');
    if ($file) {
        $parts = pathinfo($file->filename);
        $destination = 'public://' . $parts['basename'];
        $file->status = FILE_STATUS_PERMANENT;

        if (file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
            $_POST['background_image'] = $form_state['values']['background_image'] = $destination;
            if ($destination != $previous) {
                return;
            }
        }
    } else {
        // Avoid error when the form is submitted without specifying a new image
        $_POST['background_image'] = $form_state['values']['background_image'] = $previous;
    }
}


?>