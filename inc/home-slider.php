<?php
// Create HOME Slider
function home_slider_template() { ?>

    <script type="text/javascript">

        // Send command to iframe youtube player
        function postMessageToPlayer(player, command) {
            if (player == null || command == null) return;
            player.contentWindow.postMessage(JSON.stringify(command), '*');
        }

        jQuery(document).on('ready', function () {
            var $homeSlider = jQuery('#home-slider');
            $homeSlider
                // .on('init', function (event, slick) {
                //     slick.$slides.not(':eq(0)').find('.video--local').each(function () {
                //         this.pause();
                //     });
                //
                //     if (slick.$slides.eq(0).find('.video--local').length) {
                //         slick.$slides.eq(0).find('.video--local')[0].play();
                //     }
                //     if (slick.$slides.eq(0).find('.video--embed').length) {
                //         var playerId = slick.$slides.eq(0).find('iframe').attr('id');
                //         var player = jQuery('#' + playerId).get(0);
                //         postMessageToPlayer(player, {
                //             'event': 'command',
                //             'func': 'playVideo'
                //         });
                //     }
                // })
                // .on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                //     // Pause youtube video on slide change
                //     if (slick.$slides.eq(currentSlide).find('.video--embed').length) {
                //         var playerId = slick.$slides.eq(currentSlide).find('iframe').attr('id');
                //         var player = jQuery('#' + playerId).get(0);
                //         postMessageToPlayer(player, {
                //             'event': 'command',
                //             'func': 'pauseVideo'
                //         });
                //     }
                //     // Pause local video on slide change
                //     if (slick.$slides.eq(currentSlide).find('.video--local').length) {
                //         slick.$slides.eq(currentSlide).find('.video--local')[0].pause();
                //     }
                //
                // })
                .on('afterChange', function (event, slick, currentSlide) {
                    // Start playing local video on current slide
                    if (slick.$slides.eq(currentSlide).find('.video--local').length) {
                        slick.$slides.eq(currentSlide).find('.video--local')[0].play();
                    }

                    // Start playing youtube video on current slide
                    if (slick.$slides.eq(currentSlide).find('.video--embed').length) {
                        var playerId = slick.$slides.eq(currentSlide).find('iframe').attr('id');
                        var player = jQuery('#' + playerId).get(0);
                        postMessageToPlayer(player, {
                            'event': 'command',
                            'func': 'playVideo'
                        });
                    }

                });

            $homeSlider.slick({
                cssEase: 'ease',
                fade: true,  // Cause trouble if used slidesToShow: more than one
                arrows: false,
                dots: true,
                infinite: true,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 5000,
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 0, // Prevent generating extra markup
                slide: '.slick-slide', // Cause trouble with responsive settings
            });
        });
    </script>

	<?php $arg = array(
		'post_type'      => 'slider',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'posts_per_page' => - 1
	);
	$slider    = new WP_Query( $arg );
	if ( $slider->have_posts() ) : ?>

        <div id="home-slider" class="slick-slider">
            <div id="accueil"></div>
			<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
                <div class="slick-slide">

                    <div class="slick-slide__inner" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>>
						<?php
						$iframe = get_field( 'video_vimeo' );
						?>
						<?php if ( $iframe ): ?>
                            <div class="videoHolder"
                                 data-ratio="<?php echo get_post_meta( get_the_ID(), 'video_aspect_ratio', true ) ? : '16:9'; ?>">
                                <div class="video video--embed responsive-embed widescreen embed-container">
									<?php

									// Load value.
									// Use preg_match to find iframe src.
									preg_match( '/src="(.+?)"/', $iframe, $matches );
									$src = $matches[1];

									// Add extra parameters to src and replcae HTML.
									$params  = array(
										'controls' => 0,
										'hd'       => 1,
										'autohide' => 1,
										'autoplay' => 1,
										'loop'     => 1,
										'muted'    => 1
									);
									$new_src = add_query_arg( $params, $src );
									$iframe  = str_replace( $src, $new_src, $iframe );

									// Add extra attributes to iframe HTML.
									$attributes = 'frameborder="0"';
									$iframe     = str_replace( '></iframe>', ' ' . $attributes . '></iframe>', $iframe );

									// Display customized HTML.
									echo $iframe;
									?>
                                    <div class="control">
                                        <button class="btn-mute mute"></button>
                                        <button class="btn-play"
                                                data-click="0"></button>
                                    </div>
                                </div>
                            </div>
						<?php endif; ?>

                        <div class="grid-container slider-caption">
                            <div class="grid-x grid-margin-x">
                                <div class="cell">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
			<?php endwhile; ?>
        </div><!-- END of  #home-slider-->
	<?php endif;
	wp_reset_query(); ?>
<?php }

// HOME Slider Shortcode

function home_slider_shortcode() {
	ob_start();
	home_slider_template();
	$slider = ob_get_clean();

	return $slider;
}

add_shortcode( 'slider', 'home_slider_shortcode' );
