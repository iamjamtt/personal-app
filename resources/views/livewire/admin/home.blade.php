<div class="pb-16">
    <div class="bg-white dark:bg-gray-800 shadow">
        <div class="px-4 py-2 max-w-7xl m-auto">
            <h2 class="font-semibold text-xl text-gray-600 uppercase dark:text-gray-200 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>
    </div>

    <div class="px-6 sm:px-4 py-6 sm:py-6 md:py-8 xl:py-12 max-w-7xl m-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8 animate__animated animate__fadeIn">
            <a @if (auth()->user()->role === 'admin') href="{{ route('admin.perfil') }}" @else href="{{ route('client.perfil') }}" @endif class="h-auto first-letter:text-center rounded-xl bg-white dark:bg-gray-800 hover:shadow-xl transition ease-in-out hover:-translate-y-3 transform duration-30">
                <div class="p-5 flex flex-col justify-center content-center text-center h-full">
                    <div class="p-5 flex justify-center items-center">
                        @if (auth()->user()->photo_path)
                            <img class="w-16 h-16 md:w-32 md:h-32 rounded-full ring-4 ring-gray-200 dark:ring-gray-500" src="{{ asset(auth()->user()->photo_path) }}" alt="photo">
                        @else
                            <div class="relative inline-flex items-center justify-center w-32 h-32 overflow-hidden bg-yellow-900 rounded-full dark:bg-yellow-400">
                                <span class="font-semibold text-gray-100 dark:text-gray-900 text-6xl">
                                    {{ auth()->user()->name[0] }}{{ auth()->user()->last_name[0] }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div>
                        <h2 class="text-2xl py-1 font-semibold text-gray-700 dark:text-gray-200">
                            {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                        </h2>
                        <p class="text-gray-500 p-1 text-sm dark:text-gray-500">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                    <div class="py-1 mb-2 text-xl font-extrabold text-yellow-400">
                        personalApp
                    </div>
                </div>
            </a>
            <div class="h-auto rounded-xl bg-white dark:bg-gray-800 hover:shadow-xl transition ease-in-out hover:-translate-y-3 lg:col-span-2">
                <a @if (auth()->user()->role === 'admin') href="{{ route('admin.gastos') }}" @else href="{{ route('client.gastos') }}" @endif >
                    <div class="py-4 px-5 md:10 border-b-2 border-b-gray-200 dark:border-2 dark:border-gray-700 dark:border-b-gray-700 dark:hover:border-t-gray-700 hover:bg-teal-50 rounded-t-xl bg-gray-100 flex justify-start gap-4 items-center dark:bg-gray-700 dark:hover:bg-gray-900">
                        <svg  class="w-12 h-12 p-2 text-white rounded-xl bg-teal-600 dark:bg-teal-200 dark:text-teal-700 shadow-xl"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex flex-col justify-start">
                            <span class="text-2xl md:text-4xl font-extrabold text-teal-600 dark:text-gray-200">
                                Gastos
                            </span>
                            <p class="text-gray-500 dark:text-gray-300 text-sm">
                                {{ __('Total') }}: {{ $gastos->count() }} @if ($gastos->count() === 1) {{ __('registro') }} @else {{ __('registros') }} @endif
                            </p>
                        </div>
                    </div>
                </a>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($gastos as $item)
                        <li class="py-3 sm:py-2 px-4">
                            <a @if(auth()->user()->role === 'admin') href="{{ route('admin.gastos.show', $item->id) }}" @else href="{{ route('client.gastos.show', $item->id) }}" @endif class="flex items-center flex-col sm:flex-row gap-4 hover:bg-teal-50 dark:hover:bg-gray-900 py-2 px-3 rounded-xl transition ease-in">
                                <div class="flex-1 min-w-0 justify-center sm:justify-start">
                                    <div class="flex gap-2 items-center justify-center sm:justify-start">
                                        <svg class="w-4 h-4 text-green-600 dark:text-green-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-gray-600 dark:text-gray-300 text-lg">
                                            {{ $item->title }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-center sm:text-left text-gray-500 truncate dark:text-gray-400">
                                        {{ $item->description }}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base text-gray-900 dark:text-white gap-5">
                                    <span class="text-gray-600 dark:text-gray-300 text-sm">
                                        {{ $item->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        @if($gastos->count() === 0)
                        <li class="py-3 sm:py-2 px-4">
                            <div class="flex justify-center gap-4 py-6 px-3 rounded-xl">
                                <p class="text-sm text-center text-gray-500 dark:text-gray-200">
                                    Sin registros de gastos
                                </p>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            {{-- <div class="rounded-xl bg-white dark:bg-gray-800 hover:shadow-xl transition ease-in-out hover:-translate-y-3 lg:col-span-2">
                <div class="p-5">
                    03
                </div>
            </div>
            <div class="rounded-xl bg-white dark:bg-gray-800 hover:shadow-xl transition ease-in-out hover:-translate-y-3">
                <div class="p-5">
                    04
                </div>
            </div> --}}
            @if (auth()->user()->role === 'admin')
            <a href="{{ route('admin.users') }}" class="rounded-xl bg-white dark:bg-gray-800 hover:shadow-xl transition ease-in-out hover:-translate-y-3 sm:col-span-2 lg:col-span-3">
                <div class="p-5 text-gray-600 dark:text-gray-300 text-center">
                    Users Clients
                </div>
            </a>
            @endif
        </div>
    </div>
</div>
