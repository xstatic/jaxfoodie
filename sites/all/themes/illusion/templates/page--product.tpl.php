<?php
/**
 * @file
 * Illusion's theme implementation to display a single Drupal page.
 */
?>
<?php
global $theme_root;

$curr_uri = request_uri();
$array_curr_uri = explode('/', $curr_uri);

$arrayFooterSettings = array('footer_1', 'footer_2', 'footer_3', 'footer_4', 'footer_5', 'footer_6');

$count = 1;
foreach ($arrayFooterSettings as $type) {
    $var1 = 'page_style' . $count;
    $var2 = 'arrayPageStyle' . $count;
    $var3 = 'getFooterStyle' . $count;

    $$var1 = theme_get_setting($type);
    $$var1 = str_replace(" ", "", $$var1);
    $$var2 = explode(',', $$var1);
    $count++;

    $$var3 = array_intersect($$var2, $array_curr_uri);
}
if (!isset($_GET['footer'])) {
    $_GET['footer'] = NULL;
}
?>
<?php if (theme_get_setting('switcher') == 1) : ?>    
    <div id="styleswitcher" class="shadow_1 bg_light active d_xs_none">
        <button id="open_switcher" class="color_light">
            <i class="icon-cog-alt"></i>
        </button>
        <h5 class="color_dark fw_light m_bottom_20">Style Switcher</h5>
        <p class="fw_light">Layout type</p>
        <ul class="hr_list tabs_nav fs_medium layout_change">
            <li class="active"><a href="#" class="d_block color_dark n_sc_hover">WIDE</a></li>
            <li><a href="#" class="d_block color_dark n_sc_hover">BOXED</a></li>
        </ul>
        <p class="fw_light">Menu type</p>
        <div class="custom_select">
            <div class="select_title r_corners fw_light color_grey">Sticky menu</div>
            <ul id="menu_type" class="select_list r_corners wrapper shadow_1 bg_light tr_all"></ul>
            <select class="d_none">
                <option value="Sticky menu">Sticky menu</option>
                <option value="Side menu">Side menu</option>
            </select>
        </div>
        <p class="fw_light">Header style</p>
        <div class="custom_select">
            <div class="select_title r_corners fw_light color_grey">Header 1</div>
            <ul class="select_list header_change r_corners wrapper shadow_1 bg_light tr_all"></ul>
            <select class="d_none">
                <option value="Header 1">Header 1</option>
                <option value="Header 2">Header 2</option>
                <option value="Header 3">Header 3</option>
                <option value="Header 4">Header 4</option>
                <option value="Header 5">Header 5</option>
                <option value="Header 6">Header 6</option>
            </select>
        </div>
        <p class="fw_light">Footer style</p>
        <div class="custom_select">
            <div class="select_title r_corners fw_light color_grey">Footer 1</div>
            <ul class="select_list footer_change r_corners wrapper shadow_1 bg_light tr_all"></ul>
            <select class="d_none">
                <option value="Footer 1">Footer 1</option>
                <option value="Footer 2">Footer 2</option>
                <option value="Footer 3">Footer 3</option>
                <option value="Footer 4">Footer 4</option>
                <option value="Footer 5">Footer 5</option>
                <option value="Footer 6">Footer 6</option>
            </select>
        </div>
        <p class="fw_light">Background for boxed layout</p>
        <div class="custom_select">
            <div class="select_title r_corners fw_light color_grey">Color</div>
            <ul class="select_list r_corners wrapper shadow_1 bg_light tr_all" id="bg_type"></ul>
            <select class="d_none">
                <option value="Color">Color</option>
                <option value="Image">Image</option>
            </select>
        </div>
        <div id="bg_for_boxed">
            <div id="color_bg">
                <p class="d_inline_m fw_light color_dark m_right_5">Background color:</p>
                <button class="circle d_inline_m" id="select_bg_color"></button>
            </div>
            <div id="image_bg" class="d_none">
                <ul class="hr_list">
                    <li class="m_right_5"><button class="circle" data-bg="images/body_bg_1.jpg"></button></li>
                    <li class="m_right_5"><button class="circle" data-bg="images/body_bg_2.jpg"></button></li>
                </ul>
            </div>
        </div>
        <button id="reset" class="button_type_3 d_block color_dark color_pink_hover tr_all fs_medium r_corners">Reset</button>
    </div>
