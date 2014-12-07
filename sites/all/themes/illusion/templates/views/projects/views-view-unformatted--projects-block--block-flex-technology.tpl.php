<?php
/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>
<ul class="news_list f_right f_xs_none w_xs_full m_bottom_50 m_xs_bottom_15" data-appear-animation="fadeInDown" data-appear-animation-delay="400">
    <?php
    $i = 1;
    foreach ($rows as $id => $row):
        ?>
        <?php if ($i != 1): ?>
            <?php print $row; ?>
        <?php endif; ?>
        <?php $i++; ?>
    <?php endforeach; ?>
</ul>
<div class="clear"></div>