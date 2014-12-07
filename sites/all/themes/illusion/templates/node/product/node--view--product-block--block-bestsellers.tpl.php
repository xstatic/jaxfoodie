<?php
$price = render($content['product:commerce_price']);
$regular_price = render($content['product:field_regular_price']);
// default image
global $default_img;
$empty_image = 'http://' . $_SERVER['HTTP_HOST'] . $default_img;
?>
<li class="clearfix m_bottom_35 m_xs_bottom_30">
    <a href="<?php echo $node_url; ?>" class="f_left d_block f_sm_none f_xs_left d_sm_inline_b m_sm_bottom_5 m_xs_bottom_0 r_corners wrapper m_right_20">
        <?php if (isset($node->uc_product_image['und'])): ?>
            <img src="<?php echo file_create_url($node->uc_product_image['und'][0]['uri']); ?>" alt="" class="img-bestsellers">
        <?php else : ?>
            <img src="<?php echo $empty_image; ?>" alt="" class="img-bestsellers">
        <?php endif; ?>
    </a>
    <a href="<?php echo $node_url; ?>" class="color_dark lh_small d_block m_bottom_10 tr_all"><?php echo $title; ?></a>
    <p class="color_dark fs_medium fw_ex_bold fp_price m_bottom_3"><?php if ($regular_price != ""): ?><s class="fw_normal color_grey"><?php echo strip_tags($regular_price); ?></s><?php endif; ?><?php echo strip_tags($price); ?></p>
</li>