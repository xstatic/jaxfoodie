<?php
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

// CHECK DATA FOR LAYOUT CHOOSING
// slideshow for gallery
$slideshow_layout = false;
if (isset($node->field_gallery['und']) && count($node->field_gallery['und']) > 0) {
    $slideshow_layout = true;
}
// video list
$video_layout = false;
if (isset($node->field_video['und']) && count($node->field_video['und']) > 0) {
    $video_layout = true;
}
?>
<?php if (!$page) : ?>
    <section class="category-items">
        <div class="container clearfix">
            <!--item portfolio-->
            <div class="row">
                <!--image-->
                <div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30">
                    <div class="popup_wrap relative r_corners wrapper db_xs_centered">
                        <img src="<?php echo $image; ?>" alt="">
                        <div class="popup_buttons tr_all_long">
                            <?php if (isset($node->field_video['und']) && strip_tags($node->field_video['und'][0]['value']) != "") : ?>
                                <a href="<?php echo strip_tags($node->field_video['und'][0]['value']); ?>" data-group="portfolio" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                                    <i class="icon-play"></i>
                                </a>
                            <?php else : ?>
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
                <!--description-->
                <div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30 m_top_5">
                    <h3 class="fw_light"><a href="<?php echo $node_url; ?>" class="color_dark tr_all"><?php echo $title; ?></a></h3>
                    <!--project's info-->
                    <ul class="dotted_list m_bottom_5 color_grey_light_2">
                        <li class="m_right_15 relative d_inline_m">
                            <a href="#" class="color_grey_light_2 fs_small">
                                <?php if (isset($node->field_video['und']) && strip_tags($node->field_video['und'][0]['value']) != "") : ?>
                                    <i class="icon-video"></i>
                                <?php else: ?>
                                    <i class="icon-picture"></i>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="m_right_15 relative d_inline_m text-pro-links"><?php print illusion_format_comma_field('field_category', $node); ?></li>
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
    </section>
