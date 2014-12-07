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
<section class="">
	<div class="container">
		<div class="relative">
			<div class="row">
				<div class="owl-carousel" data-plugin-options='{"singleItem":false,"itemsCustom":[[992,4],[768,3],[450,2],[10,1]]}' data-nav="ln_nav_">
				<?php foreach ($rows as $id => $row): ?>
					<?php print $row; ?>  
				<?php endforeach; ?>
				</div>
			</div>
			<!--carousel nav-->
			<button class="icon_wrap_size_4 circle color_grey_light tr_all color_blue_hover ln_nav_prev d_md_none" data-appear-animation="fadeIn">
				<i class="icon-left-open-big"></i>
			</button>
			<button class="icon_wrap_size_4 circle color_grey_light tr_all color_blue_hover ln_nav_next d_md_none" data-appear-animation="fadeIn">
				<i class="icon-right-open-big"></i>
			</button>
		</div>
	</div>
</section>
				
				
				
				