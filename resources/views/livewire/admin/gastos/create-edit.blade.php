<div>
    <div class="bg-white dark:bg-gray-800 shadow">
        <div class="px-4 py-2 max-w-7xl m-auto">
            <h2 class="font-semibold text-xl text-gray-600 uppercase dark:text-gray-200 leading-tight">
                {{ $titulo_modulo }}
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
            <div class="flex flex-col gap-4">
                <div class="bg-white rounded-xl dark:bg-gray-800 shadow-xl w-full">
                    <div class="py-4 px-6 mx-auto lg:px-8">
                        <form autocomplete="off" class="py-4">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Titulo <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" wire:model="titulo" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Ingrese el titulo">
                                    @error('titulo')
                                        <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="monto_ingreso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Monto de ingreso <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" wire:model="monto_ingreso" id="monto_ingreso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Ingrese el monto inicial">
                                    @error('monto_ingreso')
                                        <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Descripcion <span class="text-red-500">*</span>
                                    </label>
                                    <textarea wire:model="descripcion" id="descripcion" cols="3" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Ingrese la descripcion del gasto"></textarea>
                                    @error('descripcion')
                                        <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($modo === 'edit')
                                <div class="w-full">
                                    <label for="monto_gastado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Monto gastado
                                    </label>
                                    <input type="text" wire:model="monto_gastado" id="monto_gastado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" readonly>
                                    @error('monto_gastado')
                                        <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="monto_restante" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Monto de restante
                                    </label>
                                    <input type="number" wire:model="monto_restante" id="monto_restante" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" readonly>
                                    @error('monto_restante')
                                        <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                @endif
                            </div>
                            <div class="mt-4 sm:mt-8 flex justify-start items-center gap-2">
                                <button type="button" wire:click="{{ $save_gasto }}" wire:loading.class="bg-gray-500 dark:bg-gray-gray-600 focus:ring-gray-200 dark:focus:ring-gray-900" class="inline-flex w-32 justify-center items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg focus:ring-4 focus:ring-yellow-200 dark:focus:ring-yellow-900 hover:bg-yellow-800">
                                    <svg wire:loading.remove wire:target="{{ $save_gasto }}" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <div wire:loading wire:target="{{ $save_gasto }}" class="animate-pulse">
                                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                    <span>
                                        {{ $button }}
                                    </span>
                                </button>
                                <a @if (auth()->user()->role === 'admin') href="{{ route('admin.gastos') }}" @else href="{{ route('client.gastos') }}" @endif class="inline-flex w-32 justify-center items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-500 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800">
                                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Regresar</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($gasto_bolean === true)
                <div class="bg-white rounded-xl dark:bg-gray-800 shadow-xl w-full animate__animated animate__fadeIn">
                    <div class="py-4 px-6 mx-auto lg:px-8">
                        <h2 class="text-xl mt-4 font-bold text-gray-700 dark:text-white">
                            Registro de detalle de gastos
                        </h2>
                        <form autocomplete="off" class="py-4">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="descripcion_detalle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Descripcion <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" wire:model="descripcion_detalle" id="descripcion_detalle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Ingrese la descripcion del detalle">
                                    @error('descripcion_detalle')
                                        <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="monto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Monto <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" wire:model="monto" id="monto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Ingrese el monto">
                                    @error('monto')
                                        <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-8 flex justify-start items-center gap-2">
                                <button type="button" wire:click="add_detalle_gasto" wire:loading.class="bg-gray-500 dark:bg-gray-gray-600 focus:ring-gray-200 dark:focus:ring-gray-900" class="inline-flex w-32 justify-center items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg focus:ring-4 focus:ring-yellow-200 dark:focus:ring-yellow-900 hover:bg-yellow-800">
                                    <svg wire:loading.remove wire:target="add_detalle_gasto" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <div wire:loading wire:target="add_detalle_gasto" class="animate-pulse">
                                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                    <span>Guardar</span>
                                </button>
                                <button type="button" class="inline-flex w-32 justify-center items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-500 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800">
                                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Cancelar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-xl rounded-xl animate__animated animate__fadeIn">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Monto
                                </th>
                                {{-- <th scope="col" class="px-6 py-3">
                                    Status
                                </th> --}}
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($detalle_gasto)
                                @foreach ($detalle_gasto as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->description }}
                                    </th>
                                    <td class="px-6 py-4">
                                        S/. {{ $item->monto }}
                                    </td>
                                    {{-- <td class="px-6 py-4">
                                        @if ($item->status == 1)
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm dark:bg-red-700 dark:text-red-100">
                                                Pendiente
                                            </span>
                                        @else
                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm dark:bg-green-700 dark:text-green-100">
                                                Pagado
                                            </span>
                                        @endif
                                    </td> --}}
                                    <td class="px-6 py-4">
                                        <div class="flex text-sm justify-end gap-2">
                                            <button wire:click="editar_detalle_gasto({{ $item->id }})" class="text-teal-600 dark:text-teal-400 hover:text-teal-700 dark:hover:text-blue-200 hover:underline">Edit</button>
                                            <button wire:click="eliminar_detalle_gasto({{ $item->id }})" class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-200 hover:underline">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @if ($detalle_gasto->count() == 0)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4" colspan="3" align="center">
                                        Sin detalle de gasto
                                    </td>
                                </tr>
                                @else
                                <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                        Total
                                    </th>
                                    <td class="px-6 py-4" colspan="2">
                                        <span class="font-semibold">
                                            S/. {{ $detalle_gasto->sum('monto') }}
                                        </span>
                                    </td>
                                </tr>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
