<?php
function clbgd_get_collections() {
    
    $endpoint_url = CLBGD_API_URL . 'getCollections';

    $options = [
        'body' => [],
        'headers' => [
            'Content-Type' => 'application/json'
        ]
    ];
    $response = wp_remote_post($endpoint_url, $options);

    if (!is_wp_error($response)) {
        $response_body = wp_remote_retrieve_body($response);
        $response_body = json_decode($response_body);

        if (isset($response_body->data) && !empty($response_body->data)) {
           return  $response_body->data;
        }
        return  [];
    }

    return  [];
}

function clbgd_get_filtered_products($cursor = '', $search = '', $collection = 'best-wordpress-templates') {
    $endpoint_url = CLBGD_API_URL . 'getFilteredProducts';

    $remote_post_data = array(
        'collectionHandle' => $collection,
        'productHandle' => $search,
        'paginationParams' => array(
            "first" => 12,
            "afterCursor" => $cursor,
            "beforeCursor" => "",
            "reverse" => true
        )
    );

    $body = wp_json_encode($remote_post_data);

    $options = [
        'body' => $body,
        'headers' => [
            'Content-Type' => 'application/json'
        ]
    ];
    $response = wp_remote_post($endpoint_url, $options);

    if (!is_wp_error($response)) {
        $response_body = wp_remote_retrieve_body($response);
        $response_body = json_decode($response_body);

        if (isset($response_body->data) && !empty($response_body->data)) {
            if (isset($response_body->data->products) && !empty($response_body->data->products)) {
                return  array(
                    'products' => $response_body->data->products,
                    'pagination' => $response_body->data->pageInfo
                );
            }
        }
        return [];
    }
    
    return [];
}

function clbgd_get_filtered_products_ajax() {
    $cursor = isset($_POST['cursor']) ? sanitize_text_field(wp_unslash($_POST['cursor'])) : '';
    $search = isset($_POST['search']) ? sanitize_text_field(wp_unslash($_POST['search'])) : '';
    $collection = isset($_POST['collection']) ? sanitize_text_field(wp_unslash($_POST['collection'])) : 'best-wordpress-templates';

    check_ajax_referer('clbgd_create_pagination_nonce_action', 'clbgd_pagination_nonce');

    $get_filtered_products = clbgd_get_filtered_products($cursor, $search, $collection);
    ob_start();
    if (isset($get_filtered_products['products']) && !empty($get_filtered_products['products'])) {
        foreach ( $get_filtered_products['products'] as $product ) {

            $product_obj = $product->node;
            
            if (isset($product_obj->inCollection) && !$product_obj->inCollection) {
                continue;
            }

            $product_obj = $product->node;

            $demo_url = isset($product->node->metafield->value) ? $product->node->metafield->value : '';
            $product_url = isset($product->node->onlineStoreUrl) ? $product->node->onlineStoreUrl : '';
            $image_src = isset($product->node->images->edges[0]->node->src) ? $product->node->images->edges[0]->node->src : ''; ?>

            <div class="clbgd-item clbgd-filter-free col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                <div class="clbgd-item-inner-box">
                    <div class="clbgd-item-preview">
                        <div class="clbgd-item-screenshot">
                            <img src="<?php echo esc_url($image_src); ?>" loading="lazy"
                                alt="<?php echo esc_attr($product_obj->title); ?>">
                            <div class="clbgd-item-overlay">

                            </div>
                        </div>
                    </div>
                    <div class="clbgd-item-footer">
                        <div class="clbgd-item-footer_meta">
                            <h3 class="theme-name"><?php echo esc_html($product_obj->title); ?></h3>
                            <p class="theme-seo-title"><?php echo esc_html($product_obj->seo->title); ?></p>
                            <div class="clbgd-item-footer-actions d-flex justify-content-center gap-2">
                                <a class="clbgd-buy-now clbgd-btn" href="<?php echo esc_attr($product_url); ?>"
                                    aria-label="Buy Now"><?php echo esc_html('Buy Now'); ?></a>
                                <?php if ( $demo_url != '' ) { ?>
                                <a class="clbgd-item-demo-link clbgd-btn" href="<?php echo esc_attr($demo_url); ?>"
                                    target="_blank"><?php echo esc_html('Demo'); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php }
    }
    $output = ob_get_clean();

    $pagination = isset($get_filtered_products['pagination']) ?  $get_filtered_products['pagination'] : [];
    wp_send_json(array(
        'content' => $output,
        'pagination' => $pagination
    ));
}

add_action('wp_ajax_clbgd_get_filtered_products', 'clbgd_get_filtered_products_ajax');
add_action('wp_ajax_nopriv_clbgd_get_filtered_products', 'clbgd_get_filtered_products_ajax');