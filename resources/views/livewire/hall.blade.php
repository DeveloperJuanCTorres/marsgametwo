<div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="mb-2">Sala de juegos</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N° Sala
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Juego
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gamers
                            </th>
                        
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->games as $game)
                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                                      {{$game->id}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                                      {{$game->type}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                                      Tú VS  {{$game->adversary}}
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        @switch($game->type)
                                            @case('Serpientes')
                                                <a href="{{route('game.serpientesyescaleras',['game'=>$game])}}" class="btn btn-green"> Ir al Juego</a>
                                                @break
                                            @case('Ajedrez')
                                                 <a href="{{route('game.ajedrez',['game'=>$game])}}" class="btn btn-green"> Ir al Juego</a>
                                                @break
                                            @case('Damas')
                                                <a href="{{route('game.damas',['game'=>$game])}}" class="btn btn-green"> Ir al Juego</a>
                                                @break
                                            @case('Ludo')
                                                <a href="{{route('game.ludo',['game'=>$game])}}" class="btn btn-green"> Ir al Juego</a>
                                                @break
                                            @case('Bingo')
                                                <a href="{{route('bingo.ludo',['game'=>$game])}}" class="btn btn-green"> Ir al Juego</a>
                                                @break
                                        @endswitch
                                       
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        <hr>

        <h2 class="my-2">Crear Salas</h2>
      
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                        
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                                    {{$user->name}}
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        <button wire:click="create_hall({{$user->id}},'Serpientes')" class="btn btn-blue" >Serpientes y escaleras</button>
                                        <button wire:click="create_hall({{$user->id}},'Ajedrez')" class="btn btn-blue" >Ajedrez</button>
                                        <button wire:click="create_hall({{$user->id}},'Damas')" class="btn btn-blue" >Damas</button>
                                        <button wire:click="create_hall({{$user->id}},'Ludo')" class="btn btn-blue" >Ludo</button>
                                        <button wire:click="create_hall({{$user->id}},'Bingo')" class="btn btn-blue" >Bingo</button>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        
        


    </div>
</div>
