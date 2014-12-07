<?php
global $default_img;
$image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
$filter_string = "";
foreach ($node->field_category['und'] as $category) {
    $filter_string .= ' ' . str_replace(' ', '_', strtolower($category['taxonomy_term']->name));
}
?>
<div class="wfcarousel_item relative<?php echo $filter_string; ?>">
    <div class="popup_wrap wrapper relative d_mxs_block">
        <img src="<?php echo $image; ?>" alt="" class="img-agency-featured">
        <div class="popup_buttons tr_all_long t_xs_align_c w_xs_full">
            <a href="<?php echo $image; ?>" data-group="office" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10 f_xs_none d_xs_inline_b">
                <i class="icon-plus"></i>
            </a>
            <a href="<?php echo $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10 f_xs_none d_xs_inline_b">
                <i class="icon-link"></i>
            </a>
        </div>
    </div>
    <!--animated description-->
    <div class="p_carousel_description bg_light_3 tr_all">
        <div class="d_table w_full">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 d_table_cell v_align_m f_none">
                <h4 class="m_bottom_5">
                    <a href="<?php echo $node_url; ?>" class="color_dark d_block wrapper ellipsis text-nowrap-agency">
                        <?php echo $title; ?>
                    </a>
                </h4>
                <div class="color_grey text-pro-links">
                    <?php print illusion_format_comma_field('field_category', $node); ?>
                </div>
            </div>
        </div>
    </div>
</div>