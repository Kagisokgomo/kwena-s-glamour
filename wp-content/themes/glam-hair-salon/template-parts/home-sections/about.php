<?php
/**
 * Home Section About Template
 *
 * @package Glam Hair Salon
 */

// All section-specific code goes here...

$glam_hair_salon_section_one = get_theme_mod('glam_hair_salon_about_enable');
if ('Disable' == $glam_hair_salon_section_one) {
    return;
} 
?>

<section id="about" class="about-section">
    <div class="container">
        <div class="section-heading-main">
            <?php if (get_theme_mod('glam_hair_salon_about_title', true) != '') : ?>
                <h3><?php echo esc_html(get_theme_mod('glam_hair_salon_about_title')); ?></h3>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-left">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about-box-img">
                                <?php if (get_theme_mod('glam_hair_salon_aboutimage1_section') != '') : ?>
                                    <img src="<?php echo esc_url(get_theme_mod('glam_hair_salon_aboutimage1_section')); ?>" alt="About Image 1">
                                <?php endif; ?>
                            </div>
                            <div class="about-box-img2">
                                <?php if (get_theme_mod('glam_hair_salon_aboutimage2_section') != '') : ?>
                                    <img src="<?php echo esc_url(get_theme_mod('glam_hair_salon_aboutimage2_section')); ?>" alt="About Image 2">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-right">
                    <h3><?php echo esc_html(get_theme_mod('glam_hair_salon_about_name')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('glam_hair_salon_about_title_second')); ?></p>
                    <p><?php echo esc_html(get_theme_mod('glam_hair_salon_about_para')); ?></p>
                    <?php if (get_theme_mod('glam_hair_salon_about_btn_text') != '') : ?>
                        <div class="theme-btn">
                            <a href="<?php echo esc_url(get_theme_mod('glam_hair_salon_about_btn_text_url')); ?>"><?php echo esc_html(get_theme_mod('glam_hair_salon_about_btn_text')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
