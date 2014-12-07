<?php
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>
<div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
	<!--person team-->
	<figure class="t_align_c">
		<img src="<?php echo $image; ?>" alt="" class="r_corners m_bottom_23">
		<figcaption>
			<h4 class="m_bottom_5"><a href="<?php print $node_url; ?>" class="color_dark"><?php print $node->title; ?></a></h4>
			<i class="color_grey fs_medium d_inline_b m_bottom_5"><?php print $node->field_member_regency['und'][0]['value']; ?>, <?php print $node->field_company['und'][0]['value']; ?></i>
			<div class="m_bottom_15"><?php print $node->body['und'][0]['summary']; ?></div>
			<ul class="d_inline_b social_icons">
				<?php if(count($node->field_facebook_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_facebook_url['und'][0]['value']; ?>" class="color_grey_light_2 facebook circle icon_wrap_size_1 d_block"><i class="icon-facebook-1"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_twitter_url)>0): ?>				
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_twitter_url['und'][0]['value']; ?>" class="color_grey_light_2 twitter circle icon_wrap_size_1 d_block"><i class="icon-twitter-1"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_google_plus_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_google_plus_url['und'][0]['value']; ?>" class="color_grey_light_2 googleplus circle icon_wrap_size_1 d_block"><i class="icon-gplus-1"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_pinterest_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_pinterest_url['und'][0]['value']; ?>" class="color_grey_light_2 pinterest circle icon_wrap_size_1 d_block"><i class="icon-pinterest"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_dribbble_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_dribbble_url['und'][0]['value']; ?>" class="color_grey_light_2 dribbble circle icon_wrap_size_1 d_block"><i class="icon-dribbble"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_flickr_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_flickr_url['und'][0]['value']; ?>" class="color_grey_light_2 flickr circle icon_wrap_size_1 d_block"><i class="icon-flickr-1"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_youtube_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_youtube_url['und'][0]['value']; ?>" class="color_grey_light_2 youtube circle icon_wrap_size_1 d_block"><i class="icon-youtube-play"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_vimeo_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_vimeo_url['und'][0]['value']; ?>" class="color_grey_light_2 vimeo circle icon_wrap_size_1 d_block"><i class="icon-vimeo"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_instagram_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_instagram_url['und'][0]['value']; ?>" class="color_grey_light_2 instagram circle icon_wrap_size_1 d_block"><i class="icon-instagramm"></i></a></li>
				<?php endif; ?>
				<?php if(count($node->field_linkedin_url)>0): ?>
				<li class="m_right_5 d_inline_m m_bottom_5"><a href="<?php print $node->field_linkedin_url['und'][0]['value']; ?>" class="color_grey_light_2 linkedin circle icon_wrap_size_1 d_block"><i class="icon-linkedin-squared"></i></a></li>
				<?php endif; ?>
			</ul>
		</figcaption>
	</figure>
</div>

