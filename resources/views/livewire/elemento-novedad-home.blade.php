@foreach ($elemento as $elemento_item)
    <div class="w-full flex flex-row gap-2 text-gray-700 dark:text-gray-300">
        <picture class="w-20">
            <img src="{{ $elemento_item['imagen'] ? asset('elementos').'/'.$elemento_item['imagen'] : asset('img/elemento.jpg') }}" alt="Imagen de $elemento_item['titulo']" class="rounded">
        </picture>
        <div class="flex flex-col md:flex-row md:items-center gap-1 sm:gap-3 md:gap-6">
            <a href="{{route('elementoprincipal.index', $elemento_item['id'])}}">
                <p class="text-md md:text-lg">{{$elemento_item['titulo']}}</p>
            </a>
            <p class="text-sm md:text-md lg:text-lg">
                @if (isset($elemento_item['genero1']) && $elemento_item['genero1'] !== null)
                    {{$elemento_item['genero1']}}
                @endif
                @if (isset($elemento_item['genero2']) && $elemento_item['genero2']!== null)
                    ● {{$elemento_item['genero2']}}
                @endif
                @if (isset($elemento_item['genero3']) && $elemento_item['genero3'] !== null)
                    ● {{$elemento_item['genero3']}}
                @endif
            </p>
        </div>
    </div>
@endforeach