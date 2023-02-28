<div class="pb-16">
    <div class="bg-white dark:bg-gray-800 shadow relative z-10">
        <div class="px-4 py-2 max-w-7xl m-auto">
            <h2 class="font-semibold text-xl text-gray-600 uppercase dark:text-gray-200 leading-tight">
                {{ __('Perfil') }}
            </h2>
        </div>
    </div>

    <div class="relative z-0">
        <div class="h-40 sm:h-56 md:h-72 w-full">
            @if ($user->portada_path)
                <img src="{{ asset($user->portada_path) }}" alt="portada" class="w-full h-full object-cover">
            @else
                <img src="{{ asset('assets/img/portada.png') }}" alt="portada" class="w-full h-full object-cover">
            @endif
        </div>

        <div class="max-w-7xl m-auto animate__animated animate__fadeIn">
            <div class="relative z-10 -mt-20 sm:-mt-24 md:-mt-28 lg:-mt-32 xl:-mt-32">
                <div class="py-8 px-4 mx-auto max-w-4xl lg:py-12">
                    <div class="flex justify-center items-center">
                        @if ($user->photo_path)
                            <img class="w-20 h-20 md:w-32 md:h-32 rounded-full ring-4 ring-gray-100 dark:ring-gray-500" src="{{ asset($user->photo_path) }}" alt="photo">
                        @else
                            <div class="relative inline-flex items-center justify-center w-20 h-20 md:w-32 md:h-32 overflow-hidden bg-yellow-900 rounded-full dark:bg-yellow-400">
                                <span class="font-semibold text-gray-100 dark:text-gray-900 text-4xl sm:text-4xl md:text-6xl">
                                    {{ $user->name[0] }}{{ $user->last_name[0] }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="mt-4 text-center">
                        <h2 class="text-4xl md:text-5xl py-1 font-semibold text-gray-700 dark:text-gray-200">
                            {{ $user->name }} {{ $user->last_name }}
                        </h2>
                        <p class="text-gray-500 p-1 text-sm dark:text-gray-500">
                            {{ $user->email }}
                        </p>
                        <div class="mt-4">
                            <a @if (auth()->user()->role === 'admin') href="{{ route('admin.perfil.edit', $user->id) }}" @else href="{{ route('client.perfil.edit', $user->id) }}" @endif class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center mr-2 dark:bg-yellow-400 dark:hover:bg-yellow-600 dark:focus:ring-yellow-400">
                                {{ __('Editar perfil') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
