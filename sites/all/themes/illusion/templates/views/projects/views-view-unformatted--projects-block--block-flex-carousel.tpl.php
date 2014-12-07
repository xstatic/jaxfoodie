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
<section class="section_offset_3 bg_light_2 relative">
	<div class="container">
		<div class="row">
			<div class="owl-carousel" data-plugin-options='{"itemsCustom": [[992,4],[768,3],[450,1],[10,1]],"autoPlay":true,"singleItem" : false}' data-nav="lp_nav_">
			<?php foreach ($rows as $id => $row): ?>
				<?php print $row; ?>  
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!--carousel nav-->
	<button class="icon_wrap_size_4 circle color_grey_light tr_all color_blue_hover lp_nav_prev d_md_none" data-appear-animation="fadeIn">
		<i class="icon-left-open-big"></i>
	</button>
	<button class="icon_wrap_size_4 circle color_grey_light tr_all color_blue_hover lp_nav_next d_md_none" data-appear-animation="fadeIn">
		<i class="icon-right-open-big"></i>
	</button>
</section>