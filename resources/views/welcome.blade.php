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
                                                
                                                <a href="javascript:void(0)" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2 open_salas">
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

                        <!-- CONTENIDO DE SALAS DISPONIBLES -->
                        <div class="col-lg-6 col-xl-7 salas d-none" id="salas" style="margin-top: 100px;">
                            
                            <div class="border-bottom mb-4">
                                <h2 class="my-4 claseh2 text-azul">Salas</h2>
                            </div>
                            <div class="sala">
                                <ul class="tabMenu">
                                    <li class="star">
                                    <a href="#tab1" class="current"><span class="typeMark bg-star"><i class="fas fa-star"></i></span>Libres</a>
                                    </li>
                                    <li class="shine">
                                    <a href="#tab2" class=""><span class="typeMark bg-shine"><i class="fas fa-certificate"></i></span>Privados</a>
                                    </li>
                                    <li class="dream">
                                    <a href="#tab3" class=""><span class="typeMark bg-dream"><i class="fas fa-moon"></i></span>Campeonatos</a>
                                    </li>
                                </ul>
                                <div id="contents">
                                    <!-- STAR -->
                                    <div class="typeBox" id="tab1">
                                    
                                    <div class="specBox da">
                                        <p class="specTitle"><span>Sin jugar</span></p>
                                        <dl>
                                        <dt>
                                            <img src="img/serpientes.png" style="width: 200px;"  alt="SSS syo">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                                <li class="h4">Serpientes</li>
                                                <div class="row" style="margin-left: 50px;">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">                                                   
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 5.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-warning" style="width: 240px">Unirse</button>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="img/ajedrez1.png" style="width: 200px;" alt="evSC ai">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                                <li class="h4">Ajedrez</li>
                                                <div class="row" style="margin-left: 120px;">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">                                                  
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 10.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option pt-2">
                                                <button class="btn btn-warning" style="width: 240px">Unirse</button>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="img/damas1.png" style="width: 200px;" alt="MOP camus">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                                <li class="h4">Damas</li>
                                                <div class="row" style="margin-left: 120px;">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">                                               
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 8.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-warning" style="width: 240px">Unirse</button>
                                            </div>
                                        </dd>
                                        </dl>                                        
                                    </div>

                                    <!-- <div class="specBox vo">
                                        <p class="specTitle"><span>VOCAL</span></p>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evCC camus">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1540</li>
                                            <li class="vo">2080</li>
                                            <li class="ac specialstatus">2190</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">スコアノーツ</span>
                                            <span class="sub">L60 +30000</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon crown silver"></span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="SL reiji">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1840</li>
                                            <li class="vo">2110</li>
                                            <li class="ac">1660</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">カットイン</span>
                                            <span class="sub">F +28000</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">4</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="SL cecil">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1469</li>
                                            <li class="vo">1559</li>
                                            <li class="ac">1469</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">カットイン</span>
                                            <span class="sub">F +28000</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">1</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evGM masato">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1533</li>
                                            <li class="vo">1633</li>
                                            <li class="ac">1129</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">BGP</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evCJ otoya">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1317</li>
                                            <li class="vo">1777</li>
                                            <li class="ac">1113</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">BGP</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evSD tokiya">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1458</li>
                                            <li class="vo">1728</li>
                                            <li class="ac">939</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">スコアノーツ</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evNE ren">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1458</li>
                                            <li class="vo">1548</li>
                                            <li class="ac">1119</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">スコアノーツ</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                    </div> -->
                                    
                                    <div class="specBox ac">
                                        <p class="specTitle"><span>Jugando</span></p>
                                        <dl>
                                        <dt>
                                            <img src="img/bingo.png" style="width: 200px;" alt="SSS camus">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                                <li class="h4">Bingo</li>
                                                <div class="row" style="margin-left: 80px;">
                                                    <li>Sin límite</li>                                                  
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 5.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-danger" style="width: 240px">Bloqueado</button>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="img/ludo.png" style="width: 200px;" alt="evTV natsuki">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                                <li class="h4">Ludo</li>
                                                <div class="row" style="margin-left: 80px;">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">                                                   
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 8.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-danger" style="width: 240px">Bloqueado</button>
                                            </div>
                                        </dd>
                                        </dl>                                                                                
                                    </div>

                                    </div><!-- typeBox -->

                                    <!-- SHINE -->
                                    <div class="typeBox" id="tab2">
                                    <div class="specBox da">
                                        <p class="specTitle"><span>Sin jugar</span></p> <!-- - - - - - - - - - - - - - - - - - - - - - - - -DANCE - - - - - - - - - - - - - - - - - - - - - -->
                                        <dl>
                                        <dt>
                                            <img src="img/bingo.png" style="width: 200px;" alt="SL ranmaru">
                                        </dt>
                                        <dd>
                                        <ul class="appeal">
                                                <li class="h4">Bingo</li>
                                                <div class="row" style="margin-left: 50px;">
                                                    <li>Sin límite</li>                                                 
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 5.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-warning" style="width: 240px">Unirse</button>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="img/ludo.png" style="width: 200px;" alt="USL ren">
                                        </dt>
                                        <dd>
                                        <ul class="appeal">
                                                <li class="h4">Ludo</li>
                                                <div class="row" style="margin-left: 80px;">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">                                                   
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 8.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-warning" style="width: 240px">Unirse</button>
                                            </div>
                                        </dd>
                                        </dl>                                        
                                    </div>

                                    <!-- <div class="specBox vo">
                                        <p class="specTitle"><span>VOCAL</span></p>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="SK natsuki">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1224</li>
                                            <li class="vo">1860</li>
                                            <li class="ac">1410</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">JP</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon crown silver"></span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="SC camus">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1590</li>
                                            <li class="vo">1860</li>
                                            <li class="ac">1044</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">ライフノーツ</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">1</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="MOP tokiya">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">956</li>
                                            <li class="vo">1853</li>
                                            <li class="ac">1573</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">JP</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="MOP ren">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1573</li>
                                            <li class="vo">1853</li>
                                            <li class="ac">956</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">JP</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="MOP cecil">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1573</li>
                                            <li class="vo">1853</li>
                                            <li class="ac">956</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">JP</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="HVD ren">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1113</li>
                                            <li class="vo">1777</li>
                                            <li class="ac">1317</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">ライフノーツ</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evPR ranmaru">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">933</li>
                                            <li class="vo">1777</li>
                                            <li class="ac">1497</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">スコアノーツ</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="NYP ai">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">933</li>
                                            <li class="vo">1777</li>
                                            <li class="ac">1497</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">スコアノーツ</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evJH syo">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1346</li>
                                            <li class="vo">1436</li>
                                            <li class="ac">1346</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">スコアノーツ</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evSK masato">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1458</li>
                                            <li class="vo">1548</li>
                                            <li class="ac">1119</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">スコアノーツ</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                    </div> -->

                                    <div class="specBox ac">
                                        <p class="specTitle"><span>Jugando</span></p> <!-- - - - - - - - - - - - - - - - - - - - - - - ACT - - - - - - - - - - - - - - - - - - - - - - - -->
                                        <dl>
                                        <dt>
                                            <img src="img/ludo.png" style="width: 200px;" alt="SL syo">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                                <li class="h4">Ludo</li>
                                                <div class="row" style="margin-left: 80px;">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">                                                   
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 8.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-danger" style="width: 240px">Bloqueado</button>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="img/ajedrez1.png" style="width: 200px;" alt="SL syo 2">
                                        </dt>
                                        <dd>
                                        <ul class="appeal">
                                                <li class="h4">Ajedrez</li>
                                                <div class="row" style="margin-left: 120px;">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">                                                  
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 10.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option pt-2">
                                                <button class="btn btn-danger" style="width: 240px">Bloqueado</button>
                                            </div>
                                        </dd>
                                        </dl>                                        
                                    </div>

                                    </div><!-- typeBox -->
                                    
                                    <!-- DREAM -->
                                    <div class="typeBox" id="tab3">
                                    <div class="specBox da">
                                        <p class="specTitle"><span>Sin jugar</span></p>
                                        <dl>
                                        <dt>
                                            <img src="img/bingo.png" style="width: 200px;" alt="SL camus">
                                        </dt>
                                        <dd>
                                        <ul class="appeal">
                                                <li class="h4">Bingo</li>
                                                <div class="row" style="margin-left: 80px;">
                                                    <li>Sin límite</li>                                                   
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 8.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-warning" style="width: 240px">Bloqueado</button>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="img/bingo.png" style="width: 200px;" alt="SL camus">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                                <li class="h4">Bingo</li>
                                                <div class="row" style="margin-left: 80px;">
                                                    <li>Sin límite</li>                                                 
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 8.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-warning" style="width: 240px">Unirse</button>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="img/ludo.png" style="width: 200px;" alt="SSS reiji">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                                <li class="h4">Ludo</li>
                                                <div class="row" style="margin-left: 80px;">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">
                                                    <img class="p-0" src="img/jugador.png" style="width: 25px;" alt="">                                                   
                                                </div>
                                            </ul>
                                            <ul class="appeal mt-3">
                                            <li class="ac">S/. 8.00</li>
                                            <li class="da">10</li>
                                            </ul>
                                            
                                            <div class="option py-2">
                                                <button class="btn btn-warning" style="width: 240px">Unirse</button>
                                            </div>
                                        </dd>
                                        </dl>                                        
                                    </div>

                                    <!-- <div class="specBox vo">
                                        <p class="specTitle"><span>VOCAL</span></p>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="SL masato">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1840</li>
                                            <li class="vo">1840</li>
                                            <li class="ac specialstatus">2130</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">カットイン</span>
                                            <span class="sub">F +55000</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon crown silver"></span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="SL masato">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1224</li>
                                            <li class="vo">1860</li>
                                            <li class="ac">1410</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">カットイン</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                        <dl>
                                        <dt>
                                            <img src="https://placehold.jp/50x50.png" alt="evLC ai">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1346</li>
                                            <li class="vo">1616</li>
                                            <li class="ac">1166</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">BGP</span>
                                            <span class="sub">未開放</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon star">0</span>
                                            </div>
                                        </dd>
                                        </dl>
                                    </div> -->

                                    <div class="specBox ac">
                                        <p class="specTitle"><span>Sin jugar</span></p>
                                        <dl>
                                        <dt>
                                            <img src="img/ludo.png" style="width: 80px;" alt="evAC camus">
                                        </dt>
                                        <dd>
                                            <ul class="appeal">
                                            <li class="da">1540</li>
                                            <li class="vo">1990</li>
                                            <li class="ac">2280</li>
                                            </ul>
                                            <div class="skill">
                                            <span class="main">BGP</span>
                                            <span class="sub">F +45000</span>
                                            </div>
                                            <div class="option">
                                            <span class="icon crown silver"></span>
                                            </div>
                                        </dd>
                                        </dl>                                        
                                    </div>

                                    </div><!-- typeBox -->
                                </div>
                            </div>
                        </div>
                        <!-- FIN DEL CONTENIDO DE SALAS DISPONIBLES -->

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
                        <!-- <div class="col-lg-6 col-xl-7 premios d-none" id="premios" style="margin-top: 100px;">
                            <div class="center-premios">
                                <div class="card-premios">
                                    <div class="additional">
                                    <div class="user-card">
                                        <div class="level center">
                                        Level 13
                                        </div>
                                        <div class="points center">
                                        5,312 MarsCoin
                                        </div>
                                        <svg width="110" height="110" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="title desc" class="center">
                                        <title id="title">Teacher</title>
                                        <desc id="desc">Cartoon of a Caucasian woman smiling, and wearing black glasses and a purple shirt with white collar drawn by Alvaro Montoro.</desc>
                                        <style>
                                            .skin { fill: #eab38f; }
                                            .eyes { fill: #1f1f1f; }
                                            .hair { fill: #2f1b0d; }
                                            .line { fill: none; stroke: #2f1b0d; stroke-width:2px; }
                                        </style>
                                        <defs>
                                            <clipPath id="scene">
                                            <circle cx="125" cy="125" r="115"/>
                                            </clipPath>
                                            <clipPath id="lips">
                                            <path d="M 106,132 C 113,127 125,128 125,132 125,128 137,127 144,132 141,142  134,146  125,146  116,146 109,142 106,132 Z" />
                                            </clipPath>
                                        </defs>
                                        <circle cx="125" cy="125" r="120" fill="rgba(0,0,0,0.15)" />
                                        <g stroke="none" stroke-width="0" clip-path="url(#scene)">
                                            <rect x="0" y="0" width="250" height="250" fill="#b0d2e5" />
                                            <g id="head">
                                            <path fill="none" stroke="#111111" stroke-width="2" d="M 68,103 83,103.5" />
                                            <path class="hair" d="M 67,90 67,169 78,164 89,169 100,164 112,169 125,164 138,169 150,164 161,169 172,164 183,169 183,90 Z" />
                                            <circle cx="125" cy="100" r="55" class="skin" />
                                            <ellipse cx="102" cy="107" rx="5" ry="5" class="eyes" id="eye-left" />
                                            <ellipse cx="148" cy="107" rx="5" ry="5" class="eyes" id="eye-right" />
                                            <rect x="119" y="140" width="12" height="40" class="skin" />
                                            <path class="line eyebrow" d="M 90,98 C 93,90 103,89 110,94" id="eyebrow-left" />
                                            <path class="line eyebrow" d="M 160,98 C 157,90 147,89 140,94" id="eyebrow-right"/>
                                            <path stroke="#111111" stroke-width="4" d="M 68,103 83,102.5" />
                                            <path stroke="#111111" stroke-width="4" d="M 182,103 167,102.5" />
                                            <path stroke="#050505" stroke-width="3" fill="none" d="M 119,102 C 123,99 127,99 131,102" />
                                            <path fill="#050505" d="M 92,97 C 85,97 79,98 80,101 81,104 84,104 85,102" />
                                            <path fill="#050505" d="M 158,97 C 165,97 171,98 170,101 169,104 166,104 165,102" />
                                            <path stroke="#050505" stroke-width="3" fill="rgba(240,240,255,0.4)" d="M 119,102 C 118,111 115,119 98,117 85,115 84,108 84,104 84,97 94,96 105,97 112,98 117,98 119,102 Z" />
                                            <path stroke="#050505" stroke-width="3" fill="rgba(240,240,255,0.4)" d="M 131,102 C 132,111 135,119 152,117 165,115 166,108 166,104 166,97 156,96 145,97 138,98 133,98 131,102 Z" />
                                            <path class="hair" d="M 60,109 C 59,39 118,40 129,40 139,40 187,43 189,99 135,98 115,67 115,67 115,67 108,90 80,109 86,101 91,92 92,87 85,99 65,108 60,109" />
                                            <path id="mouth" fill="#d73e3e" d="M 106,132 C 113,127 125,128 125,132 125,128 137,127 144,132 141,142  134,146  125,146  116,146 109,142 106,132 Z" /> 
                                            <path id="smile" fill="white" d="M125,141 C 140,141 143,132 143,132 143,132 125,133 125,133 125,133 106.5,132 106.5,132 106.5,132 110,141 125,141 Z" clip-path="url(#lips)" />
                                            </g>
                                            <g id="shirt">
                                            <path fill="#8665c2" d="M 132,170 C 146,170 154,200 154,200 154,200 158,250 158,250 158,250 92,250 92,250 92,250 96,200 96,200 96,200 104,170 118,170 118,170 125,172 125,172 125,172 132,170 132,170 Z"/>
                                            <path id="arm-left" class="arm" stroke="#8665c2" fill="none" stroke-width="14" d="M 118,178 C 94,179 66,220 65,254" />
                                            <path id="arm-right" class="arm" stroke="#8665c2" fill="none" stroke-width="14" d="M 132,178 C 156,179 184,220 185,254" />
                                            <path fill="white" d="M 117,166 C 117,166 125,172 125,172 125,182 115,182 109,170 Z" />
                                            <path fill="white" d="M 133,166 C 133,166 125,172 125,172 125,182 135,182 141,170 Z" />
                                            <circle cx="125" cy="188" r="4" fill="#5a487b" />
                                            <circle cx="125" cy="202" r="4" fill="#5a487b" />
                                            <circle cx="125" cy="216" r="4" fill="#5a487b" />
                                            <circle cx="125" cy="230" r="4" fill="#5a487b" />
                                            <circle cx="125" cy="244" r="4" fill="#5a487b" />
                                            <path stroke="#daa37f" stroke-width="1" class="skin hand" id="hand-left" d="M 51,270 C 46,263 60,243 63,246 65,247 66,248 61,255 72,243 76,238 79,240 82,243 72,254 69,257 72,254 82,241 86,244 89,247 75,261 73,263 77,258 84,251 86,253 89,256 70,287 59,278" /> 
                                            <path stroke="#daa37f" stroke-width="1" class="skin hand" id="hand-right" d="M 199,270 C 204,263 190,243 187,246 185,247 184,248 189,255 178,243 174,238 171,240 168,243 178,254 181,257 178,254 168,241 164,244 161,247 175,261 177,263 173,258 166,251 164,253 161,256 180,287 191,278"/> 
                                            </g>
                                        </g>
                                        </svg>
                                    </div>
                                    <div class="more-info">
                                        <h1>Premio #1</h1>
                                        <div class="stats">
                                        <div>
                                            <div class="title">Awards</div>
                                            <i class="fa fa-trophy"></i>
                                            <div class="value">2</div>
                                        </div>
                                        <div>
                                            <div class="title">Matches</div>
                                            <i class="fa fa-gamepad"></i>
                                            <div class="value">27</div>
                                        </div>                                        
                                        <div>
                                            <div class="title">Coffee</div>
                                            <i class="fa fa-coffee"></i>
                                            <div class="value infinity">∞</div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="general">
                                    <h1>Premio #1</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>                                   
                                    </div>
                                </div>
                                <div class="card-premios green">
                                    <div class="additional">
                                    <div class="user-card">
                                        <div class="level center">
                                        Level 13
                                        </div>
                                        <div class="points center">
                                        5,312 Points
                                        </div>
                                        <svg width="110" height="110" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="title desc" class="center">
                                        <title id="title">Teacher</title>
                                        <desc id="desc">Cartoon of a Caucasian woman smiling, and wearing black glasses and a purple shirt with white collar drawn by Alvaro Montoro.</desc>
                                        <style>
                                            .skin { fill: #eab38f; }
                                            .eyes { fill: #1f1f1f; }
                                            .hair { fill: #2f1b0d; }
                                            .line { fill: none; stroke: #2f1b0d; stroke-width:2px; }
                                        </style>
                                        <defs>
                                            <clipPath id="scene">
                                            <circle cx="125" cy="125" r="115"/>
                                            </clipPath>
                                            <clipPath id="lips">
                                            <path d="M 106,132 C 113,127 125,128 125,132 125,128 137,127 144,132 141,142  134,146  125,146  116,146 109,142 106,132 Z" />
                                            </clipPath>
                                        </defs>
                                        <circle cx="125" cy="125" r="120" fill="rgba(0,0,0,0.15)" />
                                        <g stroke="none" stroke-width="0" clip-path="url(#scene)">
                                            <rect x="0" y="0" width="250" height="250" fill="#b0d2e5" />
                                            <g id="head">
                                            <path fill="none" stroke="#111111" stroke-width="2" d="M 68,103 83,103.5" />
                                            <path class="hair" d="M 67,90 67,169 78,164 89,169 100,164 112,169 125,164 138,169 150,164 161,169 172,164 183,169 183,90 Z" />
                                            <circle cx="125" cy="100" r="55" class="skin" />
                                            <ellipse cx="102" cy="107" rx="5" ry="5" class="eyes" id="eye-left" />
                                            <ellipse cx="148" cy="107" rx="5" ry="5" class="eyes" id="eye-right" />
                                            <rect x="119" y="140" width="12" height="40" class="skin" />
                                            <path class="line eyebrow" d="M 90,98 C 93,90 103,89 110,94" id="eyebrow-left" />
                                            <path class="line eyebrow" d="M 160,98 C 157,90 147,89 140,94" id="eyebrow-right"/>
                                            <path stroke="#111111" stroke-width="4" d="M 68,103 83,102.5" />
                                            <path stroke="#111111" stroke-width="4" d="M 182,103 167,102.5" />
                                            <path stroke="#050505" stroke-width="3" fill="none" d="M 119,102 C 123,99 127,99 131,102" />
                                            <path fill="#050505" d="M 92,97 C 85,97 79,98 80,101 81,104 84,104 85,102" />
                                            <path fill="#050505" d="M 158,97 C 165,97 171,98 170,101 169,104 166,104 165,102" />
                                            <path stroke="#050505" stroke-width="3" fill="rgba(240,240,255,0.4)" d="M 119,102 C 118,111 115,119 98,117 85,115 84,108 84,104 84,97 94,96 105,97 112,98 117,98 119,102 Z" />
                                            <path stroke="#050505" stroke-width="3" fill="rgba(240,240,255,0.4)" d="M 131,102 C 132,111 135,119 152,117 165,115 166,108 166,104 166,97 156,96 145,97 138,98 133,98 131,102 Z" />
                                            <path class="hair" d="M 60,109 C 59,39 118,40 129,40 139,40 187,43 189,99 135,98 115,67 115,67 115,67 108,90 80,109 86,101 91,92 92,87 85,99 65,108 60,109" />
                                            <path id="mouth" fill="#d73e3e" d="M 106,132 C 113,127 125,128 125,132 125,128 137,127 144,132 141,142  134,146  125,146  116,146 109,142 106,132 Z" /> 
                                            <path id="smile" fill="white" d="M125,141 C 140,141 143,132 143,132 143,132 125,133 125,133 125,133 106.5,132 106.5,132 106.5,132 110,141 125,141 Z" clip-path="url(#lips)" />
                                            </g>
                                            <g id="shirt">
                                            <path fill="#8665c2" d="M 132,170 C 146,170 154,200 154,200 154,200 158,250 158,250 158,250 92,250 92,250 92,250 96,200 96,200 96,200 104,170 118,170 118,170 125,172 125,172 125,172 132,170 132,170 Z"/>
                                            <path id="arm-left" class="arm" stroke="#8665c2" fill="none" stroke-width="14" d="M 118,178 C 94,179 66,220 65,254" />
                                            <path id="arm-right" class="arm" stroke="#8665c2" fill="none" stroke-width="14" d="M 132,178 C 156,179 184,220 185,254" />
                                            <path fill="white" d="M 117,166 C 117,166 125,172 125,172 125,182 115,182 109,170 Z" />
                                            <path fill="white" d="M 133,166 C 133,166 125,172 125,172 125,182 135,182 141,170 Z" />
                                            <circle cx="125" cy="188" r="4" fill="#5a487b" />
                                            <circle cx="125" cy="202" r="4" fill="#5a487b" />
                                            <circle cx="125" cy="216" r="4" fill="#5a487b" />
                                            <circle cx="125" cy="230" r="4" fill="#5a487b" />
                                            <circle cx="125" cy="244" r="4" fill="#5a487b" />
                                            <path stroke="#daa37f" stroke-width="1" class="skin hand" id="hand-left" d="M 51,270 C 46,263 60,243 63,246 65,247 66,248 61,255 72,243 76,238 79,240 82,243 72,254 69,257 72,254 82,241 86,244 89,247 75,261 73,263 77,258 84,251 86,253 89,256 70,287 59,278" /> 
                                            <path stroke="#daa37f" stroke-width="1" class="skin hand" id="hand-right" d="M 199,270 C 204,263 190,243 187,246 185,247 184,248 189,255 178,243 174,238 171,240 168,243 178,254 181,257 178,254 168,241 164,244 161,247 175,261 177,263 173,258 166,251 164,253 161,256 180,287 191,278"/> 
                                            </g>
                                        </g>
                                        </svg>
                                    </div>
                                    <div class="more-info">
                                        <h1>Premio #2</h1>
                                        <div class="stats">
                                        <div>
                                            <div class="title">Awards</div>
                                            <i class="fa fa-trophy"></i>
                                            <div class="value">2</div>
                                        </div>
                                        <div>
                                            <div class="title">Matches</div>
                                            <i class="fa fa-gamepad"></i>
                                            <div class="value">27</div>
                                        </div>
                                        <div>
                                            <div class="title">Coffee</div>
                                            <i class="fa fa-coffee"></i>
                                            <div class="value infinity">∞</div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="general">
                                    <h1>Jane Doe</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>                                  
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
                    <a href="javascript:void(0)" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2 open_salas">
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