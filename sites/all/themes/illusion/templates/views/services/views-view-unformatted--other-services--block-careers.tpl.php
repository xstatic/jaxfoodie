<div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">
	<div class="row">
		<?php $i=1; foreach ($rows as $id => $row): ?>
				<?php print $row; ?>
			<?php if($i==2): ?>
			</div>
			<div class="row">
			<?php endif; ?>
		<?php $i++; endforeach; ?>
	</div>
</div>
						