document.addEventListener('DOMContentLoaded', () => {

    const navItemEls = document.querySelectorAll('li.item');

    if (navItemEls && navItemEls.length > 0) {
        navItemEls.forEach((item, index) => {
            item.addEventListener('click', e => {
                navItemEls.forEach((e, i) => {
                    e.classList.remove('active');
                })
                item.classList.add('active');

                //call ajax
                fillData(item);
            })
        })
    }

    fillData(navItemEls[0]);


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
        loop: true,
        autoplay: true,
        center: true,
        margin: 10,
        URLhashListener: true,
        autoplayHoverPause: true,
        startPosition: '#one'
    });
});
const fillData = item => {
    const newsUl = document.querySelector('.news');
    // newsUl.innerHTML = '';
    if (item) {
        var category_id = item.getAttribute('data-category-id');
        var category_slug = item.getAttribute('data-category-slug');
    }

    $.ajax({
        type: "GET",
        url: `/products/${category_id}`,
        dataType: "json",
        success: function (response) {

            if (response.data && response.data.length > 0) {
                var html = [];
                const now = new Date();
                response.data.forEach(product => {
                    const created = new Date(product.created_at);
                    html.push(`<li class="item"
                             data-product-id=${product.id} 
                             data-product-name="${product.name}"
                             data-product-slug="${product.slug}"
                             data-product-createdat=${Math.floor((now - created) / 1000 / 3600 / 24)}
                             data-product-image-path=${product.product_image_path}
                            >${product.name}
                            </li>`);
                });
                if (html.length > 0) {
                    html = html.join('');
                    if (newsUl) {
                        newsUl.innerHTML = html;
                    }
                }
                const liItemEls = document.querySelectorAll('.news .item');
                const imageEl = document.querySelector('.detail-new .thumb');
                const titleEl = document.querySelector('.detail-new .title');
                const momentEl = document.querySelector('.detail-new .moment');

                if (liItemEls && liItemEls.length > 0) {

                    liItemEls.forEach(item => {
                        item.addEventListener('click', e => {
                            let dataProduct = {
                                id: item.getAttribute('data-product-id'),
                                slug: item.getAttribute('data-product-slug'),
                                title: item.getAttribute('data-product-name'),
                                image_path: item.getAttribute('data-product-image-path'),
                                moment: item.getAttribute('data-product-createdat'),
                            }

                            titleEl.innerText = dataProduct.title;
                            momentEl.innerText = dataProduct.moment + ' ngày trước';
                            imageEl.src = dataProduct.image_path;
                            titleEl.href = `san-pham/${dataProduct.slug}`;
                        })
                    })
                    //set default:
                    imageEl.src = liItemEls[0].getAttribute('data-product-image-path');
                    momentEl.innerText = liItemEls[0].getAttribute('data-product-createdat');
                    titleEl.innerText = liItemEls[0].getAttribute('data-product-name');
                    titleEl.href = `san-pham/${liItemEls[0].getAttribute('data-product-slug')}`;
                }
            }
        }
    });

}
