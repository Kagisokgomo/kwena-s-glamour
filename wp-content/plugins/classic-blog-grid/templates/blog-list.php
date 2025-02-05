<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Template for Blog List
$posts_per_page = get_post_meta($post_id, '_clbgd_posts_per_page', true);
$posts_per_page = $posts_per_page ? $posts_per_page : 5;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 

$args = array( 
    'post_type' => 'post', 
    'posts_per_page' => $posts_per_page, 
    'order' => 'DESC', 
    'orderby' => 'date',
    'paged' => $paged
);

$query = new WP_Query( $args );

if ($query->have_posts()) :
    echo '<div class="clbgd-blog-list-wrapper">';

    while ($query->have_posts()) : $query->the_post(); ?>
        
    <div class="row clbgd-blog-list-item">
        <div class="col-lg-3 col-12 clbgd-blog-post-image align-self-center">
            <div class="clbgd-blog-list-img-outer">
                <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
            </div>
        </div>
        <div class="col-lg-7 col-12 clbgd-blog-post-title-outer-box align-self-center">
            <div class="clbgd-blog-category-title">
                <?php if ($show_categories): ?>
                    <p class="clbgd-blog-post-category">
                        <?php echo esc_html__('Category: ', 'classic-blog-grid') . wp_kses_post(get_the_category_list(', ')); ?>
                    </p>
                <?php endif; ?>
            </div>

            <h2 class="clbgd-blog-post-title">
                <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <div class="clbgd-list-admin-comment-box">
                <?php if ($show_date): ?>
                    <p class="clbgd-blog-post-date"><?php echo esc_html(get_the_date('F j, Y')); ?></p>
                <?php endif; ?>

                <?php if ($show_author): ?>
                    <p class="clbgd-blog-post-author align-self-center">
                        <?php echo esc_html__('By', 'classic-blog-grid') . ' ' . esc_html(get_the_author()); ?>
                    </p>
                <?php endif; ?>

                <?php if ($show_comments): ?>
                    <p class="clbgd-blog-post-comments align-self-center">
                        <?php echo esc_html(get_comments_number()) . ' ' . esc_html__('Comments', 'classic-blog-grid'); ?>
                    </p>
                <?php endif; ?>
            </div>

            
            <div class="clbgd-list-post-content-box">
                <?php if ($show_excerpt): ?>
                    <div class="clbgd-blog-post-excerpt">
                        <?php echo esc_html(wp_trim_words(get_the_excerpt(), $excerpt_length)); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-2 col-12 clbgd-list-button-box align-self-center">
            <a href="<?php echo esc_url(get_permalink()); ?>" class="clbgd-read-more-btn"><?php esc_html_e('Read More', 'classic-blog-grid'); ?></a>
        </div>
    </div>

<?php endwhile;

    echo '</div>';
else :
    echo '<p>' . esc_html__('No posts found.', 'classic-blog-grid') . '</p>';
endif; ?>

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
<?php
wp_reset_postdata();
?>
