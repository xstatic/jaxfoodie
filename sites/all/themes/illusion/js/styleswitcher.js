jQuery(function(){

	var styleswitcher = jQuery('#styleswitcher'),
		layoutContainer = jQuery('[class*="_layout"]'),
		sc = jQuery('#select_bg_color'),
		menuType = jQuery('#menu_type'),
		body = jQuery('body'),
		header = jQuery('[role="banner"]'),
		footer = jQuery('[role="contentinfo"]'),
		bgType = jQuery('#bg_type'),
		colorBG = jQuery('#color_bg'),
		imageBG = jQuery('#image_bg'),
		hChange = jQuery('.header_change'),
		fChange = jQuery('.footer_change'),
		reset = jQuery('#reset');

	setTimeout(function(){
		styleswitcher.removeClass('active');
	},1500);

	jQuery('#open_switcher').on('click',function(){
		styleswitcher.toggleClass('active');
	});

	jQuery('.layout_change').on('click','li a',function(e){
		jQuery(this).parent().addClass('active').siblings().removeClass('active');
		if(jQuery(this).text() == "WIDE"){
			layoutContainer.removeClass('boxed_layout').addClass('wide_layout');
		}else if(jQuery(this).text() == "BOXED"){
			layoutContainer.removeClass('wide_layout').addClass('boxed_layout');
		}
		if(jQuery('.iosslider').length) jQuery('.iosslider').trigger('resize');
		e.preventDefault();
	});

	sc.ColorPicker({
		color: '#2c2b44',
		onShow: function (colpkr){
			jQuery(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			jQuery(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb){
			jQuery('body').css('background-image','none');
			sc.add('body').css('backgroundColor', '#' + hex);
		}
	});

	var ifSticky = false;
	menuType.on('click','li',function(){
		var self = jQuery(this);
		if(self.text() == "Sticky menu"){
			body.addClass('sticky_menu');
			if(!ifSticky){
				jQuery.stickyMenu();
				ifSticky = true;
			}
		}else{
			body.removeClass('sticky_menu');
			jQuery.sideMenu();
			jQuery('[role="banner"]').next().css('margin-top',0);
			jQuery('.header_bottom_partm,.sticky_part').removeClass('fixed');
		}
	});

	imageBG.find('button').each(function(){
		jQuery(this).css('background-image','url('+jQuery(this).data('bg')+')');
	});

	imageBG.children('ul').on('click','li button',function(){
		body.css('background-image','url('+jQuery(this).data('bg')+')');
	});


	bgType.on('click','li',function(){
		if(jQuery(this).text() == "Image"){
			colorBG.slideUp(function(){
				imageBG.slideDown();
			});
		}else{
			imageBG.slideUp(function(){
				colorBG.slideDown();
			});
		}
	});

	reset.on('click',function(){
		body.add(sc).css({
			'backgroundImage':'none',
			'background-color':'#2c2b44'
		}).addClass('sticky_menu');
		layoutContainer.removeClass('boxed_layout').addClass('wide_layout');
		menuType.prev('.select_title').text("Sticky menu");
		jQuery('.layout_change').find('li:first').addClass('active').siblings().removeClass('active');
		bgType.prev('.select_title').text("Color");
		imageBG.slideUp(function(){
			colorBG.slideDown();
		});
		if(jQuery('.iosslider').length) jQuery('.iosslider').trigger('resize');
	});

	function headerSelects(){
		jQuery('[role="banner"] .custom_select').each(function(){

      		var title = jQuery(this).find('.select_title'),
      			select = jQuery(this).find('select'),
      			len = select.children('option').length,
      			list = jQuery(this).find('.select_list');

      		// title.text(select.children('option').eq(0).val());

      		for(var i = 0; i < len; i++){
      			list.append('<li class="tr_delay fs_medium color_grey">'+select.children('option').eq(i).val()+'</li>');
      		}

      		title.on('click',function(){
      			jQuery(this).toggleClass('active');
      			list.toggleClass('vertical_animate_finished');
      		});

      		list.on('click','li',function(){
      			var val = jQuery(this).text();
      			select.val(val);
      			title.text(val).removeClass('active');
      			list.removeClass('vertical_animate_finished');
      		});

      	});
	}

	setTimeout(function(){
		hChange.children('li:first').addClass('active');
		fChange.children('li:first').addClass('active');
	},500);
	hChange.on('click','li:not(.active)',function(){
		var t = jQuery(this).text();
		jQuery(this).addClass('active').siblings().removeClass('active');

		header.slideUp(function(){
			var self = jQuery(this).html("");

			switch(t){
				case "Header 1" : 
					window.location = "";
					/*self.load('inc/header_1.html',function(){
						jQuery(this).removeClass('type_2').slideDown(500);
						jQuery.megaMenu();
						jQuery.responsiveMenu();
						jQuery.stickyMenu()
						jQuery('[role="banner"] .custom_select').formSelect();
					});*/
				break;
				case "Header 2" : 
					window.location = "index_agency";
					/*self.load('inc/header_2.html',function(){
						jQuery(this).removeClass('type_2').slideDown(500);
						jQuery.megaMenu();
						jQuery.responsiveMenu();
						jQuery.stickyMenu()
						jQuery('[role="banner"] .custom_select').formSelect();
					});*/
				break;
				case "Header 3" : 
					window.location = "index_portfolio";
					/*self.load('inc/header_3.html',function(){
						jQuery(this).addClass('type_2').slideDown(500);
						jQuery.megaMenu();
						jQuery.responsiveMenu();
						jQuery.stickyMenu()
						jQuery('[role="banner"] .custom_select').formSelect();
					});*/
				break;
				case "Header 4" : 
					window.location = "index_landing";
					/*self.load('inc/header_4.html',function(){
						jQuery(this).addClass('type_2').slideDown(500);
						jQuery.megaMenu();
						jQuery.responsiveMenu();
						jQuery.stickyMenu()
						jQuery('[role="banner"] .custom_select').formSelect();
					});*/
				break;
				case "Header 5" : 
					window.location = "index_magazine";
					/*
					self.load('inc/header_5.html',function(){
						jQuery(this).addClass('type_2').slideDown(500);
						jQuery.megaMenu();
						jQuery.responsiveMenu();
						jQuery.stickyMenu()
						jQuery('[role="banner"] .custom_select').formSelect();
					});
					*/
				break;
				case "Header 6" :
					window.location = "shop";
					/*
					self.load('inc/header_6.html',function(){
						jQuery(this).addClass('type_2').slideDown(500);
						jQuery.megaMenu();
						jQuery.responsiveMenu();
						jQuery.stickyMenu()
						jQuery('[role="banner"] .custom_select').formSelect();
					});
					*/
				break;
			}

		});

	});
	fChange.on('click','li:not(.active)',function(){
		var t = jQuery(this).text();

		jQuery(this).addClass('active').siblings().removeClass('active');

		footer.slideUp(function(){
			var self = jQuery(this).html("");
			switch(t){
				case "Footer 1" : 
					window.location = "home#footer";
					/*
					self.load('inc/footer_1.html',function(){
						jQuery(this).removeClass('p_top_0').slideDown(500);
						jQuery('html,body').animate({ scrollTop : jQuery(document).height() });
						var tweets = jQuery('.tweets');
						if(tweets.length){
							var follow = jQuery('.tw_follow'),
							settings = {
						        modpath: 'plugins/twitter/',
						        username : 'fanfbmltemplate',
						        count: tweets.hasClass('no_carousel') ? 2 : 3,
						        loading_text: '<img src="images/loader2.gif" alt="">',
						        template : '<li class="fw_light relative m_bottom_25 w_break"><div class="icon_wrap_size_1 color_blue circle"><i class="icon-twitter fs_small"></i></div><p>{text}</p><p class="fs_medium color_grey"><i>{time}</i></p></li>'
						    }
						    if(tweets.hasClass('single')){
						    	settings = {
						    		modpath: 'plugins/twitter/',
						        	username : 'fanfbmltemplate',
						        	count: 3,
						        	loading_text:'<img src="images/loader2.gif" alt="">',
						        	template : '<li class="m_bottom_25 relative w_break"><p class="fs_large">{text}</p><p class="color_grey"><i>{time}</i></p></li>'		
						    	}
						    }
							tweets.tweet(settings);
							follow.attr('href','https://twitter.com/'+settings.username);
							if(tweets.hasClass('no_carousel')) return;
							var owl = tweets.children('.tweet_list').owlCarousel({
								singleItem : true,
								pagination:false,
								autoHeight:true,
								autoPlay:true,
								beforeInit: function(){
									tweets.find('.tweet_odd').remove();
									tweets.find('.tweet_text').find('a').addClass('tr_all color_black_hover');
								}
							});

							jQuery('.twc_prev').on('click',function(){
								owl.trigger('owl.prev');
							});
							jQuery('.twc_next').on('click',function(){
								owl.trigger('owl.next');
							});
						}
					});
					*/
				break;
				case "Footer 2" : 
					window.location = "index_agency";
					/*
					self.load('inc/footer_2.html',function(){
						jQuery(this).removeClass('p_top_0').slideDown(500);
						jQuery('html,body').animate({ scrollTop : jQuery(document).height() });
						var flickr = jQuery('.flickr_list');
						if(flickr.length){
						
							flickr.jflickrfeed({
								limit: flickr.hasClass('nine_items') ? 9 : 6,
								qstrings: {
									id: '76745153@N04'
								},
								itemTemplate: '<li class="f_left r_corners wrapper tr_all"><a data-group="flickr" data-title="{{title}}" href="{{image}}" class="jackbox d_block"><img alt="" src="{{image_s}}"/></a></li>'
							},function(data){
								flickr.find('.jackbox[data-group]').jackBox("newItem", {
							        group: "flickr"
							    });
							});
						}
					});
					*/
				break;
				case "Footer 3" : 
					window.location = "index_portfolio";
					/*
					self.load('inc/footer_3.html',function(){
						jQuery(this).removeClass('p_top_0').slideDown(500);
						jQuery('html,body').animate({ scrollTop : jQuery(document).height() });
						var flickr = jQuery('.flickr_list');
						if(flickr.length){
						
							flickr.jflickrfeed({
								limit: flickr.hasClass('nine_items') ? 9 : 6,
								qstrings: {
									id: '76745153@N04'
								},
								itemTemplate: '<li class="f_left r_corners wrapper tr_all"><a data-group="flickr" data-title="{{title}}" href="{{image}}" class="jackbox d_block"><img alt="" src="{{image_s}}"/></a></li>'
							},function(data){
								flickr.find('.jackbox[data-group]').jackBox("newItem", {
							        group: "flickr"
							    });
							});
						}
						var tweets = jQuery('.tweets');
						if(tweets.length){
							var follow = jQuery('.tw_follow'),
							settings = {
						        modpath: 'plugins/twitter/',
						        username : 'fanfbmltemplate',
						        count: tweets.hasClass('no_carousel') ? 2 : 3,
						        loading_text: '<img src="images/loader2.gif" alt="">',
						        template : '<li class="fw_light relative m_bottom_25 w_break"><div class="icon_wrap_size_1 color_blue circle"><i class="icon-twitter fs_small"></i></div><p>{text}</p><p class="fs_medium color_grey"><i>{time}</i></p></li>'
						    }
						    if(tweets.hasClass('single')){
						    	settings = {
						    		modpath: 'plugins/twitter/',
						        	username : 'fanfbmltemplate',
						        	count: 3,
						        	loading_text: 'loading twitter feed...',
						        	template : '<li class="m_bottom_25 relative w_break"><p class="fs_large">{text}</p><p class="color_grey"><i>{time}</i></p></li>'		
						    	}
						    }
							tweets.tweet(settings);
							follow.attr('href','https://twitter.com/'+settings.username);
							if(tweets.hasClass('no_carousel')) return;
							var owl = tweets.children('.tweet_list').owlCarousel({
								singleItem : true,
								pagination:false,
								autoHeight:true,
								autoPlay:true,
								beforeInit: function(){
									tweets.find('.tweet_odd').remove();
									tweets.find('.tweet_text').find('a').addClass('tr_all color_black_hover');
								}
							});

							jQuery('.twc_prev').on('click',function(){
								owl.trigger('owl.prev');
							});
							jQuery('.twc_next').on('click',function(){
								owl.trigger('owl.next');
							});
						}
					});
					*/
				break;
				case "Footer 4" : 
					window.location = "index_landing";
					/*
					self.load('inc/footer_4.html',function(){
						jQuery(this).addClass('p_top_0').slideDown(500);
						jQuery('html,body').animate({ scrollTop : jQuery(document).height() });
					});
					*/
				break;
				case "Footer 5" : 
					window.location = "index_magazine";
					/*
					self.load('inc/footer_5.html',function(){
						jQuery(this).removeClass('p_top_0').slideDown(500);
						jQuery('html,body').animate({ scrollTop : jQuery(document).height() });
						var tweets = jQuery('.tweets');
						if(tweets.length){
							var follow = jQuery('.tw_follow'),
							settings = {
						        modpath: 'plugins/twitter/',
						        username : 'fanfbmltemplate',
						        count: tweets.hasClass('no_carousel') ? 2 : 3,
						        loading_text: 'loading twitter feed...',
						        template : '<li class="fw_light relative m_bottom_25 w_break"><div class="icon_wrap_size_1 color_blue circle"><i class="icon-twitter fs_small"></i></div><p>{text}</p><p class="fs_medium color_grey"><i>{time}</i></p></li>'
						    }
						    if(tweets.hasClass('single')){
						    	settings = {
						    		modpath: 'plugins/twitter/',
						        	username : 'fanfbmltemplate',
						        	count: 3,
						        	loading_text: 'loading twitter feed...',
						        	template : '<li class="m_bottom_25 relative w_break"><p class="fs_large">{text}</p><p class="color_grey"><i>{time}</i></p></li>'		
						    	}
						    }
							tweets.tweet(settings);
							follow.attr('href','https://twitter.com/'+settings.username);
							if(tweets.hasClass('no_carousel')) return;
							var owl = tweets.children('.tweet_list').owlCarousel({
								singleItem : true,
								pagination:false,
								autoHeight:true,
								autoPlay:true,
								beforeInit: function(){
									tweets.find('.tweet_odd').remove();
									tweets.find('.tweet_text').find('a').addClass('tr_all color_black_hover');
								}
							});

							jQuery('.twc_prev').on('click',function(){
								owl.trigger('owl.prev');
							});
							jQuery('.twc_next').on('click',function(){
								owl.trigger('owl.next');
							});
						}
					});
					*/
				break;
				case "Footer 6" : 
					window.location = "shop";
					/*
					self.load('inc/footer_6.html',function(){
						jQuery(this).removeClass('p_top_0').slideDown(500);
						jQuery('html,body').animate({ scrollTop : jQuery(document).height() });
					});
					*/
				break;
			}
		});

	});


});

jQuery(window).on('load',function(){

	if(window.location.hash.indexOf('#footer') !== -1){

		jQuery('html,body').animate({ scrollTop : jQuery(document).height() },1000);

	}
	
});