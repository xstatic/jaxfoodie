<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_35 m_xs_bottom_30">
    <figure class="item_services">
        <!--<figure class="item_services home-service-item">-->
        <h6 class="m_bottom_5 relative color_dark color_pink_hover tr_all">
            <?php echo $title; ?>
            <span class="d_block icon_wrap_size_3 circle color_pink wrapper animation_fill">
            <!--<span class="d_block icon_wrap_size_3 circle color_pink wrapper home-service-icon">-->
                <i class="<?php print $node->field_icon['und'][0]['value']; ?> tr_all"></i>
            </span>
        </h6>
        <div class="fs_medium fw_light"><?php print $node->body['und'][0]['summary']; ?></div>
    </figure>
</div>