<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Cosmetics
 */

get_header(); ?>

<div id="content">
  <?php
    $classic_cosmetics_hidcatslide = get_theme_mod('classic_cosmetics_hide_categorysec', true);
    $classic_cosmetics_slidersection = get_theme_mod('classic_cosmetics_slidersection');

    if ($classic_cosmetics_hidcatslide && $classic_cosmetics_slidersection) { ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('classic_cosmetics_slidersection',false) ) { ?>
          <?php $classic_cosmetics_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('classic_cosmetics_slidersection',false)));
            while( $classic_cosmetics_queryvar->have_posts() ) : $classic_cosmetics_queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');
                  } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt=""/>
                <?php } ?>
                <div class="slider-box">
                  <?php if(get_theme_mod('classic_cosmetics_slider_top_text') != ''){ ?>
                    <p class="slider-text mb-lg-2 mb-0"><?php echo esc_html(get_theme_mod('classic_cosmetics_slider_top_text')); ?></p>
                  <?php }?>
                  <h1 class="my-2"><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h1>
                  <div class="shop-now mt-4">
                    <?php 
                    $classic_cosmetics_button_text = get_theme_mod('classic_cosmetics_button_text', 'Browse More');
                    $classic_cosmetics_button_link_slider = get_theme_mod('classic_cosmetics_button_link_slider', ''); 
                    if (empty($classic_cosmetics_button_link_slider)) {
                        $classic_cosmetics_button_link_slider = get_permalink();
                    }
                    if ($classic_cosmetics_button_text || !empty($classic_cosmetics_button_link_slider)) { ?>
                      <a href="<?php echo esc_url($classic_cosmetics_button_link_slider); ?>" class="button redmor">
                        <?php echo esc_html($classic_cosmetics_button_text); ?>
                          <span class="screen-reader-text"><?php echo esc_html($classic_cosmetics_button_text); ?></span>
                      </a>
                    <?php } ?>
                  </div>
                </div>
                <div class="overlayer"></div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <?php
    $classic_cosmetics_product_selling = get_theme_mod('classic_cosmetics_product_selling',true);
    $classic_cosmetics_hot_products_cat = get_theme_mod('classic_cosmetics_hot_products_cat');
    if( $classic_cosmetics_product_selling && $classic_cosmetics_hot_products_cat){
  ?>
    <section id="trending_product" class="my-5 mx-md-0 mx-3">
      <div class="container">
        <?php if ( get_theme_mod('classic_cosmetics_product_title') != "") { ?>
          <h2 class="text-center mb-4"><?php echo esc_html(get_theme_mod('classic_cosmetics_product_title','')); ?></h2>
        <?php }?>
        <div class="row">
          <?php if(class_exists('woocommerce')){
            $args = array(
              'post_type' => 'product',
              'posts_per_page' => 50,
              'product_cat' => get_theme_mod('classic_cosmetics_hot_products_cat'),
              'order' => 'ASC'
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product;
              $classic_cosmetics_regular_price = $product->get_regular_price();
              $classic_cosmetics_sale_price = $product->get_sale_price();
              $classic_cosmetics_percentage_discount = 0;

              if ($classic_cosmetics_regular_price && $classic_cosmetics_sale_price) {
                $classic_cosmetics_percentage_discount = -1 * round( ( ($classic_cosmetics_regular_price - $classic_cosmetics_sale_price) / $classic_cosmetics_regular_price ) * 100 ); 
              }
              ?>
                <div class="page4box col-lg-3 col-md-3 mb-5">
                  <div class="product-image">
                    <?php
                      if (has_post_thumbnail($loop->post->ID)) {
                          echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                      } else {
                          echo '<img src="' . esc_url(wc_placeholder_img_src()) . '" alt="" />';
                      }
                    ?>
                    <?php if($classic_cosmetics_percentage_discount != 0) { ?>
                      <div class="discount-badge"><?php echo $classic_cosmetics_percentage_discount; ?>%</div>
                    <?php } ?>
                    <div class="wishlist-icon">
                      <?php
                        if (class_exists('YITH_WCWL')) {
                          if (YITH_WCWL()->is_product_in_wishlist($product->get_id())) {
                            echo '<i class="far fa-heart"></i>'; // Font Awesome heart icon
                          }
                        }
                      ?>
                    </div>
                    <div class="box-content text-center">
                      <h3 class="product-text mt-4 mb-2">
                        <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h3>
                      <div class="text-center">
                        <?php if( $product->is_type( 'simple' ) ){ ?>
                          <div class="rating-container mb-3">
                            <?php woocommerce_template_loop_rating( $loop->post, $product ); ?>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="price mb-2"><?php echo $product->get_price_html(); ?></div>
                      <div class="addcartbtn">
                        <?php
                          if( $product->is_type( 'simple' ) ){
                            // Simple "Add to Cart" button
                            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                              sprintf( '<a href="%s" data-quantity="%s" class="button product_type_simple add_to_cart_button">%s</a>',
                                esc_url( $product->add_to_cart_url() ),
                                esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                                esc_html__( 'Add to Cart', 'classic-cosmetics' )
                              ),
                            $product );
                            // View Cart button (hidden by default)
                            echo sprintf( '<a href="%s" class="button wc-forward view-cart-button" style="display:none;">%s</a>',
                                esc_url( wc_get_cart_url() ),
                                esc_html__( 'View Cart', 'classic-cosmetics' )
                            );
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
            <?php endwhile; 
            wp_reset_postdata();
          }?>
        </div>
      </div>
    </section>
  <?php } ?>
</div>

<?php get_footer(); ?>