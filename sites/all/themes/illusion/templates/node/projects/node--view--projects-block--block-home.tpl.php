<?php
global $default_img;
$image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<!--project-->
<figure class="t_xs_align_c col-lg-12">
    <!--image container-->
    <div class="popup_wrap relative r_corners wrapper m_bottom_20 d_xs_inline_b d_mxs_block">
        <img src="<?php echo $image; ?>" alt="" class="">
        <div class="popup_buttons tr_all_long">
            <a href="<?php echo $image; ?>" data-group="featured_projects" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10">
                <i class="icon-plus"></i>
            </a>
            <a href="<?php print $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                <i class="icon-link"></i>
            </a>
        </div>
    </div>
    <figcaption class="t_xs_align_l">
        <!--project's title-->
        <h4 class="fw_light fs_middle"><a href="<?php print $node_url; ?>" class="color_dark"><?php echo $title; ?></a></h4>
        <!--project's info-->
        <ul class="dotted_list m_bottom_5 color_grey_light_2">
            <li class="m_right_15 relative d_inline_m">
                <a href="#" class="color_grey_light_2 fs_small">
                    <i class="icon-picture"></i>
                </a>
            </li>
            <li class="m_right_15 relative d_inline_m text-pro-links"><?php print illusion_format_comma_field('field_category', $node); ?></li>
        </ul>
        <p class="m_bottom_10 fw_light">
            <?php
            $summary = strip_tags($node->body['und'][0]['summary']);
            $summary_after = (strlen($summary) > 163) ? substr($summary, 0, 160) . '...' : $summary;
            echo $summary_after;
            ?>
        </p>
        <div class="clearfix">
            <a href="<?php print $node_url; ?>" class="color_purple color_pink_hover f_left d_block m_right_20">
                <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                    <i class="icon-angle-right"></i>
                </span>
                Read More
            </a>
        </div>
    </figcaption>
</figure>