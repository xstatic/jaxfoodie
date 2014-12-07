<?php
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>

	<?php
		if(count($node->field_image)>0||count($node->field_video)>0):
	?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 m_xs_bottom_20">
			<?php if(!empty($node->field_image['und'][0]['uri'])): ?>
			<img src="<?php echo $image; ?>" class="r_corners" alt="">
			<?php else: ?>
			<div class="iframe_video_wrap">
				<?php echo $node->field_video['und'][0]['value']; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="col-lg-6 col-md-6 t_align_l fw_light">
			<?php print $node->body['und'][0]['value']; ?>
		</div>
	</div>
	<?php else: ?>
		<?php print $node->body['und'][0]['value']; ?>
	<?php endif; ?>
