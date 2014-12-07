<!--carousel-->
<div class="relative">
	<div class="photo_carousel owl-carousel" data-plugin-options='{"singleItem":false,"itemsCustom": [[992,4],[768,3],[450,2],[10,1]]}' data-nav="pc_nav_">
	<?php foreach ($rows as $id => $row): ?>
		<?php print $row; ?>  
	<?php endforeach; ?>
	</div>
	<!--photo carousel nav-->
	<button class="icon_wrap_size_4 circle color_light tr_all translucent pc_nav_prev d_md_none">
		<i class="icon-left-open-big"></i>
	</button>
	<button class="icon_wrap_size_4 circle color_light tr_all translucent pc_nav_next d_md_none">
		<i class="icon-right-open-big"></i>
	</button>
</div>