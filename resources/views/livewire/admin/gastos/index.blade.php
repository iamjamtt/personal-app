<div class="pb-16">
    <div class="bg-white dark:bg-gray-800 shadow">
        <div class="px-4 py-2 max-w-7xl m-auto">
            <h2 class="font-semibold text-xl text-gray-600 uppercase dark:text-gray-200 leading-tight">
                {{ __('Gastos') }}
            </h2>
        </div>
    </div>
    <div class="relative z-0">
        <div class="h-40 sm:h-56 md:h-72 w-full">
            @if (auth()->user()->portada_path)
                <img src="{{ asset(auth()->user()->portada_path) }}" alt="portada" class="w-full h-full object-cover">
            @else
                <img src="{{ asset('assets/img/portada.png') }}" alt="portada" class="w-full h-full object-cover">
            @endif
        </div>
        <div class="px-6 sm:px-4 py-6 pb-20 sm:py-10 md:py-20 xl:py-28 max-w-7xl m-auto relative z-10 -mt-40 sm:-mt-60 md:-mt-80 lg:-mt-80 xl:-mt-96 animate__animated animate__fadeIn">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="bg-white rounded-xl dark:bg-gray-800 shadow-xl w-full md:w-9/12 lg:w-10/12">
                    <div class="py-4 px-6 mx-auto lg:px-8">
                        <span class="text-gray-700 dark:text-gray-300 text-xl font-bold">
                            {{ __('Registros de gastos') }}
                        </span>
                    </div>
                </div>
                <a @if (auth()->user()->role === 'admin') href="{{ route('admin.gastos.create') }}" @else href="{{ route('client.gastos.create') }}" @endif class="bg-teal-500 hover:bg-teal-700 dark:bg-teal-600 dark:hover:bg-teal-800 text-white font-semibold px-4 py-4 rounded-xl md:w-48 flex items-center justify-center gap-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span class="text-white text-sm md:text-base">
                        {{ __('Nuevo gasto') }}
                    </span>
                </a>
            </div>
            <div class="mt-4">
                <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Buscar</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="search" wire:model="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Buscar...">
                                </div>
                            </form>
                        </div>
                        <div class="w-full md:w-auto flex flex-col sm:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <div class="flex items-center gap-3 w-full md:w-auto flex-col sm:flex-row">
                                <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-yellow-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                    <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                    Actions
                                </button>
                                <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                                    </div>
                                </div>
                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-yellow-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                    </svg>
                                    Filter
                                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                </button>
                                <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose brand</h6>
                                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                        <li class="flex items-center">
                                            <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple (56)</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-4 gap-4">
                    <div class="px-4 py-2 bg-white border border-gray-200 rounded-xl shadow dark:bg-gray-800 dark:border-gray-700 @if($gastos->count() == 0) hidden @endif">
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($gastos as $item)
                                    <li class="py-3 sm:py-2">
                                        <div class="flex items-center flex-col sm:flex-row gap-4 hover:bg-teal-50 dark:hover:bg-gray-700 p-2 rounded-xl transition ease-in">
                                            <div class="flex-1 min-w-0 justify-center sm:justify-start">
                                                <a @if(auth()->user()->role === 'admin') href="{{ route('admin.gastos.show', $item->id) }}" @else href="{{ route('client.gastos.show', $item->id) }}" @endif class="text-xl text-center sm:text-left font-bold text-gray-700 truncate dark:text-white hover:underline">
                                                    {{ $item->title }}
                                                </a>
                                                <p class="text-sm text-center sm:text-left text-gray-500 truncate dark:text-gray-400">
                                                    {{ $item->description }}
                                                </p>
                                            </div>
                                            <div class="inline-flex items-center text-base text-gray-900 dark:text-white gap-5">
                                                <div class="inline-flex items-center text-base text-gray-900 dark:text-white gap-3 md:gap-5">
                                                    <div class="flex items-center flex-col">
                                                        <div class="font-semibold text-gray-500 dark:text-gray-400">
                                                            Ingreso
                                                        </div>
                                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                                            S/. {{ $item->monto_ingreso }}
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center flex-col">
                                                        <div class="font-semibold text-gray-500 dark:text-gray-400">
                                                            Gasto
                                                        </div>
                                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                                            S/. {{ $item->monto_gasto }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a @if(auth()->user()->role === 'admin') href="{{ route('admin.gastos.edit', $item->id) }}" @else href="{{ route('client.gastos.edit', $item->id) }}" @endif>
                                                        <button class="inline-flex items-center gap-2 px-2 md:px-4 py-2 border border-slate-300 dark:border-slate-600 dark:hover:border-slate-200 text-sm font-medium rounded-md shadow-sm text-gray-700 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-gray-200 bg-white dark:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200">
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                                                            </svg>
                                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hidden md:block hover:text-yellow-500">
                                                                Editar
                                                            </span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="px-4 py-2 bg-white border border-gray-200 rounded-xl shadow dark:bg-gray-800 dark:border-gray-700 @if($gastos->count() > 0) hidden @endif">
                        @if($gastos->count() == 0 && $search != null)
                            <div class="py-3 sm:py-2">
                                <div class="flex items-center gap-4 p-2 justify-center">
                                    <p class="text-sm text-center text-gray-400 dark:text-gray-400">
                                        No hay registros con el nombre: <strong>{{ $search }}</strong>
                                    </p>
                                </div>
                            </div>
                        @elseif($gastos->count() == 0 && $search == null)
                            <div class="py-3 sm:py-2">
                                <div class="flex items-center gap-4 p-2 justify-center">
                                    <p class="text-sm text-center text-gray-400 dark:text-gray-400">
                                        No hay registros
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
