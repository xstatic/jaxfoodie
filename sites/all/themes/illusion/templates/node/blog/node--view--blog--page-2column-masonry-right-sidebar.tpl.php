<?php
/**
 * @file
 * illusion's theme implementation to display a single Portfolio node.
 */
global $base_url;
global $default_img;

$image = $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
$next = illusion_pagination($node, 'n');
$prev = illusion_pagination($node, 'p');

if ($next != NULL) {
    $next_url = url('node/' . $next, array('absolute' => TRUE));
}

if ($prev != NULL) {
    $prev_url = url('node/' . $prev, array('absolute' => TRUE));
}

$image_slide = "";

if ($items = field_get_items('node', $node, 'field_gallery')) {
    if (count($items) == 1) {
        $image_slide = 'false';
    } elseif (count($items) > 1) {
        $image_slide = 'true';
    }
}

$img_count = 0;
$counter = count($items);

$termid = arg(2);
?>
<div class="blog_isotope_item">
    <!-- VIDEO POST -->
    <?php if (!empty($node->field_video['und'][0]['value'])) : ?>	
        <!--post-->
        <article class="r_corners border_grey">
            <!--post content-->
            <figure>
                <div class="iframe_video_wrap m_bottom_20">
                    <?php print $node->field_video['und'][0]['value']; ?>
                </div>
                <figcaption>
                    <h4 class="fw_light m_bottom_5 fs_middle"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h4>
                    <ul class="dotted_list m_bottom_8 color_grey_light_2 lh_ex_small">
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey_light_2 fs_small">
                                <i class="icon-video"></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey fs_small">
                                <i><?php print format_date($node->created, 'custom', 'F d, Y'); ?></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>#comment" class="color_scheme_hover">
                                <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                            </a>
                        </li>
                    </ul>
                    <div class="fw_light m_bottom_12"><?php print $node->body['und'][0]['summary']; ?></div>
                    <a href="<?php print $node_url; ?>" class="color_purple d_inline_b color_pink_hover d_block m_right_20 fw_light">
                        <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-right"></i>
                        </span>
                        Read More
                    </a>
                </figcaption>
            </figure>
        </article>

        <!-- AUDIO POST -->
    <?php elseif (!empty($node->field_audio['und'][0]['value'])) : ?>
        <!--post-->
        <article class="r_corners border_grey">
            <!--post content-->
            <figure>
                <?php print $node->field_audio['und'][0]['value']; ?>
                <figcaption>
                    <h4 class="fw_light m_bottom_5 fs_middle"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h4>
                    <ul class="dotted_list m_bottom_8 color_grey_light_2 lh_ex_small">
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey_light_2 fs_small">
                                <i class="icon-music-1"></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey fs_small">
                                <i><?php print format_date($node->created, 'custom', 'F d, Y'); ?></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>#commment" class="color_scheme_hover">
                                <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                            </a>
                        </li>
                    </ul>
                    <div class="fw_light m_bottom_12"><?php print $node->body['und'][0]['summary']; ?></div>
                    <a href="<?php print $node_url; ?>" class="color_purple d_inline_b color_pink_hover d_block m_right_20 fw_light">
                        <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-right"></i>
                        </span>
                        Read More
                    </a>
                </figcaption>
            </figure>
        </article>

        <!-- QUOTE POST -->
    <?php elseif (!empty($node->field_quote['und'][0]['value'])) : ?>
        <!--post-->
        <article class="r_corners border_grey">
            <!--post content-->
            <figure>
                <blockquote class="r_corners relative type_3 fs_large color_dark m_bottom_20 bg_light_3">
                    <?php print $node->field_quote['und'][0]['value']; ?>
                </blockquote>
                <figcaption>
                    <h4 class="fw_light m_bottom_5 fs_middle"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h4>
                    <ul class="dotted_list m_bottom_8 color_grey_light_2 lh_ex_small">
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey_light_2 fs_small">
                                <i class="icon-quote"></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey fs_small">
                                <i><?php print format_date($node->created, 'custom', 'F d, Y'); ?></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>#comment" class="color_scheme_hover">
                                <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                            </a>
                        </li>
                    </ul>
                    <a href="<?php print $node_url; ?>" class="color_purple d_inline_b color_pink_hover d_block m_right_20 fw_light">
                        <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-right"></i>
                        </span>
                        Read More
                    </a>
                </figcaption>
            </figure>
        </article>

        <!-- SLIDE POST -->
    <?php elseif ($image_slide != '') : ?>
        <!--post-->
        <article class="r_corners border_grey">
            <!--post content-->
            <figure>
                <div class="m_bottom_20 r_corners wrapper simple_slideshow relative">
                    <ul class="slides">
                        <?php while ($img_count < $counter) { ?>
                            <li><img src="<?php echo file_create_url($node->field_gallery['und'][$img_count]['uri']); ?>" alt=""></li>
                            <?php
                            $img_count++;
                        }
                        ?>
                    </ul>
                </div>
                <figcaption>
                    <h4 class="fw_light m_bottom_5 fs_middle"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h4>
                    <ul class="dotted_list m_bottom_8 color_grey_light_2 lh_ex_small">
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey_light_2 fs_small">
                                <i class="icon-picture"></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey fs_small">
                                <i><?php print format_date($node->created, 'custom', 'F d, Y'); ?></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>#comment" class="color_scheme_hover">
                                <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                            </a>
                        </li>
                    </ul>
                    <div class="fw_light m_bottom_12"><?php print $node->body['und'][0]['summary']; ?></div>
                    <a href="<?php print $node_url; ?>" class="color_purple d_inline_b color_pink_hover d_block m_right_20 fw_light">
                        <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-right"></i>
                        </span>
                        Read More
                    </a>
                </figcaption>
            </figure>
        </article>

        <!-- LINK POST -->
    <?php elseif (!empty($node->field_link['und'][0]['value'])) : ?>
        <!--post-->
        <article class="r_corners border_grey">
            <!--post content-->
            <figure>
                <a href="<?php print $node_url; ?>" class="d_block r_corners border_color_purple link_container bg_color_purple_hover color_light_hover m_bottom_20 color_purple tr_all t_md_align_c">
                    <span class="d_inline_m icon_wrap_size_3 color_purple circle m_right_15 m_md_right_0 tr_all m_md_bottom_10">
                        <i class="icon-link"></i>
                    </span>
                    <span class="fs_large d_inline_m d_md_block"><?php print $node->field_link['und'][0]['value']; ?></span>
                </a>
                <figcaption>
                    <h4 class="fw_light m_bottom_5 fs_middle"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h4>
                    <ul class="dotted_list m_bottom_8 color_grey_light_2 lh_ex_small">
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey_light_2 fs_small">
                                <i class="icon-link"></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey fs_small">
                                <i><?php print format_date($node->created, 'custom', 'F d, Y'); ?></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>#comment" class="color_scheme_hover">
                                <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                            </a>
                        </li>
                    </ul>
                    <div class="fw_light m_bottom_12"><?php print $node->body['und'][0]['summary']; ?></div>
                    <a href="<?php print $node_url; ?>" class="color_purple d_inline_b color_pink_hover d_block m_right_20 fw_light">
                        <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-right"></i>
                        </span>
                        Read More
                    </a>
                </figcaption>
            </figure>
        </article>

        <!-- IMAGE POST -->
    <?php else : ?>
        <!--post-->
        <article class="r_corners border_grey">
            <!--post content-->
            <figure>
                <a href="<?php print $node_url; ?>" class="d_block wrapper r_corners m_bottom_20">
                    <img src="<?php echo $image; ?>" alt="">
                </a>
                <figcaption>
                    <h4 class="fw_light m_bottom_5 fs_middle"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h4>
                    <ul class="dotted_list m_bottom_8 color_grey_light_2 lh_ex_small">
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey_light_2 fs_small">
                                <i class="icon-picture-1"></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_grey fs_small">
                                <i><?php print format_date($node->created, 'custom', 'F d, Y'); ?></i>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>#comment" class="color_scheme_hover">
                                <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                            </a>
                        </li>
                    </ul>
                    <div class="fw_light m_bottom_12"><?php print $node->body['und'][0]['summary']; ?></div>
                    <a href="<?php print $node_url; ?>" class="color_purple d_inline_b color_pink_hover d_block m_right_20 fw_light">
                        <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-right"></i>
                        </span>
                        Read More
                    </a>
                </figcaption>
            </figure>
        </article>
    <?php endif; ?>
</div>