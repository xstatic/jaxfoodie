<div class="container clearfix">
	<div class="row">
		<section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">		
			<div class="tabs t_align_c">
				<ul class="tabs_nav type_2 fs_medium hr_list d_inline_b d_xs_block m_bottom_30 m_xs_bottom_20">
					<li class="f_xs_none"><a href="#tab-1" class="color_dark d_block n_sc_hover">All</a></li>
					<?php $i=1; foreach ($rows as $id => $row): ?>
						<?php print $row; ?>
					<?php $i++; endforeach; ?>
				</ul>
			</div>
		</section>
	</div>
</div>