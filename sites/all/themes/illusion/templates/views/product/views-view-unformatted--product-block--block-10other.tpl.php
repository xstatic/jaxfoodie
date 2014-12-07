<div class="clearfix m_bottom_23 m_sm_bottom_10 m_xs_bottom_20">
    <h5 class="fw_light f_left f_xs_none color_dark m_xs_bottom_10">10 New Other Products</h5>
    <div class="f_right f_xs_none clearfix">
        <button class="icon_wrap_size_5 circle color_grey_light f_left m_right_8 fproducts_nav_1_prev fn_type_2 color_scheme_hover tr_all">
            <i class="icon-angle-left fs_large"></i>
        </button>
        <button class="icon_wrap_size_5 circle color_grey_light f_left fproducts_nav_1_next fn_type_2 color_scheme_hover tr_all">
            <i class="icon-angle-right fs_large"></i>
        </button>
    </div>
</div>
<div class="row">
    <div class="featured_products owl-carousel type_2 t_xs_align_c m_bottom_45 m_xs_bottom_30" data-plugin-options='{"singleItem":false,"itemsCustom":[[992,4],[768,3],[600,2],[10,1]],"autoPlay":true}' data-nav="fproducts_nav_1_">
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>  
        <?php endforeach; ?>
    </div>
</div>