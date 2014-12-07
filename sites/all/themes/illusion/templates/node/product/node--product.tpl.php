<?php
/**
 * @file
 * illusion's theme implementation to display a single Product node.
 */
global $base_url;
global $theme_root;

$termid = arg(2);

$product = commerce_product_load($node->field_product['und'][0]['product_id']);
$price = commerce_product_calculate_sell_price($product);
$price_display = commerce_currency_format($price['amount'], $price['currency_code'], $product);
$regular_price = render($content['product:field_regular_price']);
$id = $node->field_product['und'][0]['product_id'];
?>

<?php
//call page region in node
//$sidebar_node = block_get_blocks_by_region('sidebar_right');
//print render($sidebar_node);
?>
<?php if (!$page) : ?>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 m_md_bottom_30 m_bottom_40">
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
                    <?php print strip_tags(render($content['product:field_regular_price'])); ?>
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
                <a href="<?php echo file_create_url('pages_contact'); ?>" class="button_type_6 m_mxs_bottom_5 tooltip_container m_right_2 relative v_align_b d_inline_b f_md_none d_md_inline_b d_block color_dark r_corners vc_child tr_all color_green_hover tr_all t_align_c"><i class="icon-help-1 d_inline_m fs_large"></i><span class="d_block r_corners color_default tooltip fs_small fw_normal tr_all">Have a Question?</span></a>
            </div>
        </div>
    </div>
    <hr class="m_bottom_40">
