<!--product-->
<?php
$id = $node->field_product['und'][0]['product_id'];
global $base_url;
$price = render($content['product:commerce_price']);
$regular_price = render($content['product:field_regular_price']);
// default image
global $default_img;
$empty_image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
?>
<figure class="fp_item t_align_c d_xs_inline_b col-lg-12 col-md-12 col-sm-12" data-appear-animation="bounceIn">
    <div class="relative r_corners d_xs_inline_b d_mxs_block wrapper m_bottom_23 t_xs_align_c">
        <!--images container-->
        <div class="fp_images relative" onclick="document.location.href = '<?php echo $node_url; ?>';">
            <?php if (isset($node->uc_product_image['und'])): ?>
                <?php if (count($node->uc_product_image['und']) > 1) : ?>
                    <img src="<?php echo file_create_url($node->uc_product_image['und'][0]['uri']); ?>" alt="" class="tr_all">
                    <img src="<?php echo file_create_url($node->uc_product_image['und'][1]['uri']); ?>" alt="" class="tr_all">
                <?php else: ?>
                    <img src="<?php echo file_create_url($node->uc_product_image['und'][0]['uri']); ?>" alt="" class="tr_all">
                    <img src="<?php echo file_create_url($node->uc_product_image['und'][0]['uri']); ?>" alt="" class="tr_all">
                <?php endif; ?>
            <?php else: ?>
                <img src="<?php echo $empty_image; ?>" alt="" class="tr_all">
                <img src="<?php echo $empty_image; ?>" alt="" class="tr_all">
            <?php endif; ?>
        </div>
        <!--labels-->
        <div class="labels_container">
            <?php if ($node->field_isnew['und'][0]['value'] == 1) : ?>
                <a href="#" class="d_block label color_scheme tt_uppercase fs_ex_small circle m_bottom_5 vc_child t_align_c"><span class="d_inline_m">New</span></a>
            <?php endif; ?>
            <?php if ($regular_price != ""): ?>
                <a href="#" class="d_block label color_pink color_pink_hover tt_uppercase fs_ex_small circle m_bottom_5 vc_child t_align_c"><span class="d_inline_m">Sale</span></a>
            <?php endif; ?>
        </div>
    </div>
    <figcaption>
        <h6 class="m_bottom_5"><a href="<?php echo $node_url; ?>" class="color_dark"><?php echo $title; ?></a></h6>
        <div class="fs_medium color_grey d_inline_b m_bottom_3 font-italic"><?php print illusion_format_comma_field('field_product_category', $node); ?></div>
        <div class="im_half_container m_bottom_10">
            <p class="color_dark fw_ex_bold half_column d_inline_m t_align_c tr_all animate_fctl fp_price with_ie"><?php if ($regular_price != ""): ?><s class="fw_normal color_grey"><?php echo strip_tags($regular_price); ?></s><?php endif; ?><?php echo strip_tags($price); ?></p>
            <div class="half_column d_inline_m t_align_r tr_all animate_fctr with_ie"></div>
        </div>
        <div class="clearfix">
            <div class="half_column w_md_full m_md_bottom_10 animate_fctl tr_all f_left f_md_none with_ie">
                <a href="<?php print $base_url . '/product/add/' . $id; ?>" class="button_type_6 d_inline_b color_pink transparent r_corners vc_child tr_all add_to_cart_button"><span class="d_inline_m clerarfix"><i class="icon-basket f_left m_right_10 fs_large"></i><span class="fs_medium">Add to Cart</span></span></a>
            </div>
            <div class="half_column w_md_full animate_fctr tr_all f_left f_md_none clearfix with_ie">
                <?php
                global $user;
                if ($user->uid) :
                    if (module_exists('flag')) {
                        $full_link_html = flag_create_link('shop', $node->nid);
                        preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $full_link_html, $matches);
                    }
                    if (strpos($matches[2][0], 'unflag') !== false) :
                        ?>
                        <a href="<?php echo $matches[2][0]; ?>" class="button_type_6 m_left_5 relative tooltip_container f_right f_md_none d_md_inline_b d_block color_dark r_corners vc_child tr_all color_purple_hover t_align_c m_right_5 m_md_right_0">
                            <i class="icon-heart d_inline_m fs_large is-in-wishlist"></i>
                            <span class="d_block r_corners color_default tooltip fs_small fw_normal tr_all">Remove from Wishlist</span>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo $matches[2][0]; ?>" class="button_type_6 m_left_5 relative tooltip_container f_right f_md_none d_md_inline_b d_block color_dark r_corners vc_child tr_all color_purple_hover t_align_c m_right_5 m_md_right_0">
                            <i class="icon-heart d_inline_m fs_large"></i>
                            <span class="d_block r_corners color_default tooltip fs_small fw_normal tr_all">Add to Wishlist</span>
                        </a>
                    <?php
                    endif;
                endif;
                ?>
            </div>
        </div>
    </figcaption>
</figure>