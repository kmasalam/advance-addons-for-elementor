// const constContent = `<div class='featured-content position-absolute'>Featured</div>`
// function myFunction(a,b,c,d) {
//  var x = document.getElementsByClassName(`jQuery{a,b,c}`);
//  x[0].innerHTML += d
// }
// myFunction('advanced_addons_pricing_tbl','type-1',' featured',constContent)




// alert(window.innerHeight)
(function($) {
    'use strict';
    
    jQuery.fn.hasAttr = function(name) {  
       return this.attr(name) !== undefined && this.attr(name) !== '';
    };

    function responsiveOptions(slidesToShow){
        return [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: slidesToShow ? slidesToShow[0] : slidesToShow[0],
              }
            },
            {
              breakpoint: 800,
              settings: {
                slidesToShow: slidesToShow ? slidesToShow[1] : slidesToShow[1],
              }
            },
            {
              breakpoint: 700,
              settings: {
                slidesToShow: slidesToShow ? slidesToShow[1] : slidesToShow[1],
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: slidesToShow ? slidesToShow[1] : slidesToShow[1],
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: slidesToShow ? slidesToShow[2] : slidesToShow[2],
              }
            }
      ]
    }



    jQuery('.advanced_addons_slider').each(function(index, el) {
        let nextArrow,prevArrow,dotsClass,dots,arrows,slidesToShow;
        if(jQuery(this).hasAttr('nextArrow')){
            nextArrow = jQuery(this).attr('nextArrow');
        }
        if(jQuery(this).hasAttr('prevArrow')){
            prevArrow = jQuery(this).attr('prevArrow');
        }
        if(jQuery(this).hasAttr('dotsClass')){
            dotsClass = jQuery(this).attr('dotsClass');
        }
        if(jQuery(this).hasAttr('dots')){
            dots = jQuery(this).attr('dots');
        }
        if(jQuery(this).hasAttr('arrows')){
            arrows = jQuery(this).attr('arrows');
        }
        if(jQuery(this).hasAttr('slidesToShow')){
            slidesToShow = jQuery(this).attr('slidesToShow');
            slidesToShow = slidesToShow.split(' ')
        }
        
        jQuery(this).slick({
            slidesToShow: slidesToShow ? slidesToShow[0] : 1,
            slidesToScroll: 1,
            dots: dots ? true : false,
            arrows: arrows ? true : false,
            nextArrow: arrows ? '<button type="button" class="slick-next">' + nextArrow + '</button>' : null,
            prevArrow: arrows ? '<button type="button" class="slick-prev">' + prevArrow + '</button>' : null,
            dotsClass: dots ? dotsClass : null,
            autoplay: false,
            autoplaySpeed: 3000,
            responsive: slidesToShow ? responsiveOptions(slidesToShow) : null
        })
    });


    // Counter Function 


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
    // Progressbar
    jQuery('.advanced_block_progressbar_block').each(function() {
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

    //Set background image for WordPress
    jQuery(".set-bg").each(function() {
        var thesrc = jQuery(this).attr('data-bg');
        jQuery(this).css("background-image", "url(" + thesrc + ")");
        jQuery(this).css("background-position", "center");
        jQuery(this).css("background-size", "cover");
        jQuery(this).css("background-repeat", "no-repeat");
        jQuery(this).removeAttr('data-bg');

    });
    //Advanced Blocks Tab Item
   jQuery(document).on('ready',function($) {
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
    });

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

    jQuery(window).load(function() {
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
    });


    // Convert All Image to SVG
        jQuery('img.svg').each(function() {
            var jQueryimg = jQuery(this),
                imgID = jQueryimg.attr('id'),
                imgClass = jQueryimg.attr('class'),
                imgURL = jQueryimg.attr('src');

            jQuery.get(imgURL, function(data) {
                var jQuerysvg = jQuery(data).find('svg');
                if (typeof imgID !== 'undefined') {
                    jQuerysvg = jQuerysvg.attr('id', imgID);
                }
                if (typeof imgClass !== 'undefined') {
                    jQuerysvg = jQuerysvg.attr('class', imgClass);
                }
                jQuerysvg = jQuerysvg.removeAttr('xmlns:a');
                jQueryimg.replaceWith(jQuerysvg);
            }, 'xml');

        });

        // Radius Circle
    //     (function (jQuery){

    //     jQuery.fn.bekeyProgressbar = function(options){
    //         options = jQuery.extend({
    //          animate     : true,
    //           animateText : true
    //         }, options);

            
          
    //     };

    // })(jQuery);

    jQuery(document).ready(function(){
      
      
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
    })

    //

    jQuery('body').on('DOMSubtreeModified',function(){
        jQuery("div[data-color]").each(function(index, el) {
        let atvalue =  jQuery(this).attr('data-color');
        jQuery(this).css({
            'background' : '#' + atvalue
        });
    });
    })

})(jQuery);
