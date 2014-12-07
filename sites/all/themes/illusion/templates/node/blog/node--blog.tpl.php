<?php
/**
 * @file
 * illusion's theme implementation to display a single Portfolio node.
 */
global $base_url;
global $theme_root;
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

// echo '<pre>';
// print_r($termid);
// exit();
?>

<?php if (!$page) : ?>
    <section class="category-items">
        <div class="container clearfix">
            <!-- VIDEO POST -->
            <?php if (!empty($node->field_video['und'][0]['value'])) : ?>	
                <!--post-->
                <article>
                    <!--post content-->
                    <figure>
                        <div class="iframe_video_wrap m_bottom_20">
                            <?php print $node->field_video['und'][0]['value']; ?>
                        </div>
                        <figcaption class="blog_post">
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
                            <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                            <ul class="dotted_list m_bottom_5 color_grey_light_2">
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
                <article>
                    <!--post content-->
                    <figure>
                        <?php print $node->field_audio['und'][0]['value']; ?>
                        <figcaption class="blog_post">
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
                            <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                            <ul class="dotted_list m_bottom_5 color_grey_light_2">
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
                <article>
                    <!--post content-->
                    <figure>
                        <blockquote class="r_corners relative type_3 fs_large color_dark m_bottom_20 bg_light_3">
                            <?php print $node->field_quote['und'][0]['value']; ?>
                        </blockquote>
                        <figcaption class="blog_post">
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
                            <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                            <ul class="dotted_list m_bottom_10 color_grey_light_2">
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
                <article>
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
                        <figcaption class="blog_post">
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
                            <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                            <ul class="dotted_list m_bottom_5 color_grey_light_2">
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
                <article class="blog_post">
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
                        <a href="<?php print $node_url; ?>" class="d_block r_corners border_color_purple link_container bg_color_purple_hover color_light_hover m_bottom_20 color_purple tr_all t_md_align_c">
                            <span class="d_inline_m icon_wrap_size_3 color_purple circle m_right_15 m_md_right_0 tr_all m_md_bottom_10">
                                <i class="icon-link"></i>
                            </span>
                            <span class="fs_large d_inline_m d_md_block"><?php print $node->field_link['und'][0]['value']; ?></span>
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
                                    <a href="#" class="color_scheme_hover">
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
                <article>
                    <!--post content-->
                    <figure>
                        <a href="<?php print $node_url; ?>" class="d_block wrapper r_corners m_bottom_20">
                            <img src="<?php echo $image; ?>" alt="">
                        </a>
                        <figcaption class="blog_post">
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
                            <h3 class="fw_light"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php print $title; ?></a></h3>
                            <ul class="dotted_list m_bottom_5 color_grey_light_2">
                                <li class="m_right_15 relative d_inline_m">
                                    <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                                </li>
                                <li class="m_right_15 relative d_inline_m category-style">
                                    <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                                </li>
                                <li class="m_right_15 relative d_inline_m">
                                    <a href="#" class="color_scheme_hover">
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
    </section>
