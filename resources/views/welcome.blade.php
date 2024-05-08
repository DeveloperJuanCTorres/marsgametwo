<x-app-layout>
    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


        <!-- Navbar Movil start -->
        <div class="container-fluid sticky-top px-0 m-block my-2">
            <!-- <div class="container-fluid topbar bg-dark d-none d-lg-block">
                <div class="container px-0">
                    <div class="topbar-top d-flex justify-content-between flex-lg-wrap">
                        <div class="top-info flex-grow-0">
                            <span class="rounded-circle btn-sm-square bg-primary me-2">
                                <i class="fas fa-bolt text-white"></i>
                            </span>
                            <div class="pe-2 me-3 border-end border-white d-flex align-items-center">
                                <p class="mb-0 text-white fs-6 fw-normal">Noticia</p>
                            </div>
                            <div class="overflow-hidden" style="width: 735px;">
                                <div id="note" class="ps-2">
                                    <img src="img/features-fashion.jpg" class="img-fluid rounded-circle border border-3 border-primary me-2" style="width: 30px; height: 30px;" alt="">
                                    <a href="#"><p class="text-white mb-0 link-hover">Próximamente la web que revolucionará los juegos de apuestas.</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="top-link flex-lg-wrap">
                            <i class="fas fa-calendar-alt text-white border-end border-secondary pe-2 me-2"> <span class="text-body">Tuesday, Sep 12, 2024</span></i>
                            <div class="d-flex icon">
                                <p class="mb-0 text-white me-2">Síguenos:</p>
                                <a href="" class="me-2"><i class="fab fa-facebook-f text-body link-hover"></i></a>
                                <a href="" class="me-2"><i class="fab fa-instagram text-body link-hover"></i></a>
                                <a href="" class="me-2"><i class="fab fa-youtube text-body link-hover"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="container-fluid bg-white" style="position: fixed;z-index: 9;">
                <div class="container px-0">
                    <nav class="navbar navbar-light navbar-expand-xl">
                        <a href="/" class="navbar-brand mt-3">
                            <img src="{{asset('img/logo.png')}}" width="250" alt="marsgame">
                            <!-- <p class="text-primary display-6 mb-2" style="line-height: 0;">Newsers</p>
                            <small class="text-body fw-normal" style="letter-spacing: 12px;">Nespaper</small> -->
                        </a>
                        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        <div class="collapse navbar-collapse bg-white py-3" id="navbarCollapse">
                            <div class="navbar-nav mx-auto border-top">
                                <a href="javascript:void(0)" class="nav-item nav-link active claseh2 open_juegos juegos_nav" id="juegos_nav">Inicio</a>
                                <a href="javascript:void(0)" class="nav-item nav-link claseh2 open_nosotros nosotros_nav" id="nosotros_nav">Nosotros</a>
                                <!-- <a href="404.html" class="nav-item nav-link">404 Page</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dropdown</a>
                                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                        <a href="#" class="dropdown-item">Dropdown 1</a>
                                        <a href="#" class="dropdown-item">Dropdown 2</a>
                                        <a href="#" class="dropdown-item">Dropdown 3</a>
                                        <a href="#" class="dropdown-item">Dropdown 4</a>
                                    </div>
                                </div> -->
                                <a href="#" class="nav-item nav-link claseh2 open_contactanos contactanos_nav" id="contactanos_nav">Contactanos</a>  
                                @auth
                                <div class="nav-item dropdown ml-0">
                                    <a href="#" class="nav-link dropdown-toggle claseh2" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                        <div class="flex items-center px-4">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <div class="shrink-0 me-3">
                                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                </div>
                                            @endif

                                            <div>
                                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                            </div>
                                        </div>

                                        <div class="mt-3 space-y-1">
                                            <!-- Account Management -->
                                            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                                {{ __('Profile') }}
                                            </x-responsive-nav-link>

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                                    {{ __('API Tokens') }}
                                                </x-responsive-nav-link>
                                            @endif

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-responsive-nav-link href="{{ route('logout') }}"
                                                            @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-responsive-nav-link>
                                            </form>

                                            <!-- Team Management -->
                                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                <div class="border-t border-gray-200"></div>

                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Team') }}
                                                </div>

                                                <!-- Team Settings -->
                                                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                                    {{ __('Team Settings') }}
                                                </x-responsive-nav-link>

                                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                    <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                                        {{ __('Create New Team') }}
                                                    </x-responsive-nav-link>
                                                @endcan

                                                <!-- Team Switcher -->
                                                @if (Auth::user()->allTeams()->count() > 1)
                                                    <div class="border-t border-gray-200"></div>

                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Switch Teams') }}
                                                    </div>

                                                    @foreach (Auth::user()->allTeams() as $team)
                                                        <x-switchable-team :team="$team" component="responsive-nav-link" />
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @else
                                <a href="/login" class="nav-item nav-link claseh2">Login</a>
                                @endauth                                
                            </div>                                             
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Navbar Web start -->
        <div class="container-fluid sticky-top px-0 m-none my-2">
            <!-- <div class="container-fluid topbar bg-dark d-none d-lg-block">
                <div class="container px-0">
                    <div class="topbar-top d-flex justify-content-between flex-lg-wrap">
                        <div class="top-info flex-grow-0">
                            <span class="rounded-circle btn-sm-square bg-primary me-2">
                                <i class="fas fa-bolt text-white"></i>
                            </span>
                            <div class="pe-2 me-3 border-end border-white d-flex align-items-center">
                                <p class="mb-0 text-white fs-6 fw-normal">Noticia</p>
                            </div>
                            <div class="overflow-hidden" style="width: 735px;">
                                <div id="note" class="ps-2">
                                    <img src="img/features-fashion.jpg" class="img-fluid rounded-circle border border-3 border-primary me-2" style="width: 30px; height: 30px;" alt="">
                                    <a href="#"><p class="text-white mb-0 link-hover">Próximamente la web que revolucionará los juegos de apuestas.</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="top-link flex-lg-wrap">
                            <i class="fas fa-calendar-alt text-white border-end border-secondary pe-2 me-2"> <span class="text-body">Tuesday, Sep 12, 2024</span></i>
                            <div class="d-flex icon">
                                <p class="mb-0 text-white me-2">Síguenos:</p>
                                <a href="" class="me-2"><i class="fab fa-facebook-f text-body link-hover"></i></a>
                                <a href="" class="me-2"><i class="fab fa-instagram text-body link-hover"></i></a>
                                <a href="" class="me-2"><i class="fab fa-youtube text-body link-hover"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <div class="col-9 container-fluid bg-white" style="position: fixed;z-index: 9;">
                <div class="container px-0">
                    <nav class="navbar navbar-light navbar-expand-xl">
                        <a href="/" class="navbar-brand mt-3">
                            <img src="{{asset('img/logo.png')}}" width="250" alt="marsgame">
                        </a>
                        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        <!-- <div class="collapse navbar-collapse bg-white py-3" id="navbarCollapse">
                            <div class="navbar-nav mx-auto border-top">
                                <a href="/" class="nav-item nav-link active">Inicio</a>
                                <a href="#" class="nav-item nav-link">Nosotros</a>
                                <a href="#" class="nav-item nav-link">Contactanos</a>  
                                @auth
                                <div class="nav-item dropdown ml-0">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                        <div class="flex items-center px-4">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <div class="shrink-0 me-3">
                                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                </div>
                                            @endif

                                            <div>
                                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                            </div>
                                        </div>

                                        <div class="mt-3 space-y-1">
                                           
                                            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                                {{ __('Profile') }}
                                            </x-responsive-nav-link>

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                                    {{ __('API Tokens') }}
                                                </x-responsive-nav-link>
                                            @endif

                                           
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-responsive-nav-link href="{{ route('logout') }}"
                                                            @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-responsive-nav-link>
                                            </form>

                                         
                                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                <div class="border-t border-gray-200"></div>

                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Team') }}
                                                </div>

                                             
                                                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                                    {{ __('Team Settings') }}
                                                </x-responsive-nav-link>

                                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                    <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                                        {{ __('Create New Team') }}
                                                    </x-responsive-nav-link>
                                                @endcan

                                               
                                                @if (Auth::user()->allTeams()->count() > 1)
                                                    <div class="border-t border-gray-200"></div>

                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Switch Teams') }}
                                                    </div>

                                                    @foreach (Auth::user()->allTeams() as $team)
                                                        <x-switchable-team :team="$team" component="responsive-nav-link" />
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @else
                                <a href="/login" class="nav-item nav-link">Login</a>
                                @endauth                                
                            </div>                                             
                        </div> -->
                        <div class="btn-group mx-auto" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check open_juegos" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label style="width: 100px;" class="btn btn-outline-mars" for="btnradio1"><i style="font-size: 32px;" class="las la-house-damage"></i></label>

                            <input type="radio" class="btn-check open_nosotros" name="btnradio" id="btnradio2" autocomplete="off">
                            <label style="width: 100px;" class="btn btn-outline-mars" for="btnradio2"><i style="font-size: 32px;" class="las la-building"></i></label>

                            <input type="radio" class="btn-check open_contactanos" name="btnradio" id="btnradio3" autocomplete="off">
                            <label style="width: 100px;" class="btn btn-outline-mars" for="btnradio3"><i style="font-size: 32px;" class="las la-address-book"></i></label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                            <label style="width: 100px;" class="btn btn-outline-mars" for="btnradio4"><a href="/login"><i style="font-size: 32px;" class="las la-user"></i></a></label>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Features Start -->
        <!-- <div class="container-fluid features mb-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="row g-4 align-items-center features-item">
                            <div class="col-4">
                                <div class="rounded-circle position-relative">
                                    <div class="overflow-hidden rounded-circle">
                                        <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features-content d-flex flex-column">
                                    <p class="text-uppercase mb-2">Sports</p>
                                    <a href="#" class="h6">
                                        Get the best speak market, news.
                                    </a>
                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="row g-4 align-items-center features-item">
                            <div class="col-4">
                                <div class="rounded-circle position-relative">
                                    <div class="overflow-hidden rounded-circle">
                                        <img src="img/features-technology.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features-content d-flex flex-column">
                                    <p class="text-uppercase mb-2">Technology</p>
                                    <a href="#" class="h6">
                                        Get the best speak market, news.
                                    </a>
                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="row g-4 align-items-center features-item">
                            <div class="col-4">
                                <div class="rounded-circle position-relative">
                                    <div class="overflow-hidden rounded-circle">
                                        <img src="img/features-fashion.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features-content d-flex flex-column">
                                    <p class="text-uppercase mb-2">Fashion</p>
                                    <a href="#" class="h6">
                                        Get the best speak market, news.
                                    </a>
                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="row g-4 align-items-center features-item">
                            <div class="col-4">
                                <div class="rounded-circle position-relative">
                                    <div class="overflow-hidden rounded-circle">
                                        <img src="img/features-life-style.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features-content d-flex flex-column">
                                    <p class="text-uppercase mb-2">Life Style</p>
                                    <a href="#" class="h6">
                                        Get the best speak market, news.
                                    </a>
                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Features End -->        


        <!-- Most Populer News Start -->
        <div class="populer-news container" style="padding-bottom: 50px;">
            <div class="py-0">
                <div class="tab-class mb-4">
                    <div class="row g-4">
                        <div class="col-lg-3 col-xl-2 scroll container m-block m-none bg-white" style="position: fixed;z-index: 9;margin-top: 100px;left:0;">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="p-3 rounded border">
                                        <h4 class="mb-4 claseh2 text-azul">Opciones</h4>
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <a href="/hall" class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2">
                                                    <i class="lab la-playstation text-white" style="font-size: 30px;"></i>
                                                    <span class="text-white ml-2">Crear Sala</span>
                                                </a>
                                                <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                                                    <i class="las la-chess text-white" style="font-size: 30px;"></i>
                                                    <span class="text-white ml-2">Salas Disponibles</span>
                                                </a>
                                                <a href="/store" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2">
                                                    <i class="las la-store-alt text-white" style="font-size: 30px;"></i>
                                                    <span class="text-white ml-2">Tienda</span>
                                                </a>      
                                                <a href="javascript:void(0)" class="w-100 rounded btn btn-secondary d-flex align-items-center p-3 mb-2 open_loby">
                                                    <i class="lab la-rocketchat text-white" style="font-size: 30px;"></i>
                                                    <span class="text-white ml-2">Loby</span>  
                                                </a>  
                                                <a href="javascript:void(0)" class="w-100 rounded btn btn-info d-flex align-items-center p-3 mb-2 open_premios">
                                                    <i class="las la-award text-white" style="font-size: 30px;"></i>   
                                                    <span class="text-white ml-2">Premios</span>  
                                                </a>                                               
                                            </div>  
                                        </div>                                                                           
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xl-2"></div>

                        <div class="col-lg-6 col-xl-7 juegos" id="juegos" style="margin-top: 100px;">
                            
                            <div class="border-bottom mb-4">
                                <h2 class="my-4 claseh2 text-azul">Juegos</h2>
                            </div>
                            <!-- <div class="whats-carousel owl-carousel"> -->
                            <div class="row">
                                <div class="whats-item col-md-4 col-6">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <a href="#">
                                                <img src="img/ajedrez1.png" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column p-2">
                                            <!-- <a href="https://ajedrez.marsgame.pe" class="h4 m-none">Únete y disfruta con este increible juego retro y gánale a tus amigos</a> -->
                                            <div class="d-flex justify-content-between">
                                                <!-- <a href="#" class="small text-body link-hover">AJEDREZ</a> -->
                                                <small class="text-body d-block m-none"><i class="fas fa-calendar-alt me-1"></i> Ajedrez</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="whats-item col-md-4 col-6">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <a href="#">
                                                <img src="img/damas1.png" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column p-2">
                                            <!-- <a href="https://checker.marsgame.pe" class="h4 m-none">Únete y disfruta con este increible juego retro y gánale a tus amigos</a> -->
                                            <div class="d-flex justify-content-between">
                                                <!-- <a href="#" class="small text-body link-hover">DAMAS</a> -->
                                                <small class="text-body d-block m-none"><i class="fas fa-calendar-alt me-1"></i> Damas</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="whats-item col-md-4 col-6">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <a href="#">
                                                <img src="img/bingo.png" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column p-2">
                                            <!-- <a href="https://ajedrez.marsgame.pe" class="h4 m-none">Únete y disfruta con este increible juego retro y gánale a tus amigos</a> -->
                                            <div class="d-flex justify-content-between">
                                                <!-- <a href="#" class="small text-body link-hover">BINGO</a> -->
                                                <small class="text-body d-block m-none"><i class="fas fa-calendar-alt me-1"></i> Bingo</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="whats-item col-md-4 col-6">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <a href="#">
                                                <img src="img/serpientes.png" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column p-2">
                                            <!-- <a href="https://checker.marsgame.pe" class="h4 m-none">Únete y disfruta con este increible juego retro y gánale a tus amigos</a> -->
                                            <div class="d-flex justify-content-between">
                                                <!-- <a href="#" class="small text-body link-hover">ESCALERAS</a> -->
                                                <small class="text-body d-block m-none"><i class="fas fa-calendar-alt me-1"></i> Escaleras</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="whats-item col-md-4 col-6">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <a href="#">
                                                <img src="img/ludo.png" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column p-2">
                                            <!-- <a href="https://ajedrez.marsgame.pe" class="h4 m-none">Únete y disfruta con este increible juego retro y gánale a tus amigos</a> -->
                                            <div class="d-flex justify-content-between">
                                                <!-- <a href="#" class="small text-body link-hover">LUDO</a> -->
                                                <small class="text-body d-block m-none"><i class="fas fa-calendar-alt me-1"></i> Ludo</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="whats-item col-md-4 col-6">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <a href="#">
                                                <img src="img/ocholoco.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column p-2">
                                            <!-- <a href="https://ajedrez.marsgame.pe" class="h4 m-none">Únete y disfruta con este increible juego retro y gánale a tus amigos</a> -->
                                            <div class="d-flex justify-content-between">
                                                <!-- <a href="#" class="small text-body link-hover">Ocho Loco</a> -->
                                                <small class="text-body d-block m-none"><i class="fas fa-calendar-alt me-1"></i> Ocho Loco</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="whats-item">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <img src="img/news-3.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                        </div>
                                        <div class="d-flex flex-column p-4">
                                            <a href="#" class="h4">There are many variations of passages of Lorem Ipsum available,</a>
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="small text-body link-hover">by Willium Smith</a>
                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="whats-item">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <img src="img/news-4.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                        </div>
                                        <div class="d-flex flex-column p-4">
                                            <a href="#" class="h4">There are many variations of passages of Lorem Ipsum available,</a>
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="small text-body link-hover">by Willium Smith</a>
                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="whats-item">
                                    <div class="bg-light rounded">
                                        <div class="rounded-top overflow-hidden">
                                            <img src="img/news-5.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                                        </div>
                                        <div class="d-flex flex-column p-4">
                                            <a href="#" class="h4">There are many variations of passages of Lorem Ipsum available,</a>
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="small text-body link-hover">by Willium Smith</a>
                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                            <!-- COMENTANDO BARRA FASHION Y DEMAS -->
                            <!-- <div class="d-flex flex-column flex-md-row justify-content-md-between border-bottom mt-8">
                                <h1 class="mt-2">What’s New</h1>
                                <ul class="nav nav-pills d-inline-flex text-center mt-2">
                                    <li class="nav-item mb-3">
                                        <a class="d-flex py-2 bg-light rounded-pill active me-2" data-bs-toggle="pill" href="#tab-1">
                                            <span class="text-dark" style="width: 100px;">Sports</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-2">
                                            <span class="text-dark" style="width: 100px;">Magazine</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-3">
                                            <span class="text-dark" style="width: 100px;">Politics</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-4">
                                            <span class="text-dark" style="width: 100px;">Technology</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-5">
                                            <span class="text-dark" style="width: 100px;">Fashion</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- <div class="tab-content mt-4">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row g-4">
                                        <div class="col-lg-8">
                                            <div class="position-relative rounded overflow-hidden">
                                                <img src="img/news-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                                                    Sports
                                                </div>
                                            </div>
                                            <div class="my-4">
                                                <a href="#" class="h4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                                                <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                                            </div>
                                            <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy..
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-3.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Sports</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Sports</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Sports</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Sports</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Magazine</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-lg-8">
                                            <div class="position-relative rounded overflow-hidden">
                                                <img src="img/news-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                                                    Magazine
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <a href="#" class="h4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                                            </div>
                                            <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy..
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                                                <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-3.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Magazine</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Magazine</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Magazine</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Magazine</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Magazine</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-lg-8">
                                            <div class="position-relative rounded overflow-hidden">
                                                <img src="img/news-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                                                    Politics
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <a href="#" class="h4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                                            </div>
                                            <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy..
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                                                <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-3.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Politics</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Politics</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Politics</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Politics</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Politics</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-4" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-lg-8">
                                            <div class="position-relative rounded overflow-hidden">
                                                <img src="img/news-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                                                    Technology
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <a href="#" class="h4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                                            </div>
                                            <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                                                <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-3.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Technology</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Technology</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Technology</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Technology</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Technology</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-5" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-lg-8">
                                            <div class="position-relative rounded overflow-hidden">
                                                <img src="img/news-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                                                    Fashion
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <a href="#" class="h4">World Happiness Report 2023: What's the highway to happiness?</a>
                                            </div>
                                            <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                                                <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                                                <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-3.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Fashion</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Fashion</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Fashion</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Fashion</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row g-4 align-items-center">
                                                        <div class="col-5">
                                                            <div class="overflow-hidden rounded">
                                                                <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="features-content d-flex flex-column">
                                                                <p class="text-uppercase mb-2">Fashion</p>
                                                                <a href="#" class="h6">Get the best speak market, news.</a>
                                                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- FIN DE BARRA FASION -->

                            <!-- <div class="mt-6 lifestyle">
                                <div class="border-bottom mb-4">
                                    <h1 class="mb-4">Life Style</h1>
                                </div>
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="lifestyle-item rounded">
                                            <img src="img/lifestyle-1.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="lifestyle-content">
                                               <div class="mt-auto">
                                                    <a href="#" class="h4 text-white link-hover">There are many variations of passages of Lorem Ipsum available,</a>
                                                    <div class="d-flex justify-content-between mt-4">
                                                        <a href="#" class="small text-white link-hover">By Willium Smith</a>
                                                        <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                    </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="lifestyle-item rounded">
                                            <img src="img/lifestyle-2.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="lifestyle-content">
                                               <div class="mt-auto">
                                                    <a href="#" class="h4 text-white link-hover">There are many variations of passages of Lorem Ipsum available,</a>
                                                    <div class="d-flex justify-content-between mt-4">
                                                        <a href="#" class="small text-white link-hover">By Willium Smith</a>
                                                        <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                    </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- CONTENIDO DE LOBY -->
                        <div class="col-lg-6 col-xl-7 loby d-none" id="loby" style="margin-top: 100px;">
                            
                            <div class="border-bottom mb-4">
                                <h2 class="my-4 claseh2 text-azul">Loby</h2>
                            </div>
                            <div class="row">
                            <section class="msger chat-mobil" style="font-family: Helvetica, sans-serif">
                                <header class="msger-header">
                                    <div class="msger-header-title">
                                        <i class="fas fa-comment-alt"></i> MarsChat
                                    </div>
                                    <div class="msger-header-options">
                                        <span><i class="fas fa-cog"></i></span>
                                    </div>
                                </header>

                                <main class="msger-chat">
                                    <div class="msg left-msg">
                                        <div class="msg-img" style="background-image: url(/img/icono-marsgame.jpg)">
                                        </div>

                                        <div class="msg-bubble">
                                            <div class="msg-info">
                                                <div class="msg-info-name">BOT</div>
                                                <div class="msg-info-time">12:45</div>
                                            </div>

                                            <div class="msg-text">
                                                Hola, Bienvenido a MarsChat! Adelante y envíame un mensaj. 😄
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="msg right-msg">
                                        <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)">
                                        </div>

                                        <div class="msg-bubble">
                                            <div class="msg-info">
                                            <div class="msg-info-name">Sajad</div>
                                            <div class="msg-info-time">12:46</div>
                                            </div>

                                            <div class="msg-text">
                                            You can change your name in JS section!
                                            </div>
                                        </div>
                                    </div> -->
                                </main>

                                <form class="msger-inputarea">
                                    <input type="text" class="msger-input" placeholder="Enter your message...">
                                    <button type="submit" class="msger-send-btn">Send</button>
                                </form>
                                </section>
                            </div>
                        </div>
                        <!-- FIN DEL CONTENIDO DE LOBY -->

                        <!-- CONTENIDO DE NOSOTROS -->
                        <div class="col-lg-6 col-xl-7 nosotros d-none" id="nosotros" style="margin-top: 100px;">
                            
                            <div class="border-bottom mb-4">
                                <h2 class="my-4 claseh2 text-azul">Nosotros</h2>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                        <!-- FIN DEL CONTENIDO DE NOSOTROS -->

                        <!-- CONTENIDO DE CONTACTANOS -->
                        <div class="col-lg-6 col-xl-7 contactanos d-none" id="contactanos" style="margin-top: 100px;">
                            
                            <div class="border-bottom mb-4">
                                <h2 class="my-4 claseh2 text-azul">Contactanos</h2>
                            </div>
                            <div class="row">
                            
                            </div>
                        </div>
                        <!-- FIN DEL CONTENIDO DE CONTACTANOS -->

                        <!-- CONTENIDO DE PREMIOS -->
                        <div class="col-lg-6 col-xl-7 premios d-none" id="premios" style="margin-top: 100px;">
                            <div class="border-bottom mb-4">
                                <h2 class="my-4 claseh2 text-azul">Premios</h2>
                            </div>
                            <ul class="card-container">

                            <li class="card-item">
                                <div class="card">
                                <img class="card-image"
                                    src="https://images.blz-contentstack.com/v3/assets/blt2477dcaf4ebd440c/blt363a2e79218c1906/5cef225a578308e4094573d0/ashe-screenshot-002.jpg">
                                </div>
                                <div class="card-onhover">
                                <div class="card-video">
                                    <iframe src="https://www.youtube.com/embed/yvT9wKCrEyo" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="card-info">
                                    <div class="card-title">ASHE</div>
                                    <p class="card-text">Ashe quickly fires her rifle from the hip or uses her weapon’s aim-down sights to line
                                    up
                                    a high damage shot at the cost of fire-rate.</p>
                                </div>
                                </div>
                            </li>

                            <li class="card-item">
                                <div class="card">
                                <img class="card-image"
                                    src="https://images.blz-contentstack.com/v3/assets/blt2477dcaf4ebd440c/bltfde27a4ba96fcb91/5cef227a7b48be290a7f87fa/dva-screenshot-001.jpg">
                                </div>
                                <div class="card-onhover">
                                <div class="card-video">
                                    <iframe src="https://www.youtube.com/embed/q7j2d6YCQbg" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="card-info">
                                    <div class="card-title">D.Va</div>
                                    <p class="card-text">D.Va is a former professional gamer who now uses her skills to pilot a state-of-the-art
                                    mech in defense of her homeland.</p>
                                </div>
                                </div>
                            </li>


                            <li class="card-item">
                                <div class="card">
                                <img class="card-image"
                                    src="https://images.blz-contentstack.com/v3/assets/blt2477dcaf4ebd440c/bltf18a64d8ec09ffdb/5cef22cd7b48be290a7f8830/moira-screenshot-004.jpg">
                                </div>
                                <div class="card-onhover">
                                <div class="card-video">
                                    <iframe src="https://www.youtube.com/embed/8tLopqeL9s8" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="card-info">
                                    <div class="card-title">MOIRA</div>
                                    <p class="card-text">Equal parts brilliant and controversial, scientist Moira O'Deorain is on the cutting
                                    edge of genetic engineering, searching for a way to rewrite the fundamental building blocks of life.</p>
                                </div>
                                </div>
                            </li>
                            <li class="card-item">
                                <div class="card">
                                <img class="card-image"
                                    src="https://images.blz-contentstack.com/v3/assets/blt2477dcaf4ebd440c/blt363a2e79218c1906/5cef225a578308e4094573d0/ashe-screenshot-002.jpg">
                                </div>
                                <div class="card-onhover">
                                <div class="card-video">
                                    <iframe src="https://www.youtube.com/embed/yvT9wKCrEyo" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="card-info">
                                    <div class="card-title">ASHE</div>
                                    <p class="card-text">Ashe quickly fires her rifle from the hip or uses her weapon’s aim-down sights to line
                                    up
                                    a high damage shot at the cost of fire-rate.</p>
                                </div>
                                </div>
                            </li>
                            </ul>
                        </div>
                        <!-- FIN CONTENIDO DE PREMIOS -->
                        <div class="col-lg-3 col-xl-3 scroll container m-block m-none bg-white" style="position: fixed;z-index: 9999;right:0;" id="div-right">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="p-3 rounded border">                                        
                                        <h4 class="my-4 text-azul">Contactos</h4>
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <a href="#" class="h6" style="text-align: justify;">
                                                                Juan Carlos Torres del Castillo
                                                            </a>
                                                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <a href="#" class="h6" style="text-align: justify;">
                                                                Juan Carlos Torres del Castillo
                                                            </a>
                                                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <a href="#" class="h6" style="text-align: justify;">
                                                                Juan Carlos Torres del Castillo
                                                            </a>
                                                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <a href="#" class="h6" style="text-align: justify;">
                                                                Juan Carlos Torres del Castillo
                                                            </a>
                                                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <a href="#" class="h6" style="text-align: justify;">
                                                                Juan Carlos Torres del Castillo
                                                            </a>
                                                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <a href="#" class="h6" style="text-align: justify;">
                                                                Juan Carlos Torres del Castillo
                                                            </a>
                                                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <a href="#" class="h6" style="text-align: justify;">
                                                                Juan Carlos Torres del Castillo
                                                            </a>
                                                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <a href="#" class="h6" style="text-align: justify;">
                                                                Juan Carlos Torres del Castillo
                                                            </a>
                                                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <a href="#" class="link-hover btn border border-primary rounded-pill text-dark w-100 py-3 mb-4">View More</a>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="border-bottom my-3 pb-3">
                                                    <h4 class="mb-0">Trending Tags</h4>
                                                </div>
                                                <ul class="nav nav-pills d-inline-flex text-center mb-4">
                                                    <li class="nav-item mb-3">
                                                        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                            <span class="text-dark link-hover" style="width: 90px;">Lifestyle</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-3">
                                                        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                            <span class="text-dark link-hover" style="width: 90px;">Sports</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-3">
                                                        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                            <span class="text-dark link-hover" style="width: 90px;">Politics</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-3">
                                                        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                            <span class="text-dark link-hover" style="width: 90px;">Magazine</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-3">
                                                        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                            <span class="text-dark link-hover" style="width: 90px;">Game</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-3">
                                                        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                            <span class="text-dark link-hover" style="width: 90px;">Movie</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-3">
                                                        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                            <span class="text-dark link-hover" style="width: 90px;">Travel</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-3">
                                                        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                            <span class="text-dark link-hover" style="width: 90px;">World</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Most Populer News End -->
        

    <!-- mobile bottom bar -->
    <div class="mobile_bottombar d-block d-lg-none" style="z-index: 9999;background-color: #2D2E83;">
        <div class="header_icon">
            <a href="javascript:void(0)" class="icon_wrp text-center open_menu">
                <span class="icon">
                    <i class="las la-bars text-white"></i>
                </span>
                <span class="icon_text text-white">Opciones</span>
            </a>
            <a href="javascript:void(0)" class="icon_wrp text-center open_category">
                <span class="icon">
                    <i class="icon-list-ul text-white"></i>
                </span>
                <span class="icon_text text-white">Contactos</span>
            </a>
            <a href="javascript:void(0)" class="icon_wrp text-center open_perfil">
                <span class="icon">
                    <i class="las la-user text-white"></i>
                </span>
                <span class="icon_text text-white">Perfil</span>
            </a>
            <!-- <a href="javascript:void(0)" class="icon_wrp text-center" id="src_icon">
                <span class="icon">
                   <i class="icon-search-left"></i>
                </span>
                <span class="icon_text">Search</span>
            </a>
            <a href="javascript:void(0)" class="icon_wrp crt text-center" id="openCart">
                <span class="icon">
                    <i class="icon-cart"></i>
                </span>
                <span class="icon_text">Cart</span>
                <span class="pops">8</span>
            </a> -->
        </div>
    </div>

    <!-- mobile opciones -->
    <div class="mobile_menwrap d-lg-none" id="mobile_menwrap" style="z-index: 9999">
        <div class="mobile_menu_2">
            <h5 class="mobile_title claseh2">
                Opciones
                <span class="sidebarclose" id="menuclose">
                    <i class="las la-times"></i>
                </span>
            </h5>
            <div class="row p-4" style="--bs-gutter-x: 0rem !important;">
                <div class="col-12">
                    <a href="/hall" class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2">
                        <i class="lab la-playstation text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Crear Sala</span>
                    </a>
                    <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                        <i class="las la-chess text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Salas Disponibles</span>
                    </a>
                    <a href="/store" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2">
                        <i class="las la-store-alt text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Tienda</span>
                    </a>      
                    <a href="javascript:void(0)" class="w-100 rounded btn btn-secondary d-flex align-items-center p-3 mb-2 open_loby">
                        <i class="lab la-rocketchat text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Loby</span>  
                    </a>  
                    <a href="#" class="w-100 rounded btn btn-info d-flex align-items-center p-3 mb-2">
                        <i class="las la-award text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Premios</span>  
                    </a>                                               
                </div>
            </div>  
        </div>
    </div>

    <!-- Mobile Contactos -->
    <div class="mobile_menwrap d-lg-none" id="mobile_catwrap" style="z-index: 9999;">
        <div class="mobile_menu_2">
            <h5 class="mobile_title claseh2">
                Contactos
                <span class="sidebarclose" id="catclose">
                    <i class="las la-times"></i>
                </span>
            </h5>
            <div class="row bg-white p-4">
            <div class="col-12">
                <div class="row g-4 align-items-center features-item">
                    <div class="col-4">
                        <div class="rounded-circle position-relative">
                            <div class="overflow-hidden rounded-circle">
                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="features-content d-flex flex-column">
                            <a href="#" class="h6">
                                Juan Carlos Torres del Castillo
                            </a>
                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row g-4 align-items-center features-item">
                    <div class="col-4">
                        <div class="rounded-circle position-relative">
                            <div class="overflow-hidden rounded-circle">
                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="features-content d-flex flex-column">
                            <a href="#" class="h6">
                                Juan Carlos Torres del Castillo
                            </a>
                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row g-4 align-items-center features-item">
                    <div class="col-4">
                        <div class="rounded-circle position-relative">
                            <div class="overflow-hidden rounded-circle">
                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="features-content d-flex flex-column">
                            <a href="#" class="h6">
                                Juan Carlos Torres del Castillo
                            </a>
                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row g-4 align-items-center features-item">
                    <div class="col-4">
                        <div class="rounded-circle position-relative">
                            <div class="overflow-hidden rounded-circle">
                                <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="features-content d-flex flex-column">
                            <a href="#" class="h6">
                                Juan Carlos Torres del Castillo
                            </a>
                            <small class="text-body d-block clase-font" style="text-align: justify;"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                        </div>
                    </div>
                </div>
            </div>
                
            </div>
            
        </div>
    </div>  

    <!-- mobile Perfil -->
    <div class="mobile_perwrap d-lg-none" id="mobile_perwrap" style="z-index: 9999;">
        <div class="mobile_menu_2">
            <h5 class="mobile_title claseh2">
                Perfil
                <span class="sidebarclose" id="perfilclose">
                    <i class="las la-times"></i>
                </span>
            </h5>
            <div class="row bg-white p-4">
                <div class="col-12">
                    <div class="row g-4 align-items-center features-item">
                        <div class="col-12">
                            <div class="position-relative">
                                <div class="overflow-hidden text-center">
                                    <img src="img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle estilos-img-mobil" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="features-content d-flex flex-column text-center">
                                <h6>
                                    Juan Carlos Torres del Castillo
                                </h6>
                                <h6 class="text-body">
                                    NickName
                                </h6>
                                <small class="text-body d-block clase-font">
                                    <i class="fas fa-envelope me-1"></i> jctorresdelcastillo@gmail.com</small>
                            </div>
                            <a href="#" class="w-100 rounded btn btn-info mt-4 d-flex align-items-center p-3 mb-2">
                                <i class="las la-edit text-white mx-4" style="font-size: 30px;"></i>
                                <span class="text-white">Editar perfil</span>  
                            </a> 
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

        <!-- Footer Start -->
        <!-- <div class="container-fluid bg-dark footer py-5" style="position: absolute;z-index: 999;">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#" class="d-flex flex-column flex-wrap">
                                <img src="{{asset('img/logoblanco.png')}}" width="200" alt="marsgame">
                                
                            </a>
                        </div>
                        <div class="col-lg-9">
                            <div class="d-flex position-relative rounded-pill overflow-hidden">
                                <input class="form-control border-0 w-100 py-3 rounded-pill" type="email" placeholder="example@gmail.com">
                                <button type="submit" class="btn btn-primary border-0 py-3 px-5 rounded-pill text-white position-absolute" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 col-xl-3">
                        <div class="footer-item-1">
                            <h4 class="mb-4 text-white">Get In Touch</h4>
                            <p class="text-secondary line-h">Address: <span class="text-white">123 Streat, New York</span></p>
                            <p class="text-secondary line-h">Email: <span class="text-white">Example@gmail.com</span></p>
                            <p class="text-secondary line-h">Phone: <span class="text-white">+0123 4567 8910</span></p>
                            <div class="d-flex line-h">
                                <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter text-dark"></i></a>
                                <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f text-dark"></i></a>
                                <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube text-dark"></i></a>
                                <a class="btn btn-light btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in text-dark"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="footer-item-2">
                            <div class="d-flex flex-column mb-4">
                                <h4 class="mb-4 text-white">Post recientes</h4>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle border border-2 border-primary overflow-hidden">
                                            <img src="img/footer-1.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                        </div>
                                        <div class="d-flex flex-column ps-4">
                                            <p class="text-uppercase text-white mb-3">Life Style</p>
                                            <a href="#" class="h6 text-white">
                                                Get the best speak market, news.
                                            </a>
                                            <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle border border-2 border-primary overflow-hidden">
                                            <img src="img/footer-2.jpg" class="img-zoominimg-fluid rounded-circle w-100" alt="">
                                        </div>
                                        <div class="d-flex flex-column ps-4">
                                            <p class="text-uppercase text-white mb-3">Sports</p>
                                            <a href="#" class="h6 text-white">
                                                Get the best speak market, news.
                                            </a>
                                            <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="d-flex flex-column text-start footer-item-3">
                            <h4 class="mb-4 text-white">Categorías</h4>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Sports</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Magazine</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Lifestyle</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Politician</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Technology</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Intertainment</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="footer-item-4">
                            <h4 class="mb-4 text-white">Nuestra Galería</h4>
                            <div class="row g-2">
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                               <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-2.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-3.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                               <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="img/footer-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                           </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Footer End -->


        <!-- Copyright Start -->
        <!-- <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="/"><i class="fas fa-copyright text-light me-2"></i>MarsGame</a>, Todos los derechos reservados.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                     
                        Diseñado por <a href="https://grupotyg.pe" target="_blank">Grupo TyG Ingenieros</a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Copyright End -->


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-primary border-2 border-white rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   -->

        <script type="text/javascript">

        $(document).ready(function(){

            var height = $(window).height();

            $('#div-right').height(height);
        });

        </script>

        @push('css')
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        @endpush
    </x-app-layout>