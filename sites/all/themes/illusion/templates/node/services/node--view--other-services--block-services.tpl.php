<!--service-->
<div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
    <figure class="item_services">
        <h6 class="m_bottom_5 relative">
            <a href="<?php echo $node_url; ?>" class="color_dark d_block n_sc_hover"><?php echo $title; ?></a>
            <span class="d_block icon_wrap_size_3 circle color_pink wrapper animation_fill">
                <i class="<?php print $node->field_icon['und'][0]['value']; ?> tr_all"></i>
            </span>
        </h6>
        <p class="fs_medium m_bottom_10"><?php print strip_tags($node->body['und'][0]['summary']); ?></p>
        <a href="<?php echo $node_url; ?>" class="color_dark fs_medium color_pink_hover">Read More
            <span class="d_inline_m m_left_5 icon_wrap_size_0 circle color_grey_light tr_all">
                <i class="icon-angle-right"></i>
            </span>
        </a>
    </figure>
</div>