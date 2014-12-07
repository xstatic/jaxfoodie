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

<?php if (!$page) : ?>
    <?php print render($title_prefix); ?>
    <?php
    switch ($post_type):
        case 'video':
            ?>
            <!--date,category,likes-->
            <div class="f_left blog_side_container w_sm_auto f_xs_none m_xs_bottom_5">
                <!--date-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 r_corners blog_side_button bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                    <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                    <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                </a>
                <!--category-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                    <i class="icon-video d_inline_m"></i>
                </a>

            </div>
            <!--post content-->
            <figure>
                <div class="iframe_video_wrap m_bottom_20">
                    <?php print $node->field_video['und'][0]['value']; ?>
                </div>
                <figcaption>
                    <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                    <ul class="dotted_list m_bottom_5 color_grey_light_2">
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_scheme_hover">
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
            <?php break; ?>

            <!-- AUDIO POST -->
        <?php case 'audio': ?>
            <!--date,category,likes-->
            <div class="f_left blog_side_container w_sm_auto f_xs_none m_xs_bottom_5">
                <!--date-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button r_corners bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                    <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                    <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                </a>
                <!--category-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                    <i class="icon-music-1 d_inline_m"></i>
                </a>

            </div>
            <!--post content-->
            <figure>
                <?php print $node->field_audio['und'][0]['value']; ?>
                <figcaption>
                    <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                    <ul class="dotted_list m_bottom_5 color_grey_light_2">
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_scheme_hover">
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
            <?php break; ?>
            <!-- QUOTE POST -->
        <?php case 'quote': ?>
            <!--date,category,likes-->
            <div class="f_left blog_side_container w_sm_auto f_xs_none m_xs_bottom_5">
                <!--date-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button r_corners bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                    <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                    <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                </a>
                <!--category-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                    <i class="icon-quote d_inline_m"></i>
                </a>

            </div>
            <!--post content-->
            <figure>
                <blockquote class="r_corners relative type_3 fs_large color_dark m_bottom_20 bg_light_3">
                    <?php print $node->field_quote['und'][0]['value']; ?>
                </blockquote>
                <figcaption>
                    <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                    <ul class="dotted_list m_bottom_10 color_grey_light_2">
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_scheme_hover">
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
            <?php break; ?>

            <!-- SLIDE POST -->
        <?php case 'slide': ?>
            <!--date,category,likes-->
            <div class="m_xs_bottom_5 f_left f_xs_none w_sm_auto blog_side_container">
                <!--date-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 r_corners blog_side_button bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                    <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                    <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                </a>
                <!--category-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                    <i class="icon-picture d_inline_m"></i>
                </a>

            </div>
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
                    <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                    <ul class="dotted_list m_bottom_5 color_grey_light_2">
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_scheme_hover">
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
            <?php break; ?>

            <!-- LINK POST -->
        <?php case 'link': ?>
            <!--date,category,likes-->
            <div class="f_left blog_side_container w_sm_auto f_xs_none m_xs_bottom_5">
                <!--date-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 r_corners blog_side_button bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                    <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                    <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                </a>
                <!--category-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                    <i class="icon-link d_inline_m"></i>
                </a>

            </div>
            <!--post content-->
            <figure>
                <a href="<?php print $node_url; ?>" class="d_block r_corners border_color_purple link_container bg_color_purple_hover color_light_hover m_bottom_20 color_purple tr_all t_xs_align_c">
                    <span class="d_inline_m icon_wrap_size_3 color_purple circle m_right_15 tr_all m_xs_bottom_10">
                        <i class="icon-link"></i>
                    </span>
                    <span class="fs_large d_inline_m d_xs_block"><?php print $node->field_link['und'][0]['value']; ?></span>
                </a>
                <figcaption>
                    <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                    <ul class="dotted_list m_bottom_5 color_grey_light_2">
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_scheme_hover">
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
            <?php break; ?>

            <!-- IMAGE POST -->
        <?php case 'image': ?>
            <!--date,category,likes-->
            <div class="blog_side_container w_sm_auto f_left f_xs_none m_xs_bottom_5">
                <!--date-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button r_corners bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                    <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                    <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                </a>
                <!--category-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                    <i class="icon-picture-1 d_inline_m"></i>
                </a>

            </div>
            <!--post content-->
            <figure>
                <a href="<?php print $node_url; ?>" class="d_block wrapper r_corners m_bottom_20">
                    <img src="<?php echo $image; ?>" alt="">
                </a>
                <figcaption>
                    <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                    <ul class="dotted_list m_bottom_5 color_grey_light_2">
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="<?php print $node_url; ?>" class="color_scheme_hover">
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
            <?php break; ?>

        <?php
        default:
            break;
    endswitch;
    ?>
    <?php print render($title_suffix); ?>
<?php endif; ?>


