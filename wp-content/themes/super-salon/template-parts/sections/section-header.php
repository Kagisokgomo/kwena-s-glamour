<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>
<!-- Header Area -->
    <header class="main-header <?php echo esc_attr(supersalon_sticky_menu()); ?>">
		<?php if ( function_exists( 'peccular_companion_activated' ) ) { ?>
			<button class="top-header-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".top-header"><i class="fa fa-ellipsis-v"></i></button>
		<?php } ?>	


			<?php 
				$topheader = get_theme_mod('topheader','Because being beautiful should never harm you.');
				$topheader_phn = get_theme_mod('topheader_phn','+386 40 111 5555');
				$topheader_phnicon = get_theme_mod('topheader_phnicon','fa fa-phone');
				$topheader_email = get_theme_mod('topheader_email','info@yourdomain.com');
				$topheader_mailicon = get_theme_mod('topheader_mailicon','fa fa-envelope-o');

				$topheader_icon1 = get_theme_mod('topheader_icon1','fa fa-facebook');
				$topheader_icon1link = get_theme_mod('topheader_icon1link','#');
				$topheader_icon2 = get_theme_mod('topheader_icon2','fa fa-instagram');
				$topheader_icon2link = get_theme_mod('topheader_icon2link','#');
				$topheader_icon3 = get_theme_mod('topheader_icon3','fa fa-twitter');
				$topheader_icon3link = get_theme_mod('topheader_icon3link','#');
				$topheader_icon4 = get_theme_mod('topheader_icon4','fa fa-google-plus');
				$topheader_icon4link = get_theme_mod('topheader_icon4link','#');

			?>
		
			<!-- top header -->
			<div class="topheader">
				<div class="container"> 
					<div class="row">
						<div class="col-md-4 col-lg-4 col-sm-6 border-right space">
							<p><?php echo apply_filters('supersalon_topheader', $topheader); ?></p>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-6 border-right space">
							<div class="row">
								<div class="col-md-2 col-lg-2 col-sm-2 col-space-icon">
									<i class="<?php echo apply_filters('supersalon_topheader', $topheader_phnicon); ?>" aria-hidden="true"></i>
								</div>
								<div class="col-md-10 col-lg-10 col-sm-10 padding-0 col-space-content">
									<p class="supersalon-phone-label"><?php echo apply_filters('supersalon_topheader', $topheader_phn); ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-6 border-right space">
							<div class="row">
								<div class="col-md-2 col-lg-2 col-sm-2 col-space-icon">
									<i class="<?php echo apply_filters('supersalon_topheader', $topheader_mailicon); ?>" aria-hidden="true"></i>
								</div>
								<div class="col-md-10 col-lg-10 col-sm-10 padding-0 col-space-content">
									<p class="supersalon-email-label"><?php echo apply_filters('supersalon_topheader', $topheader_email); ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-lg-2 col-sm-6 socials space">
							<a href="<?php echo apply_filters('supersalon_topheader', $topheader_icon1link); ?>" target="_blank"><i class="<?php echo apply_filters('supersalon_topheader', $topheader_icon1); ?>" aria-hidden="true"></i></a>
							<a href="<?php echo apply_filters('supersalon_topheader', $topheader_icon2link); ?>" target="_blank"><i class="<?php echo apply_filters('supersalon_topheader', $topheader_icon2); ?>" aria-hidden="true"></i></a>
							<a href="<?php echo apply_filters('supersalon_topheader', $topheader_icon3link); ?>" target="_blank"><i class="<?php echo apply_filters('supersalon_topheader', $topheader_icon3); ?>" aria-hidden="true"></i></a>
							<a href="<?php echo apply_filters('supersalon_topheader', $topheader_icon4link); ?>" target="_blank"><i class="<?php echo apply_filters('supersalon_topheader', $topheader_icon4); ?>" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>

           <!-- Header -->
            <nav class="navbar navbar-expand-lg navbaroffcanvase">
            	<div class="container">
					<div class="logo">
						<?php
						if(has_custom_logo())
							{	
								the_custom_logo();
							}
							else { 
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<h4 class="site-title">
									<?php 
										echo esc_html(bloginfo('name'));
									?>
								</h4>
							</a>	
						<?php 						
							}
						?>
						<?php
							$supersalon_site_desc = get_bloginfo( 'description');
							if ($supersalon_site_desc) : ?>
								<p class="site-description"><?php echo esc_html($supersalon_site_desc); ?></p>
						<?php endif; ?>
					</div>
					
	                <div class="navbar-menubar">
	                    <!-- Small Divice Menu-->
	                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','super-salon'); ?>"> 
	                        <i class="fa fa-bars"></i>
	                    </button>
	                    <div class="collapse navbar-collapse navbar-menu">
		                    <button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','super-salon'); ?>"> 
		                        <i class="fa fa-times"></i>
		                    </button> 
							<?php 
								wp_nav_menu( 
									array(  
										'theme_location' => 'primary_menu',
										'container'  => '',
										'container_id'    => '',
										'menu_class' => 'navbar-nav main-nav',
										'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
										'walker' => new WP_Bootstrap_Navwalker()
										 ) 
									);
							?>
	                    </div>
	                </div>
            	</div>
            </nav>
    </header>