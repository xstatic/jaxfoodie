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
<figure class="portfolio_item<?php echo $filter_string; ?>">
    <!--image-->
    <div class="popup_wrap relative r_corners wrapper db_xs_centered">
        <img src="<?php echo $image; ?>" alt="" class="">
        <div class="project_description type_2 vc_child t_align_c tr_all_long">
            <div class="d_inline_m">
                <h4 class="lh_inherit m_xs_bottom_5 d_md_none d_xs_block"><a href="<?php echo $node_url; ?>" class="color_light tr_all not_hover"><?php echo $title; ?></a></h4>
                <!--project's info-->
                <ul class="dotted_list m_bottom_5 color_light d_md_none d_xs_block">
                    <li class="m_right_15 relative d_inline_m">
                        <a href="#" class="color_light not_hover fs_small">
                            <?php if (isset($node->field_video['und']) && strip_tags($node->field_video['und'][0]['value']) != "") : ?>
                                <i class="icon-video"></i>
                            <?php else: ?>
                                <i class="icon-picture"></i>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="m_right_15 relative d_inline_m category wtext-pro-links"><?php print illusion_format_comma_field('field_category', $node); ?></li>
                </ul>
                <div class="d_inline_b clearfix">
                    <?php if (isset($node->field_video['und']) && strip_tags($node->field_video['und'][0]['value']) != "") : ?>
                        <a href="<?php echo strip_tags($node->field_video['und'][0]['value']); ?>" data-group="portfolio" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                            <i class="icon-play"></i>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo $image; ?>" data-group="portfolio" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10">
                            <i class="icon-plus"></i>
                        </a>
                        <a href="<?php echo $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                            <i class="icon-link"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</figure>