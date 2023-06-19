@foreach ($post as $post_item)

    <div class="w-full p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="w-full flex flex-col md:flex-row">
            <div class="w-full m-2 text-gray-700 dark:text-gray-300 flex flex-col gap-3">
                <a href="{{route('dashboard', $user_name)}}">
                    <h1 class="text-lg font-bold">{{$user_name}}</h1>
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
            </div>
        </div>
    </div>

@endforeach