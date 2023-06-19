@foreach ($elemento as $item)
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="w-full flex flex-col md:flex-row">
            <a class="m-2 md:w-1/3" href="{{route('elementoprincipal.index', $item['id'])}}">
                <picture>
                    <img src="{{ $item['imagen'] ? asset('elementos').'/'.$item['imagen'] : asset('img/elemento.jpg') }}" alt="Imagen de {{$item['titulo']}}" class="rounded">
                </picture>
            </a>
            <div class="m-2 text-gray-700 dark:text-gray-300 flex flex-col md:w-2/3">
                <a href="{{route('elementoprincipal.index', $item['id'])}}">
                    <h1 class="text-3xl font-bold">{{$item['titulo']}}</h1>
                </a>
                <div class="mt-3 flex flex-col md:flex-row md:items-center md:justify-items-center gap-5">
                    <p class="text-lg">{{$item['autor']}}</p>
                    <p class="text-md">
                        @if (isset($item['genero1']))
                            {{ $item['genero1'] }}
                        @endif
                        @if (isset($item['genero2']))
                            {{ "● ".$item['genero2'] }}
                        @endif
                        @if (isset($item['genero3']))
                            {{ "● ".$item['genero3'] }}
                        @endif
                        @if (isset($item['genero4']))
                            {{ "● ".$item['genero4'] }}
                        @endif
                        @if (isset($item['genero5']))
                            {{ "● ".$item['genero5']}}
                        @endif
                    </p>
                </div>
                <div class="mt-5 md:w-5/6">
                    <p>{{$item['descripcion']}}</p>
                </div>
                <div class="mt-5 flex items-center gap-0">
                    @if ( $totalPuntuacion>0 )
                        @for($i = 0; $i <  $totalPuntuacion; $i++)
                            <p class="text-3xl text-yellow-500">★</p>
                        @endfor
                    @else
                        <p class="text-gray-700 dark:text-gray-300 text-sm">Sin calificar</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach