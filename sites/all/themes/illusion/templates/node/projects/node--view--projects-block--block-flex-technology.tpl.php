<?php
global $default_img;
$image = $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<li class="tr_delay">
    <article class="clearfix">
        <a href="<?php print $node_url; ?>" class="d_block r_corners wrapper f_left m_right_20 m_md_right_10 m_xs_right_20">
            <img src="<?php echo $image; ?>" alt="" width="80">
        </a>
        <a href="<?php print $node_url; ?>" class="color_dark d_block lh_medium m_bottom_5"><b><?php echo $title; ?></b></a>
        <ul class="dotted_list color_grey_light_2 article_stats">
            <li class="m_right_15 relative d_inline_m">
                <a href="<?php print $node_url; ?>" class="color_grey_light_2 fs_small">
                    <i class="icon-picture"></i>
                </a>
            </li>
            <li class="m_right_15 relative d_inline_m">
                <a href="<?php print $node_url; ?>" class="fs_small color_grey">
                    <i><?php print format_date($node->created, 'custom', 'd M, Y'); ?></i>
                </a>
            </li>
            <li class="m_right_15 relative d_inline_m text-pro-links technology-link">
                <?php print illusion_format_comma_field('field_category', $node); ?>
            </li>
        </ul>
    </article>
</li>