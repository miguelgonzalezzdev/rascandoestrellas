@foreach ($elemento as $elemento_item)

<div class="w-full p-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="w-full flex flex-col md:flex-row">
        <div class="w-full text-gray-700 dark:text-gray-300 flex flex-row md:flex-col md:gap-5 ">
            <div class="w-2/5 md:w-full">
                <a href="{{route('elementoprincipal.index', $elemento_item['id'])}}">
                    <picture>
                        <img src="{{ $elemento_item['imagen'] ? asset('elementos').'/'.$elemento_item['imagen'] : asset('img/elemento.jpg') }}" alt="Imagen de $elemento_item['titulo']" class="rounded w-full">
                    </picture>
                </a>
            </div>
            <div class="flex flex-col w-3/5 md:w-full">
                <div class="pt-3 md:pt-0 ml-2 md:ml-0">
                    <a class="m-0 p-0" href="{{route('elementoprincipal.index', $elemento_item['id'])}}">
                        <h1 class="text-xl md:text-2xl font-bold md:flex md:justify-center md:items-center mr-2">{{$elemento_item['titulo']}}</h1>
                    </a>
                </div>
                <div class="pt-3 md:pb-3 ml-2 md:ml-0 flex items-center md:justify-center gap-0">
                    @if ( $totalPuntuacion>0 )
                        @for($i = 0; $i <  $totalPuntuacion; $i++)
                            <p class="text-2xl sm:text-3xl text-yellow-500">★</p>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach