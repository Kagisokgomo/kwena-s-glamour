<div class="theme-offer">
   <?php
     // POST and update the customizer and other related data
    if ( isset( $_POST['submit'] ) ) {

                // Check if woocommerce is installed and activated
        if (!is_plugin_active('woocommerce/woocommerce.php')) {
            // Install the plugin if it doesn't exist
            $classic_cosmetics_plugin_slug = 'woocommerce';
            $classic_cosmetics_plugin_file = 'woocommerce/woocommerce.php';

            // Check if plugin is installed
            $classic_cosmetics_installed_plugins = get_plugins();
            if (!isset($classic_cosmetics_installed_plugins[$classic_cosmetics_plugin_file])) {
                include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                include_once(ABSPATH . 'wp-admin/includes/file.php');
                include_once(ABSPATH . 'wp-admin/includes/misc.php');
                include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                // Install the plugin
                $classic_cosmetics_upgrader = new Plugin_Upgrader();
                $classic_cosmetics_upgrader->install('https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip');
            }
            // Activate the plugin
            activate_plugin($classic_cosmetics_plugin_file);
        }

        //Check if  YITH WooCommerce Wishlist is installed and activated
        if (!is_plugin_active('yith-woocommerce-wishlist/yith-woocommerce-wishlist.php')) {       
            // Install the plugin if it doesn't exist
            $classic_cosmetics_plugin_slug = 'yith-woocommerce-wishlist';
            $classic_cosmetics_plugin_file = 'yith-woocommerce-wishlist/yith-woocommerce-wishlist.php';

            // Check if plugin is installed
            $classic_cosmetics_installed_plugins = get_plugins();
            if (!isset($classic_cosmetics_installed_plugins[$classic_cosmetics_plugin_file])) {
            include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
            include_once(ABSPATH . 'wp-admin/includes/file.php');
            include_once(ABSPATH . 'wp-admin/includes/misc.php');
            include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

            // Install the plugin
            $classic_cosmetics_upgrader = new Plugin_Upgrader();
            $classic_cosmetics_upgrader->install('https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.latest-stable.zip');
            }

            // Activate the plugin
            activate_plugin($classic_cosmetics_plugin_file);
        }

        // ------- Create Main Menu --------
        $classic_cosmetics_menuname = 'Primary Menu';
        $classic_cosmetics_bpmenulocation = 'primary';
        $classic_cosmetics_menu_exists = wp_get_nav_menu_object( $classic_cosmetics_menuname );
    
        if ( !$classic_cosmetics_menu_exists ) {
            $classic_cosmetics_menu_id = wp_create_nav_menu( $classic_cosmetics_menuname );

            // Create Home Page
            $classic_cosmetics_home_title = 'Home';
            $classic_cosmetics_home = array(
                'post_type'    => 'page',
                'post_title'   => $classic_cosmetics_home_title,
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'home'
            );
            $classic_cosmetics_home_id = wp_insert_post($classic_cosmetics_home);
            // Assign Home Page Template
            add_post_meta($classic_cosmetics_home_id, '_wp_page_template', '/template-home-page.php');
            // Update options to set Home Page as the front page
            update_option('page_on_front', $classic_cosmetics_home_id);
            update_option('show_on_front', 'page');
            // Add Home Page to Menu
            wp_update_nav_menu_item($classic_cosmetics_menu_id, 0, array(
                'menu-item-title' => __('Home', 'classic-cosmetics'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $classic_cosmetics_home_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create a new Page 
            $classic_cosmetics_pages_title = 'Pages';
            $classic_cosmetics_pages_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>';
            $classic_cosmetics_pages = array(
                'post_type'    => 'page',
                'post_title'   => $classic_cosmetics_pages_title,
                'post_content' => $classic_cosmetics_pages_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'pages'
            );
            $classic_cosmetics_pages_id = wp_insert_post($classic_cosmetics_pages);
            // Add Pages Page to Menu
            wp_update_nav_menu_item($classic_cosmetics_menu_id, 0, array(
                'menu-item-title' => __('Pages', 'classic-cosmetics'),
                'menu-item-classes' => 'pages',
                'menu-item-url' => home_url('/pages/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $classic_cosmetics_pages_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create About Us Page with Dummy Content
            $classic_cosmetics_about_title = 'About Us';
            $classic_cosmetics_about_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>';
            $classic_cosmetics_about = array(
                'post_type'    => 'page',
                'post_title'   => $classic_cosmetics_about_title,
                'post_content' => $classic_cosmetics_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'about-us'
            );
            $classic_cosmetics_about_id = wp_insert_post($classic_cosmetics_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($classic_cosmetics_menu_id, 0, array(
                'menu-item-title' => __('About Us', 'classic-cosmetics'),
                'menu-item-classes' => 'about-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $classic_cosmetics_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Assign the menu to the primary location if not already set
            if ( ! has_nav_menu( $classic_cosmetics_bpmenulocation ) ) {
                $classic_cosmetics_locations = get_theme_mod( 'nav_menu_locations' );
                if ( empty( $classic_cosmetics_locations ) ) {
                    $classic_cosmetics_locations = array();
                }
                $classic_cosmetics_locations[ $classic_cosmetics_bpmenulocation ] = $classic_cosmetics_menu_id;
                set_theme_mod( 'nav_menu_locations', $classic_cosmetics_locations );
            }
        }

        //Logo
        set_theme_mod( 'classic_cosmetics_the_custom_logo', esc_url( get_template_directory_uri().'/images/Logo.png'));

        //Header
        set_theme_mod( 'classic_cosmetics_offer_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing eli');
        set_theme_mod( 'classic_cosmetics_phone_number', '123456789');
        set_theme_mod( 'classic_cosmetics_product_category_number', '7');

        //Social links
        set_theme_mod( 'classic_cosmetics_fb_link', '#');
        set_theme_mod( 'classic_cosmetics_insta_link', '#');
        set_theme_mod( 'classic_cosmetics_twitt_link', '#');
        set_theme_mod( 'classic_cosmetics_youtube_link', '#');

        //Slider Section
        set_theme_mod( 'classic_cosmetics_slider_top_text', 'Makeup Essentials From Cosmo Shop');
        set_theme_mod( 'classic_cosmetics_button_text', 'Browse More');
        set_theme_mod( 'classic_cosmetics_button_link_slider', '#');

        $classic_cosmetics_featured_category_id = wp_create_category('Shop');
        set_theme_mod('classic_cosmetics_slidersection', $classic_cosmetics_featured_category_id);

        $classic_cosmetics_titles = array('Foundation For Glowing Skin Made With Richness Of Alomonds', 'Experience the ultimate radiance with a foundation infused', 'Enriched with almond goodness, this foundation hydrates your skin');
        $classic_cosmetics_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam';

        for ($classic_cosmetics_i = 0; $classic_cosmetics_i < 3; $classic_cosmetics_i++) {
            set_theme_mod('classic_cosmetics_title' . ($classic_cosmetics_i + 1), $classic_cosmetics_titles[$classic_cosmetics_i]);

            $classic_cosmetics_my_post = array(
                'post_title'    => wp_strip_all_tags($classic_cosmetics_titles[$classic_cosmetics_i]),
                'post_content'  => $classic_cosmetics_content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($classic_cosmetics_featured_category_id),
            );

            $classic_cosmetics_post_id = wp_insert_post($classic_cosmetics_my_post);

            if (!is_wp_error($classic_cosmetics_post_id)) {
                $classic_cosmetics_image_url = get_template_directory_uri() . '/images/slider' . ($classic_cosmetics_i + 1) . '.png';
                $classic_cosmetics_image_id = media_sideload_image($classic_cosmetics_image_url, $classic_cosmetics_post_id, null, 'id');
                if (!is_wp_error($classic_cosmetics_image_id)) {
                    set_post_thumbnail($classic_cosmetics_post_id, $classic_cosmetics_image_id);
                } else {
                    error_log('Failed to set post thumbnail for post ID: ' . $classic_cosmetics_post_id);
                }
            } else {
                error_log('Failed to create post: ' . print_r($classic_cosmetics_post_id, true));
            }
        }

        //Product Section
        set_theme_mod( 'classic_cosmetics_product_title', 'Trending Products');

        // Set the theme mod for the product category
        set_theme_mod('classic_cosmetics_hot_products_cat', 'productcategory1');

        // Define the single product category name, product titles, and tags
        $classic_cosmetics_category_name = 'productcategory1';
        $classic_cosmetics_titles = array(
            "HD Skin Matte Liquid Foundation",
            "Day And Night Moisturizer Cream",
            "Healthy Spa Concept Body Cream",
            "Beauty Aromatic Handmade Soap"
        );
        
        // Define regular prices for specific products and discounts
        $classic_cosmetics_regular_prices = array(120.00, 150.00, 150.00, 100.00); // First product: 120, Fourth product: 100
        $discounts = array(-35, -10, -10, -10); // Discounts in percentage
        
        // Create or retrieve the product category term ID
        $classic_cosmetics_term = term_exists($classic_cosmetics_category_name, 'product_cat');
        if (!$classic_cosmetics_term) {
            $classic_cosmetics_term = wp_insert_term($classic_cosmetics_category_name, 'product_cat');
        }
        
        if (is_wp_error($classic_cosmetics_term)) {
            error_log('Error creating category: ' . $classic_cosmetics_term->get_error_message());
            return; // Exit if category creation fails
        }
        
        $classic_cosmetics_term_id = is_array($classic_cosmetics_term) ? $classic_cosmetics_term['term_id'] : $classic_cosmetics_term;
        
        // Loop to create 4 products for the category
        foreach ($classic_cosmetics_titles as $classic_cosmetics_index => $classic_cosmetics_title) {
            // Use specific regular price for each product
            $classic_cosmetics_regular_price = $classic_cosmetics_regular_prices[$classic_cosmetics_index];
        
            // Calculate sale price based on discount
            $classic_cosmetics_sale_price = $classic_cosmetics_regular_price + ($classic_cosmetics_regular_price * $discounts[$classic_cosmetics_index] / 100);
        
            // Create product content
            $classic_cosmetics_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
        
            // Create product post object
            $classic_cosmetics_post_id = wp_insert_post(array(
                'post_title'    => wp_strip_all_tags($classic_cosmetics_title),
                'post_content'  => $classic_cosmetics_content,
                'post_status'   => 'publish',
                'post_type'     => 'product', // Post type set to 'product'
            ));
        
            if (is_wp_error($classic_cosmetics_post_id)) {
                error_log('Error creating product: ' . $classic_cosmetics_post_id->get_error_message());
                continue; // Skip to the next product if creation fails
            }
        
            // Assign the category to the product
            wp_set_object_terms($classic_cosmetics_post_id, $classic_cosmetics_term_id, 'product_cat');
        
            // Set product prices
            update_post_meta($classic_cosmetics_post_id, '_regular_price', $classic_cosmetics_regular_price);
            update_post_meta($classic_cosmetics_post_id, '_sale_price', $classic_cosmetics_sale_price);
            update_post_meta($classic_cosmetics_post_id, '_price', $classic_cosmetics_sale_price); // Current price is the sale price
        
            // Handle the featured image using media_sideload_image
            $classic_cosmetics_image_url = get_template_directory_uri() . '/images/Product' . ($classic_cosmetics_index + 1) . '.png';
            $classic_cosmetics_image_id = media_sideload_image($classic_cosmetics_image_url, $classic_cosmetics_post_id, null, 'id');
        
            if (!is_wp_error($classic_cosmetics_image_id)) {
                // Assign featured image to product
                set_post_thumbnail($classic_cosmetics_post_id, $classic_cosmetics_image_id);
            } else {
                error_log('Error downloading image for product: ' . $classic_cosmetics_image_id->get_error_message());
            }
        }        

    //Footer Copyright Text
    set_theme_mod( 'classic_cosmetics_copyright_line', 'Classic Cosmetics WordPress Theme' );

    // Show success message and the "View Site" button
         echo '<div class="success">Demo Import Successful</div>';
    }
     ?>
    <ul>
        <li>
        <hr>
        <?php 
        // Check if the form is submitted
        if ( !isset( $_POST['submit'] ) ) : ?>
           <!-- Show demo importer form only if it's not submitted -->
           <?php echo esc_html( 'Click on the below content to get demo content installed.', 'classic-cosmetics' ); ?>
          <br>
          <small><b><?php echo esc_html('Please take a backup if your website is already live with data. This importer will overwrite existing data.', 'classic-cosmetics' ); ?></b></small>
          <br><br>

          <form id="demo-importer-form" action="" method="POST" onsubmit="return confirm('Do you really want to do this?');">
            <input type="submit" name="submit" value="<?php echo esc_attr('Run Importer','classic-cosmetics'); ?>" class="button button-primary button-large">
          </form>
        <?php 
        endif; 

        // Show "View Site" button after form submission
        if ( isset( $_POST['submit'] ) ) {
        echo '<div class="view-site-btn">';
        echo '<a href="' . esc_url(home_url()) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">View Site</a>';
        echo '</div>';
        }
        ?>

        <hr>
        </li>
    </ul>
 </div>