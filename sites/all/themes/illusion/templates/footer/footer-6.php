<!--top part-->
<section class="footer_top_part">
	<div class="container relative">
		<div class="row">
			<!--contact-->
			<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_50 m_xs_bottom_30">
				<?php if ($page['footer_6']) : ?>
					<?php print render($page['footer_6']); ?>
				<?php endif; ?>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 m_bottom_50 m_xs_bottom_30">
				<?php if ($page['footer_2']) : ?>
					<?php print render($page['footer_2']); ?>
				<?php endif; ?>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 m_bottom_50 m_xs_bottom_30">
				<?php if ($page['footer_3']) : ?>
					<?php print render($page['footer_3']); ?>
				<?php endif; ?>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 m_bottom_50 m_xs_bottom_30">
				<?php if ($page['footer_5']) : ?>
					<?php print render($page['footer_5']); ?>
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
	<hr class="m_bottom_45 divider_type_3 m_xs_bottom_30">
	<div class="container">
		<div class="row">
			<!--social buttons-->
			<div class="col-lg-6 col-md-7 col-sm-6 m_bottom_30 m_xs_bottom_20">
				<?php if ($page['footer_7']) : ?>
					<?php print render($page['footer_7']); ?>
				<?php endif; ?>
			</div>
			<div class="col-lg-6 col-md-5 col-sm-6 m_xs_bottom_30 t_xs_align_l t_align_r">
				<?php if ($page['footer_1']) : ?>
					<?php print render($page['footer_1']); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>