( function( $, elementor ) {

    'use strict';
    var AdvancedAddons = {
        init: function(){
            var widgets = {
                'ad-tabs.default'   : AdvancedAddons.widgetTabs,
                'ad-funfactors.default'   : AdvancedAddons.widgetFunFactors,
                'ad-progressbar.default'   : AdvancedAddons.widgetProgressbar,
                'ad-steps.default'   : AdvancedAddons.widgetSteps,
                'ad-imageCompare.default'   : AdvancedAddons.widgetImageCompare,
                'ad-radius-progressbar'   : AdvancedAddons.widgetRadiusProgressbar,
                'ad-countdown'   : AdvancedAddons.widgetCountDown,

            };
            $.each( widgets, function( widget, callback ) {
                elementorFrontend.hooks.addAction( 'frontend/element_ready/' + widget, callback );
            });

            elementorFrontend.hooks.addAction('frontend/element_ready/section', AdvancedAddons.elementorSection );
        },

        // Advanced Tabs
        widgetTabs: function( $scope ) {
           jQuery(".advanced_addons_tab_content .block-content:not('.active')").hide()
            jQuery(document).on('click','.advanced_addons_tab_item  .tab-link',function(e){
                let __this ,result,shower;
                __this= jQuery(this);
                e.preventDefault()
                __this.addClass('active')
                __this.siblings().removeClass('active')
                result = jQuery(this).attr('href')
                result = result.replace('#', '')
                console.log(result)
                jQuery(".advanced_addons_tab_content").find(`[id='jQuery{result}']`).show();
                console.log(jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']'))
                //shower = jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']').show();
                shower = jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']').show();
                //shower = jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']').addClass('active');
                shower = jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']').addClass('active');
                shower.siblings().hide();
                shower.siblings().removeClass('active');
            });
        },
        widgetFunFactors: function( $scope ) {
            jQuery('.advanced_addons_funfactors').each(function() {
                const __this = jQuery(this);
                    let countVal;
                    countVal = __this.html()
                     countVal = parseInt(countVal)
                    console.log(countVal)
                    function counterFunction(){
                        __this.prop('Counter', 0).animate({
                            Counter: countVal
                        }, {
                            duration: 2150,
                            step: function (now, fx) {
                                var data = Math.round(now);
                                __this.html(data);
                            }
                        })

                    }
             
                    var self = __this;
                    __this.waypoint({
                        offset: '85%',
                        handler: function() {
                             counterFunction()
                        }
                    });
                })
        },
        //Progressbar
        widgetProgressbar: function( $scope){
           jQuery('.advanced_addons_progressbar_block').each(function() {
                const __this = jQuery(this)
                    let progressBar,proDur;
                    progressBar = __this.attr('data-progress-parcent');
                    proDur = 2000;

                    function progressbarFunction(){
                        __this.find('.progress').animate({
                                width: progressBar
                            }, proDur);

                            __this.find('.parcent').animate({
                                left: progressBar
                            }, {
                                duration: proDur,
                                step: function (now, fx) {
                                    var data = Math.round(now);
                                    __this.find('.parcent').html(data + '%');
                                }
                            });

                    }
             
                    var self = __this;
                    __this.waypoint({
                        offset: '100%',
                        handler: function() {
                             progressbarFunction()
                             this.destroy()
                        }
                    });
                })
        },
        widgetSteps: function($scope){
            jQuery('.blocks-step').each(function () {
                var pdiv = jQuery(this);
                var UID = {
                    _current: 0,
                    getNew: function () {
                        this._current++;
                        return this._current;
                    }
                };

                var time = 4;
                var steps = 9;
                var active = 0;
                var para = pdiv.find('.step-inner');
                var tabData = jQuery(this).find('.steps-data');
                var length = tabData.length;

                var circles = jQuery(this).find('.circle');
                let prev = jQuery(this).find('.prev');
                let next = jQuery(this).find('.next');

                prev.on('click',function(){
                    let Lprev = pdiv.find('.circle.active').index() - 1
                    clicked(Lprev)
                })
               
                next.on('click',function(){
                    let Lnext = pdiv.find('.circle.active').index() + 1
                    console.log(Lnext)
                    clicked(Lnext)
                })

                function plusSlides(n) {
                      clicked(active += n);
                      
                    }
                for (var i = 0; i < length; i++) {
                    circles[i].addEventListener('click', function () {
                        clicked(parseInt(this.dataset.index));
                    })
                }
                setView();

                function setView() {
                    var i;
                    var width = 11.5 * active + 1


                    for (var i = 0; i <= active; i++) {
                        circles[i].classList.add('done');
                    }

                    circles[i - 1].classList.add('active');

                    for (var j = i; j < length; j++) {
                        circles[j].classList.remove('done');
                    }

                }

                function clicked(index) {
                    if (index >=0 && index < length) {
                        circles[active].classList.remove('active');
                        tabData[active].classList.remove('active_tab');
                        active = index;
                        tabData[active].classList.add('active_tab');
                        setView();
                    }
                }
            });
        },
        //Image Compare
        widgetImageCompare: function($scope){
            jQuery('.cross2').each(function(index, el) {
                __this = jQuery(this);
                let checkVertical ;
                if(jQuery(this).hasAttr('data-alignment')){
                  checkVertical = jQuery(this).attr('data-alignment');
                }
                console.log(checkVertical);
                jQuery(this).cross2({
                clickEnabled: true,
                vertical: checkVertical ? true : false,
                  // easing: 'easeInBack',
                  animationDuration: 500,
                  mousewheelEnabled: false
                });
              });
        },
        widgetRadiusProgressbar: function($scope){
            jQuery('.advanced_radius_progressbar').each(function(index, el) {
                var jQuerythis = jQuery(this);
              
                var jQueryprogressBar = jQuerythis;
                var jQueryprogressCount = jQueryprogressBar.find('.progress_bar_parcentage');
                var jQuerycircle = jQueryprogressBar.find('.ProgressBar-circle');
                var percentageProgress = jQueryprogressBar.attr('data-progress');
                var percentageRemaining = (100 - percentageProgress);
                var percentageText = jQuerythis.attr('data-progress');
              
                //Calcule la circonférence du cercle
                var radius = jQuerycircle.attr('r');
                var diameter = radius * 2;
                var circumference = Math.round(Math.PI * diameter);

                //Calcule le pourcentage d'avancement
                var percentage =  circumference * percentageRemaining / 100;
              console.log('stroke',circumference,'sdsd',percentage)

                jQuerycircle.css({
                  'stroke-dasharray' : circumference,
                  'stroke-dashoffset' : percentage
                })
                
              
                jQuerycircle.css({
                    'stroke-dashoffset' : circumference
                  }).animate({
                    'stroke-dashoffset' : percentage
                  }, 3000 )
                
                //Animation du texte (pourcentage)
                 jQuery({ Counter: 0 }).animate(
                    { Counter: percentageText },
                    { duration: 3000,
                     step: function () {
                       jQueryprogressCount.text( Math.ceil(this.Counter) + '%');
                     }
                    });
            });
        },
        widgetCountDown: function($scope){
            // Kounty Plugin
                jQuery(document).ready(function(){!function(n){n(".kounty-countdown").each(function(){var t=n(this),e=t.attr("data-timer-date"),o=new Date(e).getTime(),d=t.attr("data-countdown-message"),a=n(this).attr("data-countdown-seperator"),s=setInterval(function(){var n=(new Date).getTime(),e=o-n,c=Math.floor(e/864e5),l=Math.floor(e%864e5/36e5),h=Math.floor(e%36e5/6e4),u=Math.floor(e%6e4/1e3);"dots"==a&&(t.addClass("countdown-dots"),t.children(".countdown-days").html(c),t.children(".countdown-hours").html(l),t.children(".countdown-minutes").html(h),t.children(".countdown-seconds").html(u)),"label"==a?(t.addClass("countdown-label"),t.children(".countdown-days").html(c).append("<span> days </span>"),t.children(".countdown-hours").html(l).append("<span> hours </span>"),t.children(".countdown-minutes").html(h).append("<span> minutes </span>"),t.children(".countdown-seconds").html(u).append("<span> seconds </span>")):(t.children(".countdown-days").html(c).append("<span> days </span>"),t.children(".countdown-hours").html(l).append("<span> hours </span>"),t.children(".countdown-minutes").html(h).append("<span> minutes </span>"),t.children(".countdown-seconds").html(u).append("<span> seconds </span>")),e<0?(clearInterval(s),t.html(d),t.addClass("countdown-finished")):t.removeClass("countdown-finished")},1e3)})}(jQuery)});
        }
        

    };
    $( window ).on( 'elementor/frontend/init', AdvancedAddons.init );

    


}( jQuery, window.elementorFrontend ) );

(function ($) {
   $(window).on("elementor/frontend/init", function () {
      elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {
        // Set Background Image
        var isFirst = true;
        if ( $scope.find( '.set-bg') && isFirst == true ){
            //$scope.find( 'a' ).lightbox();
                 $scope.find(".set-bg").each(function() {
                    var thesrc = jQuery(this).attr('data-bg');
                    jQuery(this).addClass('test');
                    jQuery(this).css("background-image", "url(" + thesrc + ")");
                    jQuery(this).css("background-position", "center");
                    jQuery(this).css("background-size", "cover");
                    jQuery(this).css("background-repeat", "no-repeat");
                    jQuery(this).removeAttr('data-bg');

                });
                 console.log('testt')
                 isFirst = false
            }
        
    } );
   })
})(jQuery);