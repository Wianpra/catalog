<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('headerName') | ORCANA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('/') }}assets/img/Logo-Circle.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/icon.png">
    
    <!-- ************************* CSS Files ************************* -->
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.css">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/vendor.css">
    
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    @yield('script')
    @livewireStyles
</head>

<body>
    
    <!-- Preloader Start -->
    <div class="ft-preloader active">
        <div class="ft-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="ft-child ft-bounce1"></div>
            <div class="ft-child ft-bounce2"></div>
            <div class="ft-child ft-bounce3"></div>
        </div>
    </div>
    <!-- Preloader End -->
    
    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <!-- Header Start -->
        <header class="header">
            <div class="header__inner fixed-header">
                <div class="header__main bg-color" data-bg-color="#fdedc9">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="header__main-inner">
                                    <div class="header__main-left">
                                        <div class="logo">
                                            <a href="{{ url('/') }}" class="logo--normal">
                                                <img src="{{ asset('/') }}assets/img/logo-black2.png" alt="Logo" style="width: 80% !important;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="header__main-center">
                                        <nav class="main-navigation text-centerk">
                                            <ul class="mainmenu">
                                                <li class="mainmenu__item">
                                                    <a href="{{ url('/') }}" class="mainmenu__link">
                                                        <span class="mm-text">Home</span>
                                                    </a>
                                                </li>
                                                
                                                <li class="mainmenu__item menu-item-has-children">
                                                    <a href="#" class="mainmenu__link">
                                                        <span class="mm-text">About Us</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="{{ url('/about-us') }}">
                                                                <span class="mm-text">Vision, Mission, & History</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="mm-text">Management</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="mm-text">Core Value</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mainmenu__item">
                                                    <a href="#" class="mainmenu__link">
                                                        <span class="mm-text">Knowledges</span>
                                                    </a>
                                                </li>
                                                <li class="mainmenu__item menu-item-has-children">
                                                    <a href="{{ url('product-catalog') }}" class="mainmenu__link">
                                                        <span class="mm-text">Catalog</span>
                                                    </a>
                                                    <ul class="sub-menu" id="sub-menu">
                                                        
                                                    </ul>
                                                </li>
                                                <li class="mainmenu__item">
                                                    <a href="{{ route('contact-us') }}" class="mainmenu__link">
                                                        <span class="mm-text">Contact Us</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="header__main-right">
                                        @yield('search')
                                        <form wire:submit.prevent="Searching">
                                            <div class="input-group mb-3">
                                                <input style="border:none" type="text" class="form-control" wire:model.defer="search" name="search" id="search" placeholder="search..." aria-label="search..." aria-describedby="basic-addon2">
                                                
                                                <button type="submit" wire:click="Searching" style="background-color:white; border:none" class="input-group-text" id="basic-addon2"><i class="la la-search"></i></button>
                                            </div>
                                        </form>
                                        {{-- <div class="header-toolbar-wrap">
                                            <div class="header-toolbar">
                                                <div class="header-toolbar__item header-toolbar--search-btn">
                                                    <a href="#searchForm" class="header-toolbar__btn toolbar-btn">
                                                        <i class="la la-search"></i>
                                                    </a>
                                                </div>
                                                <div class="header-toolbar__item d-block d-lg-none">
                                                    <a href="#offcanvasMenu" class="header-toolbar__btn toolbar-btn menu-btn">
                                                        <div class="hamburger-icon">
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
        
        <!-- Main Wrapper Start -->
        <div class="wrapper">
            @include('sweetalert::alert')
            <!-- Header Start -->
            @yield('content')
            <!-- Main Content Wrapper End -->
            
            <!-- Footer Start-->
            <footer class="footer bg-color" data-bg-color="#f4f8fa">
                <div class="footer-top">
                    <div class="container-fluid">
                        <div class="row border-bottom pt--70 pb--70">
                            <div class="col-lg-3 col-sm-6 offset-md-1 offset-lg-0 mb-md--45">
                                <div class="footer-widget">
                                    <div class="textwidget">
                                        <figure class="footer-logo mb--30">
                                            <img src="{{ asset('/') }}assets/img/logo-black2.png" alt="Logo" width="290 px" height="80px">
                                        </figure>
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-3 offset-lg-1 offset-sm-2 mb-md--45">
                                <div class="footer-widget">
                                    <h3 class="widget-title mb--35 mb-sm--20">Company</h3>
                                    <div class="footer-widget">
                                        <ul class="footer-menu">
                                            <li><a href="{{ url('about-us') }}">About Us</a></li>
                                            <li><a href="blog.html">Blogs</a></li>
                                            <li><a href="#">Careers</a></li>
                                            <li><a href="{{ url('contact-us') }}">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 offset-md-1 offset-lg-0 mb-xs--45">
                                <div class="footer-widget">
                                    <h3 class="widget-title mb--35 mb-sm--20">Product</h3>
                                    <div class="footer-widget">
                                        <ul class="footer-menu" id="foot-product">
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 mb-xs--45">
                                <div class="footer-widget">
                                    <h3 class="widget-title mb--35 mb-sm--20">Helps</h3>
                                    <div class="footer-widget">
                                        <ul class="footer-menu">
                                            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                <div class="footer-widget">
                                    <h3 class="widget-title mb--35 mb-sm--20">Social Media</h3>
                                    <div class="footer-widget">
                                        <ul class="footer-menu">
                                            <li><a href="https://wa.me/6282234676734" target="_blank">WhatsApp</a></li>
                                            <li><a href="https://instagram.com/orcana.universal?utm_medium=copy_link"  target="_blank">Instagram</a></li>
                                            <li><a href="https://www.facebook.com/profile.php?id=100077552217335" target="_blank">Facebook</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container-fluid">
                        <div class="row border-top ptb--20">
                            <div class="row">
                                <div class="col-3"></div>
                                <p class="copyright-text col-6 text-center">&copy; Lunarian</p>
                                @if (!Auth::check())
                                <a href="{{ route('login') }}" class="col-3" style="text-align: right">
                                    Admin
                                </a>
                                @else
                                <div class="col-3"  style="text-align: right">
                                    <div class="row">
                                        <a href="{{ url('product-admin') }}" class="col-8">
                                            Dashboard
                                        </a>
                                        <a href="{{ route('logout') }}" class="col-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </div>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer End-->
            
            <!-- OffCanvas Menu Start -->
            <div class="offcanvas-menu-wrapper" id="offcanvasMenu">
                <div class="offcanvas-menu-inner">
                    <a href="" class="btn-close">
                        <i class="la la-remove"></i>
                    </a>
                    <nav class="offcanvas-navigation">
                        <ul class="offcanvas-menu">
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ url('/product-catalog') }}">Catalog</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}">Knowledges</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}">Contact Us</a>
                            </li>
                            @if (!Auth::check())
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            @else
                            <li class="menu-item-has-children active">
                                <a href="#">{{ Auth::user()->name }}</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ url('product-admin') }}">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                        <div class="site-info vertical">
                            <div class="site-info__item">
                                <a href="tel:+01223566678"><strong>+01 2235 666 78</strong></a>
                                <a href="mailto:Support@contixs.com">Support@furtrate.com</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- OffCanvas Menu End -->
            
            
            <!-- Global Overlay Start -->
            <a class="scroll-to-top" href=""><i class="la la-angle-double-up"></i></a>
            <!-- Global Overlay End -->
        </div>
        <!-- Main Wrapper End -->
        
        
        <!-- ************************* JS Files ************************* -->
        
        <!-- jQuery JS -->
        <script src="{{ asset('/') }}assets/js/vendor.js"></script>
        
        <!-- Main JS -->
        <script src="{{ asset('/') }}assets/js/main.js"></script>
        <script>
            $(document).ready(function(){
                $.ajax({
                    url: `/getData-mainCategory`,
                    method: "GET",
                    success: function(data){
                        data[0].forEach(function (item) {
                            $('#sub-menu').append(`
                                <li class="menu-item-has-children">
                                    <a href="{{url('/product-category/${item.id}')}}"><span class="mm-text">${item.main_category}</span></a>
                                    <ul class="sub-menu" id="${item.id}">
                                        `+data[1].map(function (value) {
                                            if (item.id == value.main_category) {
                                                return "<li><a href='{{url('/product-subcategory/')}}/"+value.id+"'>"+value.category+"</a></li>"
                                            }
                                        }).join("")+`
                                    </ul>
                                </li>
                            `);
                            $('#foot-product').append(`<li><a href="{{url('/product-category/${item.id}')}}">${item.main_category}</a></li>`)
                        })
                    },
                    error: function(error){
                        console.log(error)
                    },
                })
            });
        </script>
        @livewireScripts
        @yield('script')
    </body>
    
    </html>