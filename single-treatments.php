<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>
<?php $title_product = get_field('title_product'); ?>
<!-- Begin Banner -->
<div class="ca-single-page">
    <div class="ca-banner">
        <img class="ca__image stretched-img" src="<?php echo get_attached_img_url() ?>" alt="Image" >
        <div class="ca-banner__wrapper">
            <h2 class="ca__title"><?php echo $title_product ? $title_product : get_the_title(); ?></h2>
        </div>
    </div>

    <!-- End Banner -->

    <main class="main-content">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <!-- BEGIN of post content -->
                <div class="small-12 cell">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                                <div class="entry__content clearfix">
									<?php the_content( '', true ); ?>
                                </div>
                                <a class="return-lik blue-button" href=" <?php echo get_home_url('id') . '/#' . get_the_ID(); ?>">
		                            <?php echo esc_attr( 'retour' ); ?>
                                </a>
                            </article>
						<?php endwhile; ?>
					<?php endif; ?>
                </div>
                <!-- END of post content -->
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
