<?php
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 m_xs_bottom_20">
		<img src="<?php echo $image; ?>" class="r_corners" alt="">
	</div>
	<div class="col-lg-6 col-md-6 t_align_l">
		<?php print $node->body['und'][0]['value']; ?>
	</div>
</div>

