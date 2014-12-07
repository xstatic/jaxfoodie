<?php
/**
 * @file comment.tpl.php
 * Illusion's comment template.
 */
 
global $parent_root;
?>

<div class="m_bottom_20">
    <div class="d_table w_full m_bottom_20">
        <div class="d_table_cell">
            <div class="d_inline_m circle wrapper m_right_10">
            <?php if (!$picture) : ?>
                <img src="<?php echo $parent_root; ?>/images/no-avatar.jpg" alt="avatar" width="80" height="80">
            <?php else :?>
                <?php preg_match('/\< *[img][^\>]*[src] *= *[\"\']{0,1}([^\"\']*)/i', $picture, $matches); ?>
                <img src="<?php echo $matches[1]; ?>" alt="avatar" width="80" height="80">
            <?php endif; ?>
            </div>
            <!--author photo-->
            <!--author name-->
            <div class="d_inline_m">
                <b><?php print str_replace('xml:lang=""', '', $author); ?></b>
                <p class="fs_medium color_grey d_mxs_none">
                    <i><?php print format_date($comment->created, 'custom', 'F d, Y, g:i a'); ?></i>
                </p>
            </div>
        </div>
        <div class="d_table_cell t_align_r v_align_m d_mxs_none">
            <?php if (!empty($content['links'])) { print render($content['links']); } ?>
            <?php if ($signature): ?>
                <div class="user-signature clearfix">
                     <?php print $signature ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="comment relative r_corners bg_light_3 fw_light">
        <?php hide($content['links']); print render($content); ?>
    </div>
</div>

	