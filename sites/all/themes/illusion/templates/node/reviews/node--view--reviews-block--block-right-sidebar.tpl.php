<?php
global $default_img;
$image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<figure>
    <!--image-->
    <div class="popup_wrap relative r_corners wrapper m_bottom_20 m_sm_bottom_10 m_xs_bottom_20 d_xs_inline_b d_mxs_block">
        <img src="<?php echo $image; ?>" alt="">
        <div class="popup_buttons tr_all_long w_sm_full t_sm_align_c">
            <a href="<?php echo $image; ?>" data-group="latest_projects" data-title="<?php print $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10 f_sm_none d_sm_inline_b">
                <i class="icon-plus"></i>
            </a>
            <a href="<?php print $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left f_sm_none d_sm_inline_b">
                <i class="icon-link"></i>
            </a>
        </div>
    </div>
    <!--title-->
    <figcaption>
        <h6 class="m_bottom_3"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h6>
        <ul class="dotted_list color_grey_light_2">
            <li class="m_right_15 relative d_inline_m">
                <a href="#" class="color_grey_light_2 fs_small">
                    <i class="icon-picture"></i>
                </a>
            </li>
            <li class="m_right_15 relative d_inline_m category-style">
                <i><?php print illusion_format_comma_field('field_category', $node); ?></i>
            </li>
        </ul>
    </figcaption>
</figure>