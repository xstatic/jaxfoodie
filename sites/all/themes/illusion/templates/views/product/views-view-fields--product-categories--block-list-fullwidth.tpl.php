<?php
$html_link = strip_tags($fields['name']->content, '<a>');
preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $html_link, $matches);
$image_name = "category_img_" . str_replace(' ', '_', strtolower(strip_tags($fields['name']->content))) . '.jpg';
?>
<a href="<?php echo $matches[2][0]; ?>" class="r_corners category_link w_xs_auto d_xs_inline_b f_xs_none m_xs_bottom_15 d_block f_left wrapper m_right_8 t_align_c">
    <img src="<?php
    global $theme_root;
    echo $theme_root;
    ?>/images/<?php echo $image_name; ?>" alt="">
    <p class="category_title bg_light_2 tr_all color_dark"><?php print strip_tags($fields['name']->content); ?></p>
</a>