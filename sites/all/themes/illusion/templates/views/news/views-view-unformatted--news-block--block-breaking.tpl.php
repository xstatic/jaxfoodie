<section class="bg_light_2 breaking_news">
    <div class="container wrapper t_xs_align_c">
        <div class="bn_title fs_small color_light r_corners bg_color_red f_left m_right_20 t_sm_align_c f_xs_none d_inline_b breaking-news-button" onclick="window.open('<?php echo file_create_url('news'); ?>', '_blank');">
            Latest News
        </div>
        <!--carousel-->
        <div id="breaking_news" class="owl-carousel f_right f_xs_none fs_medium" data-plugin-options='{"autoPlay":true, "stopOnHover":true}'>
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>