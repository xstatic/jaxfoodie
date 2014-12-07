<div class="container t_align_c">
    <div class="row t_align_c">				
        <?php foreach ($rows as $id => $row): ?>
            <div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30" id="main-service-<?php echo $id; ?>">
            <?php print $row; ?>
            </div>           
        <?php endforeach; ?>
    </div>
</div>
<script>
    jQuery('#main-service-0 .icon_wrap_size_6').addClass('color_blue');
    jQuery('#main-service-0 .button_type_2').addClass('color_blue_hover');
    jQuery('#main-service-1 .icon_wrap_size_6').addClass('color_pink');
    jQuery('#main-service-1 .button_type_2').addClass('color_pink_hover');
    jQuery('#main-service-2 .icon_wrap_size_6').addClass('color_purple');
    jQuery('#main-service-2 .button_type_2').addClass('color_purple_hover');
</script>