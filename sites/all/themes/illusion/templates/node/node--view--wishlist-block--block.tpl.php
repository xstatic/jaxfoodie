<?php
/**
 * @file
 * Illusion's theme implementation to display a single Wishlist node.
 */
global $base_url;
global $theme_root;

$termid = arg(2);

$product = commerce_product_load($node->field_product['und'][0]['product_id']);
$price = commerce_product_calculate_sell_price($product);
$price_display = commerce_currency_format($price['amount'], $price['currency_code'], $product);
$regular_price = render($content['product:field_regular_price']);
?>
<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 m_md_bottom_30 m_bottom_70">
            <div class="clearfix">
                <div class="wrapper r_corners container_zoom_image relative">
                    <img id="img_zoom" src="<?php print file_create_url($node->uc_product_image['und'][0]['uri']); ?>" data-zoom-image="<?php print file_create_url($node->uc_product_image['und'][0]['uri']); ?>" alt="">
                    <div class="labels_container">                    
                        <?php if ($node->field_isnew['und'][0]['value'] == 1) : ?>
                            <a href="#" class="d_block label color_scheme tt_uppercase fs_ex_small circle m_bottom_5 vc_child t_align_c"><span class="d_inline_m">New</span></a>
                        <?php endif; ?>
                        <?php if ($regular_price != ""): ?>
                            <a href="#" class="d_block label color_pink color_pink_hover tt_uppercase fs_ex_small circle m_bottom_5 vc_child t_align_c"><span class="d_inline_m">Sale</span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 m_md_bottom_30 m_bottom_70">
            <div class="fw_ex_bold color_pink product_current_price m_bottom_15 lh_medium">
                <h6 class="m_bottom_5"><a href="<?php echo $node_url; ?>" class="color_dark"><?php echo $title; ?></a></h6>
                <s class="color_grey fw_light">
                    <?php print render($content['product:field_regular_price']); ?>
                </s>
                <?php print render($content['product:commerce_price']); ?>                
            </div>
            <hr class="m_bottom_10">
            <div class="m_bottom_15">
                <?php
                if (isset($node->body['und'])) {
                    print $node->body['und'][0]['summary'];
                }
                ?>
            </div>
            <hr class="m_bottom_10">
            <div class="m_bottom_15">
                <?php if ($product->field_stock['und'][0]['value'] != 0): ?>
                    <a href="<?php print $base_url . '/product/add/' . $id; ?>" class="button_type_7 m_mxs_bottom_5 d_inline_b m_right_2 tt_uppercase color_pink r_corners vc_child tr_all add_to_cart_button"><span class="d_inline_m clerarfix"><i class="icon-basket f_left m_right_10 fs_large"></i><span class="fs_medium">Add to Cart</span></span></a>
                <?php endif; ?>
                <?php
                global $user;
                if ($user->uid) :
                    if (module_exists('flag')) {
                        $full_link_html = flag_create_link('shop', $node->nid);
                        preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $full_link_html, $matches);
                    }
                    if (strpos($matches[2][0], 'unflag') !== false) :
                        ?>
                        <a href="<?php echo $matches[2][0]; ?>" class="button_type_6 m_mxs_bottom_5 tooltip_container m_right_2 relative v_align_b d_inline_b f_md_none d_md_inline_b d_block color_dark r_corners vc_child tr_all color_purple_hover tr_all t_align_c">
                            <i class="icon-heart d_inline_m fs_large is-in-wishlist"></i>
                            <span class="d_block r_corners color_default tooltip fs_small fw_normal tr_all">Remove from Wishlist</span>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo $matches[2][0]; ?>" class="button_type_6 m_mxs_bottom_5 tooltip_container m_right_2 relative v_align_b d_inline_b f_md_none d_md_inline_b d_block color_dark r_corners vc_child tr_all color_purple_hover tr_all t_align_c">
                            <i class="icon-heart d_inline_m fs_large"></i>
                            <span class="d_block r_corners color_default tooltip fs_small fw_normal tr_all">Add to Wishlist</span>
                        </a>
                    <?php
                    endif;
                endif;
                ?>
                <a href="#" class="button_type_6 m_mxs_bottom_5 tooltip_container m_right_2 relative v_align_b d_inline_b f_md_none d_md_inline_b d_block color_dark r_corners vc_child tr_all color_green_hover tr_all t_align_c"><i class="icon-help-1 d_inline_m fs_large"></i><span class="d_block r_corners color_default tooltip fs_small fw_normal tr_all">Have a Question?</span></a>
            </div>
        </div>
    </div>
    <hr class="m_bottom_20">