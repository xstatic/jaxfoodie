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
<div class="flex_container f_left f_md_none wrapper" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
    <div class="flexslider">
        <ul class="slides">
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>