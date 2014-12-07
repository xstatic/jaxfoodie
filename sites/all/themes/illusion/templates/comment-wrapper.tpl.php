<?php
/**
 * @file comment-wrapper.tpl.php
 * Illusion's custom comment wrapper template.
 */
?>

<div class="padding-top <?php print $classes; ?>" <?php print $attributes; ?>>
    
    <?php if ($content['comments']): ?>
        <?php print render($title_prefix); ?>
        <h5 class="fw_light color_dark m_bottom_25"><?php print t('Comments'); ?> (<?php print $node->comment_count; ?>)</h5>
        <?php print render($title_suffix); ?>

        <div class="comments_wrapper">
            <div class="comment-list">
                <?php print render($content['comments']); ?>
            </div>
        </div>  
    <?php endif; ?>
  
    <div class="clearfix"></div>

    <?php if ($content['comment_form']): ?>
        <div class="comments_form">
            <div class="title">
                <h5 class="fw_light color_dark m_bottom_23"><?php print t('Leave a comment'); ?></h5>
            </div>
            <?php print render($content['comment_form']); ?>
        </div>  
    <?php endif; ?>

</div> <!-- /#comments -->