<?php 
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>
<div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
	<!--quote-->
	<blockquote class="r_corners relative type_2 fs_large color_dark m_bottom_20">
		<?php print $node->body['und'][0]['value']; ?>
	</blockquote>
	<div>
		<!--author photo-->
		<div class="d_inline_m circle wrapper m_right_10">
			<img src="<?php echo $image; ?>" alt="">
		</div>
		<!--author name-->
		<div class="d_inline_m">
			<b class="fs_large d_block color_dark"><?php echo $node->field_client['und'][0]['value']; ?></b>
			<p class="fs_medium d_sm_none d_xs_block"><?php echo $node->field_regency['und'][0]['value']; ?><span class="d_md_none">, <?php echo $node->field_company['und'][0]['value']; ?></span></p>
		</div>
	</div>
</div>

