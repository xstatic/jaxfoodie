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
<div class="m_bottom_40 m_xs_bottom_30">
    <!--carousel-->
    <div class="owl-carousel" data-nav="latest_projects_" data-plugin-options='{"transitionStyle":"backSlide"}'>
        <?php foreach ($rows as $id => $row): ?>
			<?php print $row; ?>  
		<?php endforeach; ?>
    </div>
</div>
	
				
				
				
				