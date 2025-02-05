<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
    <?php $cosmetics_salon_slide_pages = array();
      for ( $cosmetics_salon_count = 1; $cosmetics_salon_count <= 3; $cosmetics_salon_count++ ) {
        $cosmetics_salon_mod = intval( get_theme_mod( 'cosmetics_salon_top_slider_page' . $cosmetics_salon_count ));
        if ( 'page-none-selected' != $cosmetics_salon_mod ) {
          $cosmetics_salon_slide_pages[] = $cosmetics_salon_mod;
        }
      }
      if( !empty($cosmetics_salon_slide_pages) ) :
        $cosmetics_salon_args = array(
          'post_type' => 'page',
          'post__in' => $cosmetics_salon_slide_pages,
          'orderby' => 'post__in'
        );
        $cosmetics_salon_query = new WP_Query( $cosmetics_salon_args );
        if ( $cosmetics_salon_query->have_posts() ) :
          $i = 1;
      ?>
      <div class="owl-carousel" role="listbox">
        <?php  while ( $cosmetics_salon_query->have_posts() ) : $cosmetics_salon_query->the_post(); ?>
          <div class="slide-box">
              <?php if (has_post_thumbnail()) { ?><img class="sider-img" src="<?php the_post_thumbnail_url('full'); ?>" /><?php } else { ?><div class="slide-bg"></div> <?php } ?>
              <div class="slider-inner-box">
                <h3 class="m-0"><?php the_title(); ?></h3>
                <p class="content mt-3"><?php echo esc_html( wp_trim_words( get_the_content(), esc_attr(get_theme_mod('cosmetics_salon_slider_excerpt_length', 20)) )); ?></p>
                <div class="slide-btn mt-4">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Book Now','cosmetics-salon'); ?></a>
                </div>
              </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <?php if (get_theme_mod( 'cosmetics_salon_social_icon_setting','' )) { ?>
        <div class="social-link">
          <?php if(get_theme_mod('cosmetics_salon_facebook_url') != ''){ ?>
            <a href="<?php echo esc_url(get_theme_mod('cosmetics_salon_facebook_url','')); ?>"><span><?php echo esc_html( get_theme_mod('cosmetics_salon_facebook_icon') ); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('cosmetics_salon_twitter_url') != ''){ ?>
            <a href="<?php echo esc_url(get_theme_mod('cosmetics_salon_twitter_url','')); ?>"><span><?php echo esc_html( get_theme_mod('cosmetics_salon_twitter_icon') ); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('cosmetics_salon_intagram_url') != ''){ ?>
            <a href="<?php echo esc_url(get_theme_mod('cosmetics_salon_intagram_url','')); ?>"><spna><?php echo esc_html( get_theme_mod('cosmetics_salon_intagram_icon') ); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('cosmetics_salon_linkedin_url') != ''){ ?>
            <a href="<?php echo esc_url(get_theme_mod('cosmetics_salon_linkedin_url','')); ?>"><span><?php echo esc_html( get_theme_mod('cosmetics_salon_linkedin_icon') ); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('cosmetics_salon_pintrest_url') != ''){ ?>
            <a href="<?php echo esc_url(get_theme_mod('cosmetics_salon_pintrest_url','')); ?>"><span><?php echo esc_html( get_theme_mod('cosmetics_salon_pintrest_icon') ); ?></span></a>
          <?php }?>
        </div>
      <?php } ?>
  </section>

<?php if (get_theme_mod( 'cosmetics_salon_product_section_setting','' )) { ?>
  <section id="about-us" class="py-5">
    <div class="container">
      <div class="heading text-center">
        <?php if ( get_theme_mod('cosmetics_salon_product_section_heading') != "" ) {?>
          <h3 class="main_heading m-3"><?php echo esc_html(get_theme_mod('cosmetics_salon_product_section_heading')); ?>
          </h3>
        <?php }?>
        <?php if ( get_theme_mod('cosmetics_salon_product_section_sub_heading') != "" ) {?>
          <h4 class="mb-4"><?php echo esc_html(get_theme_mod('cosmetics_salon_product_section_sub_heading')); ?>
          </h4>
        <?php }?>
      </div>
      <div class="owl-carousel product-home-box">
        <?php
        if ( class_exists( 'WooCommerce' ) ) {
          $cosmetics_salon_args = array(
            'post_type' => 'product',
            'posts_per_page' => get_theme_mod('cosmetics_salon_home_product_per_page', 4),
            'product_cat' => get_theme_mod('cosmetics_salon_home_product'),
            'order' => 'ASC'
          );
          $loop = new WP_Query( $cosmetics_salon_args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="products-box">
              <div class="product-image">
                <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"> <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?></a>
                <span class="cart-btn"><?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?></span>
              </div>
              <div class="product-content pt-3">
                <h3 class="mb-2"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                <div class="rating-box">
                  <span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> m-0"><?php echo $product->get_price_html(); ?></span>
                  <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>