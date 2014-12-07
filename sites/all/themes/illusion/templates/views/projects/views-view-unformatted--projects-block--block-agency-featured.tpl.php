<!--carousel-->
<div class="relative" data-appear-animation="fadeInUp" data-appear-animation-delay="800">
    <div class="owl-carousel wfilter_carousel" data-plugin-options='{"itemsCustom":[[992,4],[768,3],[450,2],[10,1]], "singleItem":false}' data-nav="rp_nav_">
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>  
        <?php endforeach; ?>
        <div class="wfcarousel_item relative 3d illustration photography projects web web_design"></div>
    </div>
    <!--photo carousel nav-->
    <button class="icon_wrap_size_4 circle color_light tr_all translucent rp_nav_prev d_md_none">
        <i class="icon-left-open-big"></i>
    </button>
    <button class="icon_wrap_size_4 circle color_light tr_all translucent rp_nav_next d_md_none">
        <i class="icon-right-open-big"></i>
    </button>
</div>