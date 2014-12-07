<?php
global $default_img;
$image = $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
$image_slide = "";
if ($items = field_get_items('node', $node, 'field_gallery')) {
    if (count($items) == 1) {
        $image_slide = 'false';
    } elseif (count($items) > 1) {
        $image_slide = 'true';
    }
}
if (!empty($node->field_video['und'][0]['value'])) :
    $post_type = 'video';
elseif (!empty($node->field_audio['und'][0]['value'])):
    $post_type = 'audio';
elseif (!empty($node->field_quote['und'][0]['value'])):
    $post_type = 'quote';
elseif ($image_slide != '') :
    $post_type = 'slide';
elseif (!empty($node->field_link['und'][0]['value'])) :
    $post_type = 'link';
else:
    $post_type = 'image';
endif;
?>
<article class="clearfix m_bottom_35 m_xs_bottom_20">
    <a href="<?php print $node_url; ?>" class="d_block r_corners wrapper f_left m_right_20 m_md_right_10 m_xs_right_20 f_sm_none m_sm_bottom_10 d_sm_inline_b d_xs_block f_xs_left m_xs_bottom_0">
        <img src="<?php echo $image; ?>" alt="" width="80">
    </a>
    <a href="<?php print $node_url; ?>" class="color_dark d_block lh_medium m_bottom_5"><b><?php print $title; ?></b></a>
    <ul class="dotted_list color_grey_light_2 article_stats">
        <li class="m_right_15 relative d_inline_m">
            <a href="<?php print $node_url; ?>" class="color_grey_light_2 fs_small">
                <?php
                switch ($post_type):
                    case 'slide';
                        echo '<i class="icon-picture"></i>';
                        break;
                    case 'audio';
                        echo '<i class="icon-music-1"></i>';
                        break;
                    case 'video';
                        echo '<i class="icon-video"></i>';
                        break;
                    case 'quote';
                        echo '<i class="icon-quote"></i>';
                        break;
                    case 'link';
                        echo '<i class="icon-link"></i>';
                        break;
                    case 'image';
                        echo '<i class="icon-picture-1"></i>';
                        break;
                    default:
                        break;
                endswitch;
                ?>
            </a>
        </li>
        <li class="m_right_15 relative d_inline_m">
            <a href="<?php print $node_url; ?>" class="fs_small color_grey">
                <i><?php print format_date($node->created, 'custom', 'M d,Y'); ?></i>
            </a>
        </li>
        <li class="m_right_15 relative d_inline_m category-style">
            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
        </li>
    </ul>
</article>