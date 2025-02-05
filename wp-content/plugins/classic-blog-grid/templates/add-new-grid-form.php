<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

$post_id = isset($post_id) ? $post_id : 0;
$grid_title = isset($grid_title) ? $grid_title : '';
$grid_layout = isset($grid_layout) ? $grid_layout : 'list';
$sort_order = isset($sort_order) ? $sort_order : 'DESC';
$show_date = isset($show_date) ? $show_date : false;
$show_author = isset($show_author) ? $show_author : false;
$show_excerpt = isset($show_excerpt) ? $show_excerpt : false;
$show_categories = isset($show_categories) ? $show_categories : false; 
$show_comments = isset($show_comments) ? $show_comments : false; 


?>

<div class="wrap">
    <h1><?php echo esc_html($post_id ? __('Edit Grid', 'classic-blog-grid') : __('Add New Grid', 'classic-blog-grid')); ?></h1>
    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <?php wp_nonce_field('clbgd_save_grid', 'clbgd_nonce'); ?>
        <input type="hidden" name="action" value="clbgd_save_grid">
        <input type="hidden" name="post_id" value="<?php echo esc_attr($post_id); ?>">

        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="grid_title"><?php esc_html_e('Grid Title', 'classic-blog-grid'); ?></label>
                </th>
                <td>
                    <input type="text" name="grid_title" id="grid_title" class="regular-text" required value="<?php echo esc_attr($grid_title); ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="grid_layout"><?php esc_html_e('Grid Layout', 'classic-blog-grid'); ?></label>
                </th>
                <td>
                <div class="grid-layout-options">
                    <label>
                        <input type="radio" name="grid_layout" value="list" <?php checked($grid_layout, 'list'); ?>>
                        <img src="<?php echo esc_url(CLBGD_PLUGIN_URL . 'assets/images/list.png'); ?>" alt="<?php esc_attr_e('List Layout', 'classic-blog-grid'); ?>">
                        <p><?php esc_html_e('List Layout', 'classic-blog-grid'); ?></p>
                    </label>
                    <label>
                        <input type="radio" name="grid_layout" value="masonry" <?php checked($grid_layout, 'masonry'); ?>>
                        <img src="<?php echo esc_url(CLBGD_PLUGIN_URL . 'assets/images/masonry.png'); ?>" alt="<?php esc_attr_e('Masonry Layout', 'classic-blog-grid'); ?>">
                        <p><?php esc_html_e('Masonry Layout', 'classic-blog-grid'); ?></p>
                    </label>
                    <label>
                        <input type="radio" name="grid_layout" value="slider" <?php checked($grid_layout, 'slider'); ?>>
                        <img src="<?php echo esc_url(CLBGD_PLUGIN_URL . 'assets/images/slider.png'); ?>" alt="<?php esc_attr_e('Slider Layout', 'classic-blog-grid'); ?>">
                        <p><?php esc_html_e('Slider Layout', 'classic-blog-grid'); ?></p>
                    </label>
                </div>
                </td>
            </tr>
            <!-- new setting for masonary -->
            <tr>
                <th scope="row">
                    <label for="posts_per_row"><?php esc_html_e('Number of Posts in a Row (Masonry Layout)', 'classic-blog-grid'); ?></label>
                </th>
                <td>
                    <input type="number" name="posts_per_row" id="posts_per_row" class="small-text" min="1" max="6" step="1" value="<?php echo esc_attr(isset($posts_per_row) ? $posts_per_row : '2'); ?>" />
                    <p class="description"><?php esc_html_e('Set the number of posts to display in a single row for the masonry layout.', 'classic-blog-grid'); ?></p>
                </td>
            </tr>
            <!-- end -->
            <tr>
                <th scope="row">
                    <label for="posts_per_page"><?php esc_html_e('Display Posts Per Page', 'classic-blog-grid'); ?></label>
                </th>
                <td>
                    <input type="number" name="posts_per_page" id="posts_per_page" class="small-text" min="1" step="1" required value="<?php echo esc_attr(isset($posts_per_page) ? $posts_per_page : '10'); ?>" />
                    <p class="description"><?php esc_html_e('Set the number of posts to display per page for this grid.', 'classic-blog-grid'); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="sort_order"><?php esc_html_e('Sort Order', 'classic-blog-grid'); ?></label>
                </th>
                <td>
                    <select name="sort_order" id="sort_order">
                        <option value="DESC" <?php selected($sort_order, 'DESC'); ?>><?php esc_html_e('Descending', 'classic-blog-grid'); ?></option>
                        <option value="ASC" <?php selected($sort_order, 'ASC'); ?>><?php esc_html_e('Ascending', 'classic-blog-grid'); ?></option>
                    </select>
                    <p class="description"><?php esc_html_e('Choose the order in which posts are displayed.', 'classic-blog-grid'); ?></p>
                </td>
            </tr>
            <tr>
         <th scope="row">
        <label><?php esc_html_e('Show/Hide Metadata', 'classic-blog-grid'); ?></label>
        </th>
         <td>
        <label><input type="checkbox" name="show_date" <?php checked($show_date, true); ?>> <?php esc_html_e('Show Date', 'classic-blog-grid'); ?></label><br>
        <label><input type="checkbox" name="show_author" <?php checked($show_author, true); ?>> <?php esc_html_e('Show Author', 'classic-blog-grid'); ?></label><br>
        <label><input type="checkbox" name="show_excerpt" <?php checked($show_excerpt, true); ?>> <?php esc_html_e('Show Excerpt', 'classic-blog-grid'); ?></label><br>
        <label><input type="checkbox" name="show_categories" <?php checked($show_categories, true); ?>> <?php esc_html_e('Show Category', 'classic-blog-grid'); ?></label><br>
        <label><input type="checkbox" name="show_comments" <?php checked($show_comments, true); ?>> <?php esc_html_e('Show Comment Count', 'classic-blog-grid'); ?></label>
        </td>
        </tr>

            <tr>
                <th scope="row">
                    <label for="excerpt_length"><?php esc_html_e('Excerpt Length', 'classic-blog-grid'); ?></label>
                </th>
                <td>
                    <input type="number" name="excerpt_length" id="excerpt_length" class="small-text" min="10" step="1" value="<?php echo esc_attr(isset($excerpt_length) ? $excerpt_length : '20'); ?>" />
                    <p class="description"><?php esc_html_e('Set the number of words for the post excerpt.', 'classic-blog-grid'); ?></p>
                </td>
            </tr>
        </table>
        <?php submit_button($post_id ? esc_html__('Update Grid', 'classic-blog-grid') : esc_html__('Add Grid', 'classic-blog-grid')); ?>
    </form>
</div>



