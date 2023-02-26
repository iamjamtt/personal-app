<div class="flex flex-col items-center justify-center min-h-screen py-12 bg-gray-100 dark:bg-gray-900 sm:px-6 lg:px-8">
    <div class="w-full max-w-md px-6 py-4 mx-auto grid gap-8 animate__animated animate__fadeIn">
        <span class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-yellow-500 text-center dark:text-yellow-300">
            personalApp
        </span>
        @if (auth()->check())
            <div class="text-center flex flex-col gap-4 items-center justify-center">
                <div class="w-full text-center px-4">
                    <a @if(auth()->user()->role === 'admin') href="{{ route('admin.home') }}" @else href="{{ route('client.home') }}" @endif class="flex justify-center w-full items-center px-4 py-2 text-sm font-medium text-white bg-rose-500 border border-transparent rounded-md shadow-sm hover:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                        Home
                    </a>
                </div>
                <div class="w-full text-center px-4">
                    <a href="{{ route('logout') }}" class="flex justify-center w-full items-center px-4 py-2 text-sm font-medium text-white bg-teal-500 border border-transparent rounded-md shadow-sm hover:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Logout
                    </a>
                </div>
            </div>
        @else
            <div class="text-center flex flex-col gap-4 items-center justify-center">
                <div class="w-full text-center px-4">
                    <a href="{{ route('login') }}" class="flex justify-center w-full items-center px-4 py-2 text-sm font-medium text-white bg-rose-500 border border-transparent rounded-md shadow-sm hover:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                        Login
                    </a>
                </div>
                <div class="w-full text-center px-4">
                    <a href="{{ route('register') }}" class="flex justify-center w-full items-center px-4 py-2 text-sm font-medium text-white bg-teal-500 border border-transparent rounded-md shadow-sm hover:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Register
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
