jQuery(document).ready(function($) {
    const slides = $(".clbgd-slide");
    const dots = $(".clbgd-dot");
    const prevBtn = $(".clbgd-prev-slide");
    const nextBtn = $(".clbgd-next-slide");

    let currentIndex = 0;
    function showSlide(index) {
        slides.removeClass("clbgd-active");
        dots.removeClass("clbgd-active");
        $(slides[index]).addClass("clbgd-active");
        $(dots[index]).addClass("clbgd-active");
    }

    function goToNextSlide() {
        currentIndex = (currentIndex + 1) % slides.length; 
        showSlide(currentIndex);
    }

    function goToPrevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length; 
        showSlide(currentIndex);
    }

    function setSlide(index) {
        currentIndex = index;
        showSlide(currentIndex);
    }

    nextBtn.on("click", goToNextSlide);
    prevBtn.on("click", goToPrevSlide);

    dots.each(function(index) {
        $(this).on("click", function() {
            setSlide(index);
        });
    });

    // setInterval(goToNextSlide, 10000000000); 

   // setInterval(goToNextSlide);
    
    showSlide(currentIndex);
});
