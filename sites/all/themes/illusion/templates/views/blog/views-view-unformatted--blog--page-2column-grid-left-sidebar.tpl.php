        <div class="row">
            <?php $i=1; foreach ($rows as $id => $row): ?>	
                <div class="col-lg-6 col-md-6 col-sm-6 m_bottom_50 m_xs_bottom_30">
                    <?php print $row; ?>
                </div>
                <?php if($i==2 || $i==4):?>
                    </div>
                    <div class="row">
                <?php endif; ?>
            <?php $i++; endforeach; ?>
        </div>
        <div class="clearfix"></div>


