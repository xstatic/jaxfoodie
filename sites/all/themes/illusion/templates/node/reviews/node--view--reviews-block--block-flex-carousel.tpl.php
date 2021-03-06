<?php
global $default_img;
$image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<figure class="col-lg-12 col-md-12 col-sm-12" data-appear-animation="fadeInDown" data-appear-animation-delay="1400">
    <!--image-->
    <div class="popup_wrap relative r_corners wrapper m_bottom_20 d_xs_inline_b">
        <img src="<?php echo $image; ?>" alt="" class="">
        <div class="popup_buttons tr_all_long w_md_full t_md_align_c">
            <a href="<?php echo $image; ?>" data-group="latest_news" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10 f_md_none d_md_inline_b">
                <i class="icon-plus"></i>
            </a>
            <a href="<?php print $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left f_md_none d_md_inline_b">
                <i class="icon-link"></i>
            </a>
        </div>
    </div>
    <!--description-->
    <figcaption>
        <h6 class="lh_large m_bottom_3"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php echo $title; ?></a></h6>
        <!--project's info-->
        <ul class="dotted_list m_bottom_8 color_grey_light_2 lh_ex_small">
            <li class="m_right_15 relative d_inline_m">
                <a href="#" class="color_grey_light_2 fs_small">
                    <i class="icon-picture"></i>
                </a>
            </li>
            <li class="m_right_15 relative d_inline_m">
                <a href="#" class="color_grey fs_small">
                    <i><?php print format_date($node->created, 'custom', 'M d, Y'); ?></i>
                </a>
            </li>
            <li class="m_right_15 relative d_inline_m text-pro-links">
                <?php print illusion_format_comma_field('field_category', $node); ?>
            </li>
        </ul>
    </figcaption>
</figure>