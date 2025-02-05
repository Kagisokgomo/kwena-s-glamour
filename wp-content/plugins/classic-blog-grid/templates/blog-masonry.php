<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Template for Blog Masonry

$posts_per_page = get_post_meta($post_id, '_clbgd_posts_per_page', true);
$posts_per_page = $posts_per_page ? $posts_per_page : 9; 

$show_date = get_post_meta($post_id, '_clbgd_show_date', true);
$show_author = get_post_meta($post_id, '_clbgd_show_author', true);
$show_excerpt = get_post_meta($post_id, '_clbgd_show_excerpt', true);
$excerpt_length = get_post_meta($post_id, '_clbgd_excerpt_length', true);
$excerpt_length = $excerpt_length ? $excerpt_length : 15; 
$show_categories = get_post_meta($post_id, '_clbgd_show_categories', true);
$show_comments = get_post_meta($post_id, '_clbgd_show_comments', true);

$posts_per_row = get_post_meta($post_id, '_clbgd_posts_per_row', true);
$posts_per_row = $posts_per_row ? $posts_per_row : 2; // Default to 2 if not set

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'order' => 'DESC',
    'orderby' => 'date',
    'paged' => $paged
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
   <div id="clbgd-masonryLayout" class="clbgd-masonry-container clbgd-columns-<?php echo esc_attr($posts_per_row); ?>">

    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="clbgd-masonry-item">
        <div class="clbgd-masonry-item-thumbnail">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>">
        </div>

        <div class="clbgd-masonry-item-content">
            <h2 class="clbgd-masonry-item-title"><?php the_title(); ?></h2>
            
            <?php if ($show_date): ?>
                <p class="clbgd-masonry-item-date"><?php echo esc_html(get_the_date('F j, Y')); ?></p>
            <?php endif; ?>

            <?php if ($show_author): ?>
                <p class="clbgd-masonry-item-author"><?php echo esc_html__('By', 'classic-blog-grid') . ' ' . esc_html(get_the_author()); ?></p>
            <?php endif; ?>
            
            <?php if ($show_categories): ?>
                <p class="clbgd-masonry-item-category">
                    <?php echo esc_html__('Category: ', 'classic-blog-grid') . wp_kses_post(get_the_category_list(', ')); ?>
                </p>
            <?php endif; ?>

            <?php if ($show_comments): ?>
                <p class="clbgd-masonry-item-comments">
                    <?php echo esc_html(get_comments_number()) . ' ' . esc_html__('Comments', 'classic-blog-grid'); ?>
                </p>
            <?php endif; ?>
            
            <?php if ($show_excerpt): ?>
                <p class="clbgd-masonry-item-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), $excerpt_length, '...')); ?></p>
            <?php endif; ?>

            <a href="<?php echo esc_url(get_permalink()); ?>" class="clbgd-masonry-item-button">Read More</a>
        </div>
    </div>
    <?php endwhile; ?>

    </div>

    <div class="clbgd-pagination">
    <?php
    if ($query->max_num_pages > 1) {
        echo wp_kses_post(paginate_links(array(
            'total' => $query->max_num_pages,
            'current' => $paged,
            'prev_text' => __('« Previous', 'classic-blog-grid'),
            'next_text' => __('Next »', 'classic-blog-grid')
        )));
    }
    ?>
</div>

<?php else : ?>
    <p><?php esc_html_e('No posts found.', 'classic-blog-grid'); ?></p>
<?php endif;

wp_reset_postdata();
?>

