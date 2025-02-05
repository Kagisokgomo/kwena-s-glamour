<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Cosmetics
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('classic_cosmetics_preloader', false) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php } ?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-cosmetics' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'classic_cosmetics_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

  <?php if ( get_theme_mod('classic_cosmetics_top_bar', true) != "") { ?>
    <div class="header-top">
      <div class="row">
        <div class="col-lg-9 col-md-8 align-self-center">
          <p class="text-center"><?php echo esc_html(get_theme_mod ('classic_cosmetics_offer_text','')); ?></p>
        </div>
        <div class="col-lg-3 col-md-4 align-self-center">
          <div class="social-icons text-center text-md-end">
            <?php if ( get_theme_mod('classic_cosmetics_fb_link') != "") { ?>
              <a title="<?php echo esc_attr('facebook', 'classic-cosmetics'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_cosmetics_fb_link')); ?>"><i class="fab fa-facebook-f"></i></a> 
            <?php } ?>
            <?php if ( get_theme_mod('classic_cosmetics_insta_link') != "") { ?> 
              <a title="<?php echo esc_attr('instagram', 'classic-cosmetics'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_cosmetics_insta_link')); ?>"><i class="fab fa-instagram"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('classic_cosmetics_twitt_link') != "") { ?>
              <a title="<?php echo esc_attr('twitter', 'classic-cosmetics'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_cosmetics_twitt_link')); ?>"><i class="fab fa-twitter"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('classic_cosmetics_youtube_link') != "") { ?> 
              <a title="<?php echo esc_attr('youtube', 'classic-cosmetics'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_cosmetics_youtube_link')); ?>"><i class="fab fa-youtube"></i></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="header <?php echo esc_attr(classic_cosmetics_sticky_menu()); ?>">
    <div class="row">
      <div class="col-lg-8 col-md-5 align-self-center">
        <div class="row">
          <div class="col-lg-3 col-md-6 align-self-center">
            <div class="logo text-center">
              <?php classic_cosmetics_the_custom_logo(); ?>
              <div class="site-branding-text">
                <?php if ( get_theme_mod('classic_cosmetics_title_enable',false) != "") { ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                  <?php else : ?>
                      <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>
                  <?php } ?>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                  <?php if ( get_theme_mod('classic_cosmetics_tagline_enable',false) != "") { ?>
                  <span class="site-description"><?php echo esc_html( $description ); ?></span>
                  <?php } ?>
                <?php endif; ?> 
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-md-6 align-self-center">
            <div class="toggle-nav">
              <button role="tab"><?php esc_html_e('Menu','classic-cosmetics'); ?></button>
            </div>
            <div id="mySidenav" class="nav sidenav">
              <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','classic-cosmetics' ); ?>">
                <ul class="mobile_nav">
                  <?php 
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu' ,
                      'items_wrap' => '%3$s',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                   ?>
                </ul>
                <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','classic-cosmetics'); ?></a>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-7 align-self-center">
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-3 align-self-center category-toggle">
                <?php if(class_exists('woocommerce')){ ?> 
                  <button class="category-btn text-center"><i class="fa fa-bars" aria-hidden="true"></i></button>
                  <div class="category-dropdown">
                    <?php
                      $args = array(
                        'number'     => get_theme_mod('classic_cosmetics_product_category_number'),
                        'orderby'    => 'title',
                        'order'      => 'ASC',
                        'hide_empty' => 0,
                        'parent'  => 0
                      );
                      $product_categories = get_terms( 'product_cat', $args );
                      $count = count($product_categories);
                      if ( $count > 0 ){
                        foreach ( $product_categories as $product_category ) {
                          $classic_cosmetics_cat_id   = $product_category->term_id;
                          $cat_link = get_category_link( $classic_cosmetics_cat_id );
                          if ($product_category->category_parent == 0) { ?>
                        <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                        <?php
                      }
                        echo esc_html( $product_category->name ); ?></a></li>
                        <?php
                        }
                      }
                    ?>
                  </div>
                <?php }?>
              </div>
              <div class="col-lg-3 col-md-3 col-3 align-self-center">
                <div class="search-box text-center">
                  <?php if(get_theme_mod('classic_cosmetics_search_option',true) != ''){ ?>
                    <button type="button" class="search-open"><i class="fas fa-search"></i></button>
                  <?php }?>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-3 align-self-center">
                <?php if(class_exists('woocommerce')){ ?> 
                  <div class="product-account text-center">
                    <?php if ( is_user_logged_in() ) { ?>
                      <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','classic-cosmetics'); ?>"><i class="far fa-user"></i></a>
                    <?php } 
                    else { ?>
                      <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','classic-cosmetics'); ?>"><i class="fas fa-user"></i></a>
                    <?php } ?>
                  </div>
                <?php }?>  
              </div>
              <div class="col-lg-3 col-md-3 col-3 align-self-center">
                <?php if(class_exists('woocommerce')){ ?> 
                  <div class="product-cart text-center position-relative">
                    <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','classic-cosmetics' ); ?>"><i class="fas fa-shopping-bag"></i></a>
                    <?php 
                    $cart_count = WC()->cart->get_cart_contents_count();
                    if($cart_count > 0): ?>
                        <span class="cart-count"><?php echo $cart_count; ?></span>
                    <?php endif; ?>
                  </div>
                <?php }?>
            </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="info-box text-center text-md-end">
              <?php if ( get_theme_mod('classic_cosmetics_phone_number') != "") { ?>
                <a class="phn" href="tel:<?php echo esc_url( get_theme_mod('classic_cosmetics_phone_number','' )); ?>"><i class="fas fa-phone pe-2"></i><?php echo esc_html(get_theme_mod ('classic_cosmetics_phone_number','')); ?></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="search-outer">
          <div class="serach_inner w-100 h-100">
            <?php get_search_form(); ?>
          </div>
          <button type="button" class="search-close"><span>X</span></button>
        </div>
      </div>
    </div>
  </div>  
