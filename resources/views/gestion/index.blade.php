<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Gestión') }}
            </h2>
        </div>
    </x-slot>

    <section class="flex flex-row">
        <a href="{{ route('gestion.create') }}">
            <button class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-gray-600 rounded mt-10 ml-10">
                + Añadir elemento
             </button>
        </a>
    </section>

    <section class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-10">
        <table class="table-auto w-full text-gray-800 dark:text-gray-200 border-collapse text-sm">
            <thead>
              <tr>
                <th class="text-left px-4 py-3 text-lg">ID</th>
                <th class="text-left px-4 py-3 text-lg">TIPO</th>
                <th class="text-left px-4 py-3 text-lg">TÍTULO</th>
                <th class="text-left px-4 py-3 text-lg">AUTOR</th>
                <th class="text-left px-4 py-3 text-lg">PRODUCTOR</th>
                <th class="text-left px-4 py-3 text-lg">GÉNEROS</th>
                <th class="text-left px-4 py-3 text-lg">AÑO</th>
                <th class="text-left px-4 py-3 text-lg">DESCRIPCIÓN</th>
                <th class="text-left px-4 py-3 text-lg">IMAGEN</th>
                <th class="text-left px-4 py-3 text-lg">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
                <tr class="m-0 p-0">
                    <td colspan="10" class="m-0 p-0"><hr class="w-full h-1 mx-auto bg-gray-100 border-0 rounded dark:bg-gray-700"></td>
                </tr>
                @foreach ($elementos as $elemento) 
                    <tr class="hover:bg-gray-600">
                        <td class="px-4 py-3">{{$elemento->id}}</td>
                        <td class="px-4 py-3">
                            @switch($elemento->tipo_elemento)
                                @case(1)
                                    Serie
                                    @break
                                @case(2)
                                    Película
                                    @break
                                @case(3)
                                    Videojuego
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td class="px-4 py-3">{{$elemento->titulo}}</td>
                        <td class="px-4 py-3">{{$elemento->autor}}</td>
                        <td class="px-8 py-3">{{$elemento->productor}}</td>
                        <td class="px-8 py-3">
                            {{$elemento->genero1}}
                            {{$elemento->genero2}}
                            {{$elemento->genero3}}
                            {{$elemento->genero4}}
                            {{$elemento->genero5}}
                        </td>
                        <td class="px-8 py-3">{{$elemento->fecha_lanzamiento}}</td>
                        <td class="px-8 py-3">{{$elemento->descripcion}}</td>
                        <td class="px-5 py-3">
                            <img src="{{ $elemento->imagen ? asset('elementos').'/'.$elemento->imagen : asset('img/elemento.jpg') }}" alt="Imagen de {{$elemento->titulo}}" class="rounded">
                        </td>
                        <td class="px-8 py-3 flex flex-row justify-center items-center flex-wrap gap-2">
                            <a href="{{route('elementoprincipal.index', $elemento->id)}}">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                                    Visualizar
                                </button>
                            </a>
                            <a href="{{route('gestion.edit', $elemento->id)}}">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 border border-yellow-700 rounded">
                                    Editar
                                </button>
                            </a>
                            <form action="{{ route('gestion.destroy',$elemento->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="m-0 p-0">
                    <td colspan="10" class="m-0 p-0"><hr class="w-full h-1 mx-auto bg-gray-100 border-0 rounded dark:bg-gray-700"></td>
                </tr>
            </tbody>
        </table>
        <div class="text-lg flex justify-center m-5">
            {{ $elementos->links() }}
        </div>
    </section>

</x-app-layout>