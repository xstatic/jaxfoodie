<div class="container">
    <div class="relative" data-appear-animation="bounceInLeft" data-appear-animation-delay="400">
        <div class="t_xs_align_c">
            <div class="owl-carousel clients brands t_align_c" data-plugin-options='{"pagination":true,"transitionStyle" : "backSlide"}' data-nav="c_nav_">
                <!--item-->
                <div>
                    <div class="row">
                        <?php
                        $i = 1;
                        foreach ($rows as $id => $row):
                            print $row;
                            if ($i == 6 || $i == 12):
                                ?>
                            </div>
                        </div>
                        <!--item-->
                        <div>
                            <div class="row">
                                <?php
                            endif;
                            $i++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!--carousel nav-->
        <button class="icon_wrap_size_5 circle color_grey_light tr_all color_blue_hover c_nav_prev nav_type_2 d_md_none">
            <i class="icon-left-open-big"></i>
        </button>
        <button class="icon_wrap_size_5 circle color_grey_light tr_all color_blue_hover c_nav_next nav_type_2 d_md_none">
            <i class="icon-right-open-big"></i>
        </button>
    </div>
</div>