<?php
/**
 * Home Banner2 Template
 *
 * @package Glam Hair Salon
 */

// All section-specific code goes here...

$glam_hair_salon_section_one = get_theme_mod('glam_hair_salon_section_enable_banner2');
if ('Disable' == $glam_hair_salon_section_one) {
    return;
}
?>

<section id="banner-section-second">
    <div class="main-banner-main">
        <?php if (get_theme_mod('glam_hair_salon_section_bannerimage_section2') != '') : ?>
            <img src="<?php echo esc_url(get_theme_mod('glam_hair_salon_section_bannerimage_section2')); ?>" alt="Banner Image">
            <div class="text-box">
                <h2><?php echo esc_html(get_theme_mod('glam_hair_salon_section_bannerimage_section_title2')); ?></h2>
                <p><?php echo esc_html(get_theme_mod('glam_hair_salon_section_bannerimage_section_text2')); ?></p>

                <?php if (get_theme_mod('glam_hair_salon_banner_btn_text2') != '') : ?>
                    <div class="theme-btn">
                        <a href="<?php echo esc_url(get_theme_mod('glam_hair_salon_banner_btn_text_url2')); ?>"><?php echo esc_html(get_theme_mod('glam_hair_salon_banner_btn_text2')); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
