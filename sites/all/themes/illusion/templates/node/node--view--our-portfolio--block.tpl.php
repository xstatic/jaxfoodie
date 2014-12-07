<?php 
    global $theme_root; 
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>

<img src="<?php echo $image; ?>" alt="" class="tr_all">
<div class="project_description vc_child t_align_c tr_all"><div class="d_inline_m">
        <div class="d_inline_b clearfix">
            <a href="<?php echo $theme_root; ?>/images/home_img_5.jpg" data-group="portfolio" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left m_right_10">
                <i class="icon-plus"></i>
            </a>
            <a href="<?php echo $node_url; ?>" class="icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                <i class="icon-link"></i>
            </a>
        </div>
    </div></div>
<div class="project_description_up bg_light_3 tr_all">
    <div class="d_table w_full">
        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-8 d_table_cell v_align_m f_none t_align_l">
            <h4 class="m_bottom_5"><a href="<?php echo $node_url; ?>" class="color_dark d_block wrapper tr_all d_inline_b"><?php echo $title; ?></a></h4>
            <div class="color_grey">
                <a href="#" class="color_grey d_inline_b fs_medium"><i>3D</i></a>,
                <a href="#" class="color_grey d_inline_b fs_medium"><i>Illustration</i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-4 d_table_cell v_align_m f_none t_align_r">
            <a href="#" class="like_project d_inline_m color_red_hover tr_all"><i class="icon-heart-empty-1 m_right_2 color_grey_light_2 tr_all"></i><i class="fs_medium color_grey tr_all">21</i></a>
        </div>
    </div>
</div>
<div style="display: none;">
    <?php print_r($node->field_video['und'][0]['value']); ?>
</div>