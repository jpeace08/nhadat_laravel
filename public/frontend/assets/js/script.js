document.addEventListener('DOMContentLoaded', () => {

    const navItemEls = document.querySelectorAll('li.item');

    if (navItemEls && navItemEls.length > 0) {
        navItemEls.forEach((item , index) => {
            item.addEventListener('click', e => {
                navItemEls.forEach((e, i) => {
                    e.classList.remove('active');
                })
                item.classList.add('active');
            })
        })
    }

    //hover product effect:
    $('.product-item').mouseover(function () { 
        $(this).addClass('shadow')
    });
    $('.product-item').mouseleave(function () { 
        $(this).removeClass('shadow')
    });

    // owl-carousel home
    const owl = $('.home-owl');
    owl.owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true
    });
    $('.play').on('click', function () {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function () {
        owl.trigger('stop.owl.autoplay')
    })

    //relative product owl-carousel
    const relSlider = $('.relative-products');
    relSlider.owlCarousel({
        items: 3,
        loop: true,
        center: true,
        margin: 5,
    });

    //owl-carousel detail product
    const slider = $('.product-owl');
    slider.owlCarousel({
        items: 1,
        loop: false,
        center: true,
        margin: 10,
        URLhashListener: true,
        autoplayHoverPause: true,
        startPosition: '#one'
    });
});