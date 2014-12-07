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
<div id="portfolio_list" class="container t_align_c">
    <section class="portfolio_isotope_container home three_columns without_text m_bottom_15" data-isotope-options='{"itemSelector" : ".portfolio_item","layoutMode" : "fitRows","transitionDuration":"0.7s"}'>
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>  
        <?php endforeach; ?>
    </section>
    <div class="t_align_c loadbutton">
        <button id="load_more" class="button_type_3 tt_uppercase r_corners tr_all fs_medium color_dark color_blue_hover">Load More</button>
    </div>
    <script>
        jQuery('#portfolio_list .portfolio_item').each(function(index, obj) {
            if (index === 1 || index === 4 || index === 7) {
                jQuery(this).find('.popup_wrap').attr('data-appear-animation-delay', 200);
                jQuery(this).addClass('second');
            } else if (index === 2 || index === 5 || index === 8) {
                jQuery(this).find('.popup_wrap').attr('data-appear-animation-delay', 400);
                jQuery(this).addClass('third');
            }
        });
    </script>
</div>