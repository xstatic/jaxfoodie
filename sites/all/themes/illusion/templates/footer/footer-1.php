<!--top part-->
<section class="footer_top_part">
	<div class="container relative">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="row">
					<!--blog-->
					<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_20 m_sm_bottom_30">
						<?php if ($page['footer_1']) : ?>
							<?php print render($page['footer_1']); ?>
						<?php endif; ?>
					</div>
					<!--twitter-->
					<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_20 m_sm_bottom_30">
						<?php if ($page['footer_2']) : ?>
							<?php print render($page['footer_2']); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="row">
					<!--facebook plugin-->
					<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_20 m_sm_bottom_30">
						<?php if ($page['footer_3']) : ?>
							<?php print render($page['footer_3']); ?>
						<?php endif; ?>
					</div>
					<!--subscribe-->
					<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_20 m_sm_bottom_30">
						<?php if ($page['footer_4']) : ?>
							<?php print render($page['footer_4']); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr class="m_bottom_45 divider_type_3 m_xs_bottom_30">
	<div class="container">
		<div class="row">
			<!--about us-->
			<div class="col-lg-4 col-md-4 col-sm-4 fw_light m_bottom_30">
				<?php if ($page['footer_5']) : ?>
					<?php print render($page['footer_5']); ?>
				<?php endif; ?>
			</div>
			<!--contact info--> 
			<div class="col-lg-5 col-md-5 col-sm-5 m_bottom_30">
				<?php if ($page['footer_6']) : ?>
					<?php print render($page['footer_6']); ?>
				<?php endif; ?>
			</div>
			<!--social buttons-->
			<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_30 m_xs_bottom_20">
				<?php if ($page['footer_7']) : ?>
					<?php print render($page['footer_7']); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>