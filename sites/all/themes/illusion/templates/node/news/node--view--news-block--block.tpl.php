<?php
global $default_img;
$image = $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<div class="row">
    <!--image-->
    <div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30 m_bottom_50">
        <div class="popup_wrap relative r_corners wrapper db_xs_centered">
            <img src="<?php echo $image; ?>" alt="">
            <div class="popup_buttons tr_all_long">
                <a href="<?php echo $image; ?>" data-group="portfolio" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10">
                    <i class="icon-plus"></i>
                </a>
                <a href="<?php echo $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                    <i class="icon-link"></i>
                </a>
            </div>
        </div>
    </div>
    <!--description-->
    <div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30 m_bottom_50 m_top_5">
        <h3 class="fw_light"><a href="<?php echo $node_url; ?>" class="color_dark tr_all"><?php echo $title; ?></a></h3>
        <!--project's info-->
        <ul class="dotted_list m_bottom_5 color_grey_light_2">
            <li class="m_right_15 relative d_inline_m">
                <a href="#" class="color_grey_light_2 fs_small">
                    <i class="icon-picture"></i>
                </a>
            </li>
            <li class="m_right_15 relative d_inline_m text-pro-links"><?php print illusion_format_comma_field('field_news_category', $node); ?></li>
        </ul>
        <p class="m_bottom_12 fw_light">
            <?php
            $summary = strip_tags($node->body['und'][0]['summary']);
            $summary_after = (strlen($summary) > 303) ? substr($summary, 0, 300) . '...' : $summary;
            echo $summary_after;
            ?>
        </p>
        <div class="clearfix">
            <a href="<?php echo $node_url; ?>" class="color_purple color_pink_hover f_left d_block m_right_20 fw_light">
                <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                    <i class="icon-angle-right"></i>
                </span>
                Read More
            </a>
        </div>
    </div>
</div>