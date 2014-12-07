<section class="blog_isotope_container two_columns m_bottom_35 m_xs_bottom_15" data-isotope-options='{"itemSelector" : ".blog_isotope_item","layoutMode" : "masonry","transitionDuration":"0.7s","masonry" : {"columnWidth":".blog_isotope_item"}}'>
    <?php $i=1; foreach ($rows as $id => $row): ?>	
            <?php print $row; ?>
    <?php $i++; endforeach; ?>
</section>
<div class="clearfix t_align_c">
    <button id="load_more" class="button_type_2 color_dark r_corners transparent fs_medium bg_color_purple_hover tr_all">Load More</button>
</div>
        


