function isMobile() {
    if (window.innerWidth < 1025) {
        return true;
    }
    return false;
};
var windowHeight = jQuery(window).height();
var Rubb = Rubb || {};
Rubb = {
    Global: {
        init: function($) {
            this.showSupportTab($);
        },
        showSupportTab: function(element){
            var windowScroll = jQuery(window).scrollTop();
            if( jQuery(element).length  > 0 ) {
                if (!isMobile()) {
                    var link = jQuery('.et_pb_section_first');
                     if( jQuery(link).length  > 0 ) {
                         var offset1 = link.offset();                   
                    var top = offset1.top;
                    var bottom = top + link.outerHeight();
                     }
                   
                        if(windowScroll >= bottom){
                             jQuery(element).addClass('visible')
                        }else {
                             jQuery(element).removeClass('visible')
                        }
                }
            }
        },
        reduceBannerBottom: function(){
            var originalHeight = jQuery(".banner-reduce-spacing").outerHeight();;
            if(window.innerWidth < 767){
                jQuery(".banner-reduce-spacing").outerHeight(originalHeight - 40); 
            }
        }
    },
    HomePage: {
        init: function($) {
           /* if (!isMobile()) {
                this.fullPage($);
            }*/
            this.toggleText($);
            this.clockZones($);
            this.removeTabIndex();
            this.focusFormMessage();
        },
        fullPage: function($) {
            var obj = this;
            $('#fullpage').fullpage({
                navigation: true,
                navigationPosition: 'right',
                sectionSelector: '.box',
                afterLoad: function(index, nextIndex, direction) {
                    if ($(this).has('.et_pb_number_counter').length > 0) {
                        obj.counter($);
                    }
                },
                afterResize: function() {
                    if (isMobile()) {
                        $.fn.fullpage.destroy("all");
                    }
                }
            });
            $('.next-section').click(function() {
                $.fn.fullpage.moveSectionDown();
            });
        },
        counter: function($) {
            $('.box .et_pb_number_counter').each(function() {
                var counterContainer = $(this).find('.percent p');
                var counterText = counterContainer.find('.percent-value');
                var numberMax = parseInt($(this).attr("data-number-value"));
                var step = 0;
                if (!counterText.text()) {
                    var counter = setTimeout(function() {
                        counterContainer.css('visibility', 'visible');
                        var counter = setInterval(function() {
                            if (step <= numberMax) {
                                counterText.text(step);
                                step++;
                            } else {
                                clearInterval(counter);
                            }
                        }, 50);
                    }, 50);
                }
            });
        },
        clockZones: function($) {
            var clockContainer = $('<div/>', { class: 'location-time' });
            var locationContaier = $('<h4/>').appendTo(clockContainer);
            var locationTime = $('<label/>').appendTo(clockContainer);
            clockContainer.appendTo('.timezone .clock');
            var city = ['Dallas', 'London', 'Dubai'];
            $('.timezone .clock .location-time').each(function(index) {
                $(this).find('h4').text(city[index]);
            });
            setInterval(function() {
                $('.timezone .clock').remove('.location-time');
                var now = moment();
                var locates = [
                    now.tz('America/Chicago').format('hh:mm a'),
                    now.tz('Europe/London').format('hh:mm a'),
                    now.tz('Asia/Dubai').format('hh:mm a')
                ];
                $('.timezone .clock .location-time').each(function(index) {
                    $(this).find('label').text(locates[index]);
                });
            }, 1000);
        },
        toggleText: function($){
            $('.cpanel-blue').hover(function(){
                 //console.log(targetElement);
                 $(this).parents('.grayscale-boxs').find('.inner-grayscale').removeClass('active');
                $(this).parent().addClass('active');
                var targetElement= $(this).attr('data-target'); 
                //console.log(targetElement);
                $('.hidden-box').removeClass('active').hide();  
                $('#'+ targetElement).stop().fadeIn(600).addClass('active');
            },
            function(){
               // $(this).parent().addClass('active');
                /*var targetElement= $(this).attr('data-target'); 
                 $('.text-information').hide();  
                $('#'+ targetElement).slideDown();  */  
            });
        },
        removeTabIndex: function(){
            var countForm = jQuery(".homepage-contact-form").length;
            if(countForm > 1){
                jQuery(".homepage-contact-form input").removeAttr("tabindex");
            }
        },
        focusFormMessage: function(){
            if(jQuery(".gform_confirmation_wrapper").length > 0){
                var focusPosition = jQuery(".gform_confirmation_wrapper").offset().top - 200;
                jQuery("html, body").animate({
                    scrollTop: focusPosition
                }, 2000);
            }
            if(jQuery(".gform_wrapper").hasClass("gform_validation_error")){
                var focusPosition = jQuery(".gform_validation_error").offset().top - 200;
               jQuery("html, body").animate({
                    scrollTop: focusPosition
                }, 2000);
            }
        }
    },
    ContactCenter: {
        init: function($) {
            this.togglePopup($);
            //this.togglePopup($);
        },
        togglePopup: function($) {
        	$('.popup-toggle').parent().parent().find(".popup-content").removeClass("popup-show");
            $('.popup-toggle').text("+")
            $('.popup-toggle').on('click', function() {
                $(this).parent().parent().find(".popup-content").slideToggle();  
                if ($(this).text() === "+") {
                    $(this).text("-")
                } else {
                    $(this).text("+")
                }
            });
        },
        detectCenterElement: function(element) {
        	
        	var windowScroll = jQuery(window).scrollTop();
        	if( jQuery(element).length  > 0 ) {
        		if (!isMobile()) {
        			jQuery(element).each(function(index){ 
        				var controlButton = jQuery(this).find(".popup-toggle");
        				var popupContent = jQuery(this).find(".popup-content");
        				var btnOffsetTop = controlButton.offset().top; 
        				if(jQuery(this).hasClass("popup-top")){
        					var showRatio = 0.1;
        					var showPoint = windowScroll + windowScroll*showRatio;
        					
        					if(showPoint >= btnOffsetTop){
        						controlButton.text("-");
        						popupContent.slideDown();
        					}
        				}
        				else if(jQuery(this).hasClass("popup-bottom")){
        					var showRatio = 0.2;
        					var showPoint = windowScroll + windowScroll*showRatio;
        					if(showPoint >= btnOffsetTop){
        						controlButton.text("-");
        						popupContent.slideDown();
        					}
        				}
        				else{
        					var showRatio = 0.4;
        					var showPoint = windowScroll + windowScroll*showRatio;
        					if(showPoint >= btnOffsetTop){
        						controlButton.text("-");
        						popupContent.slideDown();
        					}
        				}
        				/*      				
	                	var offset = jQuery(this).offset(); 
						var height = jQuery(this).height();
						var centerY = 3*(offset.top + height / 4)/4;
						var scroll = jQuery(window).scrollTop();
							//console.log(height);
							//console.log(offset.top);
							console.log(scroll+" "+centerY);
						var popupContent=jQuery(this).find(".popup-content");
						var popupButton=jQuery(this).find(".popup-toggle");
						if(scroll > centerY) {
							popupContent.addClass('popup-show');
							popupButton.text("-");
						}
						*/
						
					
        			})
            	}
        	}
        }
    },
    hardware:{
         init: function($) {
            this.toggleText($);
        },
        toggleText: function($){
            $('.toogle-text').hover(function(){
                 //console.log(targetElement);
                var targetElement= $(this).attr('data-target'); 
                //console.log(targetElement);
                $('.text-information').removeClass('active').hide();  
                $('#text-detail #'+ targetElement).stop().fadeIn(600);
            },
            function(){
                /*var targetElement= $(this).attr('data-target'); 
                 $('.text-information').hide();  
                $('#'+ targetElement).slideDown();  */  
            });
        }
        
    },
    executiveTeam: {
        init: function($) {
            this.moveProfileSocial($);
            this.moveToDetail($);
        },
        moveToDetail: function($) {
        		$('#excutive-team-row .person').on('click', function() {
	                var targetDiv = $(this).attr('id');
	                $('html, body').animate({
	                  scrollTop: $(targetDiv).offset().top
	                }, 1000);
	            })
           
        },
        moveProfileSocial: function($) {
            $('.et_pb_team_member_description').each(function() {
                var socialBlock = $(this).find('.et_pb_member_social_links');
                var positionBlock = $(this).find('.et_pb_member_position');
                socialBlock.insertAfter(positionBlock);;
            })
        }
    }
}
jQuery(document).ready(function($) {
    Rubb.HomePage.init($);
    Rubb.ContactCenter.init($);
    Rubb.executiveTeam.init($);
    Rubb.hardware.init($);
});
jQuery(window).load(function($){
    Rubb.Global.reduceBannerBottom();
});
jQuery(window).scroll(function($) {
   Rubb.ContactCenter.detectCenterElement('.contact-has-popup');
   Rubb.Global.init('.support-bubble');
});