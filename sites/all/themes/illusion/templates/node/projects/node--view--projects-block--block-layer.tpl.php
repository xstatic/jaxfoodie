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
<figure class="portfolio_item t_xs_align_c type_2<?php echo $filter_string; ?>" data-appear-animation-delay="0">
    <!--image-->
    <div class="popup_wrap d_xs_inline_b d_mxs_block relative r_corners wrapper pro-image-holder portfolio" data-appear-animation="fadeInDown">
        <img src="<?php echo $image; ?>" alt="" class="tr_all">
        <div class="project_description vc_child t_align_c tr_all"><div class="d_inline_m">
                <div class="d_inline_b clearfix">
                    <a href="<?php echo $image; ?>" data-group="portfolio" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10">
                        <i class="icon-plus"></i>
                    </a>
                    <a href="<?php print $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                        <i class="icon-link"></i>
                    </a>
                </div>
            </div></div>
        <div class="project_description_up bg_light_3 tr_all">
            <div class="d_table w_full">
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-8 d_table_cell v_align_m f_none t_align_l">
                    <h4 class="m_bottom_5"><a href="<?php print $node_url; ?>" class="color_dark d_block wrapper tr_all d_inline_b"><?php echo $title; ?></a></h4>
                    <div class="color_grey text-pro-links">
                        <?php print illusion_format_comma_field('field_category', $node); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</figure>