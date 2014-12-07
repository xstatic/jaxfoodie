<?php 
$color_class = "bg_color_" . str_replace(' ', '_', strtolower(strip_tags($fields['name']->content)));
$full_link_html = $fields['name']->content;
preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $full_link_html, $matches);
?>
<li class="m_right_10 m_sm_bottom_5">
    <button onclick="document.location.href = '<?php echo $matches[2][0]; ?>';" class="color_button tr_delay <?php echo $color_class; ?> circle"></button>
</li>