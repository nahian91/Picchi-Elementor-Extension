jQuery(document).ready(function(){
    jQuery('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    jQuery('.owl-carousel').owlCarousel({
        items: 2
    });
})