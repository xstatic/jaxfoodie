<!--top part-->
<section class="footer_top_part">
	<div class="container relative">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_20 m_sm_bottom_30 fw_light">
						<?php if ($page['footer_5']) : ?>
							<?php print render($page['footer_5']); ?>
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
</section>