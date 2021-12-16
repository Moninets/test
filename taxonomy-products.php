<?php
/**
 * Archive
 *
 * Standard loop for the archive page
 */
get_header(); ?>
<div class="ca-single-page">
    <div class="ca-banner">
        <div class="ca-banner__wrapper">
			<?php
			$cat_title      = get_field( 'category_title' );
			$category_image = get_field( 'category_image' );
			$cut_id         = get_queried_object( 'products' );
			?>
			<?php if ( $cat_title ): ?>
                <div class="wrapper-post__title">
					<?php echo $cat_title; ?> </div>
			<?php else: echo '<h3 class="h2 wrapper-post__title">' . $cut_id->name . '</h3>' ?>
			<?php endif; ?>
            <img class="ca__image" src="<?php echo $category_image['url']; ?>" alt="Image">
        </div>
    </div>

    <main class="main-content">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <!-- BEGIN of post content -->
                <div class="small-12 cell">
                    <div class="posts-list">

						<?php
						$args  = array(
							'post_type' => 'treatments',
							'tax_query' => array(
								array(
									'taxonomy'         => 'products',
									'field'            => 'slug',
									'terms'            => $cut_id,
									'include_children' => false
								)
							)
						);
						$posts = get_posts( $args );
						if ( $posts ) { ?>
							<?php foreach ( $posts as $post ) : ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                                    <div class="entry__content clearfix">
                                        <h2 class="h2"><?php echo $post->post_title ?></h2>
										<?php echo $post->post_content; ?>
                                    </div>
                                </article>
							<?php endforeach; ?>
                            <a class="return-lik blue-button" href="/#treatments">
								<?php echo esc_attr( 'retour' ); ?>
                            </a>

							<?php
						}
						wp_reset_query(); ?>
                    </div>
                </div>
                <!-- END of post content -->
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
