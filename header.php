<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <!-- Add external fonts below (GoogleFonts / Typekit) -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'no-outline' ); ?>>
<?php wp_body_open(); ?>

<!-- <div class="preloader hide-for-medium">
	<div class="preloader__icon"></div>
</div> -->

<?php $header_logo = get_field( 'logo_animation', 'options' ); ?>

<?php if ( $header_logo ): ?>
<!--    <div class="wrapper-logo">-->
<!--		--><?php //display_svg( $header_logo, $class = 'image__logo', $size = 'medium' ); ?>
<!--    </div>-->
<?php endif; ?>
<!-- BEGIN of header -->
<header class="header">
    <div class="grid-x grid-margin-x">
        <div class="large-2 small-12 cell">
            <div class="logo medium-text-left">
                <h1><?php show_custom_logo(); ?><span class="css-clip"><?php echo get_bloginfo( 'name' ); ?></span></h1>
            </div>
        </div>
        <div class="large-10 small-12 cell">
			<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
                <div class="title-bar hide-for-large" data-responsive-toggle="main-menu" data-hide-for="large">
                    <button class="menu-icon" type="button" data-toggle aria-label="Menu" aria-controls="main-menu">
                        <span></span>
                    </button>
                </div>
                <nav class="top-bar" id="main-menu">
					<?php wp_nav_menu( array(
						'theme_location' => 'header-menu',
						'menu_class'     => 'menu header-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
						'walker'         => new Foundation_Navigation()
					) ); ?>
                    <div class="menu-buttons">
						<?php
                        $header_phone = get_field( 'phone_button', 'options' );
                        $appointment_button = get_field( 'appointment_button', 'options' );
                        ?>
						<?php if ( $header_phone ): ?>
                            <a class="ca-phone" href="<?php echo $header_phone['url'] ?>">
								<?php echo $header_phone['title'] ?>
                            </a>
						<?php endif; ?>
	                    <?php if ( $appointment_button ): ?>
                            <a class="ca-appointment blue-button" href="<?php echo $appointment_button['url'] ?>">
			                    <?php echo $appointment_button['title'] ?>
                            </a>
	                    <?php endif; ?>
                    </div>
                </nav>
			<?php endif; ?>
        </div>
    </div>
</header>
<!-- END of header -->
