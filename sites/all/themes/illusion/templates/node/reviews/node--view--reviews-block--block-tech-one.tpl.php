<?php
global $default_img;
$image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<figure>
    <a href="<?php echo $node_url; ?>" class="d_block wrapper r_corners m_bottom_20">
        <img src="<?php echo $image; ?>" alt="">
    </a>
    <figcaption>
        <h4 class="fw_light m_bottom_5 fs_middle"><a href="<?php echo $node_url; ?>" class="color_dark tr_all"><?php echo $title; ?></a></h4>
        <ul class="dotted_list m_bottom_8 color_grey_light_2 lh_ex_small">
            <li class="m_right_15 relative d_inline_m">
                <a href="#" class="color_grey_light_2 fs_small">
                    <i class="icon-doc-text-inv"></i>
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
        <p class="m_bottom_12">
            <?php
            $summary = strip_tags($node->body['und'][0]['summary']);
            $summary_after = (strlen($summary) > 303) ? substr($summary, 0, 300) . '...' : $summary;
            echo $summary_after;
            ?>
        </p>
        <a href="<?php echo $node_url; ?>" class="color_purple d_inline_b color_pink_hover d_block m_right_20 fw_light">
            <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                <i class="icon-angle-right"></i>
            </span>
            Read More
        </a>
    </figcaption>
</figure>