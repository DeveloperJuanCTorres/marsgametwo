<div  class="bg-gray-100 shadow border border-gray-300 overflow-hidden ">

    <div class="grid grid-cols-6 divide-x divide-gray-200">
        <div class="col-span-6 sm:col-span-4 bg-white bg-gamer" >
            
          <div class="ludo">
          <h1>4 Player Ludo Game</h1>
          <div class="contain">
          <div class="main-container">
              <div class="sizing">
                  <div class="homeA">
                      <div class="circle" id="red">
                          <div>
                              <div class="innercircle" id="red101">
                                  <button class="red" id="101" onclick="move(this.id)" disabled>1</button>
                              </div>
                              <div class="innercircle" id="red102">
                                  <button class="red" id="102" onclick="move(102)" disabled>2</button>
                              </div>
                          </div>    
                          <div>
                              <div class="innercircle" id="red103">
                                  <button class="red" id="103" onclick="move(103)" disabled>3</button>
                              </div>
                              <div class="innercircle" id="red104">
                                  <button class="red" id="104" onclick="move(104)" disabled>4</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col">
                      <img src="https://i.postimg.cc/bvgcKvBz/u-turn.png">
                      <div class="first">
                          <div class="col-one" id=11></div>
                          <div class="col-one" id=10></div>
                          <div class="col-one" id=9>
                              <i class="props fa-solid fa-star-of-david"></i></div>
                          <div class="col-one" id=8></div>
                          <div class="col-one" id=7></div>
                          <div class="col-one" id=6></div>
                      </div>
                      <div class="winyellow">
                          <div class="col-two" id=12 style="background-color: #EEEEEE;"></div>
                          <div class="col-two" id="210"></div>
                          <div class="col-two" id="211"></div>
                          <div class="col-two" id="212"></div>
                          <div class="col-two" id="213"></div>
                          <div class="col-two" id="214"></div>
                      </div>
                      <div class="second">
                          <div class="col-third" id=13></div>
                          <div class="col-third" id=14 style="background-color: #F6F54D;">
                              <i class="props fa-solid fa-flag-checkered"></i>
                          </div>
                          <div class="col-third" id=15></div>
                          <div class="col-third" id=16></div>
                          <div class="col-third" id=17></div>
                          <div class="col-third" id=18></div>
                      </div>
                  </div>
                  <div class="homeB">
                      <div class="circle" id="yellow">
                          <div>
                              <div class="innercircle" id="yellow201">
                                  <button class="yellow" id="201" onclick="move(this.id)" disabled>1</button>
                              </div>
                              <div class="innercircle" id="yellow202">
                                  <button class="yellow" id="202" onclick="move(202)" disabled>2</button>
                              </div>
                          </div>    
                          <div>
                              <div class="innercircle" id="yellow203">
                                  <button class="yellow" id="203" onclick="move(203)" disabled>3</button>
                              </div>
                              <div class="innercircle" id="yellow204">
                                  <button class="yellow" id="204" onclick="move(204)" disabled>4</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="sizing">
                  <div class="row">
                      <div class="four">
                          <div class="row-one" id=52></div>
                          <div class="row-one" id=1 style="background-color: #FF1700;">
                              <i class="props fa-solid fa-flag-checkered" style="transform: rotate(-90deg);"></i>
                          </div>
                          <div class="row-one" id=2></div>
                          <div class="row-one" id=3></div>
                          <div class="row-one" id=4></div>
                          <div class="row-one" id=5></div>
                      </div>
                      <div class="winred">
                          <div class="row-two" id=51 style="background-color: #EEEEEE;">
                              <img src="https://i.postimg.cc/bvgcKvBz/u-turn.png" class="props ">
                          </div>
                          <div class="row-two" id="110"></div>
                          <div class="row-two" id="111"></div>
                          <div class="row-two" id="112"></div>
                          <div class="row-two" id="113"></div>
                          <div class="row-two" id="114"></div>
                      </div>
                      <div class="six">
                          <div class="row-third" id=50></div>
                          <div class="row-third" id=49></div>
                          <div class="row-third" id=48>
                              <i class="props fa-solid fa-star-of-david"></i>
                          </div>
                          <div class="row-third" id=47></div>
                          <div class="row-third" id=46></div>
                          <div class="row-third" id=45></div>
                      </div>
                  </div>
                  <div class="winnerBox" id="win">
                   <i class="fa-solid fa-trophy"></i>
                  </div>
                  <div class="row">
                      <div class="four">
                          <div class="row-one" id=19></div>
                          <div class="row-one" id=20></div>
                          <div class="row-one" id=21></div>
                          <div class="row-one" id=22>
                              <i class="props fa-solid fa-star-of-david"></i>
                          </div>
                          <div class="row-one" id=23>
                              <img src="https://i.postimg.cc/bvgcKvBz/u-turn.png" class="props ">
                          </div>
                          <div class="row-one" id=24></div>
                      </div>
                      <div class="winblue">
                          <div class="row-two" id="314"></div>
                          <div class="row-two" id="313"></div>
                          <div class="row-two" id="312"></div>
                          <div class="row-two" id="311"></div>
                          <div class="row-two" id="310"></div>
                          <div class="row-two" id=25 style="background-color: #EEEEEE;"></div>
                      </div>
                      <div class="six">
                          <div class="row-third" id=31></div>
                          <div class="row-third" id=30></div>
                          <div class="row-third" id=29></div>
                          <div class="row-third" id=28></div>
                          <div class="row-third" id=27 style="background-color: #516BEB;">
                              <i class="props fa-solid fa-flag-checkered" style="transform: rotate(90deg);"></i>
                          </div>
                          <div class="row-third" id=26></div>
                      </div>
                  </div>
              </div>
              <div class="sizing">
                  <div class="homeC">
                      <div class="circle" id="green">
                          <div>
                              <div class="innercircle" id="green401" >
                                  <button class="green" id="401" onclick="move(this.id)" disabled>1</button>
                              </div>
                              <div class="innercircle" id="green402">
                                  <button class="green" id="402" onclick="move(402)" disabled>2</button>
                              </div>
                          </div>    
                          <div>
                              <div class="innercircle" id="green403">
                                  <button class="green" id="403" onclick="move(403)" disabled>3</button>
                              </div>
                              <div class="innercircle" id="green404">
                                  <button class="green" id="404" onclick="move(404)" disabled>4</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col">
                      <div class="first">
                          <div class="col-one" id=44></div>
                          <div class="col-one" id=43></div>
                          <div class="col-one" id=42></div>
                          <div class="col-one" id=41></div>
                          <div class="col-one" id=40 style="background-color: #019267;">
                              <i class="props fa-solid fa-flag-checkered" style="transform: rotate(180deg);"></i>
                          </div>
                          <div class="col-one" id=39 style="border-bottom: none;"></div>
                      </div>
                      <div class="wingreen">
                          <div class="col-two" id="414"></div>
                          <div class="col-two" id="413"></div>
                          <div class="col-two" id="412"></div>
                          <div class="col-two" id="411"></div>
                          <div class="col-two" id="410">
                              <img src="https://i.postimg.cc/bvgcKvBz/u-turn.png" class="props ">
                          </div>
                          <div class="col-two" id=38 style="background-color: #EEEEEE; border-bottom: 3px solid black;"></div>
                      </div>
                      <div class="second">
                          <div class="col-third" id=32></div>
                          <div class="col-third" id=33></div>
                          <div class="col-third" id=34></div>
                          <div class="col-third" id=35>
                              <i class="props fa-solid fa-star-of-david"></i>
                          </div>
                          <div class="col-third" id=36></div>
                          <div class="col-third" id=37 style="border-bottom: none;"></div>
                      </div>
                  </div>
                  <div class="homeD">
                      <div class="circle" id="blue">
                          <div>
                              <div class="innercircle" id="blue301" >
                                  <button class="blue" id="301" onclick="move(this.id)" disabled>1</button>
                              </div>
                              <div class="innercircle" id="blue302">
                                  <button class="blue" id="302" onclick="move(302)" disabled>2</button>
                              </div>
                          </div>    
                          <div>
                              <div class="innercircle" id="blue303">
                                  <button class="blue" id="303" onclick="move(303)" disabled>3</button>
                              </div>
                              <div class="innercircle" id="blue304">
                                  <button class="blue" id="304" onclick="move(304)" disabled>4</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="control-dice">
              <div class="diceImage" id="goti">Dice Will Show Up Here</div>
              <input type="button" value="Start Game" onclick="generaterandom()" id="roll">
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

    
    @push('js')
      <script src="{{asset('js/ludo.js')}}?v=1993.1.8"></script>
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
