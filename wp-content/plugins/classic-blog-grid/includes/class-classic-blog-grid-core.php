<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Clbgd_Core {

    private static $instance;

    public static function instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init() {
        $this->includes();
        $this->register_hooks();
    }

    private function includes() {
        // Include 
    }

    private function register_hooks() {
        add_action('init', array($this, 'clbgd_register_post_type'));
        add_action('admin_menu', array($this, 'clbgd_register_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'clbgd_load_admin_assets'));

        add_action('admin_post_clbgd_save_grid', array($this, 'clbgd_handle_save_grid'));

        add_filter('get_edit_post_link', array($this, 'clbgd_grid_edit_link'), 10, 3);

        add_filter('post_row_actions', array($this, 'clbgd_add_new_grid_link'), 10, 2);
        add_filter('admin_url', array($this, 'clbgd_redirect_add_new_grid'), 10, 2);

        add_filter('manage_clbgd_grid_posts_columns', array($this, 'clbgd_add_shortcode_column'));
        add_action('manage_clbgd_grid_posts_custom_column', array($this, 'clbgd_display_shortcode_column'), 10, 2);
        add_action('init', array($this, 'clbgd_register_shortcodes'));

    }

    public function clbgd_load_admin_assets($hook) {
        $current_screen = get_current_screen();
        if (strpos($current_screen->id, 'classic-blog-grid') !== false || $current_screen->post_type === 'clbgd_grid') {
            remove_all_actions('admin_notices');
            remove_all_actions('all_admin_notices');
        }

        if ('toplevel_page_classic-blog-grid' == $hook || 'classic-blog-grid_page_clbgd_collections_templates' == $hook) {
            wp_enqueue_style('clbgd-admin-css', CLBGD_PLUGIN_URL . 'assets/css/admin-styles.css', array(), CLBGD_PLUGIN_VERSION);
            wp_enqueue_style( 'clbgd-admin-boostrap-css', CLBGD_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), CLBGD_PLUGIN_VERSION );
            wp_enqueue_script('clbgd-pagination-js', CLBGD_PLUGIN_URL . 'assets/js/clbgd-pagination.js', array('jquery'), CLBGD_PLUGIN_VERSION, true);

            wp_localize_script('clbgd-pagination-js', 'clbgd_pagination_object', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('clbgd_create_pagination_nonce_action')
            ));
        }
        wp_enqueue_script('clbgd-admin-js', CLBGD_PLUGIN_URL . 'assets/js/admin-scripts.js', array('jquery'), CLBGD_PLUGIN_VERSION, true);
    }
    
    //for edit link
    public function clbgd_grid_edit_link($link, $post_id, $context) {
        $post = get_post($post_id);
    
        if ($post->post_type === 'clbgd_grid') {
            return admin_url('admin.php?page=clbgd_add_new_grid&post_id=' . $post_id);
        }
    
        return $link;
    }

      // For custom row action
      public function clbgd_add_new_grid_link($actions, $post) {
        if ('clbgd_grid' === $post->post_type) {
            $actions['clbgd_custom_edit'] = '<a href="' . admin_url('admin.php?page=clbgd_add_new_grid&post_id=' . $post->ID) . '">Edit Grid</a>';
        }
        return $actions;
    }

    public function clbgd_redirect_add_new_grid($url, $path) {
        if ($path === 'post-new.php?post_type=clbgd_grid') {
            $url = admin_url('admin.php?page=clbgd_add_new_grid');
        }
        return $url;
    }

     public function clbgd_add_shortcode_column($columns) {
        $new_columns = array();
        foreach ($columns as $key => $column) {
            $new_columns[$key] = $column;
            if ('title' === $key) {
                $new_columns['clbgd_grid_shortcode'] = __('Shortcode', 'classic-blog-grid');
            }
        }
        foreach ($columns as $key => $column) {
            if ('title' !== $key) {
                $new_columns[$key] = $column;
            }
        }
    
        return $new_columns;
    }

    public function clbgd_display_shortcode_column($column, $post_id) {
        if ($column === 'clbgd_grid_shortcode') {
            echo esc_html( '[clbgd id="' . $post_id . '"]');
        }
    }
    

    public function clbgd_register_post_type() {
        register_post_type('clbgd_grid', array(
            'labels' => array(
                'name' => __('Grids', 'classic-blog-grid'),
                'singular_name' => __('Grid', 'classic-blog-grid'),
                'add_new' => __('Add New Grid', 'classic-blog-grid'),
                'add_new_item' => __('Add New Grid', 'classic-blog-grid'),
                'edit_item' => __('Edit Grid', 'classic-blog-grid'),
                'new_item' => __('New Grid', 'classic-blog-grid'),
                'view_item' => __('View Grid', 'classic-blog-grid'),
                'search_items' => __('Search Grids', 'classic-blog-grid'),
                'not_found' => __('No grids found', 'classic-blog-grid'),
                'not_found_in_trash' => __('No grids found in Trash', 'classic-blog-grid'),
            ),
            'public' => true,
            'show_in_menu' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'grids'),
        ));
    }

    public function clbgd_register_admin_menu() {
        add_menu_page(
            __('Classic Blog Grid', 'classic-blog-grid'),
            __('Classic Blog Grid', 'classic-blog-grid'),
            'manage_options',
            'classic-blog-grid',
            array($this, 'render_main_menu_page'),
            'dashicons-screenoptions',
            20
        );

        add_submenu_page(
            'classic-blog-grid',
            __('All Grids', 'classic-blog-grid'),
            __('All Grids', 'classic-blog-grid'),
            'manage_options',
            'edit.php?post_type=clbgd_grid'
        );

        add_submenu_page(
            'classic-blog-grid',
            __('Add New Grid', 'classic-blog-grid'),
            __('Add New Grid', 'classic-blog-grid'),
            'manage_options',
            'clbgd_add_new_grid',
            array($this, 'render_add_new_grid_page')
        );

        add_submenu_page(
            'classic-blog-grid',
            __('Templates', 'classic-blog-grid'),
            __('Templates', 'classic-blog-grid'),
            'manage_options',
            'clbgd_collections_templates',
            array($this, 'render_collections_templates_page')
        );
    }

    public function render_main_menu_page() {
        include CLBGD_PLUGIN_DIR . 'templates/clbgd-dashboard.php';
    }

    public function render_collections_templates_page() {
        include CLBGD_PLUGIN_DIR . 'templates/clbgd-templates.php';
    }

    public function render_add_new_grid_page() {
        $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
        $grid_title = '';
        $grid_layout = 'list';
        $posts_per_page = 10; 
        $sort_order = 'DESC'; 
        $show_date = 0;
        $show_author = 0;
        $show_excerpt = 0;
        $excerpt_length = 20; 
        $show_categories= 0;
        $posts_per_row = 0;

        if ($post_id) {
            $post = get_post($post_id);
            if ($post && $post->post_type === 'clbgd_grid') {
                $grid_title = $post->post_title;
                $grid_layout = get_post_meta($post_id, '_clbgd_grid_layout', true);
                $posts_per_page = get_post_meta($post_id, '_clbgd_posts_per_page', true);
                $sort_order = get_post_meta($post_id, '_clbgd_sort_order', true);
                $show_date = get_post_meta($post_id, '_clbgd_show_date', true);
                $show_author = get_post_meta($post_id, '_clbgd_show_author', true);
                $show_excerpt = get_post_meta($post_id, '_clbgd_show_excerpt', true);
                $excerpt_length = get_post_meta($post_id, '_clbgd_excerpt_length', true);

                $show_categories = get_post_meta($post_id, '_clbgd_show_categories', true) ?: 0;
                $show_comments = get_post_meta($post_id, '_clbgd_show_comments', true) ?: 0;

                $posts_per_row = get_post_meta($post_id, '_clbgd_posts_per_row', true) ?: 2;
            }
        }

        include CLBGD_PLUGIN_DIR . 'templates/add-new-grid-form.php';
    }
    


    public function clbgd_handle_save_grid() {
        if (!isset($_POST['clbgd_nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash ( $_POST['clbgd_nonce'] ) ), 'clbgd_save_grid')) {
            wp_die_esc_html((__('Security check failed.', 'classic-blog-grid')));
        }
    
        if (!current_user_can('manage_options')) {
            wp_die_esc_html((__('Insufficient permissions.', 'classic-blog-grid')));
        }

        $grid_title = sanitize_text_field($_POST['grid_title']);
        $grid_layout = sanitize_text_field($_POST['grid_layout']);
        $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 10; 
        $sort_order = sanitize_text_field($_POST['sort_order']);
        $show_date = isset($_POST['show_date']) ? 1 : 0;
        $show_author = isset($_POST['show_author']) ? 1 : 0;
        $show_excerpt = isset($_POST['show_excerpt']) ? 1 : 0;
        $excerpt_length = isset($_POST['excerpt_length']) ? intval($_POST['excerpt_length']) : 20;

        $show_categories = isset($_POST['show_categories']) ? 1 : 0;
        $show_comments = isset($_POST['show_comments']) ? 1 : 0;
        $posts_per_row = isset($_POST['posts_per_row']) ? intval($_POST['posts_per_row']) : 2;


    
        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
        $post_data = array(
            'ID' => $post_id,
            'post_title' => $grid_title,
            'post_type' => 'clbgd_grid',
            'post_status' => 'publish',
        );
        $post_id = wp_insert_post($post_data);

        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, '_clbgd_grid_layout', $grid_layout);
            update_post_meta($post_id, '_clbgd_posts_per_page', $posts_per_page);
            update_post_meta($post_id, '_clbgd_sort_order', $sort_order);
            update_post_meta($post_id, '_clbgd_show_date', $show_date);
            update_post_meta($post_id, '_clbgd_show_author', $show_author);
            update_post_meta($post_id, '_clbgd_show_excerpt', $show_excerpt);
            update_post_meta($post_id, '_clbgd_excerpt_length', $excerpt_length);

            // Save these new fields
            update_post_meta($post_id, '_clbgd_show_categories', $show_categories);
            update_post_meta($post_id, '_clbgd_show_comments', $show_comments);

            update_post_meta($post_id, '_clbgd_posts_per_row', $posts_per_row);
        }

        wp_redirect(admin_url('edit.php?post_type=clbgd_grid'));
        exit;
    }
    

    //for shortcode 
    public function clbgd_register_shortcodes() {
        add_shortcode('clbgd', array($this, 'clbgd_render_blog_grid'));
    }


    public function clbgd_render_blog_grid($atts) {
        $atts = shortcode_atts(array(
            'id' => '',
        ), $atts, 'clbgd');

        $post_id = $atts['id'];
        $grid_layout = get_post_meta($post_id, '_clbgd_grid_layout', true);
        $sort_order = get_post_meta($post_id, '_clbgd_sort_order', true) ?: 'DESC';
        $show_date = get_post_meta($post_id, '_clbgd_show_date', true);
        $show_author = get_post_meta($post_id, '_clbgd_show_author', true);
        $show_excerpt = get_post_meta($post_id, '_clbgd_show_excerpt', true);
        $excerpt_length = get_post_meta($post_id, '_clbgd_excerpt_length', true);

        $show_categories = get_post_meta($post_id, '_clbgd_show_categories', true);
        $show_comments = get_post_meta($post_id, '_clbgd_show_comments', true);
        $posts_per_row = get_post_meta($post_id, '_clbgd_posts_per_row', true);

        switch ($grid_layout) {
            case 'masonry':
                return $this->render_masonry_grid($post_id, $sort_order, $show_date, $show_author, $show_excerpt, $excerpt_length, $posts_per_row);
            case 'slider':
                return $this->render_slider_grid($post_id, $sort_order, $show_date, $show_author, $show_excerpt, $excerpt_length);
            default:
                return $this->render_list_grid($post_id, $sort_order, $show_date, $show_author, $show_excerpt, $excerpt_length , $show_categories , $show_comments);
        }
    }

  
    public function render_list_grid($post_id, $sort_order, $show_date, $show_author, $show_excerpt, $excerpt_length ,$show_categories , $show_comments) {
        wp_enqueue_style('clbgd-blog-list-css', CLBGD_PLUGIN_URL . 'assets/css/blog-list.css', array(), CLBGD_PLUGIN_VERSION);
        wp_enqueue_script('clbgd-blog-list-js', CLBGD_PLUGIN_URL . 'assets/js/blog-list.js', array('jquery'), CLBGD_PLUGIN_VERSION, true);
    
        ob_start();
        include CLBGD_PLUGIN_DIR . 'templates/blog-list.php';
        return ob_get_clean();
    }
    public function render_slider_grid($post_id) {
        wp_enqueue_style('clbgd-blog-slider-css', CLBGD_PLUGIN_URL . 'assets/css/blog-slider.css', array(), CLBGD_PLUGIN_VERSION);
        wp_enqueue_script('clbgd-blog-slider-js', CLBGD_PLUGIN_URL . 'assets/js/blog-slider.js', array('jquery'), CLBGD_PLUGIN_VERSION, true);
    
        ob_start();
        include CLBGD_PLUGIN_DIR . 'templates/blog-slider.php';
        return ob_get_clean();
    }

    public function render_masonry_grid($post_id) {
        wp_enqueue_style('clbgd-blog-masonry-css', CLBGD_PLUGIN_URL . 'assets/css/blog-masonry.css', array(), CLBGD_PLUGIN_VERSION);
        wp_enqueue_script('clbgd-blog-masonry-js', CLBGD_PLUGIN_URL . 'assets/js/blog-masonry.js', array('jquery'), CLBGD_PLUGIN_VERSION, true);
        $posts_per_row = intval(get_post_meta($post_id, '_clbgd_posts_per_row', true)) ?: 2; 
        $inline_css = sprintf(
            '#clbgd-masonryLayout.clbgd-masonry-container {
                display: grid;
                grid-template-columns: repeat(%d, 1fr);
                gap: 20px;
                padding: 20px;
            }',
            $posts_per_row
        );
        wp_add_inline_style('clbgd-blog-masonry-css', $inline_css); 
        ob_start();
        include CLBGD_PLUGIN_DIR . 'templates/blog-masonry.php';
        return ob_get_clean();
    }
}