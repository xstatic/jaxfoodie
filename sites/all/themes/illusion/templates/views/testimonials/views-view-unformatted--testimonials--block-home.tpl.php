<!--testimonials-->
<section class="col-lg-12 col-md-12 m_bottom_20" data-appear-animation="fadeInUp">
	<div class="owl-carousel" data-nav="t_nav_" data-plugin-options='{"autoPlay":false,"autoHeight":true,"transitionStyle": "backSlide"}'>
		<!--item-->
		<?php
			foreach ($rows as $id => $row):
				print $row;
			endforeach;
		?>
	</div>
</section>