@php
    switch ($elemento->tipo_elemento) {
        case '1':
            $tipo = __('Series');
            break;
        case '2':
            $tipo = __('Películas');
            break;
        case '3':
            $tipo = __('Videojuegos');
            break;
        default:
            $tipo = __('');
            break;
    }
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 justify-between text-gray-800 dark:text-gray-200">
            <div class="flex gap-2">
                @if ($elemento->tipo_elemento == 1)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0118 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0118 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 016 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5" />
                    </svg>
                @elseif ($elemento->tipo_elemento == 2)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z" />
                    </svg> 
                @elseif ($elemento->tipo_elemento == 3)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                    </svg>
                @endif                      
                <h2 class="font-semibold text-xl leading-tight">
                    {{ $tipo }}
                </h2>
            </div>
            <form method="GET" action="{{ route('buscador.index') }}">
                <div class="relative">
                    <div class="flex flex-row gap-2">
                        <div>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="search" id="search" name="search" class="w-full pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Buscar...">
                        </div>
                        <button type="submit" class="text-white right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>

    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="m p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full flex flex-col md:flex-row ">
                    <picture class="xl:w-1/3 lg:w-1/2 md:w-1/2 m-2">
                        <img src="{{ $elemento->imagen ? asset('elementos').'/'.$elemento->imagen : asset('img/elemento.jpg') }}" alt="Imagen de {{$elemento->titulo}}" class="rounded">
                    </picture>
                    <div class="xl:w-2/3 lg:w-1/2 md:w-1/2 m-2 text-gray-700 dark:text-gray-300 flex flex-col">
                        <div class="flex flex-col gap-3">
                            <h1 class="text-3xl font-bold">{{$elemento->titulo}}</h1>
                            <p class="text-lg"><span class="font-bold">Autor:</span> {{$elemento->autor}}</p>
                            <p class="text-lg"><span class="font-bold">Productora:</span> {{$elemento->productor}}</p>
                            <p class="text-lg">
                                <span class="font-bold">Genero:</span> 
                                @if (isset($elemento->genero1) && $elemento->genero1 !== null)
                                    {{$elemento->genero1}}
                                @endif
                                @if (isset($elemento->genero2) && $elemento->genero2 !== null)
                                    ● {{$elemento->genero2}}
                                @endif
                                @if (isset($elemento->genero3) && $elemento->genero3 !== null)
                                    ● {{$elemento->genero3}}
                                @endif
                                @if (isset($elemento->genero4) && $elemento->genero4 !== null)
                                    ● {{$elemento->genero4}}
                                @endif
                                @if (isset($elemento->genero5) && $elemento->genero5 !== null)
                                    ● {{$elemento->genero5}}
                                @endif
                            </p>
                            <p class="text-lg"><span class="font-bold">Estreno:</span> {{$elemento->fecha_lanzamiento}}</p>
                            <div class="text-lg flex items-center justify-items-center gap-2">
                                <p class="font-bold">Valoración:</p>
                                @if (count($posts) > 0)
                                    <div class="text-3xl text-yellow-500 p-0 flex items-center justify-items-center gap-0">
                                        @for ($i = 0; $i < ($totalPuntuacion/count($posts)); $i++)
                                            <p>★</p>
                                        @endfor
                                    </div>
                                @else
                                    <p>Sin calificar</p>
                                @endif
                            </div>
                            <p>{{$elemento->descripcion}}</p>
                            @auth
                                <div class="ml-auto mt-5 mr-3 md:mr-10">
                                    <a href="{{ route('post.create', $elemento->id)}}">
                                        <x-primary-button class="flex gap-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                            {{ __('Reseña') }}
                                        </x-primary-button>
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @if (count($posts) > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6 mt-6">
                    @foreach ($posts as $post)
                        <livewire:resena-elemento-principal :post_id="$post"/>
                    @endforeach
                </div>
            @else
                <div class="flex items-center justify-center text-md mt-8">
                    <p class="text-gray-900 dark:text-gray-100 ">No se ha publicado ninguna reseña</p>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>