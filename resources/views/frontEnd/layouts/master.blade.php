<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title') - {{$generalsetting->name}}</title>
        <!-- App favicon -->

        <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" alt="GigPoly"/>
        <meta name="author" content="{{ $generalsetting->name }}">
        @stack('seo')

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage - GigPoly</title>
        <meta name="description" content="Welcome to GigPoly forum, read, write and update!">
        <meta name="theme-color" content="#15171A">

        <!-- preload head styles -->
        <link rel="preload" href="{{asset('public/frontEnd/css/unicons.min.css')}}" as="style">
        <link rel="preload" href="{{asset('public/frontEnd/css/prettify.min.css')}}" as="style">
        <link rel="preload" href="{{asset('public/frontEnd/css/swiper-bundle.min.css')}}" as="style">
        <link rel="preload" href="{{asset('public/frontEnd/css/magic-cursor.min.css')}}" as="style">

        <!-- preload footer scripts -->
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/jquery.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/clipboard.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/scrollmagic.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/swiper-bundle.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/split-type.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/anime.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/gsap.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/typed.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/prettify.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/smooth-scrollbar.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/libs/tilt.min.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/helpers/data-attr-helper.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/helpers/splitype-helper.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/helpers/anime-helper.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/helpers/anime-helper-defined-timelines.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/helpers/typed-helper.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/helpers/tilt-helper.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/core/preloader.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/core/dynamic-background.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/core/magic-cursor.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/core/marquee.js')}}" as="script">
        <link rel="preload" href="{{asset('public/frontEnd/js/app.js')}}" as="script">

        <!-- app head for bootstrap core -->
        <script src="{{asset('public/frontEnd/js/app-head-bs.js')}}"></script>

        <!-- include uni-core components -->
        <link rel="stylesheet" href="{{asset('public/frontEnd/js/uni-core/css/components/base.min.css')}}">

        <!-- include styles -->
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/unicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/prettify.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/magic-cursor.min.css')}}">

        <!-- include main style -->
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/theme/demo-two.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css?v=1.0.0')}}">

        <!-- include scripts -->
        <script src="{{asset('public/frontEnd/js/uni-core/js/uni-core.min.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/libs/countdown.min.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/libs/tooltip.min.js')}}"></script>

    </head>
    <body>
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-3">
                        <div class="sidebar_icon">
                            <img class="icon" width="24" src="{{asset('public/frontEnd/')}}/images/menu.png" alt="Menu trigger">
                        </div>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="main_logo">
                            <a href="{{ route('home') }}">
                                <img width="150" src="{{asset( $generalsetting->dark_logo) }}" alt="Homepage">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-3 mobile-center">
                        <div class="form-area">
                           <form action="{{ route('search') }}" method="get" >
                               <div class="search-form">
                                    <input type="text" class="search-field" placeholder="Search …" value="" name="keyword" title="Search for:" />
                                </div>
                            </form>
                        </div>
                        <div class="search_icon">
                            <img class="icon" width="30" src="{{asset('public/frontEnd/')}}/images/magnifying-glass.png" alt="Search trigger">
                        </div>
                        <div class="main_search">
                            <form action="{{route('search')}}" method="get">
                                <input name="keyword" class="keyword">
                                <button>
                                     <img class="icon" width="24" src="{{asset('public/frontEnd/')}}/images/search.svg" alt="Search trigger">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-area">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="main_menu">
                            <ul>
                                @foreach($menucategories as $index => $category)
                                <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="sidebar_menu">
            <a class="sidebar_close">x</a>
           <ul>
                @foreach($menucategories as $index => $category)
                <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div id="wrapper" class="wrap">
             @yield('content')
        <!-- content end -->
         </div>
        <footer id="footer" class="footer bg-slate-900 text-white uc-dark">
            <div class="footer-outer-area panel overflow-hidden">
                <div class="container max-w-xl">
                    <div class="footer-instagram" id="footer-instagram">
                        <div class="outer overflow-hidden">
                            <div class="container-full">
                                <div class="inner panel">

                                    <div class="row child-cols-3 sm:child-cols col-match g-narrow">
                                        @foreach($post_gallery as $key=>$value)
                                        <div>
                                            <div class="panel">
                                                <div class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset($value->image) }}" alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-inner-area panel vstack gap-4 sm:gap-6 lg:gap-9 py-6 lg:py-9">
                        <div class="footer-widgetized-area panel">
                            <div class="row gx-2 lg:gx-4 gy-4 lg:gy-9">
                                <div class="col-12">
                                    <div class="panel vstack lg:hstack gap-2">
                                        <a class='uc-logo' href="{{ route('home') }}">
                                            <img src="{{ asset($generalsetting->dark_logo) }}" alt="Gigpoly" data-uc-svg>
                                        </a>
                                        <hr class=" d-none lg:d-block">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row child-cols-12  g-4">
                                         <ul class="social-icons nav-x gap-1">
                                                    @foreach ($socialicons as $social)
                                            <li>
                                             <a class="d-inline-flex justify-center items-center transition-all duration-200 ease-in hover:scale-110" href="{{ $social->link }}"><i class="{{ $social->icon }} lg:icon-3"></i></a>
                                            </li>
                                            @endforeach

                                        </ul>
                                        <div>
                                            <div class="widget-wrap">
                                                <div class="widget-heading panel">
                                                </div>
                                                <div class="widget-content footer_link mt-3">
                                                    <ul class="nav-y gap-1 lg:gap-2 fs-6 fw-bold">
                                                        @foreach($CreatePage as $key=>$value)
                                                        <li><a href='{{route('page',$value->slug)}}'>{{ $value->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-copyrights-area panel vstack gap-2">

                            <p class="fs-6 opacity-50 m-0 text-center">{{date('Y')}} © All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!-- include jquery & bootstrap js -->
        <script defer src="{{asset('public/frontEnd')}}/js/libs/jquery.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/bootstrap.min.js"></script>

        <!-- include uni-core components -->
        <script defer src="{{asset('public/frontEnd')}}/js/uni-core/js/components/anime.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/uni-core/js/components/parallax.min.js"></script>

        <!-- include scripts -->
        <script src="{{asset('public/frontEnd')}}/js/libs/clipboard.min.js"></script>
        <script src="{{asset('public/frontEnd')}}/js/libs/prettify.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/swiper-bundle.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/split-type.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/scrollmagic.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/anime.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/gsap.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/typed.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/smooth-scrollbar.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/tilt.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/countdown.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/libs/tooltip.min.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/helpers/data-attr-helper.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/helpers/swiper-helper.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/helpers/splitype-helper.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/helpers/anime-helper.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/helpers/anime-helper-defined-timelines.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/helpers/typed-helper.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/helpers/tilt-helper.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/core/preloader.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/core/dynamic-background.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/core/magic-cursor.js"></script>
        <script defer src="{{asset('public/frontEnd')}}/js/core/marquee.js"></script>

        <!-- include app script -->
        <script defer src="{{asset('public/frontEnd')}}/js/app.js"></script>
        <script>
            // Schema toggle via URL
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const getSchema = urlParams.get("schema");
            if (getSchema === "dark") {
                setDarkMode(1);
            } else if (getSchema === "light") {
                setDarkMode(0);
            }

            // Pretty Print
            window.prettyPrint && prettyPrint();

            // Copy to clipboard
            var clipboard = new ClipboardJS(".ctc");
            clipboard.on("success", function (e) {
                document.getElementById("ctc_collapse").style.display = "flex";
                setTimeout(function () {
                    document.getElementById("ctc_collapse").style.display = "none";
                }, 1000);
                e.clearSelection();
            });
        </script>
        <script src="{{asset('public/backEnd/')}}/assets/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        @stack('script')
        <script>
            $(document).ready(function(){
                 $('.sidebar_icon').click(function(){
                      $('.sidebar_menu').addClass('active');
                   });
                $('.sidebar_close').click(function(){
                  $('.sidebar_menu').removeClass('active');
               });
                $(".search_icon").click(function(){
                    $(".main_search").toggleClass("active");
                });
                $(document).on("click", function(e){
                    if(!$(e.target).closest('.main_search').length && !$(e.target).closest('.search_icon').length) {
                        $(".main_search").removeClass("active");
                    }
                });
            });
        </script>

        <script type="text/javascript">
          window.addEventListener('message', (event) => {
            const iframeElt = document.getElementById('google-iframe');

            switch(event.data.type) {
              case 'verifyPing':
                // This part handles the initial handshake by the Google Yolo iframe.
                // It is sent by OpenYOLO https://github.com/openid/OpenYOLO-Web/blob/dc841704619d7801da0b860c91953ff730fca07f/ts/protocol/post_messages.ts#L27
                event.source.postMessage({
                  type: 'verifyAck',
                  data: event.data.data
                }, '*');
                break;
              case 'credential':
                // The user selected a credential.
                console.log('Received credential!', event.data.credential);
                break;
              case 'error':
                // An error happened.
                console.log('Error:', event.data.error);
                break;
              case 'height':
                // Update the parent <iframe> height to match GoogleYolo <iframe> height
                iframeElt.style.height = event.data.height + 'px';
                break;
              default:
                // Do nothing.
            }
          });
        </script>
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=65e6c7e785049a00196c2d29&product=sop' async='async'></script>
    </body>
</html>
