<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-2 text-gray-800 dark:text-gray-200">
            <h2 class="font-semibold text-xl leading-tight">
                Publicar Reseña
            </h2>
        </div>
    </x-slot>

    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="m p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form action="{{ route('post.store', $elemento->id) }}" method="POST">
                    <div class="w-full flex flex-col md:flex-row">
                        <picture class="xl:w-1/3 lg:w-1/2 md:w-1/2 m-2">
                            <img src="{{ $elemento->imagen ? asset('elementos').'/'.$elemento->imagen : asset('img/elemento.jpg') }}" alt="Imagen de {{$elemento->titulo}}" class="rounded">
                        </picture>
                        <div class="xl:w-2/3 lg:w-1/2 md:w-1/2  m-2 text-gray-700 dark:text-gray-300 flex flex-col">
                            <div class="mt-3 flex flex-col gap-3">
                                <h1 class="text-3xl font-bold"></h1>
                                @csrf
                                <div class="mb-8">
                                    <h2 class="font-bold text-center text-3xl mb-2">Publica tu Reseña</h2>
                                </div>
                                <div class="mb-6">
                                    <x-input-label for="comentario" :value="__('Comentario')" />
                                    <textarea id="comentario" name="comentario" placeholder="Describe tu opinión..." class="w-full pb-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-yellow-600 dark:focus:border-yellow-600 focus:ring-yellow-600 dark:focus:ring-yellow-600 rounded-md shadow-sm">{{ old('comentario')}}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('comentario')" />
                                </div>
                                <div class="mb-6">
                                    <div class="mx-0 flex flex-row-reverse justify-center">
                                        <input id="radio1" type="radio" name="puntuacion" value="5" class="estrella w-0 h-0 invisible">
                                        <label for="radio1" name="estrella" class="radio-label text-4xl md:text-5xl cursor-pointer text-gray-600 peer peer-hover:text-yellow-500 hover:text-yellow-500">★</label>
                                        <input id="radio2" type="radio" name="puntuacion" value="4" class="estrella w-0 h-0 invisible">
                                        <label for="radio2" name="estrella" class="radio-label text-4xl md:text-5xl cursor-pointer text-gray-600 peer peer-hover:text-yellow-500 hover:text-yellow-500">★</label>
                                        <input id="radio3" type="radio" name="puntuacion" value="3" class="estrella w-0 h-0 invisible">
                                        <label for="radio3" name="estrella" class="radio-label text-4xl md:text-5xl cursor-pointer text-gray-600 peer peer-hover:text-yellow-500 hover:text-yellow-500">★</label>
                                        <input id="radio4" type="radio" name="puntuacion" value="2" class="estrella w-0 h-0 invisible">
                                        <label for="radio4" name="estrella" class="radio-label text-4xl md:text-5xl cursor-pointer text-gray-600 peer peer-hover:text-yellow-500 hover:text-yellow-500">★</label>
                                        <input id="radio5" type="radio" name="puntuacion" value="1" class="estrella w-0 h-0 invisible">
                                        <label for="radio5" name="estrella" class="radio-label text-4xl md:text-5xl cursor-pointer text-gray-600 peer peer-hover:text-yellow-500 hover:text-yellow-500">★</label>
                                    </div>
                                    <x-input-error :messages="$errors->get('puntuacion')" />
                                </div>
                                <div class="flex justify-center items-center">
                                    <x-primary-button class="flex gap-2 items-center mt-5 w-50">
                                        {{ __('Publicar') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>

    </script>
</x-app-layout>