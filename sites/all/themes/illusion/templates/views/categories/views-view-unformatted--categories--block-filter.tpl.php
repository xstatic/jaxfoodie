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
<section class="t_align_c">
    <!--sort-->
    <ul class="tabs_nav sort type_2 fs_medium hr_list d_inline_b d_xs_block m_bottom_30">
        <li class="f_xs_none active"><a href="#" data-filter="*" class="color_dark d_block n_sc_hover">All</a></li>
        <?php foreach ($rows as $id => $row): ?>
            <li class="f_xs_none">
                <?php print $row; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>