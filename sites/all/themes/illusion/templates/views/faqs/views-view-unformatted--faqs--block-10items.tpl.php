<div class="tabs t_align_c">
    <!--tabs nav-->
<!--    <ul class="tabs_nav type_2 fs_medium hr_list d_inline_b d_xs_block m_bottom_30 m_xs_bottom_20">
        <li class="f_xs_none"><a href="#tab-1" class="color_dark d_block n_sc_hover">All</a></li>
        <li class="f_xs_none"><a href="#tab-2" class="color_dark d_block n_sc_hover">3D</a></li>
        <li class="f_xs_none"><a href="#tab-3" class="color_dark d_block n_sc_hover">Illustration</a></li>
        <li class="f_xs_none"><a href="#tab-4" class="color_dark d_block n_sc_hover">Photography</a></li>
        <li class="f_xs_none"><a href="#tab-5" class="color_dark d_block n_sc_hover">Web</a></li>
    </ul>-->
    <!--tabs content-->
    <div id="tab-1" data-isotope-options='{"itemSelector" : ".faqs_item","layoutMode" : "fitRows","transitionDuration":"0.7s"}'>
        <div class="accordion t_align_l">
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>  
            <?php endforeach; ?>
        </div>
    </div>
</div>