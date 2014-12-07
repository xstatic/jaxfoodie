<?php
global $default_img;
$image = $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<article class="m_bottom_35 m_xs_bottom_20 clearfix">
    <!--post image-->
    <a href="<?php print $node_url; ?>" class="d_block f_left m_right_20 r_corners wrapper">
        <img src="<?php echo $image; ?>" alt="" width="80">
    </a>
    <!--post title & date-->
    <a href="<?php print $node_url; ?>" class="color_dark m_bottom_5 d_block lh_small"><b><?php print $title; ?></b></a>
    <p class="fs_small color_grey"><i><?php print format_date($node->created, 'custom', 'M d,Y'); ?></i></p>
</article>