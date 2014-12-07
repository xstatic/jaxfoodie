<!--top part-->
<section class="footer_top_part">
	<div class="container relative">
		<div class="row">
			<!--contact info--> 
			<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_50 m_xs_bottom_15">
				<?php if ($page['footer_6']) : ?>
					<?php print render($page['footer_6']); ?>
				<?php endif; ?>
				<?php if ($page['footer_7']) : ?>
					<?php print render($page['footer_7']); ?>
				<?php endif; ?>
			</div>
			<!--facebook plugin-->
			<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_50 m_xs_bottom_20">
				<?php if ($page['footer_3']) : ?>
					<?php print render($page['footer_3']); ?>
				<?php endif; ?>
			</div>
			<!--subscribe-->
			<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_50 m_xs_bottom_30">
				<?php if ($page['footer_4']) : ?>
					<?php print render($page['footer_4']); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>