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
<!--our featured projects-->
<div class="container">
    <div class="row" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
        <!--projects carousel-->
        <div class="owl-carousel" data-nav="fp_nav_" data-plugin-options='{"itemsCustom" : [[992,3],[768,2],[100,1]], "singleItem" : false}'>
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>  
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!--carousel nav-->
<button class="icon_wrap_size_4 circle color_grey_light tr_all color_blue_hover fp_nav_prev d_md_none">
    <i class="icon-left-open-big"></i>
</button>
<button class="icon_wrap_size_4 circle color_grey_light tr_all color_blue_hover fp_nav_next d_md_none">
    <i class="icon-right-open-big"></i>
</button>



