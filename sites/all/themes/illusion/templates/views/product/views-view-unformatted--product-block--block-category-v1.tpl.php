<div class="clearfix m_bottom_10">
    <ul class="hr_list f_right fs_medium paginations t_align_c f_xs_none">
        <li class="active">
            <a href="portfolio_classic_1_column.html" data-shop-layout="grid" class="rc_first_hr color_dark">
                <i class="icon-layout fs_large"></i>
            </a>
        </li>
        <li>
            <a href="#" class="rc_last_hr color_dark" data-shop-layout="list">
                <i class="icon-menu"></i>
            </a>
        </li>
    </ul>
</div>
<div class="shop_isotope_container t_xs_align_c three_columns m_bottom_15" data-isotope-options='{"itemSelector" : ".shop_isotope_item","layoutMode" : "fitRows","transitionDuration":"0.7s"}'>
    <?php foreach ($rows as $id => $row): ?>
        <?php print $row; ?>  
    <?php endforeach; ?>
</div>