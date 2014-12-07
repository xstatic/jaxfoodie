<?php
$full_link_html = $fields['name']->content;
preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $full_link_html, $matches);
?>
<li onclick="document.location.href = '<?php echo $matches[2][0]; ?>';" class="tr_delay fs_medium color_grey">
    <?php echo strip_tags($fields['name']->content); ?>
</li>