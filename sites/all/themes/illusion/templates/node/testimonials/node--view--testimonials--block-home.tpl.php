<?php 
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>
<div>
	<!--quote-->
	<blockquote class="r_corners relative type_2 fs_large color_dark m_bottom_20">
		<?php print $node->body['und'][0]['value']; ?>
	</blockquote>
	<div class="d_table w_full">
		<div class="d_table_cell">
			<!--author photo-->
			<div class="d_inline_m circle wrapper m_right_10">
				<img src="<?php echo $image; ?>" alt="">
			</div>
			<!--author name-->
			<div class="d_inline_m">
				<b class="fs_large d_block color_light"><?php echo $node->field_client['und'][0]['value']; ?></b>
				<p class="fs_medium color_grey_light_2"><?php echo $node->field_regency['und'][0]['value']; ?>, <?php echo $node->field_company['und'][0]['value']; ?></p>
			</div>
		</div>
		<div class="d_table_cell t_align_r v_align_m d_mxs_none">
			<button class="circle icon_wrap_size_5 color_grey_light d_inline_m color_blue_hover m_right_5 tr_all t_nav_prev">
				<i class="icon-left-open-big"></i>
			</button>
			<button class="circle icon_wrap_size_5 color_grey_light d_inline_m color_blue_hover tr_all t_nav_next">
				<i class="icon-right-open-big"></i>
			</button>
		</div>
	</div>
</div>