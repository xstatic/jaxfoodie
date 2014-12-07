<div class="container clearfix">
	<section>
		<ul class="hr_list counter steps_nav m_bottom_23 m_xs_bottom_10 t_xs_align_c">
			<?php $i=1; foreach ($rows as $id => $row): ?>
				<li class="<?php if($i=1): echo 'active'; elseif($i==6): echo 'm_right_60 m_md_right_20'; endif; ?> m_right_60 m_md_right_20 relative f_xs_none d_xs_inline_m m_xs_left_5 m_xs_right_5 m_xs_bottom_10">
					<?php print $row; ?>
				</li>
			<?php $i++; endforeach; ?>
		</ul>
	</section>
</div>
			