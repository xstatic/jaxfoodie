<section class="">
    <div class="container">
        <div data-appear-animation="fadeInUp" data-appear-animation-delay="800">
            <!--first four services-->
            <div class="row m_bottom_30" >
                <?php
                $i = 1;
                foreach ($rows as $id => $row):
                    ?>
                    <?php print $row; ?>
                    <?php if ($i == 4): ?>
                    </div>
                    <!--second four services-->
                    <div class="row services_animate" >
                    <?php endif; ?>
                    <?php
                    $i++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>