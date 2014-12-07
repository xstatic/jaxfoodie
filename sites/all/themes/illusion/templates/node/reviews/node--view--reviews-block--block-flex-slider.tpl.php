<?php
global $default_img;
$image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<li class="">
    <img src="<?php echo $image; ?>" alt="" class="">
    <div class="fs_caption r_corners wrapper d_xs_none">
        <header class="bg_light">
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
                <li class="relative d_inline_m text-pro-links"><?php print illusion_format_comma_field('field_category', $node); ?></li>
            </ul>
        </header>
        <h3 class="color_dark fw_light m_bottom_12"><?php echo $title; ?></h3>
        <p class="m_bottom_12 fs_medium">
            <?php
            $summary = strip_tags($node->body['und'][0]['summary']);
            $summary_after = (strlen($summary) > 183) ? substr($summary, 0, 180) . '...' : $summary;
            echo $summary_after;
            ?>
        </p>
        <a href="<?php print $node_url; ?>" class="color_purple d_inline_b color_pink_hover d_block m_right_20 fw_light">
            <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                <i class="icon-angle-right"></i>
            </span>
            Read More
        </a>
    </div>
</li>