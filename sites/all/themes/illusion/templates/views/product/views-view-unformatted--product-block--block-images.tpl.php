<!--projects carousel-->
<div class="container">
    <div class="row">
        <div class="owl-carousel" data-plugin-options='{"singleItem":false,"itemsCustom" : [[992,3],[768,2],[100,1]]}' data-nav="fp_nav_">
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>  
            <?php endforeach; ?>
        </div>
    </div>
</div>
<button data-appear-animation="fadeIn" class="icon_wrap_size_4 circle color_grey_light tr_all color_blue_hover fp_nav_prev nav_type_2 d_md_none appear-animation fadeIn appear-animation-visible">
    <i class="icon-left-open-big"></i>
</button>
<button data-appear-animation="fadeIn" class="icon_wrap_size_4 circle color_grey_light tr_all color_blue_hover fp_nav_next nav_type_2 d_md_none appear-animation fadeIn appear-animation-visible">
    <i class="icon-right-open-big"></i>
</button>