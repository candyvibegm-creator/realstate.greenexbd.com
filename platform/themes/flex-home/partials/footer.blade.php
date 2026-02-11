<footer>
    <br>
    <div class="container-fluid w90">
        <div class="row">
            <div class="col-sm-3">
                @if ($logo = (theme_option('footer_logo') ?: theme_option('logo')))
                    <p>
    <a href="{{ route('public.index') }}">
        <img src="{{ asset('images/logo.png') }}" 
             style="max-height: 60px; width: auto;" 
             alt="{{ Theme::getSiteTitle() }}">
    </a>
</p>
                @endif
                @if ($address = theme_option('address'))
                    <p><i class="fas fa-map-marker-alt"></i> &nbsp;{{ $address }}</p>
                @endif
                @if ($hotline = theme_option('hotline'))
                    <p><i class="fas fa-phone-square"></i>&nbsp;<span class="d-inline-block">{{ __('Hotline') }}: </span>&nbsp;<a href="tel:{{ $hotline }}" dir="ltr">{{ $hotline }}</a></p>
                @endif
                @if ($email = theme_option('email'))
                    <p><i class="fas fa-envelope"></i>&nbsp;<span class="d-inline-block">{{ __('Email') }}: </span>&nbsp;<a href="mailto:{{ $email }}" dir="ltr">{{ $email }}</a></p>
                @endif
            </div>
            <div class="col-sm-9 padtop10">
                <div class="row">
                    {!! dynamic_sidebar('footer_sidebar') !!}
                </div>
            </div>
        </div>
        @if ($languageSwitcher = Theme::partial('language-switcher'))
            <div class="row">
                <div class="col-12">
                    {!! $languageSwitcher !!}
                </div>
            </div>
        @endif
        @if ($copyright = Theme::getSiteCopyright())
            <div class="copyright">
                <div class="col-sm-12">
                    <p class="text-center mb-0">
                        {!! $copyright !!}
                    </p>
                </div>
            </div>
        @endif
    </div>
</footer>

<script>
    window.trans = {
        "Price": "{{ __('Price') }}",
        "Number of rooms": "{{ __('Number of rooms') }}",
        "Number of rest rooms": "{{ __('Number of rest rooms') }}",
        "Square": "{{ __('Square') }}",
        "million": "{{ __('million') }}",
        "billion": "{{ __('billion') }}",
        "in": "{{ __('in') }}",
        "Added to wishlist successfully!": "{{ __('Added to wishlist successfully!') }}",
        "Removed from wishlist successfully!": "{{ __('Removed from wishlist successfully!') }}",
        "I care about this property!!!": "{{ __('I care about this property!!!') }}",
    };
    window.themeUrl = '{{ Theme::asset()->url('') }}';
    window.siteUrl = '{{ route('public.index') }}';
    window.currentLanguage = '{{ App::getLocale() }}';
</script>

<div class="action_footer">
    <a href="#" @class(['cd-top', 'cd-top-40' => !Theme::get('hotlineNumber') && ! $hotline]) title="back to top"><i class="fas fa-arrow-up"></i></a>
    @if (Theme::get('hotlineNumber') || $hotline)
        <a href="tel:{{ Theme::get('hotlineNumber') ?: $hotline }}" class="text-white" style="font-size: 17px;"><i class="fas fa-phone"></i> <span>  &nbsp;{{ Theme::get('hotlineNumber') ?: $hotline }}</span></a>
    @endif
</div>

    {!! Theme::footer() !!}
    
    <style>
        /* Force visibility and layout for Swiper */
        .featured-properties-slider, .featured-projects-slider {
            padding: 50px 0 80px !important;
            margin: 0 auto;
            width: 100%;
            overflow: hidden !important; /* Contain the 3D effect */
            min-height: 500px;
            display: block !important;
        }
        .featured-properties-slider .swiper-slide, .featured-projects-slider .swiper-slide {
            width: 350px !important; /* Slightly wider for better content display */
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease;
        }
        /* Style the actual product cards inside the slides */
        .featured-properties-slider .item, .featured-projects-slider .item {
            width: 100%;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid #ddd;
            margin-bottom: 0 !important;
            animation: none !important; /* Stop the 2D rotation here */
            pointer-events: auto;
            overflow: hidden;
        }
        /* Highlight the active center card */
        .featured-properties-slider .swiper-slide-active .item, .featured-projects-slider .swiper-slide-active .item {
            border: 3px solid var(--primary-color);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
        }
        /* Fix pagination positioning */
        .swiper-pagination {
            position: relative !important;
            margin-bottom: 20px !important;
            top: 0 !important;
        }
        .swiper-pagination-bullet-active {
            background: var(--primary-color) !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Antigravity Swiper: Starting initialization...');

            const initSwiper = (selector) => {
                const element = document.querySelector(selector);
                if (!element) return;

                console.log('Antigravity Swiper: Found ' + selector);
                
                new Swiper(selector, {
                    effect: 'coverflow',
                    grabCursor: true,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    loop: true,
                    initialSlide: 1,
                    coverflowEffect: {
                        rotate: 0,
                        stretch: -50, /* Overlap slides to look like a stack */
                        depth: 250,   /* Make side slides smaller and further back */
                        modifier: 1,
                        slideShadows: true,
                    },
                    pagination: {
                        el: selector + ' .swiper-pagination',
                        clickable: true,
                    },
                });
            };

            // Wait a tiny bit to ensure DOM elements are fully rendered by JS if necessary
            setTimeout(() => {
                initSwiper('.featured-properties-slider');
                initSwiper('.featured-projects-slider');
            }, 100);
        });
    </script>
</body>
</html>
