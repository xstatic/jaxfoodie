<section class="">
    <div class="container">
        <?php
        $i = 1;
        foreach ($rows as $id => $row):
            ?>	
            <?php if ($i == 1): ?>
                <article class="clearfix m_bottom_50 m_xs_bottom_30 blog_post">
                <?php elseif ($i == 6): ?>
                    <article class="blog_post">
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
                </div>
                </section>
                <script>
                    jQuery('.view-display-id-page_1column_classic').addClass('container m_bottom_70');
                </script>

