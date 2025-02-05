<?php
/**
 * Displays main header
 *
 * @package Cosmetics Salon
 */
?>

<div class="main-header text-center py-2">
    <div class="container-fluid px-5">
        <div class="row nav-box">
            <div class="col-xl-5 col-lg-4 col-md-1 col-sm-6 col-12 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-12 align-self-center">
                <div class="logo-box">
                    <div class="navbar-brand ">
                        <?php if ( has_custom_logo() ) : ?>
                            <div class="site-logo"><?php the_custom_logo(); ?></div>
                        <?php endif; ?>
                        <?php $cosmetics_salon_blog_info = get_bloginfo( 'name' ); ?>
                            <?php if ( ! empty( $cosmetics_salon_blog_info ) ) : ?>
                                <?php if ( is_front_page() && is_home() ) : ?>
                                    <?php if( get_theme_mod('cosmetics_salon_logo_title_text',true) != ''){ ?>
                                        <h1 class="site-title pt-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    <?php } ?>
                                <?php else : ?>
                                    <?php if( get_theme_mod('cosmetics_salon_logo_title_text',true) != ''){ ?>
                                        <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                    <?php } ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php
                                $cosmetics_salon_description = get_bloginfo( 'description', 'display' );
                                if ( $cosmetics_salon_description || is_customize_preview() ) :
                            ?>
                            <?php if( get_theme_mod('cosmetics_salon_theme_description',false) != ''){ ?>
                                <p class="site-description pb-2"><?php echo esc_html($cosmetics_salon_description); ?></p>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-12 col-12 align-self-center header-right-box">
                <span class="cart_no">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','cosmetics-salon' ); ?>"><i class="fas fa-shopping-bag"></i></a>
                    <?php }?>
                </span>
                <?php if (get_theme_mod('cosmetics_salon_header_search_setting', false) != '') { ?>
                    <span class="head-search">
                        <span class="header-search-wrapper">
                            <span class="search-main">
                                <i class="fa fa-search"></i>
                            </span>
                            <div class="search-form-main clearfix">
                                <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="hidden" name="post_type" value="product"> <!-- Set post type to product for WooCommerce products -->
                                    <label>
                                        <input type="search" class="search-field form-control" placeholder="Search for products..." value="<?php echo get_search_query(); ?>" name="s">
                                    </label>
                                    <input type="submit" class="search-submit btn btn-primary mt-3" value="Search">
                                </form>
                            </div>
                        </span>
                    </span>
                <?php } ?>
                <?php if ( get_theme_mod('cosmetics_salon_topbar_phone_text') != "" ) {?>
                    <div class="phone-box">
                        <p class="phone-number m-0"><?php echo esc_html(get_theme_mod('cosmetics_salon_topbar_phone_text')); ?></p>  
                    </div>
                <?php }?>
                <?php if(get_theme_mod('cosmetics_salon_header_button_url') != '' || get_theme_mod('cosmetics_salon_header_button_text') != ''){ ?>
                    <div class="head-btn">
                        <a href="<?php echo esc_url(get_theme_mod('cosmetics_salon_header_button_url')); ?>"><?php echo esc_html(get_theme_mod('cosmetics_salon_header_button_text')); ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
