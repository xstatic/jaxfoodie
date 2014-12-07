<div class="">
    <div class="container">
        <div class="row">
            <?php $i=1; foreach ($rows as $id => $row): ?>	
                <div class="col-lg-4 col-md-4 col-sm-4 m_bottom_50 m_xs_bottom_30">
                    <?php print $row; ?>
                </div>
                <?php if($i==3):?>
                    </div>
                    <div class="row">
                <?php endif; ?>
            <?php $i++; endforeach; ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>


