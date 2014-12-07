<?php
$html_link = strip_tags($fields['name']->content, '<a>');
preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $html_link, $matches);
?>
<li class="m_right_5 m_bottom_5">
    <a href="<?php echo $matches[2][0]; ?>" class="r_corners button_type_2 d_block color_dark color_pink_hover fs_medium"><?php print strtolower(strip_tags($fields['name']->content)); ?></a>
</li>