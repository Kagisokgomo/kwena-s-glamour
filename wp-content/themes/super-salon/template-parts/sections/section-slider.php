<div class="<?php if(esc_attr(get_theme_mod('slider_section_width','Full Width')) == 'Full Width'){ ?> <?php } elseif(esc_attr(get_theme_mod('slider_section_width','Full Width')) == 'Box Width'){ ?> container <?php }?>">
<section id="slider-section" class="slider-area home-slider">
	<link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">
  <!-- start of hero -->
  <section class="hero-slider hero-style">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php for($p=1; $p<6; $p++) { ?>
        <?php if( get_theme_mod('slider'.$p,false)) { ?>
        <?php $querycolumns = new WP_query('page_id='.get_theme_mod('slider'.$p,true)); ?>
        <?php while( $querycolumns->have_posts() ) : $querycolumns->the_post(); 
          $image = wp_get_attachment_image_src(get_post_thumbnail_id() , true); ?>
        <?php 
          if(has_post_thumbnail()){
            $img = esc_url($image[0]);
          }
          if(empty($image)){
            $img = get_template_directory_uri().'/assets/images/default.png';
          }

        ?>


        <div class="swiper-slide">
          <div class="slide-inner slide-bg-image">
              <div class="threebox box<?php echo esc_attr( $p ) ?> <?php if($p % 3 == 0) { echo "last_column"; } ?>">    
                <div class="sliderimg">

                  <div class="img-slide-responsive" style="position: absolute; display: block; visibility: visible; z-index: 5; transform: matrix(1, 0, 0, 1, 0, 0);">
                    <div class="tp-loop-wrap rs-wave" style="position: absolute; display: block; min-height: 486px; min-width: 1192px; transform: matrix(1, 0, 0, 1, 0, 0);">
                      <div class="tp-mask-wrap" style="position: absolute; display: block; overflow: visible;">             <?php 
                        if(has_post_thumbnail()){
                          $total_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');  
                          echo '<img alt="'. esc_html(get_the_title()) .'" class="slide-img-curve wow rotateInUpLeft" width="988" height="731" style="width: 1192px; height: 650px; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 11px;" src="'.esc_url($total_slider_image[0]).'">';
                        }?>   
                      
                      </div>
                    </div>
                  </div> 
                <!--   <img  src="<?php echo $img; ?>" alt="<?php the_title(); ?>"> -->
                </div>





                <div class="slider-inner-box">
                    <div class="container">
                        <div data-swiper-parallax="300" class="slide-title">
                          <h2><?php the_title(); ?></h2>   
                        </div>    
                        <div data-swiper-parallax="400" class="slide-text">
                          <p><?php the_excerpt(); ?></p>
                        </div>
                        <div data-swiper-parallax="500" class="slide-btns">
                          <ul>
                            <li><a class="ReadMore" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Book Now','super-salon'); ?></a></li>
                            <li><a class="ReadMore" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Contact Us','super-salon'); ?></a></li>
                         </ul>
                        </div>
                    </div>
                </div>
              </div>          
          </div>
        </div>
        <?php endwhile;
           wp_reset_postdata(); ?>
        <?php } } ?>
        <div class="clear"></div> 

      </div>
       <!-- swipper controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>



  </section>
  <!-- end of hero slider -->
</section>
</div>

