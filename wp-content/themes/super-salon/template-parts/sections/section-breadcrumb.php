<?php 
	$supersalon_hs_breadcrumb					= get_theme_mod('hs_breadcrumb','1');
	$supersalon_breadcrumb_bg_img				= get_theme_mod('breadcrumb_bg_img'); 
	$supersalon_breadcrumb_back_attach			= get_theme_mod('breadcrumb_back_attach','scroll');
	
if($supersalon_hs_breadcrumb == '1') {	
?>	

<?php $supersalon_breadcrumb_bg_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID));?>

	<!-- Slider Area -->   
	<?php if(!empty($supersalon_breadcrumb_bg_img)): ?>
    <section class="slider-area breadcrumb-section" style="background: url(<?php echo esc_url($supersalon_breadcrumb_bg_img); ?>) center center <?php echo esc_attr($supersalon_breadcrumb_back_attach); ?>; background-repeat: no-repeat;
    background-size: cover;">
	<?php else: ?>
	 <section class="slider-area breadcrumb-section">
	 <?php endif; ?>
        <div class="container">
            <div class="about-banner-text">   
            	<ol class="breadcrumb-list">
					<?php supersalon_breadcrumbs(); ?>
				</ol>
				<h1><?php supersalon_breadcrumb_title(); ?></h1>					
            </div>
        </div> 
    </section>
    <!-- End Slider Area -->
<?php }else{  ?>
	<section style="padding: 30px 0 30px;"></section>
<?php } ?>	