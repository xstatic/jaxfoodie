<?php 
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>
<div class="popup_wrap relative wrapper d_mxs_block">
	<img src="<?php echo $image; ?>" alt="">
	<div class="popup_buttons tr_all_long">
		<a href="<?php echo $image; ?>" data-group="office" data-title="Title 7" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10">
			<i class="icon-plus"></i>
		</a>
	</div>
</div>