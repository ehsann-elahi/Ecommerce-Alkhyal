<script src="{{asset('assets/front/catalog/view/javascript/bootstrap/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    $(document).ready(function() {
        const direc = $('html').attr('dir');

        $('#categoryCarousel-0').each(function() {
            if ($(this).length) { // Check if the element exists
                $(this).addClass('slick-theme');
                const items = $(this).data('items') || 1;
                const slickOptions = {
                    rows: 1,
                    dots: false,
                    arrows: false,
                    infinite: false,
                    speed: 300,
                    fadeInOut: true,
                    slidesToShow: items,
                    slidesToScroll: 1,
                    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
                    responsive: [{
                            breakpoint: 1441,
                            settings: {
                                slidesToShow: items,
                                slidesToScroll: items
                            }
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: ((items - 1) > 1) ? (items - 1) : 1,
                                slidesToScroll: ((items - 1) > 1) ? (items - 1) : 1
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: ((items - 2) > 1) ? (items - 2) : 1,
                                slidesToScroll: ((items - 2) > 1) ? (items - 2) : 1
                            }
                        },
                        {
                            breakpoint: 426,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                }
                if (direc == 'rtl') slickOptions['rtl'] = true;
                $(this).slick(slickOptions);
            }
        });
    });
</script>
<script type="text/javascript">
    $('#tabs-14 a').mttabs();
