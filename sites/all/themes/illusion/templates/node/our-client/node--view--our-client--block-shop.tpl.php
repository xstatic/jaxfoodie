<?php
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 m_bottom_20 f_mxs_none w_mxs_full m_mxs_bottom_10">
	<div class="clients_item db_xs_centered wrapper relative r_corners d_xs_block d_mxs_inline_b">
		<a href="<?php echo $node->field_link['und'][0]['value']; ?>" class="d_block translucent tr_all wrapper r_corners">
			<img src="<?php echo $image; ?>" alt="">
		</a>
	</div>
</div>
				