<?php
$news_title = (strlen($title) > 27) ? substr($title, 0, 24) . '...' : $title;
?>
<div onclick="window.open('<?php echo $node_url; ?>', '_blank');" class="breaking-news-item">
    <b class="color_dark"><?php echo $news_title . '!'; ?></b> 
    <?php
    $summary = strip_tags($node->body['und'][0]['summary']);
    $summary_after = (strlen($summary) > 110) ? substr($summary, 0, 107) . '...' : $summary;
    echo $summary_after;
    ?>
</div>