<?php elseif ($page) : ?>
	<?php if(isset($node->field_product_layout['und']) && $node->field_product_layout['und'][0]['taxonomy_term']->name == 'Sidebar') :?>
    <div class="row">
	<section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
	<?php endif; ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 m_md_bottom_30 m_bottom_70">
            <div class="clearfix">
                <div class="thumbnails_carousel type_2 t_align_c f_left m_right_20">
                    <ul id="thumbnails">
                        <li>
                            <?php
                            $i = 1;
                            foreach ($node->uc_product_image['und'] as $key => $product_images) :
                                ?>
                                <a href="#" <?php
                                if ($i === 1) {
                                    echo 'id="open-product"';
                                }
                                ?> data-zoom-image="<?php print file_create_url($product_images['uri']); ?>" data-image="<?php print file_create_url($product_images['uri']); ?>" 
                                   class="<?php
                                   if ($i == 1) {
                                       echo 'active';
                                   }
                                   ?> d_block wrapper r_corners tr_all translucent m_bottom_10"><img src="<?php print file_create_url($product_images['uri']); ?>" alt="" class="r_corners"></a>
                                   <?php
                                   $i++;
                               endforeach;
                               ?>  
                            <script>
                                jQuery(document).ready(function() {
                                    setTimeout(function() {
                                        jQuery('#open-product').trigger('click');
                                    }, 10);
                                });
                            </script>
                        </li>
                    </ul>
                    <div class="helper-list"></div>
                </div>
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
                <a href="#" class="open_product f_right button_type_6 d_block r_corners tr_all t_align_c">
                    <i class="icon-resize-full"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 m_md_bottom_30 m_bottom_70">
            <div class="fw_ex_bold color_pink product_current_price m_bottom_15 lh_medium">
                <s class="color_grey fw_light">
                    <?php print strip_tags(render($content['product:field_regular_price'])); ?>
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
            <hr class="m_bottom_12">
            <table class="fw_light table_type_9 m_bottom_15">
                <tr>
                    <td>
                        Manufacturer: 
                    </td>
                    <td class="color_dark">
                        <?php
                        if (isset($node->field_product_manufacturer['und'])) :
                            print illusion_format_comma_field('field_product_manufacturer', $node);
                        endif;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Availability:
                    </td>
                    <td class="color_dark">
                        <?php if (isset($product->field_stock['und']) && $product->field_stock['und'][0]['value'] == 0): ?>
                            <span class="color_light_green">Out stock</span>                        
                        <?php else: ?>
                            <span class="color_light_green">in stock</span> <?php print $product->field_stock['und'][0]['value']; ?> item(s)
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Product Code:
                    </td>
                    <td class="color_dark">
                        <?php print $product->sku; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Reference:
                    </td>
                    <td class="color_dark category-style">
                        <?php print illusion_format_comma_field('field_product_tag', $node); ?>
                    </td>
                </tr>
            </table>
            <hr class="m_bottom_15">
            <!--            
            <table class="fw_light table_type_9 m_bottom_20">
                <?php if (isset($node->field_size['und'])) : ?>
                    <tr>
                        <td class="v_align_m">
                            Size: 
                        </td>
                        <td class="color_dark">
                            <div class="custom_select type_2 fe_width_3">
                                <div class="select_title r_corners fs_medium fw_normal color_grey"><?php echo $node->field_size['und']['0']['taxonomy_term']->name ?></div>
                                <ul class="select_list r_corners wrapper shadow_1 bg_light tr_all"></ul>
                                <select class="d_none">
                                    <?php
                                    foreach ($node->field_size['und'] as $size) {
                                        echo '<option value="' . $size['taxonomy_term']->name . '">' . $size['taxonomy_term']->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                <?php endif ?>
                <tr>
                    <td class="v_align_m">
                        Color: 
                    </td>
                    <td class="color_dark">
                        <ul class="hr_list m_top_10 m_bottom_12">
                            <?php
                            foreach ($node->field_product_color['und'] as $color) {
                                ?>
                                <li class="m_right_10 m_sm_bottom_5">
                                    <button class="color_button tr_delay  bg_color_<?php echo strtolower(preg_replace('/\s+/', '_', $color['taxonomy_term']->name)) ?> circle"></button>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </td>
                </tr>
            </table>
            -->
            <div class="m_bottom_15">
                <?php if (isset($product->field_stock['und']) && $product->field_stock['und'][0]['value'] != 0): ?>
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
                <a href="<?php echo file_create_url('pages_contact'); ?>" class="button_type_6 m_mxs_bottom_5 tooltip_container m_right_2 relative v_align_b d_inline_b f_md_none d_md_inline_b d_block color_dark r_corners vc_child tr_all color_green_hover tr_all t_align_c"><i class="icon-help-1 d_inline_m fs_large"></i><span class="d_block r_corners color_default tooltip fs_small fw_normal tr_all">Have a Question?</span></a>
            </div>
            <!--share buttons-->
            <div>
                <p class="fw_light d_inline_m m_right_8">Share: </p>
                <ul class="dotted_list type_2 color_grey_light_2 d_inline_m">
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
            </div>
        </div>
    </div>
    <div class="tabs m_bottom_40 m_xs_bottom_30">
        <!--tabs nav-->
        <ul class="tabs_nav hr_list d_inline_b d_xs_block m_bottom_23 m_xs_bottom_20">
            <li class="f_xs_none"><a href="#tab-1" class="color_dark d_block n_sc_hover tr_all_medium">Description</a></li>
            <li class="f_xs_none"><a href="#tab-2" class="color_dark d_block n_sc_hover tr_all_medium">Specifications</a></li>
            <li class="f_xs_none"><a href="#tab-3" class="color_dark d_block n_sc_hover tr_all_medium">Reviews</a></li>
        </ul>
        <!--tabs content-->
        <div id="tab-1">
            <?php print $node->body['und'][0]['value']; ?>
        </div>
        <div id="tab-2">
            <?php
            if (isset($node->field_specifications['und'])) {
                print $node->field_specifications['und'][0]['value'];
            }
            ?>
        </div>
        <div id="tab-3">
            <div id="comments" class="padding-top">
                <?php //if ($comment == COMMENT_NODE_OPEN) :   ?>
                <?php print render($content['comments']); ?>
                <?php //endif; ?>
            </div><!-- end comments -->
        </div>
    </div>
	<?php if(isset($node->field_product_layout['und']) && $node->field_product_layout['und'][0]['taxonomy_term']->name == 'Sidebar') :?>
		<?php 
			$after_content_no_wrap = block_get_blocks_by_region('after_content_no_wrap'); 
			print render($after_content_no_wrap);
		?>
<?php endif; ?>
	<?php if(isset($node->field_product_layout['und']) && $node->field_product_layout['und'][0]['taxonomy_term']->name == 'Sidebar') :?>
		</section>
		<aside class="col-lg-3 col-md-3 col-sm-3">
			<?php 
				$sidebar_right = block_get_blocks_by_region('sidebar_right'); 
				print render($sidebar_right); 
			?> 
		</aside>  
		</div>
	<?php else: ?>
		<?php 
		$bottom_content = block_get_blocks_by_region('bottom_content'); 
		print render($bottom_content); 
	?>
	<?php endif; ?>
	<?php 
		$after_content = block_get_blocks_by_region('after_content'); 
		print render($after_content); 
	?>
<?php endif; ?>
