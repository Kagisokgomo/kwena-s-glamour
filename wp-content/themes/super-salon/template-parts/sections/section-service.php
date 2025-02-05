<section id="service-section" class="services-area home-services">
	<div class="<?php if(esc_attr(get_theme_mod('Service_section_width','Box Width')) == 'Full Width'){ ?> <?php } elseif(esc_attr(get_theme_mod('Service_section_width','Box Width')) == 'Box Width'){ ?> container <?php }?>">
		<div class="row justify-content-center text-center">
			<div class="col-md-10 col-lg-8">
				<div class="header-section">
					<h2 class="title"><?php esc_html_e( 'Our Services', 'super-salon' ); ?></h2>
					<p class="text"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna .', 'super-salon' ); ?></p>
				</div>
			</div>
		</div>
		<div class="row">

			<?php for($p=1; $p<7; $p++) { ?>
	        <?php if( get_theme_mod('Service'.$p,false)) { ?>
	        <?php $querycolumns = new WP_query('page_id='.get_theme_mod('Service'.$p,true)); ?>
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

			<!-- Start Single Service -->
			<div class="col-md-6 col-lg-3 box-space">


				<div class="threebox box<?php echo esc_attr( $p ) ?> <?php if($p % 4 == 0) { echo "last_column"; } ?>">       

				<div class="single-service">
					<div class="part-1">
						<div class="imageBox">
	                		<a href="<?php echo esc_url( get_permalink() ); ?>"><img  src="<?php echo $img; ?>" alt="<?php the_title(); ?>"></a>	
	                	</div>
	                	<div class="img-shape"></div>		
					</div>
					<div class="part-2">
						<h3 class="title"><?php the_title(); ?></h3>
						<p class="description"><?php the_excerpt(); ?></p>
					</div>
				</div>

              	</div>


			</div>
			<!-- / End Single Service -->

			<?php endwhile;
           wp_reset_postdata(); ?>
        <?php } } ?>
        <div class="clear"></div> 
			
		</div>
	</div>
</section>
