<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30" data-appear-animation="fadeInUp">
            <h3 class="color_dark fw_light t_align_c m_bottom_12">Latest News</h3>
            <p class="m_bottom_40 t_align_c">Proin dictum elementum velit. Fusce euismod consequat ante. </p>
            <div class="row latest_news_animate_container">
                <?php foreach ($rows as $id => $row): ?>
                    <?php print $row; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>