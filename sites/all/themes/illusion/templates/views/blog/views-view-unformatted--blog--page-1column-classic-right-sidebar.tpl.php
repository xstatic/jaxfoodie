<section class="">
    <div class="container">
        <div class="row">
            <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                <?php
                $i = 1;
                foreach ($rows as $id => $row):
                    ?>	
                    <?php if ($i == 1): ?>
                        <article class="clearfix m_bottom_50 m_xs_bottom_30 blog_post">
                        <?php else: ?>
                            <article class="m_bottom_50 m_xs_bottom_30 blog_post">
                            <?php endif; ?>
                            <?php print $row; ?>	
                        </article>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                    <div class="clearfix"></div>
            </section>
        </div>
    </div>
</section>


