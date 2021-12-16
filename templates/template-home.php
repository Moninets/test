<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

    <!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
    <!--END of HOME PAGE SLIDER-->

    <!-- BEGIN of main content -->

    <div class="grid-x grid-margin-x">
        <div class="cell">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) :
					the_post(); ?>

                    <!-- Begin About -->
					<?php
					$about_image   = get_field( 'about_image' );
					$about_content = get_field( 'about_content' );
					?>

                    <section class="ca-about">
                        <div class="ca-container">
                            <div class="grid-x grid-padding-x">
                                <div class="cell large-6 small-12">
                                    <div class="ca-image-wrapper jarallax">
                                        <img class="image__top"
                                             src="<?php echo get_template_directory_uri() ?>/assets/images/about-element2.svg"
                                             alt="Image top">
                                        <img class="ca__image" src="<?php echo $about_image['url']; ?>"
                                             alt="<?php echo $about_image['title']; ?>">
                                        <img class="image__bottom"
                                             src="<?php echo get_template_directory_uri() ?>/assets/images/about-element1.svg"
                                             alt="Image bottom">
                                    </div>
                                </div>
                                <div class="cell large-6 small-12">
                                    <div class="ca-content">
										<?php echo $about_content; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <!-- End About -->

                    <!-- Begin Orthodontist -->
					<?php
					$orthodontist_content       = get_field( 'orthodontist_content' );
					$orthodontist_image_section = get_field( 'orthodontist_image_section' );
					$orthodontist_image_logo    = get_field( 'orthodontist_image_logo' );
					?>

                    <section class="ca-orthodontist">
                        <div class="ca-container">
							<?php if ( $orthodontist_content ): ?>
                                <div class="ca__content">
									<?php echo $orthodontist_content; ?>
                                </div>
							<?php endif; ?>
							<?php if ( $orthodontist_image_section ): ?>
                                <div class="ca__images jarallax">
                                    <img class="image__section jarallax-img"
                                         src="<?php echo $orthodontist_image_section['url']; ?>"
                                         alt="<?php echo $orthodontist_image_section['title']; ?>">
                                    <img class="image__logo" src="<?php echo $orthodontist_image_logo['url']; ?>"
                                         alt="<?php echo $orthodontist_image_logo['title']; ?>">

                                </div>
							<?php endif; ?>

                        </div>
                    </section>

                    <!-- End Orthodontist -->

                    <!-- Begin Instagram-->
					<?php $instafeed_button_link = get_field( 'instafeed_button_link' ); ?>
					<?php $instafeed_title = get_field( 'title_instafeed' ); ?>
					<?php $instafeed_content = get_field( 'instafeed_content' ); ?>
					<?php $list_images = get_field( 'instafeed_list_image' ); ?>

                    <section class="ca-instagram">
						<?php if ( $instafeed_button_link ): ?>
                            <a class="ca-link" href="<?php echo $instafeed_button_link['url'] ?>"
                               target="<?php echo $instafeed_button_link['target'] ?>">
								<?php echo $instafeed_button_link['title'] ?>
                            </a>
						<?php endif; ?>
						<?php if ( $instafeed_title ): ?>
                            <div class="ca-title"><?php echo $instafeed_title; ?></div>
						<?php endif; ?>
						<?php if ( $instafeed_content ): ?>
                            <div class="ca-content"><?php echo $instafeed_content; ?></div>
						<?php endif; ?>
						<?php if ( $list_images ): ?>
                            <div class="slider-insta" id="slider-insta">
								<?php foreach ( $list_images as $image ): ?>
									<?php foreach ( $image as $items ): ?>
                                        <div class="slide">
											<?php foreach ( $items as $item ): ?>
                                                <a class="slide__image"
                                                   href="<?php echo $instafeed_button_link['url'] ?>"
                                                   target="<?php echo $instafeed_button_link['target'] ?>">
                                                    <img src="<?php echo $item['icon']['url']; ?>"
                                                         alt="<?php echo $item['icon']['alt']; ?>">
                                                </a>
											<?php endforeach; ?>
                                        </div>
									<?php endforeach; ?>
								<?php endforeach; ?>
                            </div>

						<?php endif; ?>
                    </section>
                    <!-- End Instagram -->

                    <!-- Begin Notre -->

					<?php
					$notre_title       = get_field( 'notre_title' );
					$notre_image       = get_field( 'notre_image' );
					$notre_content     = get_field( 'notre_content' );
					$notre_list_images = get_field( 'notre_list_images' );
					?>

                    <section class="ca-notre">
                        <div id="equipe"></div>
                        <div class="ca-container">
                            <div class="grid-x grid-margin-x">
                                <div class="cell medium-4">
									<?php if ( $notre_title ): ?>
                                        <div class="ca-title wow slideInLeft"
                                             data-wow-duration="2s"><?php echo $notre_title; ?></div>
									<?php endif; ?>
                                </div>
                                <div class="cell medium-4">
									<?php if ( $notre_image ): ?>
                                        <div class="ca__wrapper__image">
                                            <img class="ca__image" src="<?php echo $notre_image['url']; ?>"
                                                 alt="<?php echo $notre_image['title']; ?>">
                                        </div>
									<?php endif; ?>
                                </div>
                                <div class="cell medium-4">
									<?php if ( $notre_content ): ?>
                                        <div class="ca__content">
											<?php echo $notre_content; ?>
                                        </div>
									<?php endif; ?>
                                </div>
                                <div class="cell small-12">
									<?php if ( $notre_list_images ): ?>
                                        <div class="ca-notre-list">
											<?php foreach ( $notre_list_images as $key => $notre_list_image ): ?>
                                                <div class="ca-item  wow slideInUp ca-item<?php echo $key ?>"
                                                     data-wow-duration="1s">
													<?php if ( $notre_list_image['content'] ): ?>
                                                        <div class="ca__content">
															<?php echo $notre_list_image['content']; ?>
                                                        </div>
													<?php endif; ?>

													<?php if ( $notre_list_image['image'] ): ?>
                                                        <img class="ca__image"
                                                             src="<?php echo $notre_list_image['image']['url']; ?>"
                                                             alt="<?php echo $notre_list_image['image']['url']; ?>">
													<?php endif; ?>

													<?php if ( $notre_list_image['title'] ): ?>
                                                        <div class="ca__title">
															<?php echo $notre_list_image['title']; ?>
                                                        </div>

													<?php endif; ?>

                                                </div>
											<?php endforeach; ?>
                                        </div>

									<?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!-- End Notre -->

                    <!-- Begin Age -->
					<?php
					$age_title       = get_field( 'age_title' );
					$age_list_images = get_field( 'age_list_images' );
					?>
                    <div id="stop-fixed2"></div>
                    <section class="ca-age">
                        <div class="ca-container">
                            <div class="grid-x grid-margin-x">
                                <div class="cell large-6 small-12 ca-age__block-left">
									<?php if ( $age_title ): ?>
                                        <div class="ca-content">
											<?php echo $age_title; ?>
                                        </div>
									<?php endif; ?>
                                </div>
                                <div class="cell large-6 small-12">
									<?php if ( $age_list_images ): ?>
										<?php $i = 1; ?>
                                        <div class="ca__list">
											<?php foreach ( $age_list_images as $key => $age_list_image ): ?>

                                                <div class="ca__item">
                                                    <h3 class="ca__title"><?php echo $age_list_image['title']; ?></h3>
                                                    <img class="ca__image"
                                                         src="<?php echo $age_list_image['icon']['url']; ?>" alt="">

													<?php if ( $key == 2 ): ?>

                                                        <div id="animation-age"></div>

													<?php endif; ?>

                                                </div>

											<?php endforeach; ?>
                                            <img class="image-animate list__image__top "
                                                 src="<?php echo get_template_directory_uri() ?>/assets/images/shape.svg"
                                                 alt="Image bottom">
                                            <img class="image-animate list__image__bottom"
                                                 src="<?php echo get_template_directory_uri() ?>/assets/images/about-element1.svg"
                                                 alt="Image bottom">
                                        </div>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- End Age -->

                    <!-- Begin Technologies -->
					<?php
					$technologies_title          = get_field( 'technologies_title' );
					$technologies_contents       = get_field( 'technologies_content' );
					$technologies_images         = get_field( 'technologies_images' );
					$technologies_image_animated = get_field( 'technologies_image_animated' );
					?>
                    <section class="ca-technologies">
                        <div id="technologies1"></div>
                        <div class="ca-container">
                            <div id="stop-fixed"></div>
							<?php if ( $technologies_title ): ?>
                                <h2 class="ca-technologies__title">
									<?php echo $technologies_title; ?>
                                </h2>
							<?php endif; ?>

							<?php if ( $technologies_contents ):
							$i = 1 ?>
                            <div id="bottom-animation-technologies-2"></div>

                            <div class="wrapper">

                                <div class="ca-content-list">


									<?php foreach ( $technologies_contents as $key => $technologies_content ): ?>
                                        <div class="ca-content-item ca-content-item__<?php echo $key ?>">
                                            <div class="overlay">
												<?php echo $technologies_content['description']; ?>
                                            </div>
                                            <img class="image-animate images__top"
                                                 src="<?php echo get_template_directory_uri() ?>/assets/images/about-element3.png"
                                                 alt="Image top">
                                        </div>
									<?php endforeach; ?>

                                </div>
								<?php endif; ?>
								<?php if ( $technologies_images ): ?>


                                <div class="ca-images">

									<?php foreach ( $technologies_images as $key => $technologies_image ): ?>

                                        <div class="ca-image ca-image__<?php echo $key; ?>">

                                            <img src="<?php echo $technologies_image['icon']['url']; ?>"
                                                 alt="<?php echo $technologies_image['icon']['title']; ?>">
											<?php if ( $key === 1 ): ?>
                                                <div id="top-animation-technologies"></div>
											<?php endif; ?>

                                            <div data-id="<?php echo $key; ?>" class="image-bottom-block"></div>

                                        </div>


									<?php endforeach; ?>

                                </div>
                            </div>
						<?php endif; ?>
                        </div>
                        <div id="top-animation-technologies-3"></div>
                    </section>

                    <!-- End Technologies -->

                    <!-- Begin Gallery -->
					<?php
					$title_gallery  = get_field( 'title_top' );
					$gallery_top    = get_field( 'gallery_top' );
					$gallery_center = get_field( 'gallery_center' );
					$gallery_bottom = get_field( 'gallery_bottom' );
					$logo_image     = get_field( 'logo_image' );
					?>
                    <section class="section-gallery gallery ca-gallery">
                        <div class="row row1">
                            <div class="gallery__image-container title-container ">
								<?php if ( $title_gallery ): ?>
                                    <p class="gallery__image title__top">
										<?php echo $title_gallery; ?>
                                    </p>
								<?php endif; ?>
                            </div>

                        </div>
                        <div id="bottom-animation-technologies"></div>
                        <div class="row row2">
                            <div class="gallery__image-container block1">
								<?php foreach ( $gallery_top as $item ): ?>
                                    <div class="gallery__image">
                                        <a class="ca-link" href="<?php echo esc_url( $item['url'] ); ?>">
                                            <img class="ca-image" src="<?php echo esc_url( $item['url'] ); ?>"
                                                 alt="<?php echo esc_attr( $item['alt'] ); ?>"/>
                                        </a>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>
                        <div class="row row3">
                            <div class="gallery__image-container block2">
								<?php if ( $gallery_center ): ?>
									<?php foreach ( $gallery_center as $item ): ?>
                                        <div class="gallery__image">
                                            <a class="ca-link" href="<?php echo esc_url( $item['url'] ); ?>">
                                                <img class="ca-image" src="<?php echo esc_url( $item['url'] ); ?>"
                                                     alt="<?php echo esc_attr( $item['alt'] ); ?>"/>
                                            </a>
                                        </div>
									<?php endforeach; ?>
								<?php endif; ?>
                            </div>

                        </div>
                        <div class="row row4">
                            <div class="gallery__image-container block3">
								<?php if ( $logo_image ): ?>
                                    <div class="ca-logo gallery__image">
                                        <img class="ca-image" src="<?php echo $logo_image['url']; ?>"
                                             alt="<?php echo $logo_image['title']; ?>">
                                    </div>
								<?php endif; ?>
                            </div>

                        </div>
                        <div class="row row5">
                            <div class="gallery__image-container block4">
								<?php if ( $gallery_bottom ): ?>
									<?php foreach ( $gallery_bottom as $item ): ?>
                                        <div class="gallery__image">
                                            <a class="ca-link" href="<?php echo esc_url( $item['url'] ); ?>">
                                                <img class="ca-image" src="<?php echo esc_url( $item['url'] ); ?>"
                                                     alt="<?php echo esc_attr( $item['alt'] ); ?>"/>
                                            </a>
                                        </div>
									<?php endforeach; ?>
								<?php endif; ?>
                            </div>
                        </div>
                        <div class="row row6">
                            <div class="gallery__image-container title-container-bottom">
								<?php if ( $title_gallery ): ?>
                                    <p class="title-bottom gallery__image">
										<?php echo $title_gallery; ?>
                                    </p>
								<?php endif; ?>
                            </div>
                        </div>
                    </section>


                    <div class="padding"></div>
                    <!-- End Gallery -->

                    <!-- Begin Care -->
					<?php
					$care_title = get_field( 'care_title' );
					$care_list  = get_field( 'care_list' );
					?>

                    <section class="ca-care wow " id="wrapper-images">
                        <div></div>
                        <div class="ca-container">
							<?php if ( $care_title ): ?>
                                <h2 class="ca-care__title">
									<?php echo $care_title; ?>
                                </h2>
							<?php endif; ?>
							<?php if ( $care_list ): ?>
                                <ul class="ca__list">
									<?php foreach ( $care_list as $item ): ?>

                                        <li class="ca__item">
                                            <img class="ca-icon" src="<?php echo $item['icon']['url']; ?>"
                                                 alt="<?php echo $item['icon']['url']; ?>">
                                            <div class="ca-content">
												<?php echo $item['content']; ?>
                                            </div>
                                        </li>

									<?php endforeach; ?>
                                </ul>
							<?php endif; ?>
                        </div>
                    </section>

                    <!-- End Care -->


                    <!--Begin Treatments-->
                    <section class="ca-treatments">
                        <div id="traitments"></div>
                        <div id="traitements1"></div>
                        <div class="ca-container">

							<?php
							$custom_terms = get_terms( 'products' );

							foreach ( $custom_terms as $custom_term ) :
								wp_reset_query(); ?>
								<?php
								$args = array(
									'post_type' => 'treatments',
									'tax_query' => array(
										array(
											'taxonomy' => 'products',
											'field'    => 'slug',
											'terms'    => $custom_term->slug,
										),
									),
								);

								$loop = new WP_Query( $args );
								if ( $loop->have_posts() ) : ?>
									<?php $category_image = get_field( 'category_image', $custom_term ); ?>
                                    <div class="wrapper-post wow slideInUp">
                                        <img class="wrapper-post__image wow slideInUp" data-wow-duration="2s"
                                             data-wow-delay="0.5s"
                                             src="<?php echo $category_image['url']; ?>"
                                             alt="Image">

                                        <div class="wrapper-post__content wow slideInUp" data-wow-duration="2s"
                                             data-wow-delay="0.5s">
											<?php $cat_title = get_field( 'category_title', $custom_term ); ?>
											<?php if ( $cat_title ): ?>
                                                <div class="wrapper-post__title">
													<?php echo $cat_title; ?> </div>
											<?php else: echo '<h3 class="h2 wrapper-post__title">' . $custom_term->name . '</h3>' ?>
											<?php endif; ?>
                                            <div class="wrapper-post__description"><?php echo $custom_term->description; ?></div>
											<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
												<?php $title_product = get_field( 'title_product' ); ?>
                                                <div class="wrapper-link">
                                                    <a href="<?php echo get_the_permalink(); ?>"
                                                       id="<?php echo get_the_ID(); ?>"> <?php echo $title_product ? $title_product : get_the_title(); ?> </a>
                                                </div>
											<?php endwhile;
											wp_reset_postdata(); ?>
                                        </div>
                                    </div>

								<?php endif;
								wp_reset_postdata(); ?>
							<?php endforeach;
							wp_reset_postdata(); ?>
                        </div>
                    </section>
                    <!--End Treatments-->

                    <!-- Begin Private -->
					<?php
					$privat_content = get_field( 'privat_content' );
					$privat_buttons = get_field( 'privat_buttons' );
					$privat_image   = get_field( 'privat_image' );
					?>
                    <section class="ca-private">
                        <div class="ca-container-medium">
                            <div class="ca-wrapper wow slideInUp" data-wow-duration="2s" data-wow-delay="0.5s">
								<?php if ( $privat_content ): ?>
                                    <div class="left__content">
										<?php echo $privat_content; ?>
                                        <div class="ca__buttons">
											<?php foreach ( $privat_buttons as $kay => $privat_button ): ?>
                                                <a class="blue-button button__<?php echo $kay; ?> ""
                                                href="<?php echo $privat_button['link']['url']; ?>">
												<?php echo $privat_button['link']['title']; ?>
                                                </a>
											<?php endforeach; ?>
                                        </div>
                                    </div>
									<?php if ( $privat_image ): ?>
                                        <div class="right__content">
                                            <img class="ca-image" src="<?php echo $privat_image['url']; ?>"
                                                 alt="<?php echo $privat_image['title']; ?>">

                                        </div>
									<?php endif; ?>
								<?php endif; ?>
                            </div>
                        </div>
                    </section>

                    <!-- End Private -->

                    <!-- Begin Application -->
					<?php
					$application_image     = get_field( 'application_image' );
					$application_title     = get_field( 'application_title' );
					$icon_doctor           = get_field( 'icon_doctor' );
					$orthodontist_title    = get_field( 'orthodontist_title' );
					$application_list_icon = get_field( 'application_list_icon' );
					?>
                    <section class="ca-application">
                        <div class="ca-container-medium">
                            <div class="ca-wrapper">
								<?php if ( $application_image ): ?>
                                    <div class="left-content wow slideInUp" data-wow-duration="2s" data-wow-delay="1s">
                                        <img class="ca-image" src="<?php echo $application_image['url']; ?>"
                                             alt="<?php echo $application_image['title']; ?>">
                                    </div>
								<?php endif; ?>
								<?php if ( $application_title ): ?>
                                <div class="right-content">
									<?php echo $application_title; ?>
                                    <div class="ca-images">
                                        <div class="ca-images__left">
                                            <img class="ca-image" src="<?php echo $icon_doctor['url']; ?>"
                                                 alt="<?php echo $icon_doctor['title']; ?>">
                                        </div>
                                        <div class="ca-images__right">
                                            <h4 class="ca-title"><?php echo $orthodontist_title; ?></h4>
                                            <div class="list__application">
												<?php foreach ( $application_list_icon as $kay => $item ): ?>
                                                    <a class="ca-link" href="<?php echo $item['link']['url'] ?>"
                                                       target="<?php echo $item['link']['target']; ?>">
                                                        <img class="ca-image src="<?php echo $item['icon']['url']; ?>"
                                                        alt="<?php echo $item['icon']['title']; ?>">
                                                    </a>
												<?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- End Application -->

                    <!--Begin Advices -->

					<?php
					$advices_title     = get_field( 'advices_title' );
					$advices_list_card = get_field( 'conseils_list_card' );
					?>
                    <section class="ca-advices" id="conseils-active">
                        <div id="ca-advices1"></div>
                        <div id="conseils"></div>

						<?php if ( $advices_title ): ?>
                            <h2 class="ca-advices__title">
								<?php echo $advices_title; ?>
                            </h2>
						<?php endif; ?>

                        <ul class="ca-accordion">
							<?php foreach ( $advices_list_card as $key => $item ): ?>
                                <li class="ca-accordion__item <?php echo $key == 0 ? 'accordion-active' : '' ?>">
                                    <p class="item__title">
										<?php echo $item['title']; ?>
                                    </p>
									<?php $contents = $item['description']; ?>
                                    <div class="wrapper">
                                        <div class="wrapper__accordion">

											<?php foreach ( $contents as $slide => $content ): ?>
												<?php $slides = $content['slide']; ?>

                                                <div class="ca-tab advices-tabs">
													<?php foreach ( $slides as $slide ): $i = 1 ?>

                                                        <div class="wrapper__item">
															<?php if ( $content ): ?>
                                                                <div class="content__video">
																	<?php if ( $slide['video'] ): ?>
                                                                        <div class="video-play">
																			<?php
																			preg_match( '/src="(.+?)"/', $slide['video'], $matches );
																			$src = $matches[1];

																			// Add extra parameters to src and replcae HTML.
																			$params  = array(
																				'controls' => 1,
																				'hd'       => 0,
																				'autohide' => 1,
																			);
																			$new_src = add_query_arg( $params, $src );
																			$iframe  = str_replace( $src, $new_src, $slide['video'] );

																			// Add extra attributes to iframe HTML.
																			$attributes = 'frameborder="0"';
																			$iframe     = str_replace( '></iframe>', ' ' . $attributes . '></iframe>', $iframe );

																			// Display customized HTML.
																			echo $iframe;
																			?>
                                                                        </div>
																	<?php endif; ?>
                                                                    <div class="ca-overlay">
                                                                        <img class="wrapper__image" data-no-lazy="1"
                                                                             src="<?php echo $slide['icon']['url']; ?>"
                                                                             alt="<?php echo $slide['icon']['title']; ?>">
                                                                    </div>

                                                                </div>
															<?php endif; ?>
                                                            <div class="content__card matchHeight">
																<?php if ( $slide['title'] ): ?>
                                                                    <p class="wrapper__title"><?php echo $slide['title']; ?></p>
																<?php endif; ?>
																<?php if ( $slide['link_more'] ): ?>
                                                                    <a class="wrapper__link__more"
                                                                       href="<?php echo $slide['link_more']['url']; ?>?id=ca-advices<?php echo $i ++ ?>">
																		<?php echo $slide['link_more']['title']; ?>
                                                                        <img class="file__icon"
                                                                             src="<?php echo get_template_directory_uri(); ?>/assets/images/file-text.svg"
                                                                             alt="File">
                                                                    </a>
																<?php endif; ?>
																<?php if ( $slide['video'] ): ?>
                                                                    <a class="wrapper__link__more video__button button__pause"
                                                                       href="#">
																		<?php echo esc_attr( 'Voir la vidéo' ); ?>
                                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play.png"
                                                                             alt="Video" class="play__icon">
                                                                    </a>
																<?php endif; ?>
                                                            </div>
                                                        </div>

													<?php endforeach; ?>
                                                </div>

											<?php endforeach; ?>

                                        </div>
                                    </div>
                                </li>
							<?php endforeach; ?>
                        </ul>

                    </section>

                    <!--End Advices -->

                    <!--Begin Laboratories -->

					<?php
					$list_slider = get_field( 'list_slider' );
					?>
                    <section class="ca-laboratories">
                        <div class="swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
								<?php foreach ( $list_slider as $slide ): ?>
                                    <div class="swiper-slide">
                                        <img class="swiper-slide__image parallax-bg" data-no-lazy="1"
                                             src="<?php echo $slide['image']['url'] ?>"
                                             alt="<?php echo $slide['image']['title'] ?>">
                                        <div class="swiper-slide__content">
											<?php echo $slide['content']; ?>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </section>
                    <!--End Laboratories -->


                    <!--End Practical -->

					<?php
					$practical_title     = get_field( 'practical_title' );
					$practical_list_logo = get_field( 'practical_list_logo' );
					?>

                    <section class="ca-practical">
						<?php if ( $practical_title ): ?>
                            <h2 class="ca-practical__title">
								<?php echo $practical_title; ?>
                            </h2>
						<?php endif; ?>
						<?php if ( $practical_list_logo ): ?>
                            <div class="ca-wrapper-logo">
								<?php foreach ( $practical_list_logo as $logo ): ?>
                                    <a href="<?php echo $logo['link']['url']; ?>"
                                       target="<?php echo $logo['link']['target'] ?>" class="ca-item">
                                        <img class="ca-image" src="<?php echo $logo['icon']['url']; ?>"
                                             alt="<?php echo $logo['icon']['title']; ?>">
                                    </a>
								<?php endforeach; ?>
                            </div>
						<?php endif; ?>
                    </section>

                    <!--End Practical -->


                    <!--Begin Contact -->
					<?php
					$contact_title   = get_field( 'contact_title' );
					$contact_form    = get_field( 'contact_form' );
					$access_title    = get_field( 'access_title' );
					$link_list       = get_field( 'link_list' );
					$schedule_title  = get_field( 'schedule_title' );
					$schedule_info   = get_field( 'schedule_info' );
					$title_date      = get_field( 'title_date' );
					$title_date_info = get_field( 'title_date_info' );
					?>
                    <section class="ca-contact" id="contact">
                        <div class="ca-container">
                            <div class="ca-wrapper">
                                <div class="ca-wrapper__map">
									<?php if ( $location = get_field( 'map' ) ): ?>
                                        <div class="contact__map-wrap">
                                            <div class="acf-map contact__map">
                                                <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                                                     data-lng="<?php echo $location['lng']; ?>"
                                                     data-marker-icon="<?php echo get_template_directory_uri(); ?>/assets/images/map-marker.svg"><?php echo '<p>' . $location['address'] . '</p>'; ?></div>
                                            </div>
                                        </div>
									<?php endif; ?>
                                </div>
                                <div class="ca-wrapper__content">
									<?php if ( $contact_title ): ?>
                                        <div class="ca-title"><?php echo $contact_title; ?></div>
									<?php endif; ?>
									<?php if ( $contact_form ): ?>
                                        <div class="contact__form">
											<?php echo do_shortcode( "[gravityform id='{$contact_form['id']}' title='false' description='false' ajax='true']" ); ?>
                                        </div>
									<?php endif; ?>
                                    <div class="block-info">
										<?php if ( $access_title ): ?>
                                            <div class="info__left">
                                                <h3 class="h5"><?php echo $access_title; ?></h3>
												<?php if ( $link_list ): ?>
                                                    <div class="ca-buttons">
														<?php foreach ( $link_list as $item ): ?>
                                                            <a class="ca-button"
                                                               href="<?php echo $item['link']['url']; ?>">
                                                                <img clacc="ca-button__icon"
                                                                     src="<?php echo $item['icon']['url']; ?>"
                                                                     alt="<?php echo $item['icon']['title']; ?>">
																<?php echo $item['link']['title']; ?>
                                                            </a>
														<?php endforeach; ?>
                                                    </div>
												<?php endif; ?>
                                            </div>
										<?php endif; ?>
                                        <div class="info__right">
											<?php if ( $schedule_title ): ?>
                                                <h3 class="h5 ca-title"><?php echo $schedule_title; ?></h3>
											<?php endif; ?>
											<?php if ( $schedule_info ): ?>
                                                <div class="ca-description"><?php echo $schedule_info; ?></div>
											<?php endif; ?>
											<?php if ( $title_date ): ?>
                                                <h3 class="h5 ca-title"><?php echo $title_date; ?></h3>
											<?php endif; ?>
											<?php if ( $title_date_info ): ?>
                                                <div class="ca-description">
													<?php echo $title_date_info; ?>
                                                </div>
											<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>
    <!-- END of main content -->


<?php get_footer(); ?>