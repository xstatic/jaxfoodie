<h3 class="fw_light color_dark m_bottom_35 t_align_c" data-appear-animation="bounceInLeft">Featured Products</h3>
<div class="relative m_bottom_70 m_xs_bottom_30">
    <div class="row">
        <div class="owl-carousel t_xs_align_c featured_products" data-nav="fproducts_nav_" data-plugin-options='{"singleItem":false,"itemsCustom":[[992,4],[768,3],[600,2],[10,1]]}'>
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>  
            <?php endforeach; ?>
        </div>
    </div>
</div>