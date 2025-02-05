<?php
//about theme info
add_action( 'admin_menu', 'glam_hair_salon_gettingstarted_page' );
function glam_hair_salon_gettingstarted_page() {      
    add_theme_page( esc_html__('Glam Hair Salon', 'glam-hair-salon'), esc_html__('All About Glam Hair Salon', 'glam-hair-salon'), 'edit_theme_options', 'glam_hair_salon_mainpage', 'glam_hair_salon_main_content');   
}


function glam_hair_salon_notice() {
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice getting_started">
        <div class="notice-content">
            <p><?php esc_html_e( 'Thanks For Choosing CA WP Themes', 'glam-hair-salon' ); ?></p>
            <h2><?php esc_html_e( 'Thanks for installing Glam Hair Salon Free Theme!', 'glam-hair-salon' ) ?> </h2>
            <p><?php esc_html_e( "Please Click on the link below to Check The Full Theme Edit Documentation", 'glam-hair-salon' ) ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( GLAM_HAIR_SALON_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'glam-hair-salon' ); ?></a>
            </div>
            <h2><?php esc_html_e( 'Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'glam-hair-salon' ) ?> </h2>
            <h2><?php esc_html_e( 'Check The Pro Version: Glam Hair Salon Premium for Amazing Features for Unlimited Site', 'glam-hair-salon' ); ?></h2>
            <div class="info-link">
                <a href="<?php echo esc_url( GLAM_HAIR_SALON_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'glam-hair-salon' ); ?></a>
            </div>
            <div class="info-link">
                <a href="<?php echo esc_url( GLAM_HAIR_SALON_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Premium Demo', 'glam-hair-salon' ); ?></a>
            </div>
        </div>
    </div>
    <?php }
}

add_action( 'admin_notices', 'glam_hair_salon_notice' );





// Add a Custom CSS file to WP Admin Area
function glam_hair_salon_admin_page_theme_style() {
   wp_enqueue_style('glam-hair-salon-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstarted/getstarted.css');
}
add_action('admin_enqueue_scripts', 'glam_hair_salon_admin_page_theme_style');

//About Theme Info
function glam_hair_salon_main_content() { 

    //custom function about theme customizer

    $return = add_query_arg( array()) ;
    $theme = wp_get_theme( 'glam-hair-salon' );
?>

<div class="admin-main-box">
    <div class="admin-left-box">
        <h2><?php esc_html_e( 'Welcome to Glam Hair Salon Theme', 'glam-hair-salon' ); ?> <span class="version"><?php $theme_info = wp_get_theme();
echo $theme_info->get( 'Version' );?></span></h2>
        <p><?php esc_html_e('CA WP Themes is a premium WordPress theme development company that provides high-quality themes for various types of websites. They specialize in creating themes for businesses, eCommerce, portfolios, blogs, and many more. Their themes are easy to use and customize, making them perfect for those who want to create a professional-looking website without any coding skills.','glam-hair-salon'); ?></p>
        <p><?php esc_html_e('CA WP Themes offers a wide range of themes that are designed to be responsive and compatible with the latest versions of WordPress. Our themes are also SEO optimized, ensuring that your website will rank well on search engines. They come with a variety of features such as customizable widgets, social media integration, and custom page templates.','glam-hair-salon'); ?></p>
        <p><?php esc_html_e('One of the unique things about CA WP Themes is their focus on providing excellent customer support. They have a dedicated team of support staff who are available 24/7 to help customers with any issues they may encounter. Their support team is knowledgeable and friendly, ensuring that customers receive the best possible experience.','glam-hair-salon'); ?></p>
    </div>
    <div class="admin-right-box">
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Buy Glam Hair Salon Premium Theme','glam-hair-salon'); ?></h4>
            <p><?php esc_html_e('Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'glam-hair-salon'); ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( GLAM_HAIR_SALON_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'glam-hair-salon' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Premium Theme Demo','glam-hair-salon'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( GLAM_HAIR_SALON_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'glam-hair-salon' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Need Support? / Contact Us','glam-hair-salon'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( GLAM_HAIR_SALON_PRO_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Contact Us', 'glam-hair-salon' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Documentation','glam-hair-salon'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( GLAM_HAIR_SALON_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Docs', 'glam-hair-salon' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Free Theme','glam-hair-salon'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( GLAM_HAIR_SALON_FREE_URL ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'glam-hair-salon' ); ?></a>
            </div>
        </div>

    </div>
</div>

<?php } ?>