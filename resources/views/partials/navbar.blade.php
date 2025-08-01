<nav class="bg-[#333] border-gray-800 text-white sticky w-full z-20 top-0 start-0 border-b">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="img/logoppm.png" class="h-10" alt="Logo PPMRJ Bandung" />
            <span class="self-center text-2xl md:text-3xl font-bold whitespace-nowrap dark:text-white">PPMRJ
                Bandung</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-[#333] md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-[#333] text-lg">

                <li>
                    <a href="/"
                        class="{{ Route::currentRouteName() === 'home' ? 'text-lime-500' : 'block py-2 px-3 rounded hover:bg-lime-500 md:hover:bg-transparent md:border-0 md:hover:text-lime-500 md:p-0' }}">Home</a>
                </li>
                <li>
                    <a href="/about"
                        class="{{ Route::currentRouteName() === 'about' ? 'text-lime-500' : 'block py-2 px-3 rounded hover:bg-lime-500 md:hover:bg-transparent md:border-0 md:hover:text-lime-500 md:p-0' }}">About</a>
                </li>
                <li>
                    <a href="/structure"
                        class="{{ Route::currentRouteName() === 'structure' ? 'text-lime-500' : 'block py-2 px-3 rounded hover:bg-lime-500 md:hover:bg-transparent md:border-0 md:hover:text-lime-500 md:p-0' }}">Structure</a>
                </li>
                <li>
                    <a href="{{ route('activities.index') }}"
                        class="{{ Route::currentRouteName() === 'activities.index' ? 'text-lime-500' : 'block py-2 px-3 rounded hover:bg-lime-500 md:hover:bg-transparent md:border-0 md:hover:text-lime-500 md:p-0' }}">Activity</a>
                </li>
                <li>
                    <a href="{{ route('registration') }}"
                        class="{{ Route::currentRouteName() === 'registration' ? 'text-lime-500' : 'block py-2 px-3 rounded hover:bg-lime-500 md:hover:bg-transparent md:border-0 md:hover:text-lime-500 md:p-0' }}">Registration</a>
                </li>
                <li>
                    <a href="{{ route('announcement.index') }}"
                        class="{{ Route::currentRouteName() === 'announcement.index' ? 'text-lime-500' : 'block py-2 px-3 rounded hover:bg-lime-500 md:hover:bg-transparent md:border-0 md:hover:text-lime-500 md:p-0' }}">Announcement</a>
                </li>
            </ul>
        </div>
    </div>
</nav>