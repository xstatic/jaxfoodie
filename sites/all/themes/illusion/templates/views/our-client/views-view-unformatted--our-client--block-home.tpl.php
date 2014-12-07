<!--our clients-->
<section class="col-lg-12 col-md-12 t_sm_align_c" data-appear-animation="fadeInUp" data-appear-animation-delay="150">
    <!--carousel-->
    <div class="owl-carousel m_bottom_15" data-plugin-options='{"pagination":true,"transitionStyle" : "backSlide"}' data-nav="c_nav_">
        <!--item-->
        <div>
            <div class="row top">
                <?php
                $i = 1;
                foreach ($rows as $id => $row):
                    print $row;
                    if ($i == 3 || $i == 9 || $i == 15):
                        ?>
                    </div>
                    <div class="row bottom">
                    <?php elseif ($i == 6 || $i == 12): ?>
                    </div>
                </div>
                <!--item-->
                <div>
                    <div class="row top">
                        <?php
                    endif;
                    $i++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <!--clients carousel nav-->
    <div class="d_table w_full clients_nav">
        <!--paginations container-->
        <div class="d_table_cell half_column clients_pags_container v_align_m"></div>
        <!--navigations-->
        <div class="d_table_cell half_column t_align_r v_align_m">
            <button class="circle icon_wrap_size_5 color_grey_light d_inline_m color_blue_hover m_right_5 tr_all c_nav_prev">
                <i class="icon-left-open-big"></i>
            </button>
            <button class="circle icon_wrap_size_5 color_grey_light d_inline_m color_blue_hover tr_all c_nav_next">
                <i class="icon-right-open-big"></i>
            </button>
        </div>
    </div>
</section>