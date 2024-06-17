

<div x-data="data()" class="bg-gray-100 shadow border border-gray-300 overflow-hidden ">
    <div class="grid grid-cols-7 divide-x divide-gray-200">    
        
        <div class="h-[calc(98vh)] col-span-7 xl:col-span-4 lg:col-span-5 sm:col-span-7 bg-white bg-gamer" wire:ignore>
            <div class="text-center pt-2">
                <p> 
                    <span id="infoDiv" class="text-2xl"></span>
                </p>
                <p id="winerGame" class="mt-2 text-3xl"></p>
            </div>
            <div>
                
                <div class="container" id="boardDiv">
                    <div class="extra-zone">
                        <div class="captured-zone" id="czblack"></div>
                        <!-- <div class="countdown-timer" id="ctblack">10:00</div> -->
                    </div>
                    <div class="chessboard">
                        <div class="line l8">
                        <div class="square c1">
                        </div>
                        <div class="square c2">
                        </div>
                        <div class="square c3">
                        </div>
                        <div class="square c4">
                        </div>
                        <div class="square c5">
                        </div>
                        <div class="square c6">
                            
                        </div>
                        <div class="square c7">
                            
                        </div>
                        <div class="square c8">
                            
                        </div>
                        </div>
                        <div class="line l7">
                        <div class="square c1">
                            
                        </div>
                        <div class="square c2">
                            
                        </div>
                        <div class="square c3">
                            
                        </div>
                        <div class="square c4">
                            
                        </div>
                        <div class="square c5">
                            
                        </div>
                        <div class="square c6">
                            
                        </div>
                        <div class="square c7">
                            
                        </div>
                        <div class="square c8">
                            
                        </div>
                        </div>
                        <div class="line l6">
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
                        <div class="square c1">
                            
                        </div>
                        <div class="square c2">
                            
                        </div>
                        <div class="square c3">
                            
                        </div>
                        <div class="square c4">
                            
                        </div>
                        <div class="square c5">
                            
                        </div>
                        <div class="square c6">
                            
                        </div>
                        <div class="square c7">
                            
                        </div>
                        <div class="square c8">
                        
                        </div>
                        </div>
                        <div class="line l1">
                        <div class="square c1">
                            
                        </div>
                        <div class="square c2">
                            
                        </div>
                        <div class="square c3">
                            
                        </div>
                        <div class="square c4">
                            
                        </div>
                        <div class="square c5">
                            
                        </div>
                        <div class="square c6">
                            
                        </div>
                        <div class="square c7">
                            
                        </div>
                        <div class="square c8">
                            
                        </div>
                        </div>
                    </div>
                    <div class="extra-zone">
                        <div class="captured-zone" id="czwhite"></div>
                        <!-- <div class="countdown-timer" id="ctwhite">10:00</div> -->
                    </div>
                    </div> 
            </div>
        </div>

        <div class="col-span-7 xl:col-span-1 sm:col-span-1 bg-white bg-white p-3 content-center" >
           
            <div class="w-full p-2 bg-green-100 border border-gray-200 rounded-lg shadow my-5">
                <strong >Tú:</strong>
                <p class="my-2 font-normal text-gray-700 text-center">
                    @switch($myColor)
                    @case('white')
                         Piezas negras ♜ 
                        @break
                    @case('black')
                        Piezas Blancas <span class="text-white">♜</span>
                        @break
                    @default
                @endswitch 
                </p>
                <h5 class="text-xl font-bold tracking-tight text-gray-900 text-center mb-2"><i class="las la-stopwatch"></i> 1:00</h5>
            </div> 
            <div class="text-center font-bold">VS</div>
            <div class="w-full p-2 bg-white border border-gray-200 rounded-lg shadow my-5">
                <strong> {{ $adversary->name }}:</strong>
                <p class="my-2 font-normal text-gray-700 text-center">
                    @switch($myColor)
                    @case('black')
                         Piezas negras ♜ 
                        @break
                    @case('white')
                         Piezas Blancas  <span class="text-gray-300">♜</span>
                        @break
                    @default
                @endswitch 
                </p>
                <h5 class="text-xl font-bold tracking-tight text-gray-900 text-center mb-2"><i class="las la-stopwatch"></i> 1:00</h5>
            </div> 
        </div>

        <div class="col-span-7 xl:col-span-2 lg:col-span-1 sm:col-span-7 chat-desktop">
            <div class="bg-gray-50 h-16 flex items-center px-4 border-b-2 border-gray-200 justify-between">
                <img src="{{asset('img/logo.png')}}"  alt="logo" class="max-w-40">
                <a href="/" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Abandonar </a>
            </div>
            <div class="bg-gray-100 h-16 flex items-center px-3">
                <img class="w-10 h-10 object-cover object-center rounded-full" src="{{ $adversary->profile_photo_url }}" alt="{{ $adversary->name }}">
                <div class="ml-4">
                    <p class="text-gray-800">
                        {{ $adversary->name }}
                    </p>
                </div>
            </div>
            <div class="h-[calc(92vh-11rem)] px-3 py-2 overflow-auto">
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
            <div class="py-2 px-4 bg-gray-200">
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
      <script src="{{asset('js/ajedrez.js')}}?v=1993.1.12"></script> 

      <script>
            document.addEventListener('livewire:initialized', function () {
                var pieces = @this.draughts;
                var playercolor = @this.player;
                playGame(pieces,playercolor);
              })
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
                console.log('movimiento del oponente desde js ----OP1');
                if(event[1] == event[2]){
                    console.log('js Sin velo');
                    console.log(event[0]);
                    //Activo el tablero para el turno que le coresponde
                    document.getElementById('boardDiv').classList.remove('elementor-toggle');
                }
                // opponentMove(event[0],event[3],event[4],event[1]);
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
