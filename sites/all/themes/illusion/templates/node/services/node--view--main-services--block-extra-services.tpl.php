<?php
global $default_img;

$image = $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30 t_xs_align_c">
    <div class="r_corners wrapper m_bottom_20 d_xs_inline_b d_mxs_block">
        <img src="<?php echo $image; ?>" alt="">
    </div>
    <h4 class="m_bottom_10 t_xs_align_l"><a href="<?php print $node_url; ?>" class="color_dark tr_all"><?php echo $title; ?></a></h4>
    <p class="t_xs_align_l"><?php print strip_tags($node->body['und'][0]['summary']); ?></p>
</div>