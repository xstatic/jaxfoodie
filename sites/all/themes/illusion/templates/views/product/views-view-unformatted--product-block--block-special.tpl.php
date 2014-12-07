<div class="m_bottom_30">
    <!--title & nav-->
    <div class="clearfix m_bottom_25 m_sm_bottom_10 m_xs_bottom_20">
        <h5 class="fw_light f_left f_sm_none f_xs_left color_dark m_sm_bottom_5 m_xs_bottom_0">Specials</h5>
        <div class="f_right f_sm_none f_xs_right clearfix">
            <button class="icon_wrap_size_0 circle color_grey_light f_left m_right_5 specials_prev color_pink_hover tr_all">
                <i class="icon-angle-left fs_large"></i>
            </button>
            <button class="icon_wrap_size_0 circle color_grey_light f_left m_right_5 specials_next color_pink_hover tr_all">
                <i class="icon-angle-right fs_large"></i>
            </button>
        </div>
    </div>
    <div class="owl-carousel t_xs_align_c" data-plugin-options='{"transitionStyle":"backSlide","autoPlay" : true}' data-nav="specials_">
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>  
        <?php endforeach; ?>
    </div>
</div>