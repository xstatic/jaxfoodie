<figure data-appear-animation="fadeInUp">
    <div class="icon_wrap_size_6 type_2 circle d_inline_m animation_fill relative m_bottom_20">
        <i class="<?php print $node->field_icon['und'][0]['value']; ?> tr_all"></i>
    </div>
    <figcaption>
        <h5 class="color_dark m_bottom_15"><?php echo $title; ?></h5>
        <div class="m_bottom_23"><?php print $node->body['und'][0]['summary']; ?></div>
        <a href="<?php print $node_url; ?>" class="button_type_2 color_dark r_corners fs_medium tr_all d_inline_b">Read More</a>
    </figcaption>
</figure>