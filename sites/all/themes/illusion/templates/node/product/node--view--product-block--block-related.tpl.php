<!--product-->
<?php
global $base_url;
$price = render($content['product:commerce_price']);
$regular_price = render($content['product:field_regular_price']);
// default image
global $default_img;
$empty_image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
if ($node->field_is_special['und'][0]['value'] == 1):
    ?>
    <!--product-->
    <figure class="fp_item t_align_c d_xs_inline_b">
        <div class="relative r_corners d_xs_inline_b d_mxs_block wrapper m_bottom_23">
            <!--images container-->
            <div class="fp_images relative">
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
            <h6 class="m_bottom_8"><a href="<?php echo $node_url; ?>" class="color_dark"><?php echo $title; ?></a></h6>
            <div class="im_half_container m_bottom_10">
                <p class="color_dark w_sm_full d_sm_block d_xs_inline_m w_xs_half_column fw_ex_bold half_column d_inline_m t_align_c tr_all animate_fctl fp_price with_ie"><?php if ($regular_price != ""): ?><s class="fw_normal color_grey"><?php echo strip_tags($regular_price); ?></s><?php endif; ?><?php echo strip_tags($price); ?></p>	
                <div class="half_column w_sm_full d_sm_block t_sm_align_c d_xs_inline_m w_xs_half_column d_inline_m t_align_r tr_all animate_fctr with_ie"></div>
            </div>
        </figcaption>
    </figure>
<?php endif; ?>