<?php else: ?>
    <?php if (isset($node->field_layout['und']) && $node->field_layout['und'][0]['taxonomy_term']->name == 'Sidebar') : ?>
        <div class="container clearfix">
            <div class="row relative">
                <section class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30<?php if ($slideshow_layout): ?> snormal_size<?php endif; ?>">
                    <?php if ($video_layout): ?>
                        <!--video-->
                        <?php
                        $count_video = 0;
                        foreach ($node->field_video['und'] as $video) :
                            $count_video++;
                            ?>
                            <div class="iframe_video_wrap<?php if ($count_video < count($node->field_video['und'])): ?> m_bottom_30<?php endif; ?>">
                                <iframe src="<?php echo $video['value']; ?>"></iframe>
                            </div>
                        <?php endforeach; ?>
                    <?php elseif ($slideshow_layout): ?>
                        <!--slider-->
                        <div class="m_bottom_20 r_corners wrapper simple_slideshow relative">
                            <ul class="slides">
                                <?php foreach ($node->field_gallery['und'] as $image) : ?>
                                    <li><img src="<?php echo file_create_url($image['uri']); ?>" alt=""></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php else: ?>
                        <!--images-->
                        <?php
                        $count_image = 0;
                        if (count($node->field_image['und']) > 0) :
                            foreach ($node->field_image['und'] as $image) :
                                $count_image++;
                                ?>
                                <img src="<?php echo file_create_url($image['uri']); ?>" alt="" class="r_corners<?php if ($count_image < count($node->field_image['und'])): ?> m_bottom_30<?php endif; ?>">
                                <?php
                            endforeach;
                        endif;
                        ?>
                    <?php endif; ?>
                </section>
                <!--description-->
                <aside class="col-lg-4 col-md-4 col-sm-4 m_top_5"<?php if (!$slideshow_layout): ?> id="scroll_sidebar"<?php endif; ?>>
                    <figure class="m_bottom_40 m_xs_bottom_30">
                        <h5 class="fw_light color_dark m_bottom_20">Project Details</h5>
                        <ul>
                            <li class="m_bottom_8">
                                <div class="m_bottom_8">Date: <span class="fw_light"><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span></div>
                                <hr>
                            </li>
                            <?php if (isset($node->field_client['und']) && $node->field_client['und'][0]['value'] != ""): ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Client: <span class="fw_light"><?php print $node->field_client['und'][0]['value']; ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($node->field_services['und']) && $node->field_services['und'][0]['value'] != ""): ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Services: <span class="fw_light"><?php print $node->field_services['und'][0]['value']; ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($node->field_skill['und']) && count($node->field_skill['und']) > 0) : ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Skills: <span class="fw_light color_grey"><?php print illusion_format_comma_field('field_skill', $node); ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <li class="m_bottom_8">
                                <div class="m_bottom_8">Category: <span class="fw_light color_purple"><?php print illusion_format_comma_field('field_category', $node); ?></span></div>
                                <hr>
                            </li>
                            <?php if (isset($node->field_project_tags['und']) && count($node->field_project_tags['und']) > 0) : ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Tags: <span class="fw_light color_purple"><?php print illusion_format_comma_field('field_project_tags', $node); ?></span></div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </figure>
                    <figure class="m_bottom_12">
                        <h5 class="fw_light color_dark m_bottom_20">Description</h5>
                        <div class="fw_light m_bottom_12">
                            <?php
                            hide($content['comments']);
                            hide($content['field_project_tags']);
                            hide($content['field_category']);
                            hide($content['field_skill']);
                            hide($content['field_image']);
                            hide($content['field_gallery']);
                            hide($content['field_video']);
                            hide($content['field_client']);
                            hide($content['field_services']);
                            hide($content['field_layout']);
                            print render($content);
                            ?>
                        </div>
                    </figure>
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
                    <div class="clearfix">
                        <a href="<?php echo file_create_url('portfolio_classic_1_column'); ?>" class="button_type_2 color_purple d_block f_left tr_all fs_medium r_corners page_button f_sm_none m_sm_bottom_10 d_sm_inline_b">View Project</a>

                        <?php if ($page && module_exists('prev_next')): ?>
                            <ul class="hr_list fs_medium paginations t_align_c f_right f_sm_none">
                                <?php if (isset($prev_url)) : ?>
                                    <li>
                                        <a href="<?php echo $prev_url; ?>" class="rc_first_hr color_dark">
                                            <i class="icon-angle-left"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li>
                                    <a href="<?php echo file_create_url('portfolio_classic_1_column'); ?>" class=" color_dark">
                                        <i class="icon-layout"></i>
                                    </a>
                                </li>

                                <?php if (isset($next_url)) : ?>
                                    <li>
                                        <a href="<?php echo $next_url; ?>" class="rc_last_hr color_dark">
                                            <i class="icon-angle-right"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>	
                    </div>
                </aside>
            </div>
        </div>
    <?php elseif (isset($node->field_layout['und']) && $node->field_layout['und'][0]['taxonomy_term']->name == 'Fullwidth'): ?>
        <div class="container clearfix">
            <?php if ($video_layout) : ?>
                <!--video-->
                <div class="iframe_video_wrap m_bottom_30">
                    <iframe src="<?php echo $node->field_video['und'][0]['value']; ?>"></iframe>
                </div>
            <?php elseif ($slideshow_layout): ?>
                <div class="m_bottom_20 r_corners wrapper simple_slideshow relative">
                    <ul class="slides">
                        <?php foreach ($node->field_gallery['und'] as $image) : ?>
                            <li><img src="<?php echo file_create_url($image['uri']); ?>" alt=""></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php else: ?>
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
                </div>
            <?php endif; ?>
            <!--description-->
            <div class="row">
                <aside class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
                    <figure>
                        <h5 class="fw_light color_dark m_bottom_20">Project Details</h5>
                        <ul>
                            <li class="m_bottom_8">
                                <div class="m_bottom_8">Date: <span class="fw_light"><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span></div>
                                <hr>
                            </li>
                            <?php if (isset($node->field_client['und']) && $node->field_client['und'][0]['value'] != ""): ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Client: <span class="fw_light"><?php print $node->field_client['und'][0]['value']; ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($node->field_services['und']) && $node->field_services['und'][0]['value'] != ""): ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Services: <span class="fw_light"><?php print $node->field_services['und'][0]['value']; ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($node->field_skill['und']) && count($node->field_skill['und']) > 0) : ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Skills: <span class="fw_light color_grey"><?php print illusion_format_comma_field('field_skill', $node); ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <li class="m_bottom_8">
                                <div class="m_bottom_8">Category: <span class="fw_light color_purple"><?php print illusion_format_comma_field('field_category', $node); ?></span></div>
                                <hr>
                            </li>
                            <?php if (isset($node->field_project_tags['und']) && count($node->field_project_tags['und']) > 0) : ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Tags: <span class="fw_light color_purple"><?php print illusion_format_comma_field('field_project_tags', $node); ?></span></div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </figure>
                </aside>
                <section class="col-lg-8 col-md-8 col-sm-8">
                    <h5 class="fw_light color_dark m_bottom_20">Description</h5>
                    <div class="fw_light m_bottom_12">
                        <?php
                        hide($content['comments']);
                        hide($content['field_project_tags']);
                        hide($content['field_category']);
                        hide($content['field_skill']);
                        hide($content['field_image']);
                        hide($content['field_gallery']);
                        hide($content['field_video']);
                        hide($content['field_client']);
                        hide($content['field_services']);
                        hide($content['field_layout']);
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
                    <div class="clearfix">
                        <a href="<?php echo file_create_url('portfolio_classic_1_column'); ?>" class="button_type_2 color_purple d_block f_left tr_all fs_medium r_corners page_button f_xs_none m_xs_bottom_10 d_xs_inline_b">View Project</a>

                        <?php if ($page && module_exists('prev_next')): ?>
                            <ul class="hr_list fs_medium paginations t_align_c f_right f_xs_none">
                                <?php if (isset($prev_url)) : ?>
                                    <li>
                                        <a href="<?php echo $prev_url; ?>" class="rc_first_hr color_dark">
                                            <i class="icon-angle-left"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo file_create_url('portfolio_classic_1_column'); ?>" class=" color_dark">
                                        <i class="icon-layout"></i>
                                    </a>
                                </li>
                                <?php if (isset($next_url)) : ?>
                                    <li>
                                        <a href="<?php echo $next_url; ?>" class="rc_last_hr color_dark">
                                            <i class="icon-angle-right"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    <?php elseif (isset($node->field_layout['und']) && $node->field_layout['und'][0]['taxonomy_term']->name == 'Extended'): ?>
        <script>
                                jQuery('.page_title').addClass('extended');
                                jQuery('.section_offset.counter').addClass('section-extended');
                                jQuery('.section_offset.counter .container').removeClass('container');
        </script>
        <!--slider-->
        <section class="m_bottom_23 simple_slideshow extended relative">
            <?php if ($slideshow_layout): ?>
                <ul class="slides">
                    <?php foreach ($node->field_gallery['und'] as $image) : ?>
                        <li><img class="extend" src="<?php echo file_create_url($image['uri']); ?>" alt=""></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <img src="<?php echo $image; ?>" alt=""/>
            <?php endif; ?>
        </section>
        <!--content-->
        <div class="container clearfix">
            <!--description-->
            <div class="row">
                <aside class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
                    <figure>
                        <h5 class="fw_light color_dark m_bottom_20">Project Details</h5>
                        <ul>
                            <li class="m_bottom_8">
                                <div class="m_bottom_8">Date: <span class="fw_light"><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span></div>
                                <hr>
                            </li>
                            <?php if (isset($node->field_client['und']) && $node->field_client['und'][0]['value'] != ""): ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Client: <span class="fw_light"><?php print $node->field_client['und'][0]['value']; ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($node->field_services['und']) && $node->field_services['und'][0]['value'] != ""): ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Services: <span class="fw_light"><?php print $node->field_services['und'][0]['value']; ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($node->field_skill['und']) && count($node->field_skill['und']) > 0) : ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Skills: <span class="fw_light color_grey"><?php print illusion_format_comma_field('field_skill', $node); ?></span></div>
                                    <hr>
                                </li>
                            <?php endif; ?>
                            <li class="m_bottom_8">
                                <div class="m_bottom_8">Category: <span class="fw_light color_purple"><?php print illusion_format_comma_field('field_category', $node); ?></span></div>
                                <hr>
                            </li>
                            <?php if (isset($node->field_project_tags['und']) && count($node->field_project_tags['und']) > 0) : ?>
                                <li class="m_bottom_8">
                                    <div class="m_bottom_8">Tags: <span class="fw_light color_purple"><?php print illusion_format_comma_field('field_project_tags', $node); ?></span></div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </figure>
                </aside>
                <section class="col-lg-8 col-md-8 col-sm-8">
                    <h5 class="fw_light color_dark m_bottom_20">Description</h5>
                    <div class="fw_light m_bottom_12">
                        <?php
                        hide($content['comments']);
                        hide($content['field_project_tags']);
                        hide($content['field_category']);
                        hide($content['field_skill']);
                        hide($content['field_image']);
                        hide($content['field_gallery']);
                        hide($content['field_video']);
                        hide($content['field_client']);
                        hide($content['field_services']);
                        hide($content['field_layout']);
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
                    <div class="clearfix">
                        <a href="<?php echo file_create_url('portfolio_classic_1_column'); ?>" class="button_type_2 color_purple d_block f_left tr_all fs_medium r_corners page_button f_xs_none m_xs_bottom_10 d_xs_inline_b">View Project</a>

                        <?php if ($page && module_exists('prev_next')): ?>
                            <ul class="hr_list fs_medium paginations t_align_c f_right f_xs_none">
                                <?php if (isset($prev_url)) : ?>
                                    <li>
                                        <a href="<?php echo $prev_url; ?>" class="rc_first_hr color_dark">
                                            <i class="icon-angle-left"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo file_create_url('portfolio_classic_1_column'); ?>" class=" color_dark">
                                        <i class="icon-layout"></i>
                                    </a>
                                </li>
                                <?php if (isset($next_url)) : ?>
                                    <li>
                                        <a href="<?php echo $next_url; ?>" class="rc_last_hr color_dark">
                                            <i class="icon-angle-right"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>