<?php

/**
 * Definition of Testimonial Shortcode
 */

/**
 * Implements hook_shortcode_info
 */
function _testimonial_shortcode_info(&$shortcodes) {
	$shortcodes['testimonial'] = array(
		'title' => t('Testimonial'),
		'description' => t('Create a Testimonial'),
		'process callback' => 'art_shortcode_testimonial',
		'tips callback' => 'art_shortcode_testimonial_tip',
	);
	return $shortcodes;
}

/**
 * Testimonial Content
 */
function art_shortcode_testimonial($attrs, $text) {
	$attrs = shortcode_attrs(array(
			'name' => '',
			'email' => '',
			'company' => '',
			'regency' => ''
		),
		$attrs
	);
	
	return theme('testimonial',array('data' => $attrs,'content' => $text));
}


/**
 * Testimonial theme
 */
function _testimonial_theme(&$themes) {
	$themes['testimonial'] = array(
		'variables' => array(
			'data' => array(),
			'content' => ''
		)
	);
	
	return $themes;
}

/**
 * Theme testimonial
 */
function theme_testimonial($vars) {
	$data = $vars['data'];
	$content = $vars['content'];
	
	$output = '';
	$output .= '<blockquote class="r_corners relative type_2 fs_large color_dark m_bottom_20">';
	$output .= $content;
	$output .= '</blockquote>';
	$output .= '<div class="d_table w_full">';
	$output .= '<div class="d_table_cell">';
	$output .= '<div class="d_inline_m circle wrapper m_right_10">';
	$output .= '<img class="img-circle" src="http://1.gravatar.com/avatar/a015150ac9a854b803d08f4a6cd3abc2?s=68&r=pg&d=mm"/>';
	$output .= '</div>';
	$output .= '<div class="d_inline_m">';
	$output .= '<b class="fs_large d_block color_dark">'.$data['name'].'</b>';
	$output .= '<p class="fs_medium d_md_none d_xs_block d_mxs_none">'.$data['regency'].', '.$data['company'].'</p>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	

	return $output;
}