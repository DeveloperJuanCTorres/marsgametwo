<div  class="bg-gray-100 shadow border border-gray-300 overflow-hidden ">

    <div class="grid grid-cols-6 divide-x divide-gray-200">
        <div class="col-span-6 sm:col-span-4 bg-white bg-gamer" >
            
                <div wire:ignore>
                    <div class="container">
                        <div class="extra-zone">
                          <div class="captured-zone" id="czblack"></div>
                          <div class="countdown-timer" id="ctblack">05:00</div>
                        </div>
                        <div class="chessboard">
                          <div class="line l8">
                            <div class="square c1">
                              <div class="black rook">♜</div>
                            </div>
                            <div class="square c2">
                              <div class="black knight">♞</div>
                            </div>
                            <div class="square c3">
                              <div class="black bishop">♝</div>
                            </div>
                            <div class="square c4">
                              <div class="black queen">♛</div>
                            </div>
                            <div class="square c5">
                              <div class="black king">♚</div>
                            </div>
                            <div class="square c6">
                              <div class="black bishop">♝</div>
                            </div>
                            <div class="square c7">
                              <div class="black knight">♞</div>
                            </div>
                            <div class="square c8">
                              <div class="black rook">♜</div>
                            </div>
                          </div>
                          <div class="line l7">
                            <div class="square c1">
                              <div class="black pawn">♙</div>
                            </div>
                            <div class="square c2">
                              <div class="black pawn">♙</div>
                            </div>
                            <div class="square c3">
                              <div class="black pawn">♙</div>
                            </div>
                            <div class="square c4">
                              <div class="black pawn">♙</div>
                            </div>
                            <div class="square c5">
                              <div class="black pawn">♙</div>
                            </div>
                            <div class="square c6">
                              <div class="black pawn">♙</div>
                            </div>
                            <div class="square c7">
                              <div class="black pawn">♙</div>
                            </div>
                            <div class="square c8">
                              <div class="black pawn">♙</div>
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
                              <div class="white pawn">♙</div>
                            </div>
                            <div class="square c2">
                              <div class="white pawn">♙</div>
                            </div>
                            <div class="square c3">
                              <div class="white pawn">♙</div>
                            </div>
                            <div class="square c4">
                              <div class="white pawn">♙</div>
                            </div>
                            <div class="square c5">
                              <div class="white pawn">♙</div>
                            </div>
                            <div class="square c6">
                              <div class="white pawn">♙</div>
                            </div>
                            <div class="square c7">
                              <div class="white pawn">♙</div>
                            </div>
                            <div class="square c8">
                              <div class="white pawn">♙</div>
                            </div>
                          </div>
                          <div class="line l1">
                            <div class="square c1">
                              <div class="white rook">♜</div>
                            </div>
                            <div class="square c2">
                              <div class="white knight">♞</div>
                            </div>
                            <div class="square c3">
                              <div class="white bishop">♝</div>
                            </div>
                            <div class="square c4">
                              <div class="white queen">♛</div>
                            </div>
                            <div class="square c5">
                              <div class="white king">♚</div>
                            </div>
                            <div class="square c6">
                              <div class="white bishop">♝</div>
                            </div>
                            <div class="square c7">
                              <div class="white knight">♞</div>
                            </div>
                            <div class="square c8">
                              <div class="white rook">♜</div>
                            </div>
                          </div>
                        </div>
                        <div class="extra-zone">
                          <div class="captured-zone" id="czwhite"></div>
                          <div class="countdown-timer" id="ctwhite">05:00</div>
                        </div>
                        </div> 
                </div>

        </div>

        <div class="col-span-6 sm:col-span-2 bg-white">
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

    @push('game')



    @endpush
    
    @push('js')

    <script src="{{asset('js/ajedrez.js')}}"></script>

    
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
