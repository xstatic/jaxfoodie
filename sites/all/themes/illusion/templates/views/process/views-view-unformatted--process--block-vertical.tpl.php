<div class="container counter">
	<?php $i=1;
		foreach ($rows as $id => $row): ?>
        <div class="row step <?php if($i%2==0){ echo'process-right';}?>">
            <?php print $row; ?>
        </div>
        <?php 
            $i++;
		endforeach;
	?>
</div>
<script>
    jQuery('.container').find("div:last-child").find('div').removeClass('m_bottom_40');
</script>
			