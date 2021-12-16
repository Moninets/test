<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer <?php echo is_front_page() ? 'home-footer' : '' ?>">
    <div class="ca-wrapper">
        <div class="grid-x">
            <div class="cell large-12 xlarge-4">
                <div class="footer-menu menu-left">
	                <?php
	                if ( has_nav_menu( 'footer-left' ) ) {
		                wp_nav_menu( array( 'theme_location' => 'footer-left', 'menu_class' => 'footer-left', 'depth' => 1 ) );
	                }
	                ?>
                </div>
                <div class="ca__copyright">
					<?php if ( $copyright = get_field( 'copyright', 'options' ) ): ?>
                    <div class="footer__copy">
						<?php echo $copyright; ?>
                    </div>
                </div>
            </div>
            <div class="cell large-12 xlarge-4">
                <div class="footer__logo">
					<?php if ( $footer_logo = get_field( 'footer_logo', 'options' ) ):
						echo wp_get_attachment_image( $footer_logo['id'], 'medium' );
					else:
						show_custom_logo();
					endif; ?>
                </div>
            </div>
            <div class="cell large-12 xlarge-4">
                <div class="footer-menu menu-right">
		            <?php
		            if ( has_nav_menu( 'footer-right' ) ) {
			            wp_nav_menu( array( 'theme_location' => 'footer-right', 'menu_class' => 'footer-right', 'depth' => 1 ) );
		            }
		            ?>
                </div>
				<?php $info = get_field('info','options'); ?>
                <div class="ca__info">
					<?php echo $info; ?>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
