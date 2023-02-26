<div>
    <h1 class="text-xl mb-3 font-bold leading-tight tracking-tight text-gray-700 md:text-2xl dark:text-white">
        Register
    </h1>
    <form class="space-y-2 md:space-y-4" autocomplete="off" wire:submit.prevent="register">
        <div>
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Nombre</label>
            <input type="text" wire:model="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500"
                placeholder="Jamt Americo">
            @error('nombre')
                <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="apellido_paterno" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Apellido Paterno</label>
            <input type="text" wire:model="apellido_paterno" id="apellido_paterno"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500"
                placeholder="Mendoza">
            @error('apellido_paterno')
                <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="apellido_materno" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Apellido Materno</label>
            <input type="text" wire:model="apellido_materno" id="apellido_materno"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500"
                placeholder="Flores">
            @error('apellido_materno')
                <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Email</label>
            <input type="email" wire:model="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500"
                placeholder="example@example.com">
            @error('email')
                <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Password</label>
            <input type="password" wire:model="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500">
                @error('password')
                    <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
                @enderror
        </div>
        <div>
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Password Confirmation</label>
            <input type="password" wire:model="password_confirmation" id="password_confirmation" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500">
                @error('password_confirmation')
                    <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
                @enderror
        </div>
        @if (session()->has('error'))
            <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        <button type="submit"
            class="w-full uppercase font-semibold text-xs text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
            Register
        </button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="font-medium text-yellow-600 hover:underline dark:text-yellow-500">
                Inicia sesión aquí
            </a>
        </p>
    </form>
</div>
