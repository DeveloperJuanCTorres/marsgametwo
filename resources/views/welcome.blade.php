<x-app-layout>
    @php
        $id_juego = 0;
    @endphp
    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


        <!-- Navbar Movil start -->
        <div class="container-fluid sticky-top px-0 m-block my-2">           

            <div class="container-fluid bg-white" style="position: fixed;z-index: 9;top: -2px !important;">
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
            
            <div class="col-9 container-fluid bg-white" style="position: fixed;z-index: 9;">
                <div class="container px-0">
                    <nav class="navbar navbar-light navbar-expand-xl">
                        <a href="/" class="navbar-brand mt-3">
                            <img src="{{asset('img/logo.png')}}" width="250" alt="marsgame">
                        </a>
                        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        
                        <div class="btn-group mx-auto" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check open_juegos" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label style="width: 100px;" class="btn btn-outline-mars" for="btnradio1"><i style="font-size: 32px;" class="las la-house-damage"></i></label>

                            <input type="radio" class="btn-check open_nosotros" name="btnradio" id="btnradio2" autocomplete="off">
                            <label style="width: 100px;" class="btn btn-outline-mars" for="btnradio2"><i style="font-size: 32px;" class="las la-building"></i></label>

                            <input type="radio" class="btn-check open_contactanos" name="btnradio" id="btnradio3" autocomplete="off">
                            <label style="width: 100px;" class="btn btn-outline-mars" for="btnradio3"><i style="font-size: 32px;" class="las la-address-book"></i></label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                            @auth
                            <label style="width: 100px;" class="btn btn-outline-mars open_perfil1" for="btnradio4"><i style="font-size: 32px;" class="las la-user"></i></label>
                            @else
                            <a href="login" style="width: 100px;" class="btn btn-outline-mars">
                            <i style="font-size: 32px;" class="las la-user"></i></a>
                                @endauth
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
        
        <!-- Most Populer News Start -->
        <div class="populer-news container" style="padding-bottom: 50px;">
            <div class="py-0">
                <div class="tab-class mb-4">
                    <div class="row g-4">
                        <div class="col-lg-3 col-xl-2 scroll container m-block m-none bg-white" style="position: fixed;z-index: 9;margin-top: 110px;left:0;">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="p-3 rounded border">
                                        <h4 class="mb-4 claseh2 text-azul">Opciones</h4>
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <a href="javascript:void(0)" type="button" class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2 crear_sala">
                                                    <i class="lab la-playstation text-white" style="font-size: 30px;"></i>
                                                    <span class="text-white ml-2">Crear Sala</span>
                                                </a>
                                                
                                                <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                                                    <i class="las la-chess text-white" style="font-size: 30px;"></i>
                                                    <span class="text-white ml-2">Salas Disponibles</span>
                                                </a>
                                                <!-- <a href="/store" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2">
                                                    <i class="las la-store-alt text-white" style="font-size: 30px;"></i>
                                                    <span class="text-white ml-2">Tienda</span>
                                                </a>       -->
                                                <a href="javascript:void(0)" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2 open_store">
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
                                            <a href="javascript:void(0)" class="sala_ajedrez">
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
                                            <a href="javascript:void(0)" class="sala_damas">
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
                                            <a href="javascript:void(0)" class="sala_bingo">
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
                                            <a href="javascript:void(0)" class="sala_serpientes">
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
                                            <a href="javascript:void(0)" class="sala_ludo">
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
                                            <a href="javascript:void(0)" class="sala_ocholoco">
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
                            </div>                            
                        </div>
                        <!-- CONTENIDO DE STORE -->
                        <x-store></x-store>
                        <!-- FIN DEL CONTENIDO DE STORE -->
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
                        <!-- CONTENIDO PERFIL DESTOCK -->
                        <div class="col-lg-6 col-xl-7 perfil d-none" id="perfil" style="margin-top: 100px;">
                            <div class="border-bottom mb-4">
                                <h2 class="my-4 claseh2 text-azul">Perfil</h2>
                            </div>
                            <div class="mobile_menu_2 text-center">
                                <div class="img-perfil">
                                @auth
                                    
                                    <img src="{{ Auth::user()->profile_photo_url }}" title="Aisha" alt="foto-perfil"></div>
                                    
                                    
                                    <h4>
                                        {{Auth::user()->name}}
                                    </h4>
                                    <h6>
                                        {{Auth::user()->username}}
                                    </h6>
                                    <p>{{Auth::user()->email}}</p>
                                    
                                    <hr>
                                    <h5>Edad : {{Auth::user()->edad}} Años</h5>
                                    <h5>Teléfono: <span class="h6">{{Auth::user()->telefono}}</span></h5>
                                    
                                    <div class="caja-gris">
                                    <div class="sobre">
                                        <img style="display: inline !important;" src="img/marscoin.png">
                                        <p style="margin-bottom: 0 !important;">1086</p> 
                                    </div>
                                    <div class="sobre">
                                        <img style="display: inline !important;" src="img/ticket.png">
                                        <p style="margin-bottom: 0 !important;">1582</p> 
                                    </div>
                                    <div class="sobre">
                                        <img style="display: inline !important;" src="img/level.png">
                                        <p style="margin-bottom: 0 !important;">1468</p> 
                                    </div>
                                    </div> 
                                    
                                    <div class="redes face"><a href="{{Auth::user()->link_facebook}}" target="_blank"></a></div>
                                    <div class="redes instagram"><a href="{{Auth::user()->link_instagram}}" target="_blank"></a></div>
                                    <div class="redes youtube"><a href="{{Auth::user()->link_tiktok}}" target="_blank"></a></div>
                                    @endauth
                                    <div class="boton p-2">
                                        <a href="{{ route('profile.show') }}">Editar Perfil</a>
                                    </div>             
                            </div>
                        </div>             
                        <!-- FIN DEL CONTENIDO PERFIL DESTOCK -->
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
            @auth
            <a href="javascript:void(0)" class="icon_wrp text-center open_perfil">
            @else
            <a href="login" class="icon_wrp text-center">
            @endauth
                <span class="icon">
                    <i class="las la-user text-white"></i>
                </span>
                <span class="icon_text text-white">Perfil</span>
            </a>
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
                    <a href="javascript:void(0)" class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2 crear_sala">
                        <i class="lab la-playstation text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Crear Sala</span>
                    </a>
                    <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                        <i class="las la-chess text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Salas Disponibles</span>
                    </a>
                    <a href="javascript:void(0)" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2 open_store">
                        <i class="las la-store-alt text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Tienda</span>
                    </a>      
                    <a href="javascript:void(0)" class="w-100 rounded btn btn-secondary d-flex align-items-center p-3 mb-2 open_loby">
                        <i class="lab la-rocketchat text-white mx-4" style="font-size: 30px;"></i>
                        <span class="text-white">Loby</span>  
                    </a>  
                    <a href="javascript:void(0)" class="w-100 rounded btn btn-info d-flex align-items-center p-3 mb-2 open_premios">
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
        <div class="mobile_menu_2 text-center">
            <h5 class="mobile_title claseh2">
                Perfil
                <span class="sidebarclose" id="perfilclose">
                    <i class="las la-times"></i>
                </span>
            </h5>
            <div class="img-perfil">
             @auth
                <img src="{{ Auth::user()->profile_photo_url }}" title="Aisha" alt="foto-perfil"></div>
                <h4>
                    {{Auth::user()->name}}
                </h4>
                <h6>
                    {{Auth::user()->username}}
                </h6>
                <p>{{Auth::user()->email}}</p>
                
                <hr>
                <h5>Edad : {{Auth::user()->edad}} Años</h5>
                <h5>Teléfono: <span class="h6">{{Auth::user()->telefono}}</span></h5>
                
                <div class="caja-gris">
                <div class="sobre">
                    <img style="display: inline !important;" src="img/marscoin.png">
                    <p style="margin-bottom: 0 !important;">1086</p> 
                </div>
                <div class="sobre">
                    <img style="display: inline !important;" src="img/ticket.png">
                    <p style="margin-bottom: 0 !important;">1582</p> 
                </div>
                <div class="sobre">
                    <img style="display: inline !important;" src="img/level.png">
                    <p style="margin-bottom: 0 !important;">1468</p> 
                </div>
                </div> 
                
                <div class="redes face"><a href="{{Auth::user()->link_facebook}}" target="_blank"></a></div>
                <div class="redes instagram"><a href="{{Auth::user()->link_instagram}}" target="_blank"></a></div>
                <div class="redes youtube"><a href="{{Auth::user()->link_tiktok}}" target="_blank"></a></div>
                @endauth
                <div class="boton p-2">
					<a href="{{ route('profile.show') }}">Editar Perfil</a>
			    </div> 
        </div>
    </div>     

    <!-- Modal Crear sala -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Sala</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="GET" action="{{route('hall')}}" >
            @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row p-2">
                            <div class="col-md-6 col-sm-12">
                                <label for="tipo">Juego</label>
                                <select class="form-select" id="juego" aria-label="Default select example">                                
                                    <option value="0" selected disabled>-Seleccionar-</option>
                                    <option value="1">Ajedrez</option>
                                    <option value="2">Damas</option>
                                    <option value="3">Bingo</option>
                                    <option value="4">Serpientes</option>
                                    <option value="5">Ludo</option>
                                    <option value="6">Ocho Loco</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="tipo">Tipo de Sala</label>
                                <select require class="form-select" aria-label="Default select example">
                                    <option value="1">Pública</option>
                                    <option value="2">Privada</option>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6 col-sm-12">
                                <label for="tiempo">Tiempo por Jugador</label>
                                <input require type="number" class="form-control" id="tiempo" placeholder="Rango: 1min - 5min">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="apuesta">Monto de Apuesta</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">S/.</span>
                                    <input require type="number" class="form-control" placeholder="Min: 1.00">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear Sala</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Fin Modal -->

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