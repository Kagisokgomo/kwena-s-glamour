<?php
/**
 * Home Section Features Template
 *
 * @package Glam Hair Salon
 */

// All section-specific code goes here...

$glam_hair_salon_section_one = get_theme_mod('glam_hair_salon_features_enable');
if ('Disable' == $glam_hair_salon_section_one) {
    return;
}
?>

<section id="features" class="features-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="feature-box">
                    <div class="border-class">
                        <div class="main-box">
                            <h3><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_name1')); ?></h3>
                            <h4><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_title_second1')); ?></h4>
                            <p><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_para1')); ?></p>
                            <a href="<?php echo esc_url(get_theme_mod('glam_hair_salon_feature_link1')); ?>"><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_link_title1')); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <div class="feature-box middle-box">
                    <div class="border-class">
                        <div class="main-box">
                            <h3><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_name2')); ?></h3>
                            <h4><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_title_second2')); ?></h4>
                            <p><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_para2')); ?></p>
                            <a href="<?php echo esc_url(get_theme_mod('glam_hair_salon_feature_link2')); ?>"><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_link_title2')); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <div class="feature-box">
                    <div class="border-class">
                        <div class="main-box">
                            <h3><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_name3')); ?></h3>
                            <h4><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_title_second3')); ?></h4>
                            <p><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_para3')); ?></p>
                            <a href="<?php echo esc_url(get_theme_mod('glam_hair_salon_feature_link3')); ?>"><?php echo esc_html(get_theme_mod('glam_hair_salon_feature_link_title3')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
