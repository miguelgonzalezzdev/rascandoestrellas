<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 justify-between text-gray-800 dark:text-gray-200">
            <div class="flex gap-2">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-800 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>                       
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Buscador') }}
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
            @foreach ($elementos as $elemento)
                <livewire:elemento-seccion :id_elemento='$elemento'/>
            @endforeach
        </div>
    </section>
    <div class="flex justify-center mt-10 mb-5">
        {{ $elementos->links() }}
    </div>
</x-app-layout>