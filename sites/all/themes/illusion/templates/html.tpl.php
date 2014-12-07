<?php
/**
 * @file
 * Illusion's HTML template.
 */
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="ie9" lang="<?php print $language->language; ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="<?php print $language->language; ?>"><!--<![endif]-->
    <head>
        <?php
        global $theme_root;
        $curr_uri = request_uri();
        ?>
        <?php print $head; ?>
        <title><?php print $head_title; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $theme_root; ?>/images/fav.ico">
        <!--web fonts-->
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic' rel='stylesheet' type='text/css'>
        <?php print $styles; ?>
        <?php print $scripts; ?>

        <script src="<?php echo $theme_root; ?>/plugins/jquery.queryloader2.min.js"></script>
        <script>
            jQuery('html').addClass('d_none');
            jQuery(document).ready(function() {
                jQuery('html').show();
                jQuery("body").queryLoader2({
                    backgroundColor: '#fff',
                    barColor: '#35eef6',
                    barHeight: 4,
                    percentage: true,
                    deepSearch: true,
                    minimumTime: 1000
                });
				jQuery(".language").click(function () {
					jQuery('.switch_language .block-locale').slideToggle( "slow" );
				}); 
            });
        </script>
    </head>

    <body class="<?php if(theme_get_setting('menu_option') == 'sticky_menu') { echo 'sticky_menu'; } ?>">
    
		<?php //print $page_top; ?>
        <?php print $page; ?>
        <?php print $page_bottom; ?>
		
		<?php if(theme_get_setting('background_type') == 'image' && (theme_get_setting('background_image') !== '')) : ?>
			<style>body {background-image: url("<?php print file_create_url(theme_get_setting('background_image')); ?>");}</style>
		<?php elseif(theme_get_setting('background_type') == 'color' && (theme_get_setting('background_color') !== '')) : ?>	
			<style>body {background: <?php print theme_get_setting('background_color'); ?>;}</style>
		<?php endif; ?>

        <!--back to top button-->
        <button id="back_to_top" class="circle icon_wrap_size_2 color_blue_hover color_grey_light_4 tr_all d_md_none">
            <i class="icon-angle-up fs_large"></i>
        </button>

		<script src="<?php echo $theme_root; ?>/js/addclass.js"></script>
        <!--Libs-->
        <script src="<?php echo $theme_root; ?>/plugins/layerslider/js/greensock.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/layerslider/js/layerslider.transitions.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/jquery.appear.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/afterresize.min.js"></script>
		<script src="<?php echo $theme_root; ?>/plugins/isotope.pkgd.min.js"></script>

        <script src="<?php echo $theme_root; ?>/plugins/jquery.easing.1.3.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/jquery.easytabs.min.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/jackbox/js/jackbox-packed.min.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/twitter/jquery.tweet.min.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/flickr.js"></script>
        <script src="<?php echo $theme_root; ?>/plugins/colorpicker/colorpicker.js"></script>
        <script src="<?php echo $theme_root; ?>/js/styleswitcher.js"></script>
		
		<!--Countdown-->
		<script src="<?php echo $theme_root; ?>/plugins/jquery.plugin.min.js"></script>
		<script src="<?php echo $theme_root; ?>/plugins/jquery.countdown.min.js"></script>
		
		<!-- FlexSlider -->
		<script src="<?php echo $theme_root; ?>/plugins/flexslider/jquery.flexslider-min.js"></script>

        <!--Theme Initializer-->
        <script src="<?php echo $theme_root; ?>/js/theme.plugins.js"></script>
        <script src="<?php echo $theme_root; ?>/js/theme.js"></script>
    </body>
</html>