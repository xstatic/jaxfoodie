<?php
global $default_img;
$image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
if (isset($node->uc_product_image['und'])) {
    $image = file_create_url($node->uc_product_image['und'][0]['uri']);
}
?>
<!--project-->
<figure class="t_xs_align_c col-lg-12 col-md-12 col-sm-12 product-block-images">
    <!--image container-->
    <div class="popup_wrap relative r_corners wrapper m_bottom_20 m_xs_bottom_0 d_xs_inline_b d_mxs_block">
        <img src="<?php echo $image; ?>" alt="">
        <div class="popup_buttons tr_all_long">
            <a href="<?php echo $image; ?>" data-group="featured_projects" data-title="<?php echo $title; ?>" class="jackbox icon_wrap_size_3 color_light n_sc_hover d_block circle f_left">
                <i class="icon-plus"></i>
            </a>
        </div>
    </div>
</figure>