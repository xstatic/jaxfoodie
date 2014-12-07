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
<!--title & nav-->
<div class="clearfix m_bottom_23 m_sm_bottom_10 m_xs_bottom_20" data-appear-animation="bounceInLeft">
	<div class="f_right f_xs_none clearfix">
		<button class="icon_wrap_size_5 circle color_grey_light f_left m_right_8 web_design_prev fn_type_2 color_scheme_hover tr_all">
			<i class="icon-angle-left fs_large"></i>
		</button>
		<button class="icon_wrap_size_5 circle color_grey_light f_left web_design_next fn_type_2 color_scheme_hover tr_all">
			<i class="icon-angle-right fs_large"></i>
		</button>
	</div>
</div>
<!--carousel-->
<div class="row">
	<div class="owl-carousel featured_products type_2 m_bottom_45 m_xs_bottom_0" data-plugin-options='{"singleItem":false,"itemsCustom":[[992,3],[768,3],[600,2],[10,1]]}' data-nav="web_design_">
		<?php foreach ($rows as $id => $row): ?>
			<?php print $row; ?>  
		<?php endforeach; ?>
	</div>
</div>


