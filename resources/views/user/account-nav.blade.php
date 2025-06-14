<ul class="space-y-2 text-sm font-medium text-gray-700">
    {{-- Dashboard --}}
    <li class="li-user">
        <a href="{{ route('user.index') }}"
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-gray-100 transition {{ request()->routeIs('user.index') ? 'bg-gray-200 font-semibold text-gray-900' : '' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 9.75L12 3l9 6.75v9.75a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 19.5V9.75z" />
            </svg>
            Dashboard
        </a>
    </li>

    {{-- Orders --}}
    <li>
        <a href="{{ route('user.orders') }}"
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-gray-100 transition {{ request()->routeIs('user.orders') ? 'bg-gray-200 font-semibold text-gray-900' : '' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3h18v4H3V3zm0 6h18v12H3V9zm4 4h2v2H7v-2zm4 0h2v2h-2v-2z" />
            </svg>
            Orders
        </a>
    </li>

    {{-- Addresses --}}
    <li>
        <a href="{{ route('user.address') }}"
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-gray-100 transition {{ request()->routeIs('user.address') ? 'bg-gray-200 font-semibold text-gray-900' : '' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.657 16.657L13.414 12l4.243-4.243M6.343 7.757L10.586 12 6.343 16.243" />
            </svg>
            Addresses
        </a>
    </li>

    {{-- Account Details --}}
    <li>
        <a href="{{ route('user.account.details.edit', ['id' => Auth::user()->id]) }}"
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-gray-100 transition {{ request()->routeIs('user.account.details.edit') ? 'bg-gray-200 font-semibold text-gray-900' : '' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5.121 17.804A10.945 10.945 0 0112 15c2.21 0 4.262.643 5.879 1.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
            </svg>
            Account Details
        </a>
    </li>

    {{-- Logout --}}
    <li>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="flex items-center gap-2 px-4 py-2 rounded-md bg-red-50 text-red-600 hover:bg-red-100 transition font-medium">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                </svg>
                Logout
            </a>
        </form>
    </li>
</ul>
