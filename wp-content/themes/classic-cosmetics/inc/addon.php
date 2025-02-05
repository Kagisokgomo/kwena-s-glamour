<?php
/*
 * @package Classic Cosmetics
 */

function classic_cosmetics_admin_enqueue_scripts() {
    wp_enqueue_style( 'classic-cosmetics-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'classic_cosmetics_admin_enqueue_scripts' );

add_action('after_switch_theme', 'classic_cosmetics_options');

function classic_cosmetics_options() {
    global $pagenow;
    if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
        wp_redirect( admin_url( 'themes.php?page=classic-cosmetics-demo' ) );
        exit;
    }
}

function classic_cosmetics_theme_info_menu_link() {

    $classic_cosmetics_theme = wp_get_theme();
    add_theme_page(
        sprintf( esc_html__( 'Welcome to %1$s %2$s', 'classic-cosmetics' ), $classic_cosmetics_theme->get( 'Name' ), $classic_cosmetics_theme->get( 'Version' ) ),
        esc_html__( 'Theme Info', 'classic-cosmetics' ),'edit_theme_options','classic-cosmetics','classic_cosmetics_theme_info_page'
    );
    // Add "Theme Demo Import" page
    add_theme_page(
        esc_html__( 'Theme Demo Import', 'classic-cosmetics' ),
        esc_html__( 'Theme Demo Import', 'classic-cosmetics' ),
        'edit_theme_options',
        'classic-cosmetics-demo',
        'classic_cosmetics_demo_content_page'
    );
}
add_action( 'admin_menu', 'classic_cosmetics_theme_info_menu_link' );

function classic_cosmetics_theme_info_page() {

    $classic_cosmetics_theme = wp_get_theme();
    ?>
<div class="wrap theme-info-wrap">
    <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'classic-cosmetics' ), esc_html($classic_cosmetics_theme->get( 'Name' )), esc_html($classic_cosmetics_theme->get( 'Version' ))); ?>
    </h1>
    <p class="theme-description">
    <?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'classic-cosmetics' ); ?>
    </p>
    <div class="important-link">
        <p class="main-box columns-wrapper clearfix">
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Pro version of our theme', 'classic-cosmetics' ); ?></strong></p>
                <p><?php esc_html_e( 'Are you exited for our theme? Then we will proceed for pro version of theme.', 'classic-cosmetics' ); ?></p>
                <a class="get-premium" href="<?php echo esc_url( CLASSIC_COSMETICS_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'classic-cosmetics' ); ?></a>
                <p><strong><?php esc_html_e( 'Check all classic features', 'classic-cosmetics' ); ?></strong></p>
                <p><?php esc_html_e( 'Explore all the premium features.', 'classic-cosmetics' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COSMETICS_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'classic-cosmetics' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Need Help?', 'classic-cosmetics' ); ?></strong></p>
                <p><?php esc_html_e( 'Go to our support forum to help you out in case of queries and doubts regarding our theme.', 'classic-cosmetics' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COSMETICS_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'classic-cosmetics' ); ?></a>
                <p><strong><?php esc_html_e( 'Leave us a review', 'classic-cosmetics' ); ?></strong></p>
                <p><?php esc_html_e( 'Are you enjoying our theme? We would love to hear your feedback.', 'classic-cosmetics' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COSMETICS_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'classic-cosmetics' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Check Our Demo', 'classic-cosmetics' ); ?></strong></p>
                <p><?php esc_html_e( 'Here, you can view a live demonstration of our premium them.', 'classic-cosmetics' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COSMETICS_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'classic-cosmetics' ); ?></a>
                <p><strong><?php esc_html_e( 'Theme Documentation', 'classic-cosmetics' ); ?></strong></p>
                <p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed theme setup.', 'classic-cosmetics' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COSMETICS_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'classic-cosmetics' ); ?></a>
            </div>
        </p>
    </div>
    <div id="getting-started">
        <h3><?php printf( esc_html__( 'Getting started with %s', 'classic-cosmetics' ),
        esc_html($classic_cosmetics_theme->get( 'Name' ))); ?></h3>
        <div class="columns-wrapper clearfix">
            <div class="column column-half clearfix">
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Description', 'classic-cosmetics' ); ?></h4>
                    <div class="theme-description-1"><?php echo esc_html($classic_cosmetics_theme->get( 'Description' )); ?></div>
                </div>
            </div>
            <div class="column column-half clearfix">
                <img src="<?php echo esc_url( $classic_cosmetics_theme->get_screenshot() ); ?>" alt=""/>
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Options', 'classic-cosmetics' ); ?></h4>
                    <p class="about">
                    <?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'classic-cosmetics' ),esc_html($classic_cosmetics_theme->get( 'Name' ))); ?></p>
                    <p>
                    <div class="themelink-1">
                        <a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Theme', 'classic-cosmetics' ); ?></a>
                        <a href="<?php echo esc_url( CLASSIC_COSMETICS_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Checkout Premium', 'classic-cosmetics' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="theme-author">
      <p><?php
        printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'classic-cosmetics' ),
            esc_html($classic_cosmetics_theme->get( 'Name' )),
            '<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'classic-cosmetics' ) . '">classictemplate</a>',
            '<a target="_blank" href="' . esc_url( CLASSIC_COSMETICS_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'classic-cosmetics' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'classic-cosmetics' ) . '</a>'
        );
        ?></p>
    </div>
</div>
<?php
}

function classic_cosmetics_demo_content_page() {

    $classic_cosmetics_theme = wp_get_theme();
    ?>
    <div class="container">
       <div class="start-box">
          <div class="columns-wrapper m-0"> 
             <div class="column column-half clearfix">
               <div class="wrapper-info"> 
                  <img src="<?php echo esc_url( get_template_directory_uri().'/images/Logo.png' ); ?>" />
                  <h2><?php esc_html_e( 'Welcome to Classic Cosmetics', 'classic-cosmetics' ); ?></h2>
                  <span class="version"><?php esc_html_e( 'Version', 'classic-cosmetics' ); ?>: <?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?></span>	
                  <p><?php esc_html_e( 'To begin, locate the demo importer button and click on it to initiate the importation of all the demo content.', 'classic-cosmetics' ); ?></p>
                  <?php require get_parent_theme_file_path( '/inc/demo-content.php' ); ?>
               </div>
             </div>
             <div class="column column-half clearfix">
             <div class="get-screenshot">
               <img src="<?php echo esc_url( get_template_directory_uri().'/screenshot.png' ); ?>" />
             </div>   
             </div>
          </div>
       </div>
    </div>
<?php
}

?>
