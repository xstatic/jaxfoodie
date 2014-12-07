<?php
$full_link_html = $fields['name']->content;
preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $full_link_html, $matches);
?>
<li class="m_bottom_10">
    <span class="d_inline_m m_right_10 fw_light color_dark manufacturer-link" onclick="document.location.href = '<?php echo $matches[2][0]; ?>';">
        <?php echo strip_tags($fields['name']->content); ?>
    </span>
</li>