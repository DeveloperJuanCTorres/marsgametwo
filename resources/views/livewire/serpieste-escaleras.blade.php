<div  class="bg-gray-100 shadow border border-gray-300 overflow-hidden ">
    <div class="grid grid-cols-6 divide-x divide-gray-200">
        <div class="h-[calc(98vh)] col-span-6 xl:col-span-4 lg:col-span-4 sm:col-span-6 bg-white bg-gamer" wire:ignore>
          <div class="gameBoard" id="gameBoardOuter">
            <div id="gameBoard" class="gameBoardInner"></div>
            <div class="gameInterface">
              <div class="dice show3" id="dice">
                <div><span></span></div>
                <div><span></span><span></span></div>
                <div><span></span><span></span><span></span></div>
                <div>
                  <div>
                    <span></span><span></span>
                  </div>
                  <div>
                    <span></span><span></span>
                  </div>
                </div>
                <div>
                  <div>
                    <span></span><span></span>
                  </div>
                  <div>
                    <span></span>
                  </div>
                  <div>
                    <span></span><span></span>
                  </div>
                </div>
                <div>
                  <div>
                    <span></span><span></span><span></span>
                  </div>
                  <div>
                    <span></span><span></span><span></span>
                  </div>
                </div>
              </div>
              <div id="player" class="player"></div>
              <div class="players">
                <div id="player0" class="player0"><span>You</span></div>
                <div id="player1" class="player1"><span>Computer</span></div>
              </div>
              {{-- <button id="play" onclick="app.play()">Roll</button> --}}
              <button id="play">Play USER</button>
              <button id="computadoro">Computadora</button>
            </div>
            <!-- <p class="credits">Ing. Juan Carlos Torres del Castillo</p> -->
            <div class="dialog" id="dialog">
              <h1 id="dialogText">Computer Wins!</h1>
              <button onclick="app.reset()">Play Again</button>
            </div>
          </div>
        </div>

        
        <div class="col-span-6 xl:col-span-2 lg:col-span-2 sm:col-span-6 chat-desktop">
            
                <div class="bg-gray-50 h-16 flex items-center px-4 border-b-2 border-gray-200 justify-between">
                    <img src="{{asset('img/logo.png')}}"  alt="logo" class="max-w-40">
                    <a href="/" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Salir del juego</a>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js"></script>
      <script src="{{asset('js/serpientes.js')}}"></script>
      <script>
          document.addEventListener('livewire:initialized', function () {
                var tablero = @this.draughts;
                var playercolor = @this.player;
                loadingTable(tablero,playercolor);
            })
      </script> 
      <script>
          let p = document.getElementById("play"); // Encuentra el elemento "p" en el sitio
          p.onclick = iniciarSerpientes; // Agrega función onclick al elemento
          
          function iniciarSerpientes(evento) {
            app.play();
          }


          let o = document.getElementById("computadoro");
          o.onclick = computadoraPlay;

          function computadoraPlay(evento){
            console.log('xxxxxx----xxxxxx');
            app.opponent();
            
          }


          Livewire.on('notificateEchoJs', (event) => {
                console.log('movimiento del oponente desde js');
                // if(event[1] == event[2]){
                //     //Activo el tablero para el turno que le coresponde
                //     document.getElementById('boardDiv').classList.remove('elementor-toggle');
                // }else{
                //     document.getElementById('boardDiv').classList.add('elementor-toggle');
                // }
                app.opponent();
            });

          function copiarEmoji(emoji) {
              if(@this.bodyMessage){
                  @this.bodyMessage =  @this.bodyMessage + emoji;
              }else{
                  @this.bodyMessage =  emoji;
              }
          }

          Livewire.on('scrollIntoView', function() {
            console.log('scrolll');
              var desktop = document.getElementById('final');
              var movil = document.getElementById('final-movil');
              if(desktop){
                  desktop.scrollIntoView(true);
              }
              if(movil){
                  movil.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
              }
          });
      </script>
    @endpush
</div>
