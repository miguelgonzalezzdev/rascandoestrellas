<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Añadir Elemento') }}
            </h2>
        </div>
    </x-slot>

    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="m-5 font-bold text-center text-3xl mb-2 text-gray-800 dark:text-gray-200">Añadir Elemento</h1>
                <form method="POST" action="{{ route('gestion.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row">
                        <div class="flex flex-col w-full">
                            <div class="m-5">
                                <x-input-label for="tipo" :value="__('Tipo')" />
                                <select id="tipo" name="tipo" class=" w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-yellow-600 dark:focus:border-yellow-600 focus:ring-yellow-600 dark:focus:ring-yellow-600 rounded-md shadow-sm">
                                    <option value="0" {{ old('tipo') == '0' ? 'selected' : '' }}>Selecciona un tipo</option>
                                    <option value="1" {{ old('tipo') == '1' ? 'selected' : '' }}>Serie</option>
                                    <option value="2" {{ old('tipo') == '2' ? 'selected' : '' }}>Película</option>
                                    <option value="3" {{ old('tipo') == '3' ? 'selected' : '' }}>Videojuego</option>
                                </select>
                                <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                            </div>
                            <div class="m-5">
                                <x-input-label for="autor" :value="__('Autor')" />
                                <x-text-input id="autor" class="block mt-1 w-full" type="text" name="autor" :value="old('autor')"/>
                                <x-input-error :messages="$errors->get('autor')" class="mt-2" />
                            </div>
                            <div class="m-5">
                                <x-input-label for="fecha" :value="__('Año Estreno')" />
                                <x-text-input id="fecha" class="block mt-1 w-full" type="text" name="fecha" :value="old('fecha')"/>
                                <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
                            </div>
                            <div class="m-5">
                                <x-input-label for="generodos" :value="__('Genero 2')" />
                                <x-text-input id="generodos" class="block mt-1 w-full" type="text" name="generodos" :value="old('generodos')"/>
                                <x-input-error :messages="$errors->get('generodos')" class="mt-2" />
                            </div>
                            <div class="m-5">
                                <x-input-label for="generocuatro" :value="__('Genero 4')" />
                                <x-text-input id="generocuatro" class="block mt-1 w-full" type="text" name="generocuatro" :value="old('generocuatro')"/>
                                <x-input-error :messages="$errors->get('generocuatro')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <div class="m-5">
                                <x-input-label for="titulo" :value="__('Título')" />
                                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"/>
                                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                            </div>
                            <div class="m-5">
                                <x-input-label for="productor" :value="__('Productor')" />
                                <x-text-input id="productor" class="block mt-1 w-full" type="text" name="productor" :value="old('productor')"/>
                                <x-input-error :messages="$errors->get('productor')" class="mt-2" />
                            </div>
                            <div class="m-5">
                                <x-input-label for="generouno" :value="__('Genero 1')" />
                                <x-text-input id="generouno" class="block mt-1 w-full" type="text" name="generouno" :value="old('generouno')"/>
                                <x-input-error :messages="$errors->get('generouno')" class="mt-2" />
                            </div>
                            <div class="m-5">
                                <x-input-label for="generotres" :value="__('Genero 3')" />
                                <x-text-input id="generotres" class="block mt-1 w-full" type="text" name="generotres" :value="old('generotres')"/>
                                <x-input-error :messages="$errors->get('generotres')" class="mt-2" />
                            </div>
                            <div class="m-5">
                                <x-input-label for="generocinco" :value="__('Genero 5')" />
                                <x-text-input id="generocinco" class="block mt-1 w-full" type="text" name="generocinco" :value="old('generocinco')"/>
                                <x-input-error :messages="$errors->get('generocinco')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="m-5">
                        <x-input-label for="descripcion" :value="__('Descripción')" />
                        <textarea id="descripcion" name="descripcion" placeholder="..." class="w-full pb-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-yellow-600 dark:focus:border-yellow-600 focus:ring-yellow-600 dark:focus:ring-yellow-600 rounded-md shadow-sm">{{ old('descripcion')}}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />
                    </div>
                    <div class="m-5">
                        <x-input-label for="imagen" :value="__('Imagen')" />
                        <x-imagen-input id="imagen" name="imagen" type="file" class="mt-1 block w-1/2" accept=".jpg, .jpeg, .png"/>
                        <x-input-error class="mt-2" :messages="$errors->get('imagen')" />
                    </div>
                    <div class="flex items-center justify-center m-5 mt-10">
                        <x-primary-button class="justify-center p-3">
                            {{ __('Añadir') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-app-layout>