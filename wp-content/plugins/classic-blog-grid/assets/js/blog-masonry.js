jQuery(document).ready(function($) {
    var $masonryContainer = $('#masonryLayout');

    // Initialize Masonry
    $masonryContainer.masonry({
        itemSelector: '.masonry-item',  
        columnWidth: '.masonry-item',    
        percentPosition: true,           
        gutter: 20                       
    });
});
