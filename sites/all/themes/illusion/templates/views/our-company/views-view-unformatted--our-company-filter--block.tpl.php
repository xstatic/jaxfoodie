<div class="container t_align_c">
    <div class="tabs">
        <ul class="tabs_nav hr_list d_inline_b d_xs_block m_bottom_30 m_xs_bottom_20" data-appear-animation="bounceInLeft" data-appear-animation-delay="800">
            <?php
            $i = 1;
            foreach ($rows as $id => $row):
                ?>
                <li class="f_xs_none">
                    <a href="#tab-<?php echo $i; ?>" class="color_dark d_block n_sc_hover">
                        <?php print $row; ?>
                    </a>
                </li>
                <?php
                $i++;
            endforeach;
            ?>
        </ul>
    </div>
</div>