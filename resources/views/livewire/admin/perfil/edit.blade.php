<div class="pb-16">
    <div class="bg-white dark:bg-gray-800 shadow relative z-10">
        <div class="px-4 py-2 max-w-7xl m-auto">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-600 uppercase dark:text-gray-200 leading-tight">
                    {{ __('Editar Información Personal') }}
                </h2>
            </div>
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

        <div class="px-6 sm:px-4 py-6 pb-20 sm:py-10 md:py-20 xl:py-28 max-w-7xl m-auto relative z-10 -mt-20 sm:-mt-32 md:-mt-40 lg:-mt-52 xl:-mt-60 animate__animated animate__fadeIn">
            <section class="bg-white rounded-xl dark:bg-gray-800">
                <div class="py-8 px-4 mx-auto max-w-4xl lg:py-12">
                    <form autocomplete="off">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <div class="flex justify-center items-center relative z-10 -mt-16 md:-mt-28">
                                    @if ($photo)
                                        <img class="w-20 h-20 md:w-32 md:h-32 rounded-full ring-4 ring-gray-100 dark:ring-gray-500" src="{{ $photo->temporaryUrl() }}" alt="photo">
                                    @else
                                        @if ($user->photo_path)
                                            <img class="w-20 h-20 md:w-32 md:h-32 rounded-full ring-4 ring-gray-100 dark:ring-gray-500" src="{{ asset($user->photo_path) }}" alt="photo">
                                        @else
                                            <div class="relative inline-flex items-center justify-center w-20 h-20 md:w-32 md:h-32 overflow-hidden bg-yellow-900 rounded-full dark:bg-yellow-400">
                                                <span class="font-semibold text-gray-100 dark:text-gray-900 text-4xl sm:text-4xl md:text-6xl">
                                                    {{ $user->name[0] }}{{ $user->last_name[0] }}
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nombres <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Jamt Americo">
                                @error('nombre')
                                    <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="apellido_paterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Apellido Paterno <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="apellido_paterno" id="apellido_paterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Mendoza">
                                @error('apellido_paterno')
                                    <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="apellido_materno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Apellido Materno <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="apellido_materno" id="apellido_materno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Flores">
                                @error('apellido_materno')
                                    <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" wire:model="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="example@example.com">
                                @error('email')
                                    <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" wire:model="password" id="password" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="********">
                                @error('password')
                                    <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                <input type="file" wire:model="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" accept="image/jpeg,image/png,image/jpg">
                                <div>
                                    <span class="text-gray-500 text-xs dark:text-gray-400">
                                        PNG, JPG, JPEG máximo de 2MB
                                    </span>
                                </div>
                                @error('photo')
                                    <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="portada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potada</label>
                                <input type="file" wire:model="portada" id="portada" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" accept="image/jpeg,image/png,image/jpg">
                                <div>
                                    <span class="text-gray-500 text-xs dark:text-gray-400">
                                        PNG, JPG, JPEG máximo de 2MB
                                    </span>
                                </div>
                                @error('portada')
                                    <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($portada)
                                <div class="sm:col-span-2 animate__animated animate__fadeIn">
                                    <div class="h-52 md:h-44 rounded-lg overflow-hidden">
                                        <img src="{{ $portada->temporaryUrl() }}" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mt-4 sm:mt-8 flex justify-start items-center gap-2">
                            <button type="button" wire:click="update_perfil" wire:loading.class="bg-gray-500 dark:bg-gray-gray-600 focus:ring-gray-200 dark:focus:ring-gray-900" class="inline-flex w-32 justify-center items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg focus:ring-4 focus:ring-yellow-200 dark:focus:ring-yellow-900 hover:bg-yellow-800">
                                <svg wire:loading.remove wire:target="update_perfil" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <div wire:loading wire:target="update_perfil" class="animate-pulse">
                                    <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                    </svg>
                                </div>
                                <span>Guardar</span>
                            </button>
                            <a @if (auth()->user()->role === 'admin') href="{{ route('admin.perfil') }}" @else href="{{ route('client.perfil') }}" @endif class="inline-flex w-32 justify-center items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-500 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Regresar</span>
                            </a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
