<?php
global $default_img;
$image = $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<li class="tr_all f_md_left t_md_align_c f_xs_none t_xs_align_l">
    <article class="clearfix">
        <div class="d_block wrapper f_left m_right_20 m_md_right_10 m_xs_right_20 f_sm_none m_sm_bottom_10 d_sm_inline_b d_xs_block f_xs_left m_xs_bottom_0 mgz-proj-img-holder-sidebar">
            <img src="<?php echo $image; ?>" alt="" class="img-mgz-top-sidebar r_corners">
        </div>
        <p class="color_dark d_block lh_medium m_bottom_5 tr_all title-mgz-top-sidebar"><b><?php echo $title; ?></b></p>
        <ul class="dotted_list color_grey_light_2 article_stats stat-mgz-top-sidebar">
            <li class="m_right_15 relative d_inline_m">
                <span class="color_grey_light_2 fs_small">
                    <i class="icon-picture"></i>
                </span>
            </li>
            <li class="m_right_15 relative d_inline_m">
                <span class="fs_small color_grey">
                    <i><?php print format_date($node->created, 'custom', 'd M, Y'); ?></i>
                </span>
            </li>
            <li class="m_right_15 relative d_inline_m text-pro-links"><?php print illusion_format_comma_field('field_category', $node); ?></li>
        </ul>
    </article>
</li>