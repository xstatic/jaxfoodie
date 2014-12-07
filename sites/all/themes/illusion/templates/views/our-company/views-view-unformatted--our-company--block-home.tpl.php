<div class="container t_align_c">
    <div class="tabs">
        <!--tabs nav-->
        <ul class="tabs_nav hr_list d_inline_b d_xs_block m_bottom_30 m_xs_bottom_20" data-appear-animation="bounceInLeft" data-appear-animation-delay="800">
            <li class="f_xs_none"><a href="#tab-1" class="color_dark d_block n_sc_hover">The Company</a></li>
            <li class="f_xs_none"><a href="#tab-2" class="color_dark d_block n_sc_hover">Our Philosophy</a></li>
            <li class="f_xs_none"><a href="#tab-3" class="color_dark d_block n_sc_hover">Our Mission</a></li>
            <li class="f_xs_none"><a href="#tab-4" class="color_dark d_block n_sc_hover">Why Choose Us</a></li>
        </ul>
        <!--tabs content-->
        <?php
        $i = 1;
        foreach ($rows as $id => $row):
            ?>
            <article id="tab-<?php echo $i; ?>" 
				<?php if ($i == 1): ?>data-appear-animation="fadeInUp" data-appear-animation-delay="450"<?php endif; ?> 
                <?php if ($i == 2): ?>class="our-philosophy"<?php endif; ?>
				<?php if ($i == 4): ?>class="t_align_l fw_light"<?php endif; ?> >
                <?php print $row; ?>
            </article>
            <?php
            $i++;
        endforeach;
        ?>
    </div>
</div>