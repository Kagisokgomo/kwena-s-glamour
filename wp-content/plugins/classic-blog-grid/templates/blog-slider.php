<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Template for Blog Slider

$posts_per_page = get_post_meta($post_id, '_clbgd_posts_per_page', true);
$posts_per_page = $posts_per_page ? $posts_per_page : 5; 
$show_date = get_post_meta($post_id, '_clbgd_show_date', true);
$show_author = get_post_meta($post_id, '_clbgd_show_author', true);
$show_excerpt = get_post_meta($post_id, '_clbgd_show_excerpt', true);
$excerpt_length = get_post_meta($post_id, '_clbgd_excerpt_length', true);
$excerpt_length = $excerpt_length ? $excerpt_length : 15; 

$show_categories = get_post_meta($post_id, '_clbgd_show_categories', true);
$show_comments = get_post_meta($post_id, '_clbgd_show_comments', true);

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'order' => 'DESC',
    'orderby' => 'date'
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div id="clbgdSlider" class="clbgd-slider-container">
        <div class="clbgd-slider-wrapper">
            
        <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="clbgd-slide <?php echo esc_attr(($query->current_post == 0) ? 'clbgd-active' : ''); ?>">
        <div class="abg-slide-img-box">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
        </div>  
        <div class="clbgd-slide-content">
            <h2 class="clbgd-slide-title"><?php the_title(); ?></h2>

            <?php if ($show_date): ?>
                <p class="clbgd-slide-date"><?php echo esc_html(get_the_date('F j, Y')); ?></p>
            <?php endif; ?>

            <?php if ($show_author): ?>
                <p class="clbgd-slide-author"><?php echo esc_html__('By', 'classic-blog-grid') . ' ' . esc_html(get_the_author()); ?></p>
            <?php endif; ?>

            <?php if ($show_categories): ?>
                <p class="clbgd-slide-category">
                    <?php echo esc_html__('Category: ', 'classic-blog-grid') . wp_kses_post(get_the_category_list(', ')); ?>
                </p>
            <?php endif; ?>

            <?php if ($show_comments): ?>
                <p class="clbgd-slide-comments">
                    <?php echo esc_html(get_comments_number()) . ' ' . esc_html__('Comments', 'classic-blog-grid'); ?>
                </p>
            <?php endif; ?>

            <?php if ($show_excerpt): ?>
                <p class="clbgd-slide-description"><?php echo esc_html(wp_trim_words(get_the_excerpt(), $excerpt_length, '...')); ?></p>
            <?php endif; ?>

            <a href="<?php the_permalink(); ?>" class="clbgd-slide-button">Learn More</a>
        </div>
        
    </div>
<?php endwhile; ?>

        </div>

        <div class="clbgd-slider-controls">
            <button class="clbgd-prev-slide">Previous</button>
            <button class="clbgd-next-slide">Next</button>
        </div>

        <div class="clbgd-slider-pagination">
            <?php for ($i = 0; $i < $query->post_count; $i++) : ?>
                <span class="clbgd-dot <?php echo esc_attr(($i == 0) ? 'clbgd-active' : ''); ?>"></span>
            <?php endfor; ?>
        </div>
    </div>

<?php else : ?>
    <p>No posts found.</p>
<?php endif;

wp_reset_postdata();
?>
