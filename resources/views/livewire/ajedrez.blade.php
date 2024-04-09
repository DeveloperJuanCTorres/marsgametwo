<div  class="bg-gray-100 shadow border border-gray-300 overflow-hidden ">

    <div class="grid grid-cols-6 divide-x divide-gray-200">
        <div class="col-span-6 sm:col-span-4 bg-white bg-gamer" >
            

        <div class="cont-tablero">
        <!-- FILA NRO-1 -->
        <div class="tab-fila"> <!-- PIEZAS NEGRAS -->
            <div class="tab-col"> &#9820; </div> 
            <div class="tab-col black"> &#9822; </div>
            <div class="tab-col"> &#9821; </div>
            <div class="tab-col black"> &#9819; </div>
            <div class="tab-col"> &#9818; </div>
            <div class="tab-col black"> &#9821; </div>
            <div class="tab-col"> &#9822; </div>
            <div class="tab-col black"> &#9820; </div>
        </div>

        <!-- FILA NRO-2 -->
        <div class="tab-fila"> <!-- PIEZAS NEGRAS -->
            <div class="tab-col black"> &#9823; </div>
            <div class="tab-col"> &#9823; </div>
            <div class="tab-col black"> &#9823; </div>
            <div class="tab-col"> &#9823; </div>
            <div class="tab-col black"> &#9823; </div>
            <div class="tab-col"> &#9823; </div>
            <div class="tab-col black"> &#9823; </div>
            <div class="tab-col"> &#9823; </div>
        </div>

        <!-- FILA NRO-3 -->
        <div class="tab-fila">
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
        </div>

        <!-- FILA NRO-4 -->
        <div class="tab-fila">
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
        </div>

        <!-- FILA NRO-5 -->
        <div class="tab-fila">
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
        </div>

        <!-- FILA NRO-6 -->
        <div class="tab-fila">
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
            <div class="tab-col black"></div>
            <div class="tab-col"></div>
        </div>

        <!-- FILA NRO-7 -->
        <div class="tab-fila"> <!-- PIEZAS BLANCAS -->
            <div class="tab-col"> &#9817; </div>
            <div class="tab-col black"> &#9817; </div>
            <div class="tab-col"> &#9817; </div>
            <div class="tab-col black"> &#9817; </div>
            <div class="tab-col"> &#9817; </div>
            <div class="tab-col black"> &#9817; </div>
            <div class="tab-col"> &#9817; </div>
            <div class="tab-col black"> &#9817; </div>
        </div>
 
        <!-- FILA NRO-8 -->
        <div class="tab-fila"> <!-- PIEZAS BLANCAS -->
            <div class="tab-col black"> &#9814; </div>
            <div class="tab-col"> &#9816; </div>
            <div class="tab-col black"> &#9815; </div>
            <div class="tab-col"> &#9813; </div>
            <div class="tab-col black"> &#9812; </div>
            <div class="tab-col"> &#9815; </div>
            <div class="tab-col black"> &#9816; </div>
            <div class="tab-col"> &#9814; </div>
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

    
    @push('js')
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
