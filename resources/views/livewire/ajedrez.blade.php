

<div x-data="data()" class="bg-gray-100 shadow border border-gray-300 overflow-hidden ">
    <div class="grid grid-cols-6 divide-x divide-gray-200 ">
        <div class=" col-span-6 xl:col-span-4 lg:col-span-5 sm:col-span-6 bg-gamer" wire:ignore>
            <div class="h-[calc(100vh)] grid grid-cols-1  content-between">
            <div>
                <div class="py-2 bg-blue-mars  flex justify-center text-white">
                    <p class="ml-4">
                        <i class="las la-hand-point-right me-1"></i>
                        <span id="infoDiv"></span>
                    </p>

                    <a href="/" class="focus:outline-none text-white bg-gray-800 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-full text-sm py-1 px-3 ml-4">
                        <i class="las la-door-open"></i> Salir
                    </a>
                    <a href="/" class="focus:outline-none text-white bg-gray-800 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-full text-sm py-1 px-3 ml-2">
                        <i class="las la-handshake"></i> Tablas
                    </a>
                </div>
                <div class="bg-gray-800">
                    <div class="h-12 flex justify-between px-3">
                        <div class="flex items-center">
                            @if($myColor=="white")
                                <img class="w-9 h-9 object-cover object-center rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ $adversary->name }}">
                            @else
                                <img class="w-9 h-9 object-cover object-center rounded-full" src="{{ $adversary->profile_photo_url }}" alt="{{ $adversary->name }}">
                            @endif
                            <div class="ml-4">
                                <p class="text-white text-lg leading-3">
                                    @if($myColor=="white")
                                        {{ Auth::user()->name }}
                                    @else
                                    {{ $adversary->name }}
                                    @endif
                                </p>
                                <span class="text-white text-sm">
                                    <i class="text-xl text-black las la-chess"></i> Piezas negras
                                </span>
                            </div>
                            <div class="ml-2">
                                <div id="cardBlack" class="text-gray-800 rounded-full p-1  {{'white' == $player ?  'bg-green-400' : 'bg-gray-800'}} ">
                                   <i class="text-2xl las la-hand-paper"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center text-2xl text-white" id="ctwhite">
                            {{$timeWhite}}
                        </div>
                    </div>
                    <div class="extra-zone">
                        <div class="captured-zone" id="czblack"></div>
                        {{-- <div class="countdown-timer" id="ctblack"></div> --}}
                    </div>
                </div>
            </div>

            <div>
                <div class="container" id="boardDiv">

                    <div class="chessboard">
                        <div class="line l8">
                            <div class="boardNum">8</div>
                            <div class="square c1"></div>
                            <div class="square c2"></div>
                            <div class="square c3"></div>
                            <div class="square c4"></div>
                            <div class="square c5"></div>
                            <div class="square c6"></div>
                            <div class="square c7"></div>
                            <div class="square c8"></div>
                        </div>
                        <div class="line l7">
                            <div class="boardNum">7</div>
                            <div class="square c1"></div>
                            <div class="square c2"></div>
                            <div class="square c3"></div>
                            <div class="square c4"></div>
                            <div class="square c5"> </div>
                            <div class="square c6"></div>
                            <div class="square c7"></div>
                            <div class="square c8"> </div>
                        </div>
                        <div class="line l6">
                            <div class="boardNum">6</div>
                            <div class="square c1"></div>
                            <div class="square c2"></div>
                            <div class="square c3"></div>
                            <div class="square c4"></div>
                            <div class="square c5"></div>
                            <div class="square c6"></div>
                            <div class="square c7"></div>
                            <div class="square c8"></div>
                        </div>
                        <div class="line l5">
                            <div class="boardNum">5</div>
                            <div class="square c1"></div>
                            <div class="square c2"></div>
                            <div class="square c3"></div>
                            <div class="square c4"></div>
                            <div class="square c5"></div>
                            <div class="square c6"></div>
                            <div class="square c7"></div>
                            <div class="square c8"></div>
                        </div>
                        <div class="line l4">
                            <div class="boardNum">4</div>
                            <div class="square c1"></div>
                            <div class="square c2"></div>
                            <div class="square c3"></div>
                            <div class="square c4"></div>
                            <div class="square c5"></div>
                            <div class="square c6"></div>
                            <div class="square c7"></div>
                            <div class="square c8"></div>
                        </div>
                        <div class="line l3">
                            <div class="boardNum">3</div>
                            <div class="square c1"></div>
                            <div class="square c2"></div>
                            <div class="square c3"></div>
                            <div class="square c4"></div>
                            <div class="square c5"></div>
                            <div class="square c6"></div>
                            <div class="square c7"></div>
                            <div class="square c8"></div>
                        </div>
                        <div class="line l2">
                            <div class="boardNum">2</div>
                            <div class="square c1"></div>
                            <div class="square c2"></div>
                            <div class="square c3"></div>
                            <div class="square c4"></div>
                            <div class="square c5"></div>
                            <div class="square c6"></div>
                            <div class="square c7"></div>
                            <div class="square c8"></div>
                        </div>
                        <div class="line l1">
                            <div class="boardNum">1</div>
                            <div class="square c1"></div>
                            <div class="square c2"></div>
                            <div class="square c3"></div>
                            <div class="square c4"></div>
                            <div class="square c5"> </div>
                            <div class="square c6"></div>
                            <div class="square c7"></div>
                            <div class="square c8"></div>
                        </div>
                        <div class="line px-1">
                            <div class="boardAlf">A</div>
                            <div class="boardAlf">B</div>
                            <div class="boardAlf">C</div>
                            <div class="boardAlf">D</div>
                            <div class="boardAlf">E</div>
                            <div class="boardAlf">F</div>
                            <div class="boardAlf">G</div>
                            <div class="boardAlf">H</div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                    <div class="bg-gray-800 ">
                        <div class="h-12 flex justify-between  px-3">

                            <div class="flex items-center">
                                @if($myColor=="black")
                                    <img class="w-9 h-9 object-cover object-center rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ $adversary->name }}">
                                @else
                                    <img class="w-9 h-9 object-cover object-center rounded-full" src="{{ $adversary->profile_photo_url }}" alt="{{ $adversary->name }}">
                                @endif
                                <div class="ml-4">
                                    <p class="text-white text-lg leading-3">
                                        @if($myColor=="black")
                                            {{ Auth::user()->name}}
                                        @else
                                            {{ $adversary->name }}
                                        @endif
                                    </p>
                                    <span class="text-gray-300 text-sm">
                                        <i class="text-lg  las la-chess"></i> Piezas Blancas
                                    </span>
                                </div>
                                <div class="ml-2">
                                <div id="cardwhite" class="text-gray-800 rounded-full p-1 {{'black' == $player ? 'bg-green-400' : 'bg-gray-800'}} ">
                                    <i class="text-2xl las la-hand-paper"></i>
                                </div>
                            </div>
                             </div>
                            <div class="flex items-center text-2xl text-white" id="ctblack">
                                {{$timeBlack}}
                            </div>
                        </div>

                    <div class="extra-zone">
                        <div class="captured-zone" id="czwhite"></div>
                       {{-- <div class="countdown-timer" id="ctblack"></div>  --}}
                    </div>
                </div>
                <div class="py-10 bg-gray-option"></div>
            </div>
        </div>
    </div>

        <div class="col-span-7 xl:col-span-2 lg:col-span-1 sm:col-span-7 chat-desktop">
            <div class="bg-gray-50 h-16 flex items-center px-4 border-b-2 border-gray-200 justify-between">
                <img src="{{asset('img/logo.png')}}"  alt="logo" class="max-w-40">
            </div>
            <div class="bg-gray-100 h-16 flex items-center px-3">
                <img class="w-10 h-10 object-cover object-center rounded-full" src="{{ $adversary->profile_photo_url }}" alt="{{ $adversary->name }}">
                <div class="ml-4">
                    <p class="text-gray-800"> {{ $adversary->name }}</p>
                </div>
            </div>
            <div class="h-[calc(92vh-11rem)] px-3 py-2 overflow-auto bg-white">
                {{-- El contenido de nuestro chat --}}
                @foreach ($this->messages as $message)
                    <div class="flex {{ $message->user_id == auth()->id() ? 'justify-end' : '' }} mb-2">
                        <div class="rounded px-3 py-2 {{ $message->user_id == auth()->id() ? 'bg-green-100' : 'bg-gray-200' }}">
                            <p class="text-sm">
                                {{$message->body}}
                            </p>
                            <p class="{{ $message->user_id == auth()->id() ? 'text-right' : '' }} text-xs text-gray-600 mt-1">
                                {{$message->created_at->format('d-m-y h:i A')}}
                                @if ($message->user_id == auth()->id())
                                    <i class="las la-check-double  ml-2 {{ $message->is_read ? 'text-blue-500' : 'text-gray-600' }}"></i>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
                <div style="height: 55px"></div>
                <span id="final"></span>
            </div>

            <div class="py-2 px-4 bg-gray-100 border-t-2">
            <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😀')">😀</span>
                <span class="mx-2 cursor-pointer"  onclick="copiarEmoji('😁')">😁</span>
                <span class="mx-2 cursor-pointer"  onclick="copiarEmoji('😂')">😂</span>
                <span class="mx-2 cursor-pointer"  onclick="copiarEmoji('😅')">😅</span>
                <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😍')">😍</span>
                <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😈')">😈</span>
                <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😉')">😉</span>
                <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😡')">😡</span>
                <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😭')">😭</span>
                <span class="mx-2 cursor-pointer" onclick="copiarEmoji('🤑')">🤑</span>
                <span class="mx-2 cursor-pointer" onclick="copiarEmoji('🤩')">🤩</span>
            </div>
            <form class="bg-gray-100 h-16 flex items-center px-4" wire:submit.prevent="sendMessage()">
                <x-input wire:model.live="bodyMessage" type="text" class="flex-1" id="message" placeholder="Escriba un mensaje aquí" />
                <button class="flex-shrink-0 ml-4 text-2xl text-gray-700">
                    <i class="las la-paper-plane"></i>
                </button>
            </form>
        </div>

    </div>

    <div class="chat-mobil">
        <div id="drawer-swipe" class="fixed z-40 w-full overflow-y-auto bg-white border-t border-gray-300 rounded-t-lg  transition-transform bottom-0 left-0 right-0"
          :class="{'transform-none': sidebarOpen,'translate-y-full bottom-[60px]': !sidebarOpen}">
            <div class="p-4 cursor-pointer bg-gray-100 hover:bg-gray-200" x-on:click="sidebarOpen = !sidebarOpen">
                <span class="absolute w-8 h-1 -translate-x-1/2 bg-gray-500 rounded-lg top-3 left-1/2 "></span>
                <h5 id="drawer-swipe-label" class="inline-flex items-center text-base text-gray-500  font-medium">
                  <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                    <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
                  </svg>Chat
                </h5>
            </div>
            <div>
                <div class="p-2 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 ">
                  <div class="h-[calc(25vh)] px-3 py-2 overflow-auto">
                      {{-- El contenido de nuestro chat --}}
                      @foreach ($this->messages as $message)
                          <div class="flex {{ $message->user_id == auth()->id() ? 'justify-end' : '' }} mb-2">
                              <div class="rounded px-3 py-2 {{ $message->user_id == auth()->id() ? 'bg-green-100' : 'bg-gray-200' }}">
                                  <p class="text-sm">
                                      {{$message->body}}
                                  </p>
                                  <p class="{{ $message->user_id == auth()->id() ? 'text-right' : '' }} text-xs text-gray-600 mt-1">
                                      {{$message->created_at->format('d-m-y h:i A')}}
                                      @if ($message->user_id == auth()->id())
                                          <i class="las la-check-double  ml-2 {{ $message->is_read ? 'text-blue-500' : 'text-gray-600' }}"></i>
                                      @endif
                                  </p>
                              </div>
                          </div>
                      @endforeach
                      <div style="height: 30px"></div>
                      <span id="final-movil"></span>
                  </div>
                  <div class="py-2 px-4 bg-gray-200">
                      <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😀')">😀</span>
                      <span class="mx-2 cursor-pointer"  onclick="copiarEmoji('😂')">😂</span>
                      <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😍')">😍</span>
                      <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😈')">😈</span>
                      <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😉')">😉</span>
                      <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😡')">😡</span>
                      <span class="mx-2 cursor-pointer" onclick="copiarEmoji('😭')">😭</span>
                      <span class="mx-2 cursor-pointer" onclick="copiarEmoji('🤩')">🤩</span>
                  </div>

                  <form class="bg-gray-100 h-16 flex items-center px-4" wire:submit.prevent="sendMessage()">
                      <x-input wire:model.live="bodyMessage" type="text" class="flex-1" id="message" placeholder="Escriba un mensaje aquí" />
                      <button class="flex-shrink-0 ml-4 text-2xl text-gray-700">
                          <i class="las la-paper-plane"></i>
                      </button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @push('js')
      <script src="{{asset('js/ajedrez.js')}}?v=1993.1.16"></script>
      <script>
            document.addEventListener('livewire:initialized', function () {
                var pieces = @this.draughts;
                var playercolor = @this.player;
                playGame(pieces,playercolor);


                if(playercolor == 'white')
                    whiteTurn.start();
                else
                    blackTurn.start();
              });
      </script>
      <script>
            function data(){
                return{
                    init(){
                        Echo.private('App.Models.User.' + {{ auth()->id() }}).notification((notification) => {
                            if (notification.type == 'App\\Notifications\\NewMessage') {
                                Livewire.dispatch('render')
                            }
                            if (notification.type == 'App\\Notifications\\NewMove') {
                                Livewire.dispatch('playGame')
                            }
                        });
                    }
                }
            }
        </script>
        <script>
            Livewire.on('iniliziateJs', (event) => {
                if(event[1] == event[2]){
                    //Activo el tablero para el turno que le coresponde
                    document.getElementById('boardDiv').classList.remove('elementor-toggle');
                }else{
                    document.getElementById('boardDiv').classList.add('elementor-toggle');
                }
            });
            Livewire.on('notificateEchoJs', (event) => {
                if(event[1] == event[2]){
                    console.log('js Sin velo');
                    console.log(event[0]);
                    //Activo el tablero para el turno que le coresponde
                    document.getElementById('boardDiv').classList.remove('elementor-toggle');
                    //Cambiar el color del turno
                    let cardBlack = document.getElementById("cardBlack");
                    let cardwhite = document.getElementById("cardwhite");

                    if(event[1] == 'white'){
                       

                        cardBlack.classList.remove("bg-gray-800");
                        cardBlack.classList.add("bg-green-400");
                        cardwhite.classList.remove("bg-green-400");
                        cardwhite.classList.add("bg-gray-800");


                        console.log('white ----------------->local');
                        blackTurn.end();
                        whiteTurn.restart();
                        
                    }

                    if(event[1] == 'black'){

                        cardBlack.classList.remove("bg-green-400");
                        cardBlack.classList.add("bg-gray-800");
                        cardwhite.classList.remove("bg-gray-800");
                        cardwhite.classList.add("bg-green-400");

                        

                        console.log('black ----------------->local');
                        whiteTurn.end();
                        blackTurn.restart();
                      
                    }


                }
                opponentMove(event[0],event[1]);
            });
        </script>
        <script>
            function copiarEmoji(emoji) {
                if(@this.bodyMessage){
                    @this.bodyMessage =  @this.bodyMessage + emoji;
                }else{
                    @this.bodyMessage =  emoji;
                }
            }
            Livewire.on('scrollIntoView', function() {
                var aux = document.getElementById('final');
                if(aux){
                    aux.scrollIntoView(true);
                }
            });
        </script>
    @endpush
</div>