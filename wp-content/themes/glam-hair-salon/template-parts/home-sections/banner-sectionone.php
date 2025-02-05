<?php
/**
 * Home Section 1 Template
 *
 * @package Glam Hair Salon
 */

// All section-specific code goes here...

$glam_hair_salon_section_one = get_theme_mod('glam_hair_salon_section_banner');
if ('Disable' == $glam_hair_salon_section_one) {
    return;
}
?>

<section id="banner-section-first">
    <div class="main-banner-main">
        <?php if (get_theme_mod('glam_hair_salon_section_bannerimage_section') != '') : ?>
            <img src="<?php echo esc_url(get_theme_mod('glam_hair_salon_section_bannerimage_section')); ?>" alt="Banner Image">
            <div class="text-box">
                <h2><?php echo esc_html(get_theme_mod('glam_hair_salon_section_bannerimage_section_title')); ?></h2>
                <p><?php echo esc_html(get_theme_mod('glam_hair_salon_section_bannerimage_section_text')); ?></p>

                <?php if (get_theme_mod('glam_hair_salon_banner_btn_text') != '') : ?>
                    <div class="theme-btn">
                        <a href="<?php echo esc_url(get_theme_mod('glam_hair_salon_banner_btn_text_url')); ?>"><?php echo esc_html(get_theme_mod('glam_hair_salon_banner_btn_text')); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
