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
<div class="m_bottom_45 m_xs_bottom_30" data-appear-animation="fadeInDown">
	<h5 class="fw_light color_dark m_bottom_23">Tags</h5>
	<ul class="hr_list tags_list">
		<?php foreach ($rows as $id => $row): ?>
			<li class="m_right_5 m_bottom_5"><?php print $row; ?></li>
		<?php endforeach; ?>
	</ul>
</div>
		