</script>
<script>
    $(document).ready(function() {
        const direc = $('html').attr('dir');

        $('#testimonialCarousel-0').each(function() {
            if ($(this).length) { // Check if the element exists
                $(this).addClass('slick-theme');
                const items = $(this).data('items') || 1;
                const slickOptions = {
                    rows: 1,
                    dots: true,
                    arrows: false,
                    infinite: false,
                    speed: 300,
                    fadeInOut: true,
                    slidesToShow: items,
                    slidesToScroll: 1,
                    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
                    responsive: [{
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: items,
                                slidesToScroll: items
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: ((items - 1) > 1) ? (items - 1) : 1,
                                slidesToScroll: ((items - 1) > 1) ? (items - 1) : 1
                            }
                        },
                        {
                            breakpoint: 541,
                            settings: {
                                slidesToShow: ((items - 2) > 1) ? (items - 2) : 1,
                                slidesToScroll: ((items - 2) > 1) ? (items - 2) : 1
                            }
                        },
                        {
                            breakpoint: 0,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                }
                if (direc == 'rtl') slickOptions['rtl'] = true;
                $(this).slick(slickOptions);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        const direction = $('html').attr('dir');
        //
        const showDots = 0;
        const showControl = 0;
        const itemLength = 1;
        const effect = 'slide';
        const perSlide = 5;
        const arrows = (showControl && itemLength) ? true : false;
        const dots = (showDots && itemLength) ? true : false;
        //
        const mainSlickOptions = {
            rows: 1,
            infinite: true,
            slidesToShow: perSlide,
            slidesToScroll: perSlide,
            fade: (effect == 'fade') ? true : false,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows,
            dots,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
            responsive: [{
                    breakpoint: 1751,
                    settings: {
                        slidesToShow: perSlide,
                        slidesToScroll: perSlide
                    }
                },
                {
                    breakpoint: 1441,
                    settings: {
                        slidesToShow: ((perSlide - 1) > 1) ? (perSlide - 1) : 1,
                        slidesToScroll: ((perSlide - 1) > 1) ? (perSlide - 1) : 1
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: ((perSlide - 2) > 1) ? (perSlide - 2) : 1,
                        slidesToScroll: ((perSlide - 2) > 1) ? (perSlide - 2) : 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: ((perSlide - 3) > 1) ? (perSlide - 3) : 1,
                        slidesToScroll: ((perSlide - 3) > 1) ? (perSlide - 3) : 1
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: ((perSlide - 4) > 1) ? (perSlide - 4) : 1,
                        slidesToScroll: ((perSlide - 4) > 1) ? (perSlide - 4) : 1
                    }
                },
                {
                    breakpoint: 0,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        if (direction == 'rtl') mainSlickOptions['rtl'] = true;
        $('#slickBanner-1').slick(mainSlickOptions);
    });
</script>

<script>
    $(document).ready(function() {
        const direc = $('html').attr('dir');

        $('#blogCarousel-0').each(function() {
            if ($(this).length) { // Check if the element exists
                $(this).addClass('slick-theme');
                const items = $(this).data('items') || 1;
                const slickOptions = {
                    rows: 1,
                    dots: false,
                    arrows: true,
                    infinite: false,
                    speed: 300,
                    padding: 15,
                    fadeInOut: true,
                    slidesToShow: items,
                    slidesToScroll: 1,
                    prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-angle-right"></i></button>',
                    responsive: [{
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: items,
                                slidesToScroll: items
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: ((items - 1) > 1) ? (items - 1) : 1,
                                slidesToScroll: ((items - 1) > 1) ? (items - 1) : 1
                            }
                        },
                        {
                            breakpoint: 541,
                            settings: {
                                slidesToShow: ((items - 2) > 1) ? (items - 2) : 1,
                                slidesToScroll: ((items - 2) > 1) ? (items - 2) : 1
                            }
                        },
                        {
                            breakpoint: 0,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                }
                if (direc == 'rtl') slickOptions['rtl'] = true;
                $(this).slick(slickOptions);
            }
        });
    });
</script>
<script>
    function subscribe(value) {
        console.log($("#frmnewsletter-" + value), 0)
        console.log($("#frmnewsletter-" + value).serialize())
        $.ajax({
            type: 'post',
            url: 'index.php?route=extension/mahardhi/module/mtnewsletter.subscribe',
            dataType: 'html',
            data: $("#frmnewsletter-0").serialize(),
            success: function(html) {
                try {
                    const res = JSON.parse(html);
                    let msgClass = 'newsletter-message';
                    if (0) msgClass = 'newsletter-popup-message';
                    if (res.success) {
                        $(`.${msgClass}.msg-0`).html(`<div class='alert alert-success alert-dismissible'>${res.success}<button type="button" class="btn-close close" data-bs-dismiss="alert"></button></div>`);
                        $("#frmnewsletter-0")[0].reset();
                    } else {
                        $(`.${msgClass}.msg-0`).html(`<div class='alert alert-danger alert-dismissible'>${res.error}<button type="button" class="btn-close close" data-bs-dismiss="alert"></button></div>`);
                        $("#frmnewsletter-0")[0].reset();
                    }
                } catch (e) {
                    console.log(e, 'Error');
                }
            }
        })
    }

    if (0) {
        // transition effect
        if ($.cookie("showpopup") != 1) {
            setTimeout(function() {
                if (bootstrap && bootstrap.Modal) {
                    var myModal0 = new bootstrap.Modal(document.getElementById("newsletter-popup-0"), {});
                    myModal0.show();
                }
            }, 1000)
        }
        $('#popup_dont_show_again').on('change', function() {
            if ($.cookie("showpopup") != 1) {
                $.cookie("showpopup", '1')
            } else {
                $.cookie("showpopup", '0')
            }
        });
    }
</script>

<script>
    $(document).on('click', '.quickview-btn', function() {
        $('#quickViewModal').modal('hide');
    });
    $(document).on('click', '.quickview-button', function() {
        var productId = $(this).data('id');

        $.ajax({
            url: '/quick_view/' + productId,
            type: 'GET',
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                    return;
                }

                // Inject Product Details
                $('#quick-title').text(response.name);
                $('#price-new').text(response.price + 'AED / Meter');
                $('#quick-product-id').text(response.id);
                $('#input-product-id').val(response.id);
                $('#quick-main-image').attr('src', response.image);
                $('#quick-description').html(response.description);
                $('#stock').html(response.stock);
                $('.minus').attr('data-id', response.id);
                $('.plus').attr('data-id', response.id);
                $('input[name="quantity"]').remove();
                $('#form-product-quickview .minus-plus').html(`
                    <button type="button" class="minus" data-id="${response.id}"><i class="fa fa-minus"></i></button>
                    <input type="text" name="quantity" id="input-quantity-${response.id}" data-id="${response.id}" value="1" size="2" class="form-control">
                    <button type="button" class="plus" data-id="${response.id}"><i class="fa fa-plus"></i></button>
                `);

                // Stock Availability
                var stockText = response.stock > 0 ? "In Stock" : "Out of Stock";
                $('#quick-stock').text(stockText);

                // Remove Previous Gallery & Unbind Slick
                if ($('#quick-carousel').hasClass('slick-initialized')) {
                    $('#quick-carousel').slick('unslick');
                }
                $('#quick-carousel').empty(); // Gallery ko empty karna zaroori hai

                // Load Gallery Images
                let mainImage = response.image; // Store main image

                if (response.gallery && response.gallery.length > 0) {
                    response.gallery.forEach(function(img) {
                        $('#quick-carousel').append(`
                            <div class="image-additional">
                                <a href="#" class="gallery-image" data-img="${img}">
                                    <img src="${img}" class="img-fluid" alt="${response.name}">
                                </a>
                            </div>
                        `);
                    });
                }

                // Wait for Images to Load Before Initializing Slick
                setTimeout(() => {
                    $('#quick-carousel').slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                        arrows: true,
                        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>'
                    });
                }, 300);

                // Show Modal
                $('#quickViewModal').modal('show');

                // **Gallery Image Click Event**
                $(document).on('click', '.gallery-image', function(e) {
                    e.preventDefault();

                    let newMainImage = $(this).data('img');
                    let currentMainImage = $('#quick-main-image').attr('src');

                    // Swap Images
                    $('#quick-main-image').attr('src', newMainImage);
                    $(this).data('img', currentMainImage);
                    $(this).find('img').attr('src', currentMainImage);
                });
            }
        });
    });
</script>

<!-- add to cart -->
<script>
    $(document).on('click', '.addcart', function(e) {
        e.preventDefault(); // Form submit hone se rokna

        var form = $(this).closest('form');
        var productId = form.find('input[name="product_id"]').val();
        var quantity = form.find('input[name="quantity"]').val();
        $.ajax({
            url: '/add-to-cart',
            type: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token
            },
            success: function(response) {
                // showAlert(`Success: You have added <a href="#">${response.product_name}</a> to your <a href="/cart">shopping cart</a>!`, 'success');
                // $('.cart-count').text(response.cart_count); // Update cart count
                // loadCartItems();
                window.location.href = '/cart/view';
            },
            error: function(xhr) {
                showAlert(`Error: ${xhr.responseJSON.error}`, 'danger'); // Show error alert
            }
        });
    });

    function showAlert(message, type = 'success') {
        var alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check"></i> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        var alertContainer = $('#alert'); // **Find the Alert Container**
        alertContainer.html(alertHtml); // **Inject Alert Message**

        // **Auto fade out after 3 seconds**
        setTimeout(function() {
            $(".alert").fadeOut(500, function() {
                $(this).remove(); // Remove from DOM after fade out
            });
        }, 3000);
    }

    $(document).on("click", ".remove-from-cart", function() {
        let productId = $(this).data("id");

        $.ajax({
            url: "{{ route('cart.remove') }}", // Route jo item remove karega
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId,
            },
            success: function(response) {
                $(".cart-count").text(response.cart_count); // Update cart count
                loadCartItems();
                showAlert(`Success: Cart Item <a href="#">${response.product_name}</a> Remove Successfully!`, 'success');

            },
            error: function(xhr) {
                showAlert(`Error: ${xhr.responseJSON.error}`, "danger"); // Show error alert
            },
        });
    });

    $(document).on("click", ".clear-cart", function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('cart.clear') }}",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function(response) {
                $(".cart-count").text(response.cart_count); // Update cart count
                $(".dropdown-menu").html(response.cart_html); // Refresh cart UI
                showAlert(response.success, "success");
            },
            error: function(xhr) {
                showAlert(`Error: ${xhr.responseJSON.error}`, "danger");
            }
        });
    });


    function loadCartItems() {
        $.ajax({
            url: "/cart/items", // New route to fetch cart items
            type: "GET",
            success: function(response) {
                $(".dropdown-menu").html(response.cart_html); // Update cart dropdown
            },
        });
    }

    $(document).ready(function() {
        $(".wishlist-button").on("click", function(e) {
            e.preventDefault();
            var productId = $(this).data("id");

            $.ajax({
                url: "{{ route('wishlist.add') }}",
                type: "POST",
                data: {
                    product_id: productId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#wishlist-total").text("Wish List (" + response.count + ")");
                    showAlert(`Success: Product <a href="#">${response.product_name}</a> added to wishlist!`, 'success');
                }
            });
        });

        // Wishlist count update on page load
        $.ajax({
            url: "{{ route('wishlist.count') }}",
            type: "GET",
            success: function(response) {
                $("#wishlist-total").text("Wish List (" + response.count + ")");
            }
        });
    });

    $(document).ready(function() {
        $(".compare-button").on("click", function(e) {
            e.preventDefault();
            var productId = $(this).data("id");

            $.ajax({
                url: "{{ route('product.compare') }}",
                type: "POST",
                data: {
                    product_id: productId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#compare-total").text("compare Product (" + response.count + ")");
                    showAlert(`Success: Product <a href="#">${response.product_name}</a> added to compare!`, 'success');
                }
            });
        });

        // Wishlist count update on page load
        $.ajax({
            url: "{{ route('product.compare.count') }}",
            type: "GET",
            success: function(response) {
                $("#compare-total").text("compare Product (" + response.count + ")");
            }
        });
    });


    $('#input-sort, #input-limit, #input-category').on('change', function () {
        let category = $('#input-category').val();
        let sort = $('#input-sort').val();
        let limit = $('#input-limit').val();
        // Get current path (e.g., /category/bed-sheets OR /products)
        let currentPath = window.location.pathname;

        // Build query string
        let query = `?category_id=${category}&sort=${sort}&limit=${limit}`;
        window.location.href = currentPath + query;
    });


</script>

@yield('script')
