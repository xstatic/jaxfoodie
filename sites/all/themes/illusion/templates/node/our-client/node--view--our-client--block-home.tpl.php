<?php 
    global $default_img;
 
    $image = $default_img;
    if(isset($node->field_image['und'])) {
        $image = file_create_url($node->field_image['und'][0]['uri']);
    }
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 m_bottom_30">
    <div class="clients_item db_xs_centered relative wrapper r_corners d_sm_inline_b d_xs_block">
        <a href="#" class="d_block translucent tr_all wrapper r_corners">
            <img src="<?php echo $image; ?>" alt="">
        </a>
    </div>
</div>
