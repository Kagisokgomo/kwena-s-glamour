<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cosmetics Salon
 */
?>

<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
    		<?php
		        $cosmetics_salon_count = 0;
		        
		        if ( is_active_sidebar( 'cosmetics-salon-footer1' ) ) {
		            $cosmetics_salon_count++;
		        }
		        if ( is_active_sidebar( 'cosmetics-salon-footer2' ) ) {
		            $cosmetics_salon_count++;
		        }
		        if ( is_active_sidebar( 'cosmetics-salon-footer3' ) ) {
		            $cosmetics_salon_count++;
		        }
		        // $cosmetics_salon_count == 0 none
		        if ( $cosmetics_salon_count == 1 ) {
		            $cosmetics_salon_colmd = 'col-md-12 col-sm-12';
		        } elseif ( $cosmetics_salon_count == 2 ) {
		            $cosmetics_salon_colmd = 'col-md-6 col-sm-6';
		        } else {
		            $cosmetics_salon_colmd = 'col-md-4 col-sm-4';
		        }
      		?>
	      	<div class="row">
		        <div class="<?php if ( !is_active_sidebar( 'cosmetics-salon-footer1' ) ){ echo "footer_hide"; }else{ echo "$cosmetics_salon_colmd"; } ?> col-xs-12 footer-block">
		          <?php dynamic_sidebar('cosmetics-salon-footer1'); ?>
		        </div>
		        <div class="<?php if ( is_active_sidebar( 'cosmetics-salon-footer2' ) ){ echo "$cosmetics_salon_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 footer-block">
		            <?php dynamic_sidebar('cosmetics-salon-footer2'); ?>
		        </div>
		        <div class="<?php if ( is_active_sidebar( 'cosmetics-salon-footer3' ) ){ echo "$cosmetics_salon_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 col-xs-12 footer-block">
		            <?php dynamic_sidebar('cosmetics-salon-footer3'); ?>
		        </div>
	      	</div>
		</div>
    	<?php if (get_theme_mod('cosmetics_salon_show_hide_copyright', true)) {?>
	        <div class="site-info">
	            <div class="footer-menu-left">
	            	<?php  if( ! get_theme_mod('cosmetics_salon_footer_text_setting') ){ ?>
					    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/', 'cosmetics-salon' ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'cosmetics-salon' ), 'WordPress' );
							?>
					    </a>
					    <span class="sep me-1"> | </span>

					    <span>
			          	 	<a target="_blank" href="<?php echo esc_url( 'https://www.themagnifico.net/products/free-salon-wordpress-theme/'); ?>">
				              	<?php
				                /* translators: 1: Theme name,  */
				                printf( esc_html__( ' %1$s ', 'cosmetics-salon' ),'Cosmetics WordPress Theme' );
				              	?>
			          		</a>
				          	<?php
				              /* translators: 1: Theme author. */
				              printf( esc_html__( 'by %1$s.', 'cosmetics-salon' ),'TheMagnifico'  );
				            ?>
	        			</span>
					<?php }?>
					<?php echo esc_html(get_theme_mod('cosmetics_salon_footer_text_setting')); ?>
	            </div>
	        </div>
		<?php } ?>
	    <?php if(get_theme_mod('cosmetics_salon_scroll_hide','')){ ?>
	    	<a id="button"><?php esc_html_e('TOP','cosmetics-salon'); ?></a>
	    <?php } ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>