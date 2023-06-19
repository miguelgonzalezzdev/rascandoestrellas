@foreach ($post as $post_item)

    <div class="w-full p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="w-full flex flex-col md:flex-row">
            <div class="w-full m-2 text-gray-700 dark:text-gray-300 flex flex-col gap-5">
                <a href="{{route('elementoprincipal.index', $elemento_id)}}">
                    <h1 class="text-2xl font-bold flex justify-center items-center">{{$elemento_titulo}}</h1>
                </a>
                <p class="text-md">{{$post_item['comentario']}}</p>
                <div class="flex flex-row">
                    @for($i = 0; $i < $post_item['puntuacion']; $i++)
                        <p class="text-3xl text-yellow-500">★</p>
                    @endfor
                </div>
                <div class="flex flex-row 2 justify-between items-center mt-2">
                    @auth
                        <livewire:like-post :post="$post_item" />
                    @endauth
                    <p class="text-end content-end text-sm text-gray-500">{{$post_item->created_at->diffForHumans()}}</p>
                </div>
                @auth
                    @if($user_id === auth()->user()->id)
                        <div class="ml-auto mt-5">
                            <form action="{{ route('post.destroy',$post_item['id'])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <x-primary-button class="flex gap-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ __('Eliminar') }}
                                </x-primary-button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>

@endforeach

