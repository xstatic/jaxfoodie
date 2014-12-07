<?php
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
?>
<?php if (!$page) : ?>
    <div class="container clearfix">
        <div class="row">
            <!--image-->
            <div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30 m_bottom_50">
                <div class="popup_wrap relative r_corners wrapper db_xs_centered">
                    <img src="<?php echo $image; ?>" alt="">
                    <div class="popup_buttons tr_all_long">
                        <a href="<?php echo $image; ?>" data-group="portfolio" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10">
                            <i class="icon-plus"></i>
                        </a>
                        <a href="<?php echo $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                            <i class="icon-link"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--description-->
            <div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30 m_bottom_50 m_top_5">
                <h3 class="fw_light"><a href="<?php echo $node_url; ?>" class="color_dark tr_all"><?php echo $title; ?></a></h3>
                <!--project's info-->
                <ul class="dotted_list m_bottom_5 color_grey_light_2">
                    <li class="m_right_15 relative d_inline_m">
                        <a href="#" class="color_grey_light_2 fs_small">
                            <i class="icon-picture"></i>
                        </a>
                    </li>
                    <li class="m_right_15 relative d_inline_m text-pro-links"><?php print illusion_format_comma_field('field_news_category', $node); ?></li>
                </ul>
                <p class="m_bottom_12 fw_light">
                    <?php
                    $summary = strip_tags($node->body['und'][0]['summary']);
                    $summary_after = (strlen($summary) > 303) ? substr($summary, 0, 300) . '...' : $summary;
                    echo $summary_after;
                    ?>
                </p>
                <div class="clearfix">
                    <a href="<?php echo $node_url; ?>" class="color_purple color_pink_hover f_left d_block m_right_20 fw_light">
                        <span class="d_inline_m m_right_5 icon_wrap_size_0 circle color_grey_light tr_all">
                            <i class="icon-angle-right"></i>
                        </span>
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container clearfix">
        <!--images-->
        <div class="project-images-section">
            <?php
            $count_image = 0;
            if (isset($node->field_image['und'])):
                if (count($node->field_image['und']) > 0) :
                    foreach ($node->field_image['und'] as $images) :
                        $count_image++;
                        ?>
                        <img src="<?php echo file_create_url($images['uri']); ?>" alt="" class="r_corners<?php if ($count_image < count($node->field_image['und'])): ?> m_bottom_30<?php else: ?> m_bottom_23<?php endif; ?>">
                        <?php
                    endforeach;
                endif;
            endif;
            ?>
            <?php
            if (isset($node->field_video['und'])):
                if (count($node->field_video['und']) > 0) :
                    foreach ($node->field_video['und'] as $video) :
                        ?>
                        <div class="iframe_video_wrap m_bottom_30">
                            <iframe src="<?php echo $video['value']; ?>"></iframe>
                        </div>
                        <?php
                    endforeach;
                endif;
            endif;
            ?>
        </div>
        <!--description-->
        <div class="row">
            <aside class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
                <figure>
                    <h5 class="fw_light color_dark m_bottom_20">News Details</h5>
                    <ul>
                        <li class="m_bottom_8">
                            <div class="m_bottom_8">Date: <span class="fw_light"><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span></div>
                            <hr>
                        </li>
                        <li class="m_bottom_8">
                            <div class="m_bottom_8">Category: <span class="fw_light"><?php print illusion_format_comma_field('field_news_category', $node); ?></span></div>
                            <hr>
                        </li>
                    </ul>
                </figure>
            </aside>
            <section class="col-lg-8 col-md-8 col-sm-8">
                <h5 class="fw_light color_dark m_bottom_20">Description</h5>
                <div class="fw_light m_bottom_12">
                    <?php
                    hide($content['comments']);
                    hide($content['field_news_category']);
                    hide($content['field_image']);
                    hide($content['field_video']);
                    print render($content);
                    ?>
                </div>
                <!--share buttons-->
                <ul class="dotted_list type_2 color_grey_light_2 m_bottom_25">
                    <li class="m_right_30 relative d_inline_m">
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['HTTP_HOST'] . file_create_url($node_url); ?>" onClick="javascript:window.open(this.href,
                                        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');
                                return false;" class="facebook_color">
                            <i class="icon-facebook m_right_2 color_grey_light_2 tr_all fs_large"></i><i class="fs_medium color_grey tr_all"></i>
                        </a>
                    </li>
                    <li class="m_right_30 relative d_inline_m">
                        <a href="https://twitter.com/share?url=<?php echo $_SERVER['HTTP_HOST'] . file_create_url($node_url); ?>" onClick="javascript:window.open(this.href,
                                        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');
                                return false;" class="twitter_color">
                            <i class="icon-twitter m_right_2 color_grey_light_2 tr_all fs_large"></i><i class="fs_medium color_grey tr_all"></i>
                        </a>
                    </li>
                    <li class="m_right_30 relative d_inline_m">
                        <a href="https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'] . file_create_url($node_url); ?>" onClick="javascript:window.open(this.href,
                                        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                                return false;" class="googleplus_color">
                            <i class="icon-gplus-1 m_right_2 color_grey_light_2 tr_all fs_large"></i><i class="fs_medium color_grey tr_all"></i>
                        </a>
                    </li>
                    <li class="m_right_30 relative d_inline_m">
                        <a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $_SERVER['HTTP_HOST'] . file_create_url($node_url); ?>" data-pin-do="buttonPin" data-pin-config="above" class="pinterest_color" onClick="window.open(this.href, '_blank', 'width=700, height=300');
                                return false;">
                            <i class="icon-pinterest m_right_2 color_grey_light_2 tr_all fs_large"></i><i class="fs_medium color_grey tr_all"></i>
                        </a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
<?php endif; ?>