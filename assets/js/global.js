;
(function ($) {
    function isInViewport(el) {
        if (el[0]) {
            let rect = $(el)[0].getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }
        return false;
    }

    /* ------------------------------------
       Block: OMG FUNC
    ------------------------------------- */

    function showHideBlock(id) {
        cabinetBlockFixed.each(function (ind, elem) {
            $(elem).css('opacity', '0');
            if ($(elem).hasClass(`ca-content-item__${id}`)) {
                $(elem).css('opacity', '1');
            }
        })
    }

    /* ------------------------------------
       Block: End OMG FUNC
    ------------------------------------- */


    var imageWrapper;
    var ageWrapper;
    var fixedBlock;
    var stopFixedBlock;
    var stopFixedBlockTop;


    var cabinetBlockFixed;
    var cabinetBlockStartFixed;
    var cabinetBlockStopFixed;

    var cabinetBlockStopFixed2;
    var cabinetBlockStopFixed3;
    var imageStopBlock;


    function handleFirstTab(e) {
        var key = e.key || e.keyCode;
        if (key === 'Tab' || key === '9') {
            $('body').removeClass('no-outline');

            window.removeEventListener('keydown', handleFirstTab);
            window.addEventListener('mousedown', handleMouseDownOnce);
        }
    }

    function handleMouseDownOnce() {
        $('body').addClass('no-outline');

        window.removeEventListener('mousedown', handleMouseDownOnce);
        window.addEventListener('keydown', handleFirstTab);
    }

    window.addEventListener('keydown', handleFirstTab);

    // Fit slide video background to video holder
    function resizeVideo() {
        var $holder = $('.videoHolder');
        $holder.each(function () {
            var $that = $(this);
            var ratio = $that.data('ratio') ? $that.data('ratio') : '16:9',
                width = parseFloat(ratio.split(':')[0]),
                height = parseFloat(ratio.split(':')[1]);
            $that.find('.video').each(function () {
                if ($that.width() / width > $that.height() / height) {
                    $(this).css({'width': '100%', 'height': 'auto'});
                } else {
                    $(this).css({'width': $that.height() * width / height, 'height': '100%'});
                }
            });
        });
    }

    // Scripts which runs after DOM load
    var scrollOut;
    $(document).on('ready', function () {

        /* ------------------------------------
           Block: Add small H2
        ------------------------------------- */

        var pattern1 = /\b(ct)/gi; // words you want to wrap
        var replaceWith1 = '<span class="ge-word">t</span>'; // Here's the wap
        $('h2').each(function () {
            $(this).html($(this).html().replace(pattern1, replaceWith1));
        });

        /* ------------------------------------
           Block: End
        ------------------------------------- */


        /* ------------------------------------
           Block: Begin WOW
        ------------------------------------- */

        wow = new WOW(
            {
                boxClass: 'wow',      // default
                animateClass: 'animated', // default
                offset: 0,          // default
                mobile: true,       // default
                live: true        // default
            }
        )
        wow.init();

        /* ------------------------------------
           Block: End Begin WOW
        ------------------------------------- */
        /* ------------------------------------
           Block: Begin Instagram Slider
        ------------------------------------- */

        $('#slider-insta').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
        });

        /* ------------------------------------
           Block: End Begin Instagram Slider
        ------------------------------------- */


        /* ------------------------------------
           Block: Scroll To Section
        ------------------------------------- */

        $('a[aria-current="page"]').on('click', function (e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 2000, 'swing', function () {
                window.location.hash = target;
            });
        });

        /* ------------------------------------
           Block: End Scroll To Section
        ------------------------------------- */

        $('.scroll-section').on('click', function (e) {

            // Define variable of the clicked »a« element (»this«) and get its href value.
            var href = $(this).attr('href');

            // Run a scroll animation to the position of the element which has the same id like the href value.
            $('html, body').animate({
                scrollTop: $(href).offset().top
            }, '2000');

            // Prevent the browser from showing the attribute name of the clicked link in the address bar
            e.preventDefault();

        });

        /* ------------------------------------
           Block: GSAP Animation
        ------------------------------------- */

        const galleryRows = document.querySelectorAll('.row');


        galleryRows.forEach((el, index) => {

            let direction;

            if (index === 0) {
                direction = '150%';
            } else if (index === 1) {
                direction = '-90%';
            }else if (index === 2) {
                direction = '90%';
            }else if (index === 3) {
                direction = '-90%';
            }else if (index === 4) {
                direction = '90%';
            }else if (index === 5) {
                direction = '-150%';
            }

            gsap.to(el, {
                x: direction,
                scrollTrigger: {
                    trigger: el,
                    // start: '30% bottom',
                    // end: () => '200px 50%',
                    scrub: 1,
                    markers: false,
                    invalidateOnRefresh: true,
                    anticipatePin: 1,
                    pin: false
                }
            })
        });

        const sectionGallery = document.querySelector('.section-gallery');




        /* ------------------------------------
           Block: End GSAP Animation
        ------------------------------------- */

        /* ------------------------------------
           Block: Button Mute
        ------------------------------------- */
        var iframe = document.getElementsByTagName('iframe')[0];
        $('.btn-mute').on('click', function () {

            if ($(this).hasClass('mute')) {
                $(this).removeClass('mute');
                iframe.contentWindow.postMessage('{"method":"setVolume", "value":1}', '*');
            } else {
                $(this).addClass('mute');
                iframe.contentWindow.postMessage('{"method":"setVolume", "value":0}', '*');
            }

        });


        // fallback: show controls if autoplay fails
// (needed for Samsung Internet for Android, as of v6.4)
//         let video = document.querySelector('video');
//         const btn_mute = document.querySelector('.btn-mute');
//         const btn_play = document.querySelector('.btn-play');
//
//         /*window.addEventListener('load', async () => {
//           try {
//             await video.play(); test();
//           } catch (err) {
//               btn_play.style.display = 'block';
//             video.controls = true;
//           }
//         });*/
//         var once = true;
//
//         if (video) {
//             video.onplaying = function () {
//                 if (once == false) return;
//                 if (video.paused) btn_play.style.display = 'block';
//                 once = false;
//             };
//         }
//
//         const status = () => {
//             if (video.muted) {
//                 btn_mute.classList.add('active');
//             } else {
//                 btn_mute.classList.remove('active');
//             }
//             if (video.paused) {
//                 btn_play.classList.remove('active');
//             } else {
//                 btn_play.classList.add('active');
//             }
//         }
//
//         if (btn_mute) {
//             btn_mute.onclick = () => {
//                 video.muted = !video.muted;
//                 status();
//             }
//         }
//
//
//         if (btn_play) {
//             btn_play.onclick = () => {
//                 video.paused ? video.play() : video.pause();
//                 status();
//             }
//         }
//
//         if (video && btn_play && btn_play) {
//             status();
//         }


        /* ------------------------------------
           Block: End Button Mute
        ------------------------------------- */


        // Get Animation Element
        imageWrapper = $('#wrapper-images');
        if (imageWrapper && isInViewport(imageWrapper)) {
            imageWrapper.addClass('start-animation')
        }


        ageWrapper = $('#animation-age');
        fixedBlock = $('.ca-age .ca-content');
        stopFixedBlock = $('#stop-fixed');
        stopFixedBlockTop = $('#stop-fixed2');


        /* ------------------------------------
           Block: OMG
        ------------------------------------- */

        cabinetBlockFixed = $('.ca-content-item');
        imageStopBlock = $('.image-bottom-block');
        cabinetBlockStartFixed = $('#top-animation-technologies');
        cabinetBlockStopFixed = $('#bottom-animation-technologies');
        cabinetBlockStopFixed2 = $('#bottom-animation-technologies-2');
        cabinetBlockStopFixed3 = $('#top-animation-technologies-3');

        if (cabinetBlockStartFixed && isInViewport(cabinetBlockStartFixed)) {
            cabinetBlockFixed.addClass('start-fixed');
        }

        if (cabinetBlockStopFixed && isInViewport(cabinetBlockStopFixed)) {
            cabinetBlockFixed.removeClass('start-fixed');
        }

        if (cabinetBlockStopFixed2 && isInViewport(cabinetBlockStopFixed2)) {
            cabinetBlockFixed.removeClass('start-fixed');
        }

        if (cabinetBlockStopFixed3 && isInViewport(cabinetBlockStopFixed3)) {
            cabinetBlockFixed.addClass('start-fixed');
        }

        $('.image-bottom-block').each(function (ind, elem) {

            if ($(elem) && isInViewport($(elem))) {

                var dataId = $(elem).attr('data-id')

                showHideBlock(dataId);
            }

        })


        /* ------------------------------------
           Block: End OMG
        ------------------------------------- */


        if (ageWrapper && isInViewport(ageWrapper)) {
            // ageWrapper.addClass('animation-age');
            fixedBlock.addClass('fixed-block');
            fixedBlock.parent('.ca-age__block-left').removeClass('block-left-active');
        }

        if (stopFixedBlock && isInViewport(stopFixedBlock)) {
            // ageWrapper.addClass('animation-age');
            fixedBlock.removeClass('fixed-block');
            fixedBlock.parent('.ca-age__block-left').addClass('block-left-active');
        }

        if (stopFixedBlockTop && isInViewport(stopFixedBlockTop)) {
            // ageWrapper.addClass('animation-age');
            fixedBlock.removeClass('fixed-block');
        }


        // Init LazyLoad
        var lazyLoadInstance = new LazyLoad({
            elements_selector: 'img[data-lazy-src],.pre-lazyload',
            data_src: "lazy-src",
            data_srcset: "lazy-srcset",
            data_sizes: "lazy-sizes",
            skip_invisible: false,
            class_loading: "lazyloading",
            class_loaded: "lazyloaded",
        });
        // Add tracking on adding any new nodes to body to update lazyload for the new images (AJAX for example)
        window.addEventListener('LazyLoad::Initialized', function (e) {
            // Get the instance and puts it in the lazyLoadInstance variable
            if (window.MutationObserver) {
                var observer = new MutationObserver(function (mutations) {
                    mutations.forEach(function (mutation) {
                        mutation.addedNodes.forEach(function (node) {
                            if (typeof node.getElementsByTagName !== 'function') {
                                return;
                            }
                            imgs = node.getElementsByTagName('img');
                            if (0 === imgs.length) {
                                return;
                            }
                            lazyLoadInstance.update();
                        });
                    });
                });
                var b = document.getElementsByTagName("body")[0];
                var config = {childList: true, subtree: true};
                observer.observe(b, config);
            }
        }, false);

        // Update LazyLoad images before Slide change
        // $('.slick-slider').on('beforeChange', function () {
        //     lazyLoadInstance.update();
        // });

        // Detect element appearance in viewport
        scrollOut = ScrollOut({
            threshold: 0.3,
            once: true,
            onShown: function (element) {
                if ($(element).is('.ease-order')) {
                    $(element).find('.ease-order__item').each(function (i) {
                        var $this = $(this);
                        $(this).attr('data-scroll', '');
                        window.setTimeout(function () {
                            $this.attr('data-scroll', 'in');
                        }, 300 * i);
                    });
                }
            }
        });


        // Init parallax
        $('.jarallax').jarallax({
            speed: 0.5,
        });

        // $('.jarallax-inline').jarallax({
        //     speed: 0.5,
        //     keepImg: true,
        //     onInit : function() { lazyLoadInstance.update(); }
        // });

        // IE Object-fit cover polyfill
        if ($('.of-cover, .stretched-img').length) {
            objectFitImages('.of-cover, .stretched-img');
        }

        //Remove placeholder on click
        $('input,textarea').each(function () {
            $(this).data('holder', $(this).attr('placeholder'));

            $(this).on('focusin', function () {
                $(this).attr('placeholder', '');
            });

            $(this).on('focusout', function () {
                $(this).attr('placeholder', $(this).data('holder'));
            });
        });

        //Make elements equal height
        $('.matchHeight').matchHeight();


        // Add fancybox to images
        $('.gallery-item').find('a[href$="jpg"], a[href$="png"], a[href$="gif"]').attr('rel', 'gallery').attr('data-fancybox', 'gallery');
        $('a[rel*="album"], .fancybox, a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
            minHeight: 0,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });

        /**
         * Scroll to Gravity Form confirmation message after form submit
         */
        $(document).on('gform_confirmation_loaded', function (event, formId) {
            var $target = $('#gform_confirmation_wrapper_' + formId);
            if ($target.length) {
                $('html, body').animate({
                    scrollTop: $target.offset().top - 50,
                }, 500);
                return false;
            }
        });

        /**
         * Hide gravity forms required field message on data input
         */
        $('body').on('change keyup', '.gfield input, .gfield textarea', function () {
            var $field = $(this).closest('.gfield');
            if ($field.hasClass('gfield_error') && $(this).val().length) {
                $field.find('.validation_message').hide();
            } else if ($field.hasClass('gfield_error') && !$(this).val().length) {
                $field.find('.validation_message').show();
            }
        });

        /**
         * Add `is-active` class to menu-icon button on Responsive menu toggle
         * And remove it on breakpoint change
         */
        $(window).on('toggled.zf.responsiveToggle', function () {
            $('.menu-icon').toggleClass('is-active');
        }).on('changed.zf.mediaquery', function (e, value) {
            $('.menu-icon').removeClass('is-active');
        });

        /**
         * Close responsive menu on orientation change
         */
        $(window).on('orientationchange', function () {
            setTimeout(function () {
                if ($('.menu-icon').hasClass('is-active') && window.innerWidth < 1025) {
                    $('[data-responsive-toggle="main-menu"]').foundation('toggleMenu')
                }
            }, 200);
        });

        resizeVideo();

        /*
        *  This function will render each map when the document is ready (page has loaded)
        */

        $('.acf-map').each(function () {
            render_map($(this));
        });
        // $('#sbi_images').slick({
        //     slidesToShow: 1,
        //     slidesToScroll: 1
        // })


        // Accordion


        var listTitle = $('.ca-accordion__item .item__title');

        listTitle.on('click', function () {
            listTitle.each(function (ind, elem) {
                $(elem).parent('.ca-accordion__item').removeClass('accordion-active');
            })

            $(this).parent('.ca-accordion__item').addClass('accordion-active');

        })

        //
        // $(".ca-mute").click(function () {
        //     if ($("video").prop('muted')) {
        //         $("video").prop('muted', false);
        //     } else {
        //         $("video").prop('muted', true);
        //     }
        // });


        var videoButtons = $('.video__button'),
            contentVideo = $('.content__video')


        videoButtons.each(function () {
            var btn = $(this);
            btn.on('click', function (e) {
                e.preventDefault();
                contentVideo.each(function () {
                    $(this).removeClass('video-active');

                })
                var activeClass = btn.parents('.content__card');
                activeClass.prev().addClass('video-active')
                // activeClass.prev().find('.video-play').trigger('play');
            });
        })


        /* ------------------------------------
           Block: Slider accordion
        ------------------------------------- */

        var tabsTitle = $('.ca-accordion__item');

        var firstTab = $('.ca-accordion__item.accordion-active');

        var firstTasSlides = firstTab.find('.advices-tabs .wrapper__item');

        var firstTasSlidesParent = firstTab.find('.advices-tabs');

        var slickOpts = {
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: false,
            easing: 'swing', // see http://api.jquery.com/animate/
            speed: 700,
            dots: true,
            customPaging: function (slick, index) {
                return '<a>' + (index + 1) + '</a>';
            }
        };

        if (firstTasSlides.length >= 5) {
            firstTasSlidesParent.slick(slickOpts);
        }

        tabsTitle.on('click', function () {
            var slides = $(this).find('.advices-tabs .wrapper__item'),
                sliderParent = $(this).find('.advices-tabs')

            if (slides.length >= 5 && !sliderParent.hasClass('slick-initialized')) {
                sliderParent.slick(slickOpts);
            }
        })
        // Init slick carousel

        // $('.advices-tabs').slick(slickOpts);

        // const swiper = new Swiper('.swiper', {
        //     // Optional parameters
        //     speed: 1000,
        //     loop: false,
        //     slidesPerView: 1,
        //     centeredSlides: false,
        //     slidesPerGroupSkip: 1,
        //     grabCursor: true,
        //     keyboard: {
        //         enabled: true,
        //     },
        //
        //     // If we need pagination
        //     pagination: {
        //         el: '.swiper-pagination',
        //         type: "fraction"
        //     },
        //
        //     // Navigation arrows
        //     navigation: {
        //         // nextEl: '.swiper-button-next',
        //         // prevEl: '.swiper-button-prev',
        //     },
        //
        //     // And if we need scrollbar
        //     scrollbar: {
        //         el: '.swiper-scrollbar',
        //     },
        //
        // });

        // swiper.on('onSlideNextStart', function () {
        //     $('.swiper-slide .parallax-bg').attr('data-swiper-parallax-duration','');
        //     $('.swiper-slide-prev .parallax-bg').attr('data-swiper-parallax-duration','4000');
        // });


        /* ------------------------------------
           Block: End Slider accordion
        ------------------------------------- */

    });


    // Scripts which runs after all elements load

    $(window).on('load', function () {

        // scrollOut.update();

        //jQuery code goes here
        if ($('.preloader').length) {
            $('.preloader').addClass('preloader--hidden');
        }

    });

    // Scripts which runs at window resize

    $(window).on('resize', function () {

        //jQuery code goes here

        resizeVideo();

    });

    // Scripts which runs on scrolling

    $(window).on('scroll', function () {

        //jQuery code goes here

        if (imageWrapper && isInViewport(imageWrapper)) {
            imageWrapper.addClass('start-animation')
        }

        if (ageWrapper && isInViewport(ageWrapper)) {
            // ageWrapper.addClass('animation-age');
            fixedBlock.addClass('fixed-block');
            fixedBlock.parent('.ca-age__block-left').removeClass('block-left-active');
        }

        if (stopFixedBlock && isInViewport(stopFixedBlock)) {
            // ageWrapper.addClass('animation-age');
            fixedBlock.removeClass('fixed-block');
            fixedBlock.parent('.ca-age__block-left').addClass('block-left-active');
        }

        if (stopFixedBlockTop && isInViewport(stopFixedBlockTop)) {
            // ageWrapper.addClass('animation-age');
            fixedBlock.removeClass('fixed-block');
        }

        if (cabinetBlockStartFixed && isInViewport(cabinetBlockStartFixed)) {
            cabinetBlockFixed.addClass('start-fixed');
        }

        if (cabinetBlockStopFixed && isInViewport(cabinetBlockStopFixed)) {
            cabinetBlockFixed.removeClass('start-fixed');
        }

        if (cabinetBlockStopFixed2 && isInViewport(cabinetBlockStopFixed2)) {
            cabinetBlockFixed.removeClass('start-fixed');
        }

        if (cabinetBlockStopFixed3 && isInViewport(cabinetBlockStopFixed3)) {
            cabinetBlockFixed.addClass('start-fixed');
        }

        /* ------------------------------------
           Block: OMG SCROLL
        ------------------------------------- */


        $('.image-bottom-block').each(function (ind, elem) {

            if ($(elem) && isInViewport($(elem))) {
                var dataId = $(elem).attr('data-id');

                showHideBlock(dataId);

            }

        })


        /* ------------------------------------
           Block: End OMG SCROLL
        ------------------------------------- */


    });

    /*
     *  This function will render a Google Map onto the selected jQuery element
     */

    function render_map($el) {
        // var
        var $markers = $el.find('.marker');
        // var styles = []; // Uncomment for map styling

        // vars
        var args = {
            zoom: 16,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            rotateControl: false,
            fullscreenControl: false


            // styles : styles // Uncomment for map styling
        };

        // create map
        var map = new google.maps.Map($el[0], args);

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function () {
            add_marker($(this), map);
        });

        // center map
        center_map(map);
    }

    /*
     *  This function will add a marker to the selected Google Map
     */

    var infowindow;

    function add_marker($marker, map) {
        // var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

        // create marker
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: $marker.data('marker-icon') //uncomment if you use custom marker
        });

        // add to array
        map.markers.push(marker);

        // if marker contains HTML, add it to an infoWindow
        if ($.trim($marker.html())) {
            // create info window
            infowindow = new google.maps.InfoWindow();

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function () {
                // Close previously opened infowindow, fill with new content and open it
                infowindow.close();
                infowindow.setContent($marker.html());
                infowindow.open(map, marker);
            });
        }
    }

    /*
    *  This function will center the map, showing all markers attached to this map
    */

    function center_map(map) {
        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each(map.markers, function (i, marker) {
            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
            bounds.extend(latlng);
        });

        // only 1 marker?
        if (map.markers.length == 1) {
            // set center of map
            map.setCenter(bounds.getCenter());
        } else {
            // fit to bounds
            map.fitBounds(bounds);
        }
    }
}(jQuery));





