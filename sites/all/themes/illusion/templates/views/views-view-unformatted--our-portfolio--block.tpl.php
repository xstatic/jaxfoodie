<div class="container t_align_c">
    <section class="portfolio_isotope_container home three_columns without_text m_bottom_15" data-isotope-options='{"itemSelector" : ".portfolio_item","layoutMode" : "fitRows","transitionDuration":"0.7s"}'>
        <?php
        $i = 1;
        foreach ($rows as $id => $row):
            $delay = '';
            if ($i % 3 == 2) {
                $delay = ' data-appear-animation-delay="200"';
            } elseif ($i % 3 == 0) {
                $delay = ' data-appear-animation-delay="400"';
            }
            ?>
            <figure class="portfolio_item t_xs_align_c type_2 three_dimensional">
                <!--image-->
                <div class="popup_wrap d_xs_inline_b d_mxs_block relative r_corners wrapper" data-appear-animation="fadeInDown"<?php echo $delay; ?>>
                    <?php print $row; ?>
                </div>
            </figure>
            <?php
            $i++;
        endforeach;
        ?>
    </section>
</div>