<?php endif; ?>

<!--side menu-->
<button id="open_side_menu" class="icon_wrap_size_2 circle color_black active">
    <i class="icon-menu"></i>
</button>
<div id="side_menu">
    <header class="m_bottom_30 d_table w_full">
        <!--logo-->
        <div class="d_table_cell half_column v_align_m">
            <a href="index.html">
                <img src="images/logo_side.png" alt="">
            </a>
        </div>
        <!--close sidemenu button-->
        <div class="d_table_cell half_column v_align_m t_align_r">
            <button class="icon_wrap_size_2 circle color_grey_light_2 d_inline_m" id="close_side_menu">
                <i class="icon-cancel"></i>
            </button>
        </div>
    </header>
    <hr class="divider_type_4 m_bottom_20">
    <!--searchform-->
    <form role="search" class="m_bottom_20 relative type_2">
        <input type="text" placeholder="Search" class="r_corners fw_light bg_light w_full">
        <button class="color_grey_light color_purple_hover tr_all">
            <i class="icon-search"></i>
        </button>
    </form>
    <hr class="divider_type_4 m_bottom_25">
    <!--main menu-->
    <nav>
        <?php print render($page['sidemenu']); ?>
    </nav>
</div>
<div class="<?php
if (theme_get_setting('layout_option') == 'boxed') {
    echo 'boxed_layout';
} else {
    echo 'wide_layout';
}
?> bg_light">
     <?php
     // set header base on page header setting
     $set_header = theme_get_setting('header_option');
     $array_header = array('header_1', 'header_2', 'header_3', 'header_4', 'header_5', 'header_6', 'header_7');
     foreach ($array_header as $type) {
         $header_type = str_replace(" ", "", theme_get_setting($type));
         $array_header_type = explode(',', $header_type);
         $curr_uri = request_uri();
         $array_curr_uri = explode('/', $curr_uri);
         $array_header_result = array_intersect($array_header_type, $array_curr_uri);

         if (count($array_header_result) > 0 && $array_header_type[0] != '') {
             $set_header = $type;
         }
     }
     ?>
    <!--header markup-->
    <?php if ($set_header == 'header_2') : ?>
        <header role="banner" class="relative">
            <span class="gradient_line"></span>
            <!--header bottom part-->
            <section class="header_bottom_part bg_light">
                <div class="container">
                    <div class="d_table w_full d_xs_block">
                        <!--logo-->
                        <div class="col-lg-2 col-md-2 col-sm-2 d_table_cell d_xs_block f_none v_align_m logo t_xs_align_c">
                            <?php if ($logo): ?>
                                <a href="<?php print $front_page; ?>" class="d_inline_m m_xs_top_20 m_xs_bottom_20" title="<?php print t('Home'); ?>" rel="home">
                                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 t_align_r d_table_cell d_xs_block f_none">
                            <div class="relative clearfix t_align_r">
                                <button id="menu_button" class="r_corners tr_all color_blue db_centered m_bottom_20 d_none d_xs_block">
                                    <i class="icon-menu"></i>
                                </button>
                                <!--main navigation-->
                                <nav role="navigation" class="d_inline_m d_xs_none m_xs_right_0 m_right_15 m_sm_right_5 t_align_l m_xs_bottom_15">
                                    <?php print render($page['menu']); ?>
                                </nav>
                                <!--searchform button-->
                                <div class="relative d_inline_m search_buttons d_xs_none">
                                    <button class="icon_wrap_size_2 circle color_grey_light_2 tr_all color_purple_hover"><i class="icon-cancel"></i></button>
                                    <button class="icon_wrap_size_2 active circle color_grey_light_2 tr_all color_purple_hover"><i class="icon-search"></i></button>
                                </div>
                                <!--searchform-->
                                <div role="search" class="bg_light animate_ vc_child t_align_r fw_light tr_all trf_xs_none">
                                    <!--input type="text" name="search" placeholder="Search" class="r_corners d_inline_m"-->
                                    <?php
                                    $block = module_invoke('search', 'block_view', 'form');
                                    print render($block['content']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
    <?php elseif ($set_header == 'header_3') : ?>
        <header role="banner" class="relative type_2">
            <span class="gradient_line"></span>
            <!--top part-->
            <?php if ($page['top_bar']) : ?>
                <section class="header_top_part m_xs_bottom_20">
                    <div class="container">
                        <?php print render($page['top_bar']); ?>
                    </div>
                </section>
            <?php endif; ?>
            <hr>
            <!--header bottom part-->
            <section class="header_bottom_part type_2 bg_light">
                <div class="container">
                    <!--logo-->
                    <div class="t_align_c">
                        <?php if ($logo): ?>
                            <a href="<?php print $front_page; ?>" class="d_inline_m m_top_8 m_bottom_5 m_xs_top_20 m_xs_bottom_20" title="<?php print t('Home'); ?>" rel="home">
                                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <hr class="d_xs_none">
            <section class="sticky_part bg_light">
                <div class="container t_align_c">
                    <!--main navigation-->
                    <button id="menu_button" class="r_corners tr_all color_blue db_centered m_bottom_20 d_none d_xs_block">
                        <i class="icon-menu"></i>
                    </button>
                    <!--main navigation-->
                    <nav role="navigation" class="d_inline_m d_xs_none m_xs_right_0 m_right_15 m_sm_right_5 t_align_l m_xs_bottom_15 header_style_3">
                        <?php print render($page['menu']); ?>
                    </nav>
                </div>
            </section>
        </header>
		<script>jQuery('ul.main_menu').addClass('type_2');</script>
    <?php elseif ($set_header == 'header_4') : ?>
        <header role="banner" class="relative type_2">
            <span class="gradient_line"></span>
            <!--header bottom part-->
            <section class="header_bottom_part type_3 bg_light">
                <div class="container">
                    <!--logo-->
                    <div class="d_table w_full d_xs_block t_xs_align_c">
                        <div class="col-lg-4 col-md-4 col-sm-4 d_table_cell d_xs_block p_xs_hr_0 v_align_m f_none m_xs_bottom_20">
                            <?php if ($logo): ?>
                                <a href="<?php print $front_page; ?>" class="d_inline_m" title="<?php print t('Home'); ?>" rel="home">
                                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-8 d_table_cell d_xs_block p_xs_hr_0 v_align_m f_none t_align_r t_xs_align_c">
                            <?php if ($page['top_bar_header_4']) : ?>
                                <?php print render($page['top_bar_header_4']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="d_xs_none">
            <section class="sticky_part bg_light">
                <div class="container clearfix relative">
                    <!--main navigation-->
                    <button id="menu_button" class="r_corners tr_all color_blue db_centered m_bottom_20 d_none d_xs_block">
                        <i class="icon-menu"></i>
                    </button>
                    <nav role="navigation" class="d_inline_m f_left f_xs_none d_xs_none m_xs_right_0 m_right_15 m_sm_right_5 t_align_l m_xs_bottom_15">
                        <?php print render($page['menu']); ?>
                    </nav>
                    <div class="f_right m_top_8 f_xs_none">
                        <!--searchform button-->
                        <div class="relative d_inline_m search_buttons d_xs_none">
                            <button class="icon_wrap_size_2 circle color_grey_light_2 tr_all color_purple_hover"><i class="icon-cancel"></i></button>
                            <button class="icon_wrap_size_2 active circle color_grey_light_2 tr_all color_purple_hover"><i class="icon-search"></i></button>
                        </div>
                        <!--searchform-->
                        <div role="search" class="bg_light animate_ vc_child type_4 t_align_r fw_light tr_all trf_xs_none">
                            <!--input type="text" name="search" placeholder="Search" class="r_corners d_inline_m m_xs_bottom_20"-->
                            <?php
                            $block = module_invoke('search', 'block_view', 'form');
                            print render($block['content']);
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <script>jQuery('ul.main_menu').addClass('type_2');</script>
    <?php elseif ($set_header == 'header_5') : ?>
        <header role="banner" class="relative type_2">
            <span class="gradient_line"></span>
            <!--top part-->
            <?php if ($page['top_bar']) : ?>
                <section class="header_top_part">
                    <div class="container">
                        <?php print render($page['top_bar']); ?>
                    </div>
                </section>
            <?php endif; ?>
            <hr class="m_xs_bottom_15">
            <!--header bottom part-->
            <section class="header_bottom_part bg_light">
                <div class="container">
                    <!--logo-->
                    <div class="d_table w_full d_xs_block t_xs_align_c">
                        <div class="col-lg-4 col-md-4 col-sm-4 d_table_cell d_xs_block p_xs_hr_0 v_align_m f_none m_xs_bottom_10">
                            <?php if ($logo): ?>
                                <a href="<?php print $front_page; ?>" class="d_inline_m" title="<?php print t('Home'); ?>" rel="home">
                                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-8 d_table_cell d_xs_block p_xs_hr_0 v_align_m f_none t_align_r t_xs_align_c">
                            <?php if ($page['header_advertising']) : ?>
                                <?php print render($page['header_advertising']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="d_xs_none">
            <section class="sticky_part bg_light shadow_light">
                <div class="container clearfix relative">
                    <!--main navigation-->
                    <button id="menu_button" class="r_corners tr_all color_blue db_centered m_bottom_20 d_none d_xs_block">
                        <i class="icon-menu"></i>
                    </button>
                    <nav role="navigation" class="d_inline_m f_left f_xs_none d_xs_none m_xs_right_0 m_right_15 m_sm_right_5 t_align_l m_xs_bottom_15 header_style_5">
                        <?php print render($page['menu']); ?>
                    </nav>
                    <div class="f_right m_top_8 f_xs_none m_xs_bottom_20">
                        <!--searchform button-->
                        <div class="relative d_inline_m search_buttons d_xs_none">
                            <button class="icon_wrap_size_2 circle color_grey_light_2 tr_all color_purple_hover"><i class="icon-cancel"></i></button>
                            <button class="icon_wrap_size_2 active circle color_grey_light_2 tr_all color_purple_hover"><i class="icon-search"></i></button>
                        </div>
                        <!--searchform-->
                        <div role="search" class="bg_light animate_ vc_child type_4 t_align_r fw_light tr_all trf_xs_none">
                            <!--input type="text" name="search" placeholder="Search" class="r_corners d_inline_m"-->
                            <?php
                            $block = module_invoke('search', 'block_view', 'form');
                            print render($block['content']);
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <script>jQuery('ul.main_menu').addClass('type_2');</script>
    <?php elseif ($set_header == 'header_6') : ?>
        <header role="banner" class="relative type_2">
            <span class="gradient_line"></span>
            <!--top part-->
			<?php if ($page['top_bar_header_6']) : ?>
            <section class="header_top_part">
                <div class="container">
                    <div class="row">
                        <!--contact info-->
                        <?php print render($page['top_bar_header_6']); ?>
                    </div>
                </div>
            </section>
            <hr>
			<?php endif; ?>
            <!--header bottom part-->
            <section class="header_bottom_part type_2 bg_light">
                <div class="container">
                    <div class="d_table w_full d_xs_block">
                        <!--logo-->
                        <div class="col-lg-3 col-md-3 col-sm-3 d_table_cell d_xs_block f_none v_align_m logo t_xs_align_c">
                            <?php if ($logo): ?>
                                <a href="<?php print $front_page; ?>" class="d_inline_m m_xs_top_20 m_xs_bottom_20" title="<?php print t('Home'); ?>" rel="home">
                                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 d_table_cell d_xs_block f_none t_xs_align_c">
                            <?php if ($page['header_shop_by']) : ?>
                                <?php //print render($page['header_shop_by']); ?>
                            <?php endif; ?>
                            <!--searchform-->
                            <div role="search" class="relative type_2 f_left type_3 f_xs_none t_xs_align_l m_xs_bottom_15">
                                <?php
                                $block = module_invoke('search', 'block_view', 'form');
                                //print render($block['content']);
                                ?>
                            </div>
                            <div class="f_right clearfix f_xs_none d_xs_inline_b t_xs_align_l m_xs_bottom_15">
                                <!--shopping cart-->
                                <div class="relative f_right dropdown_2_container shoppingcart">
                                    <button class="icon_wrap_size_2 color_grey_light circle tr_all" onclick="document.location.href = '<?php echo file_create_url('cart'); ?>'">
                                        <i class="icon-basket color_grey_light_2 tr_inherit"></i>
                                    </button>
                                </div>
                                <!--login-->
                                <div class="relative f_right m_right_10 dropdown_2_container login">
                                    <button class="icon_wrap_size_2 color_grey_light circle tr_all" onclick="document.location.href = '<?php echo file_create_url('user'); ?>'">
                                        <i class="icon-lock color_grey_light_2 tr_inherit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="d_xs_none">
            <section class="sticky_part bg_light">
                <div class="container">
                    <!--main navigation-->
                    <button id="menu_button" class="r_corners tr_all color_blue db_centered m_bottom_20 d_none d_xs_block">
                        <i class="icon-menu"></i>
                    </button>
                    <!--main navigation-->
                    <nav role="navigation" class="d_inline_m d_xs_none m_xs_right_0 m_right_15 m_sm_right_5 t_align_l m_xs_bottom_15 header_style_6">
                        <?php print render($page['menu']); ?>
                    </nav>
                </div>
            </section>
        </header>
        <script>jQuery('ul.main_menu').addClass('type_2');</script>
    <?php elseif ($set_header == 'header_7') : ?>
        <header role="banner" class="relative comming_soon shadow_1">
            <span class="gradient_line"></span>
            <div class="container t_align_c">
                <?php if ($logo): ?>
                    <a href="<?php print $front_page; ?>" class="d_inline_m m_xs_top_20 m_xs_bottom_20" title="<?php print t('Home'); ?>" rel="home">
                        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
                    </a>
                <?php endif; ?>
            </div>
        </header>
    <?php else: ?>
        <header role="banner" class="relative">
            <span class="gradient_line"></span>
            <!--top part-->
            <?php if ($page['top_bar']) : ?>
                <section class="header_top_part">
                    <div class="container">
                        <?php print render($page['top_bar']); ?>
                    </div>
                </section>
            <?php endif; ?>
            <hr>
            <section class="header_bottom_part bg_light">
                <div class="container">
                    <div class="d_table w_full d_xs_block">
                        <!--logo-->
                        <div class="col-lg-2 col-md-2 col-sm-2 d_table_cell d_xs_block f_none v_align_m logo t_xs_align_c">
                            <?php if ($logo): ?>
                                <a href="<?php print $front_page; ?>" class="d_inline_m m_xs_top_20 m_xs_bottom_20" title="<?php print t('Home'); ?>" rel="home">
                                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 t_align_r d_table_cell d_xs_block f_none">
                            <div class="relative clearfix t_align_r">
                                <button id="menu_button" class="r_corners tr_all color_blue db_centered m_bottom_20 d_none d_xs_block">
                                    <i class="icon-menu"></i>
                                </button>
                                <!--main navigation-->
                                <nav role="navigation" class="d_inline_m d_xs_none m_xs_right_0 m_right_15 m_sm_right_5 t_align_l m_xs_bottom_15">
                                    <?php print render($page['menu']); ?>
                                </nav>
                                <!--searchform button-->
                                <div class="relative d_inline_m search_buttons d_xs_none">
                                    <button class="icon_wrap_size_2 circle color_grey_light_2 tr_all color_purple_hover"><i class="icon-cancel"></i></button>
                                    <button class="icon_wrap_size_2 active circle color_grey_light_2 tr_all color_purple_hover"><i class="icon-search"></i></button>
                                </div>
                                <!--searchform-->
                                <div role="search" class="bg_light animate_ vc_child t_align_r fw_light tr_all trf_xs_none">
                                    <?php
                                    $block = module_invoke('search', 'block_view', 'form');
                                    print render($block['content']);
                                    ?>
                                    <!--input type="text" name="search" placeholder="Search" class="r_corners d_inline_m"-->
                                </div>
                                <?php //print render(drupal_get_form('search_block_form', TRUE));       ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
    <?php endif; ?>


    <!-- Breadcrumbs -->
    <?php if ($title) : ?>
        <!--page title-->
        <section class="page_title_2 bg_light_2 t_align_c relative wrapper">
            <div class="container">
                <h1 class="color_dark fw_light m_bottom_5"><?php print $title; ?></h1>
                <!--breadcrumbs-->
                <?php if (theme_get_setting('breadcrumbs') == '1'): ?>
                    <?php if ($breadcrumb): ?>
                        <?php print $breadcrumb; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <div class="section_offset">
        <div class="container">
            <?php print $messages; ?>
            <?php if ($page['content']) : ?>
                <?php print render($page['content']); ?>
            <?php endif; ?>
        </div>
    </div>


    <hr class="divider_type_2">
    <!--footer-->
    <!--footer-->
    <footer role="contentinfo" class="bg_light_3 <?php if (count($getFooterStyle4) > 0 || $_GET['footer'] == 'footer4') : ?>p_top_0 p_bottom_0<?php endif; ?>">        
        <!-- top part -->
        <?php
        if (count($getFooterStyle2) > 0 || $_GET['footer'] == 'footer2' || theme_get_setting('footer_option') == 'footer2') :
            include 'footer/footer-2.php';
        elseif (count($getFooterStyle3) > 0 || $_GET['footer'] == 'footer3' || theme_get_setting('footer_option') == 'footer3'):
            include 'footer/footer-3.php';
        elseif (count($getFooterStyle4) > 0 || $_GET['footer'] == 'footer4' || theme_get_setting('footer_option') == 'footer4'):
            include 'footer/footer-4.php';
        elseif (count($getFooterStyle5) > 0 || $_GET['footer'] == 'footer5' || theme_get_setting('footer_option') == 'footer5'):
            include 'footer/footer-5.php';
        elseif (count($getFooterStyle6) > 0 || $_GET['footer'] == 'footer6' || theme_get_setting('footer_option') == 'footer6'):
            include 'footer/footer-6.php';
        else:
            include 'footer/footer-6.php';
        endif;
        ?>
        <!--bottom part-->
        <section class="footer_bottom_part t_align_c color_grey bg_light_4 fw_light">
            <?php if ($page['footer_bottom']) : ?>
                <?php print render($page['footer_bottom']); ?>
            <?php endif; ?>
        </section>
    </footer>
</div>

<script src="<?php echo $theme_root; ?>/plugins/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="<?php echo $theme_root; ?>/js/jquery-ui-1.10.4.min.js"></script>