<?php

/**
 * Definition of Button Shortcode
 */

/**
 * Implements hook_shortcode_info
 */
function _button_shortcode_info(&$shortcodes) {
	$shortcodes['button'] = array(
		'title' => t('button'),
		'description' => t('Create Button'),
		'process callback' => 'art_shortcode_button',
		'tips callback' => 'art_shortcode_button_tip',
	);
	return $shortcodes;
}

/**
 * Button Content
 */
function art_shortcode_button($attrs, $text) {
	$attrs = shortcode_attrs(array(
			'type' => 'button_type_1',
			'color' => 'dark',
			'colorhover' => '',
			'size' => 'medium',
			'transparent' => '0',
			'uppercase' => '0',
			'extendclass' => 'm_sm_bottom_10',
		),
		$attrs
	);
	
	$addclass = '';
	if(!empty($attrs['type'])) {
		$addclass .= ' '.$attrs['type'];
	}
	if(!empty($attrs['color'])) {
		$addclass .= ' color_'.$attrs['color'];
	}
	if(!empty($attrs['size'])) {
		$addclass .= ' fs_'.$attrs['size'];
	}
	if(!empty($attrs['transparent'])) {
		$addclass .= ' transparent';
	} elseif(!empty($attrs['colorhover'])) { 
		$addclass .= ' color_'.$attrs['colorhover'].'_hover';
	}
	if(!empty($attrs['extendclass'])) {
		$addclass .= ' '.$attrs['extendclass'];
	}
	if(!empty($attrs['uppercase'])) {
		$addclass .= ' tt_uppercase';
	}

	$button = '<button type="button" class="r_corners tr_all f_left m_right_10'.$addclass.'">'.$text.'</button>';
	
	//return theme('button',array('type' => $attrs['type'],'size'=>$attrs['size'],'content' => $text));
	return $button;
}