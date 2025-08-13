<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title') | {{ config('app.name','Laravel') }}</title>
<base />
<meta name="description" content="@yield('description')">
<meta name="og:description" content="@yield('og:description')">
<meta name="keywords" content="Buy luxury curtains Online, curtains Dubai, curtains Abu Dhabi, Ajman, Sharjah, top quality, cheap price, competent, quick service, five star rating, unique design, interior, best interior, best curtain seller, fancy curtain, curtain trader, curtain seller, wholeseller, best seller">
<meta property="og:title" content="@yield('og:title')">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.alkhyalcurtain.ae/" />
<meta property="og:site_name" content="alkhyalcurtain" />
<meta property="og:image" content="https://prod-cdn.metadigitalmarketing.ae/assets/img/logo/MetaDigitalMarketing_AElogo.png" />
<meta property="og:image:height" content="1200" />
<meta property="og:image:width" content="630" />

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{asset('assets/front/catalog/view/javascript/jquery/jquery-3.7.1.min.js')}}" type="text/javascript"></script>
<link href="{{asset('assets/front/catalog/view/stylesheet/bootstrap.css')}}" type="text/css" rel="stylesheet" media="screen" />
<link href="{{asset('assets/front/catalog/view/stylesheet/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{asset('assets/front/catalog/view/javascript/jquery/datetimepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/catalog/view/javascript/jquery/datetimepicker/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/catalog/view/javascript/jquery/datetimepicker/daterangepicker.js')}}"></script>
<link href="{{asset('assets/front/catalog/view/javascript/jquery/datetimepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/front/catalog/view/javascript/common.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/front/extension/mahardhi/catalog/view/javascript/tabs.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/front/extension/mahardhi/catalog/view/javascript/quickview.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/front/extension/mahardhi/catalog/view/javascript/jquery.cookie.js')}}" type="text/javascript"></script>
<link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('sitemap.xml') }}">
<link href="{{asset('/assets/front/image/catalog/logo.png')}}" rel="icon">
<link rel="canonical" href="@yield('canonical')" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<!-- Mahardhi -->
<link href="{{asset('assets/front/catalog/view/javascript/jquery/magnific/magnific-popup.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/front/extension/mahardhi/catalog/view/stylesheet/mahardhi-font.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/extension/mahardhi/catalog/view/stylesheet/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/extension/mahardhi/catalog/view/stylesheet/slick.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/extension/mahardhi/catalog/view/stylesheet/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/extension/mahardhi/catalog/view/stylesheet/stylesheet.css')}}" type="text/css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
<script src="{{asset('assets/front/catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/front/extension/mahardhi/catalog/view/javascript/jquery.elevateZoom.min.js')}}"></script>
<script src="{{asset('assets/front/extension/mahardhi/catalog/view/javascript/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/front/extension/mahardhi/catalog/view/javascript/slick.min.js')}}"></script>
<script src="{{asset('assets/front/extension/mahardhi/catalog/view/javascript/mtsearch.js')}}"></script>
<script src="{{asset('assets/front/extension/mahardhi/catalog/view/javascript/custom.js')}}"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16687627277"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-16687627277');
</script>
<style>
    :root {
        --primary-color: #222222;
        --primary-hover-color: #2e798c;
        --secondary-color: #ffffff;
        --secondary-hover-color: #ff7a00;
        --secondary-light-color: #777777;
        --background-color: #f5f5f5;
        --border-color: #e5e5e5
    }

    .cart-count {
        font-size: 10px;
        color: #fff;
        margin-left: -7px;
        background: #2E798C;
        border-radius: 100%;
        height: 19px;
        width: 16px;
        text-align: center;
    }
</style>


<script type="text/javascript">
    $('#mahardhiSearch .btn-search button').bind('click', function() {
        url = 'index64b3.html?route=product/search';

        var search = $('#mahardhiSearch input[name=\'search\']').prop('value');
        if (search) {
            url += '&search=' + encodeURIComponent(search);
        }

        var category_id = $('#mahardhiSearch select[name=\'category_id\']').prop('value');
        if (category_id > 0) {
            url += '&category_id=' + encodeURIComponent(category_id);
            // url += '&sub_category=true';
            // url += '&description=true';
        }

        location = url;
    });

    $('#mahardhiSearch input[name=\'search\']').bind('keydown', function(e) {
        if (e.keyCode == 13) {
            $('#mahardhiSearch .btn-search button').trigger('click');
        }
    });
</script>
<script>
    $(document).ready(function() {
        var headerfixed = 0;
        if (headerfixed == 1) {
            $(window).scroll(function() {
                if ($(window).width() > 991) {
                    if ($(this).scrollTop() > 110) {
                        $('header').addClass('header-fixed');
                    } else {
                        $('header').removeClass('header-fixed');
                    }
                } else {
                    $('header').removeClass('header-fixed');
                }
            });
        } else {
            $('header').removeClass('header-fixed');
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        const direction = $('html').attr('dir');
        const mainSlickOptions = {
            rows: 1,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: false,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: true,
            dots: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        };
        if (direction === 'rtl') {
            mainSlickOptions['rtl'] = true;
        }

        // Initialize Slick if the element exists
        if ($("#slickBanner-0").length) {
            $("#slickBanner-0").slick(mainSlickOptions);
        } else {
            console.error("Slick element not found!");
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Ensure that the carousel exists before initializing
        if ($('#categoryCarousel-0').length > 0) {
            $('#categoryCarousel-0').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                dots: false,
                infinite: true,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }
    });
</script>

<!-- Add this script to your page -->
<script>
    $(document).ready(function() {
        // Initialize the category carousel
        if ($('#categoryCarousel-1').length > 0) {
            $('#categoryCarousel-1').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                infinite: true,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            // Fix for text overflow
            $('.promo-title').each(function() {
                if (this.offsetWidth < this.scrollWidth) {
                    $(this).attr('title', $(this).text());
                }
            });
        }
    });
</script>
@yield('styles')

@stack('header')
