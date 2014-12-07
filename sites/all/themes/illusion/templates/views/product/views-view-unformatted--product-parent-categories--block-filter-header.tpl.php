<div class="custom_select t_xs_align_l f_left f_xs_none w_xs_full m_xs_right_0 m_xs_bottom_10 m_right_5 category_select">
    <div class="select_title r_corners fw_light color_grey">Shop by category</div>
    <ul class="select_list r_corners wrapper shadow_1 bg_light tr_all"></ul>
    <ul class="select_list r_corners wrapper shadow_1 bg_light tr_all">
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>
        <?php endforeach; ?>
    </ul>
</div>