<?php elseif ($page) : ?>
    <?php if (isset($node->field_layout['und']) && $node->field_layout['und'][0]['taxonomy_term']->name == 'Fullwidth') : ?>
        <section class="section_offset">
            <div class="container">
                <!--post-->
                <article class="clearfix m_bottom_45 m_xs_bottom_30 blog_post">
                    <!--date,category,likes-->
                    <div class="blog_side_container w_sm_auto f_left f_xs_none m_xs_bottom_5">
                        <!--date-->
                        <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button r_corners bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                            <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                            <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                        </a>
                        <!--category-->
                        <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                            <?php
                            switch ($post_type):
                                case 'slide';
                                    echo '<i class="icon-picture d_inline_m"></i>';
                                    break;
                                case 'audio';
                                    echo '<i class="icon-music-1 d_inline_m"></i>';
                                    break;
                                case 'video';
                                    echo '<i class="icon-video d_inline_m"></i>';
                                    break;
                                case 'quote';
                                    echo '<i class="icon-quote d_inline_m"></i>';
                                    break;
                                case 'link';
                                    echo '<i class="icon-link d_inline_m"></i>';
                                    break;
                                case 'image';
                                    echo '<i class="icon-picture-1 d_inline_m"></i>';
                                    break;
                                default:
                                    break;
                            endswitch;
                            ?>                    
                        </a>

                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_floating_style addthis_counter_style">
                            <a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
                            <a class="addthis_button_tweet" tw:count="vertical"></a>
                            <a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
                            <a class="addthis_counter"></a>
                        </div>
                    </div>
                    <!--post content-->
                    <figure>
                        <?php
                        switch ($post_type):
                            case 'slide':
                                ?>
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
                                <?php
                                break;
                            case 'audio':
                                ?>
                                <?php print $node->field_audio['und'][0]['value']; ?>
                                <?php
                                break;
                            case 'video':
                                ?>
                                <div class="iframe_video_wrap m_bottom_20">
                                    <?php print $node->field_video['und'][0]['value']; ?>
                                </div>
                                <?php
                                break;
                            case 'quote':
                                ?>
                                <blockquote class="r_corners relative type_3 fs_large color_dark m_bottom_20 bg_light_3">
                                    <?php print $node->field_quote['und'][0]['value']; ?>
                                </blockquote>
                                <?php
                                break;
                            case 'link':
                                ?>
                                <a href="<?php print $node_url; ?>" class="d_block r_corners border_color_purple link_container bg_color_purple_hover color_light_hover m_bottom_20 color_purple tr_all t_xs_align_c">
                                    <span class="d_inline_m icon_wrap_size_3 color_purple circle m_right_15 tr_all m_xs_bottom_10 f_sm_left d_sm_block f_xs_none d_xs_inline_b">
                                        <i class="icon-link"></i>
                                    </span>
                                    <span class="fs_large d_inline_m d_sm_block"><?php print $node->field_link['und'][0]['value']; ?></span>
                                </a>
                                <?php
                                break;
                            case 'image':
                                ?>
                                <img src="<?php echo $image; ?>" alt="" class="r_corners m_bottom_20">
                                <?php
                                break;
                            default:
                                break;
                        endswitch;
                        ?>

                        <figcaption>
                            <h3 class="fw_light color_dark"><?php print $title; ?></h3>
                            <ul class="dotted_list m_bottom_5 color_grey_light_2">
                                <li class="m_right_15 relative d_inline_m">
                                    <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                                </li>
                                <li class="m_right_15 relative d_inline_m category-style">
                                    <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                                </li>
                                <li class="m_right_15 relative d_inline_m">
                                    <a href="#" class="color_scheme_hover">
                                        <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                                    </a>
                                </li>
                            </ul>
                            <?php print $node->body['und'][0]['value']; ?>
                            <!--tags-->
                            <i class="icon-tag-1 color_grey_light_2 d_inline_m m_right_5 fs_large tags_icon"></i>
                            <div class="d_inline_m fw_light tag-style">
                                <?php print illusion_format_comma_field('field_tags', $node); ?>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <hr class="m_bottom_20">

                <!--prev next post buttons-->
                <?php if ($page && module_exists('prev_next')): ?>
                    <div class="clearfix m_bottom_45 m_xs_bottom_30">
                        <?php if (isset($prev_url)) : ?>
                            <a href="<?php echo $prev_url; ?>" class="color_purple d_inline_b color_pink_hover d_block f_left fw_light">
                                <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                                    <i class="icon-angle-left"></i>
                                </span>
                                Prev Post
                            </a>
                        <?php endif; ?>
                        <?php if (isset($next_url)) : ?>
                            <a href="<?php echo $next_url; ?>" class="color_purple d_inline_b color_pink_hover d_block f_right fw_light">
                                Next Post
                                <span class="d_inline_m m_left_5 icon_wrap_size_0 circle color_grey_light tr_all">
                                    <i class="icon-angle-right"></i>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>	
                <div class="clearfix"></div>

                <div id="comments" class="padding-top">
                    <?php if ($comment == COMMENT_NODE_OPEN) : ?>
                        <?php print render($content['comments']); ?>
                    <?php endif; ?>
                </div><!-- end comments -->               
            </div>
        </section>
    <?php elseif (isset($node->field_layout['und']) && $node->field_layout['und'][0]['taxonomy_term']->name == 'Sidebar') : ?>
        <!--post-->
        <article class="clearfix m_bottom_45 m_xs_bottom_30 blog_post">
            <!--date,category,likes-->
            <div class="blog_side_container w_sm_auto f_left f_xs_none m_xs_bottom_5">
                <!--date-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button r_corners bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                    <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                    <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                </a>
                <!--category-->
                <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                    <?php
                    switch ($post_type):
                        case 'slide';
                            echo '<i class="icon-picture d_inline_m"></i>';
                            break;
                        case 'audio';
                            echo '<i class="icon-music-1 d_inline_m"></i>';
                            break;
                        case 'video';
                            echo '<i class="icon-video d_inline_m"></i>';
                            break;
                        case 'quote';
                            echo '<i class="icon-quote d_inline_m"></i>';
                            break;
                        case 'link';
                            echo '<i class="icon-link d_inline_m"></i>';
                            break;
                        case 'image';
                            echo '<i class="icon-picture-1 d_inline_m"></i>';
                            break;
                        default:
                            break;
                    endswitch;
                    ?>                    
                </a>

                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_floating_style addthis_counter_style">
                    <a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
                    <a class="addthis_button_tweet" tw:count="vertical"></a>
                    <a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
                    <a class="addthis_counter"></a>
                </div>
            </div>
            <!--post content-->
            <figure>
                <?php
                switch ($post_type):
                    case 'slide':
                        ?>
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
                        <?php
                        break;
                    case 'audio':
                        ?>
                        <?php print $node->field_audio['und'][0]['value']; ?>
                        <?php
                        break;
                    case 'video':
                        ?>
                        <div class="iframe_video_wrap m_bottom_20">
                            <?php print $node->field_video['und'][0]['value']; ?>
                        </div>
                        <?php
                        break;
                    case 'quote':
                        ?>
                        <blockquote class="r_corners relative type_3 fs_large color_dark m_bottom_20 bg_light_3">
                            <?php print $node->field_quote['und'][0]['value']; ?>
                        </blockquote>
                        <?php
                        break;
                    case 'link':
                        ?>
                        <a href="<?php print $node_url; ?>" class="d_block r_corners border_color_purple link_container bg_color_purple_hover color_light_hover m_bottom_20 color_purple tr_all t_xs_align_c">
                            <span class="d_inline_m icon_wrap_size_3 color_purple circle m_right_15 tr_all m_xs_bottom_10 f_sm_left d_sm_block f_xs_none d_xs_inline_b">
                                <i class="icon-link"></i>
                            </span>
                            <span class="fs_large d_inline_m d_sm_block"><?php print $node->field_link['und'][0]['value']; ?></span>
                        </a>
                        <?php
                        break;
                    case 'image':
                        ?>
                        <img src="<?php echo $image; ?>" alt="" class="r_corners m_bottom_20">
                        <?php
                        break;
                    default:
                        break;
                endswitch;
                ?>

                <figcaption>
                    <h3 class="fw_light color_dark"><?php print $title; ?></h3>
                    <ul class="dotted_list m_bottom_5 color_grey_light_2">
                        <li class="m_right_15 relative d_inline_m">
                            <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m category-style">
                            <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                        </li>
                        <li class="m_right_15 relative d_inline_m">
                            <a href="#" class="color_scheme_hover">
                                <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                            </a>
                        </li>
                    </ul>
                    <?php print $node->body['und'][0]['value']; ?>
                    <!--tags-->
                    <i class="icon-tag-1 color_grey_light_2 d_inline_m m_right_5 fs_large tags_icon"></i>
                    <div class="d_inline_m fw_light tag-style">
                        <?php print illusion_format_comma_field('field_tags', $node); ?>
                    </div>
                </figcaption>
            </figure>
        </article>
        <hr class="m_bottom_20">

        <!--prev next post buttons-->
        <?php if ($page && module_exists('prev_next')): ?>
            <div class="clearfix m_bottom_45 m_xs_bottom_30">
                <?php if (isset($prev_url)) : ?>
                    <a href="<?php echo $prev_url; ?>" class="color_purple d_inline_b color_pink_hover d_block f_left fw_light">
                        <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-left"></i>
                        </span>
                        Prev Post
                    </a>
                <?php endif; ?>
                <?php if (isset($next_url)) : ?>
                    <a href="<?php echo $next_url; ?>" class="color_purple d_inline_b color_pink_hover d_block f_right fw_light">
                        Next Post
                        <span class="d_inline_m m_left_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-right"></i>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>	
        <div class="clearfix"></div>

        <div id="comments" class="padding-top">
            <?php if ($comment == COMMENT_NODE_OPEN) : ?>
                <?php print render($content['comments']); ?>
            <?php endif; ?>
        </div><!-- end comments --> 
    <?php else: ?>
        <section class="section_offset">
            <div class="container">
                <!--post-->
                <article class="clearfix m_bottom_45 m_xs_bottom_30 blog_post">
                    <!--date,category,likes-->
                    <div class="blog_side_container w_sm_auto f_left f_xs_none m_xs_bottom_5">
                        <!--date-->
                        <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button r_corners bg_color_purple color_light not_hover t_align_c blog_date m_bottom_5">
                            <span class="d_block day_of_the_month fw_light"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                            <span class="d_block tt_uppercase fs_medium"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                        </a>
                        <!--category-->
                        <a href="<?php print $node_url; ?>" class="d_block d_xs_inline_b m_xs_right_5 blog_side_button vc_child t_align_c color_purple bg_color_purple_hover color_light_hover bg_light_3 r_corners m_bottom_5 tr_all">
                            <?php
                            switch ($post_type):
                                case 'slide';
                                    echo '<i class="icon-picture d_inline_m"></i>';
                                    break;
                                case 'audio';
                                    echo '<i class="icon-music-1 d_inline_m"></i>';
                                    break;
                                case 'video';
                                    echo '<i class="icon-video d_inline_m"></i>';
                                    break;
                                case 'quote';
                                    echo '<i class="icon-quote d_inline_m"></i>';
                                    break;
                                case 'link';
                                    echo '<i class="icon-link d_inline_m"></i>';
                                    break;
                                case 'image';
                                    echo '<i class="icon-picture-1 d_inline_m"></i>';
                                    break;
                                default:
                                    break;
                            endswitch;
                            ?>                    
                        </a>

                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_floating_style addthis_counter_style">
                            <a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
                            <a class="addthis_button_tweet" tw:count="vertical"></a>
                            <a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
                            <a class="addthis_counter"></a>
                        </div>
                    </div>
                    <!--post content-->
                    <figure>
                        <?php
                        switch ($post_type):
                            case 'slide':
                                ?>
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
                                <?php
                                break;
                            case 'audio':
                                ?>
                                <?php print $node->field_audio['und'][0]['value']; ?>
                                <?php
                                break;
                            case 'video':
                                ?>
                                <div class="iframe_video_wrap m_bottom_20">
                                    <?php print $node->field_video['und'][0]['value']; ?>
                                </div>
                                <?php
                                break;
                            case 'quote':
                                ?>
                                <blockquote class="r_corners relative type_3 fs_large color_dark m_bottom_20 bg_light_3">
                                    <?php print $node->field_quote['und'][0]['value']; ?>
                                </blockquote>
                                <?php
                                break;
                            case 'link':
                                ?>
                                <a href="<?php print $node_url; ?>" class="d_block r_corners border_color_purple link_container bg_color_purple_hover color_light_hover m_bottom_20 color_purple tr_all t_xs_align_c">
                                    <span class="d_inline_m icon_wrap_size_3 color_purple circle m_right_15 tr_all m_xs_bottom_10 f_sm_left d_sm_block f_xs_none d_xs_inline_b">
                                        <i class="icon-link"></i>
                                    </span>
                                    <span class="fs_large d_inline_m d_sm_block"><?php print $node->field_link['und'][0]['value']; ?></span>
                                </a>
                            <?php case 'image': ?>
                                <img src="<?php echo $image; ?>" alt="" class="r_corners m_bottom_20">
                                <?php
                                break;
                            default:
                                break;
                        endswitch;
                        ?>

                        <figcaption>
                            <h3 class="fw_light color_dark"><?php print $title; ?></h3>
                            <ul class="dotted_list m_bottom_5 color_grey_light_2">
                                <li class="m_right_15 relative d_inline_m">
                                    <i class="fs_small color_grey">By <?php print str_replace('xml:lang=""', '', $name); ?></i>
                                </li>
                                <li class="m_right_15 relative d_inline_m category-style">
                                    <i><?php print illusion_format_comma_field('field_blog_category', $node); ?></i>
                                </li>
                                <li class="m_right_15 relative d_inline_m">
                                    <a href="#" class="color_scheme_hover">
                                        <i class="icon-chat-empty m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all"><?php print $comment_count; ?></i>
                                    </a>
                                </li>
                            </ul>
                            <?php print $node->body['und'][0]['value']; ?>
                            <!--tags-->
                            <i class="icon-tag-1 color_grey_light_2 d_inline_m m_right_5 fs_large tags_icon"></i>
                            <div class="d_inline_m fw_light tag-style">
                                <?php print illusion_format_comma_field('field_tags', $node); ?>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <hr class="m_bottom_20">

                <!--prev next post buttons-->
                <?php if ($page && module_exists('prev_next')): ?>
                    <div class="clearfix m_bottom_45 m_xs_bottom_30">
                        <?php if (isset($prev_url)) : ?>
                            <a href="<?php echo $prev_url; ?>" class="color_purple d_inline_b color_pink_hover d_block f_left fw_light">
                                <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                                    <i class="icon-angle-left"></i>
                                </span>
                                Prev Post
                            </a>
                        <?php endif; ?>
                        <?php if (isset($next_url)) : ?>
                            <a href="<?php echo $next_url; ?>" class="color_purple d_inline_b color_pink_hover d_block f_right fw_light">
                                Next Post
                                <span class="d_inline_m m_left_5 icon_wrap_size_0 circle color_grey_light tr_all">
                                    <i class="icon-angle-right"></i>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>	
                <div class="clearfix"></div>

                <div id="comments" class="padding-top">
                    <?php if ($comment == COMMENT_NODE_OPEN) : ?>
                        <?php print render($content['comments']); ?>
                    <?php endif; ?>
                </div><!-- end comments -->             
            </div>
        </section>
    <?php endif; ?>
    <script>
        jQuery('ul.d_inline_m.fw_light.category-style a').addClass('color_purple');
    </script>
<?php endif; ?>

<script src="<?php echo $theme_root; ?>/js/addthis_widget.js"></script> 



