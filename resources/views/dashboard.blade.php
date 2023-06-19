<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-2"> 
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-800 dark:text-gray-200">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Perfil') }}
            </h2>
        </div>
    </x-slot>
    
    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center justify-center md:flex-row">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-full md:w-8/12 lg:w-6/12 flex flex-col items-center justify-center md:flex-row">
                    <picture class="w-8/12 lg:w-6/12 px-5">
                        <img src="{{ $user->imagen ? asset('perfiles').'/'.$user->imagen : asset('img/usuario.svg') }}" alt="Imagen de usuario" class="shadow rounded-full border-none">
                    </picture>
                    <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col md:justify-center md:items-start mt-5">
                        <p class="text-gray-900 dark:text-gray-100 text-xl mb-3 font-bold">
                            {{ $user->name }}
                        </p>
                        <p class="text-gray-900 dark:text-gray-100 text-md mb-3 font-bold">
                            {{ count($posts) }} <span class="font-normal"> Reseñas </span>
                        </p>
                        
                    </div>
                </div>
            </div>
            @if (count($posts) > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6 mt-6">
                    @foreach ($posts as $post)
                        <livewire:resena :post_id="$post"/>
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
