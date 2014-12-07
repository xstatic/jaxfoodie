<?php
global $default_img;
$image = $default_img;
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
}
?>
<div class="col-lg-6 col-md-6 col-sm-6 m_xs_bottom_30 m_bottom_40 m_sm_right_15 m_sm_bottom_5">
    <!--step image-->
    <div class="step_img_container counter_inc">
        <div class="d_table">
            <!--counter-->
            <div class="d_table_cell v_align_m color_purple step_counter t_align_c tr_all"></div>
            <!--image-->
            <div class="d_table_cell"><img src="<?php echo $image; ?>" alt=""></div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 m_xs_bottom_30 m_bottom_40 step_description">
    <!--step description-->
    <h3 class="fw_light color_dark m_bottom_15 tr_all"><?php echo $title; ?></h3>
    <p><?php print strip_tags($node->body['und'][0]['value']); ?></p>
</div>