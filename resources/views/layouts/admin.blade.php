<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HealthRide Admin')</title>

    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- DataTables & SweetAlert -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icon-img.png') }}">
</head>

<body x-data="{ sidebarOpen: true }" class="flex min-h-screen bg-[#f6f8fb] text-[#071434]">

    {{-- Sidebar --}}
    <aside
        :class="sidebarOpen ? 'w-64' : 'w-20'"
        class="bg-white flex-shrink-0 flex flex-col justify-between min-h-screen transition-all duration-300 shadow-sm border-r border-gray-200">

        <!-- Top Section -->
        <div>
            <!-- Logo + Toggle -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <!-- Full Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="h-10 w-auto" x-show="sidebarOpen" x-transition>

                <!-- Small Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="h-10 w-auto mx-auto" x-show="!sidebarOpen" x-transition>

                <!-- Toggle Button -->
                <button class="text-gray-500 hover:text-emerald-600" @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 transform transition-transform duration-300"
                        :class="sidebarOpen ? 'rotate-0' : 'rotate-180'"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="p-4 text-sm">
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="no-underline flex items-center px-3 py-2 rounded-lg transition
                           {{ request()->routeIs('admin.dashboard')
                                ? 'bg-emerald-50 text-emerald-700 font-semibold'
                                : 'text-[#071434] hover:bg-emerald-50 hover:text-emerald-700' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                            </svg>

                            <span x-show="sidebarOpen" x-transition class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <!-- Homepage Banner -->
                    <li>
                        <a href="{{ route('admin.banners.index') }}"
                            class="no-underline flex items-center px-3 py-2 rounded-lg transition
                           {{ request()->routeIs('admin.banners.*')
                                ? 'bg-emerald-50 text-emerald-700 font-semibold'
                                : 'text-[#071434] hover:bg-emerald-50 hover:text-emerald-700' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>

                            <span x-show="sidebarOpen" x-transition class="ml-3">Homepage Banner</span>
                        </a>
                    </li>

                    <!-- Services -->
                    <li>
                        <a href="{{ route('admin.services.index') }}"
                            class="no-underline flex items-center px-3 py-2 rounded-lg transition
                           {{ request()->routeIs('admin.services.*')
                                ? 'bg-emerald-50 text-emerald-700 font-semibold'
                                : 'text-[#071434] hover:bg-emerald-50 hover:text-emerald-700' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>

                            <span x-show="sidebarOpen" x-transition class="ml-3">Services</span>
                        </a>
                    </li>

                    <!-- Contact Us -->
                    <li>
                        <a href="{{ route('admin.contact-us.index') }}"
                            class="no-underline flex items-center px-3 py-2 rounded-lg transition
                           {{ request()->routeIs('admin.contact-us.*')
                                ? 'bg-emerald-50 text-emerald-700 font-semibold'
                                : 'text-[#071434] hover:bg-emerald-50 hover:text-emerald-700' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>

                            <span x-show="sidebarOpen" x-transition class="ml-3">Contact Us</span>
                        </a>
                    </li>

                    <!-- Newsletters -->
                    <li>
                        <a href="{{ route('admin.newsletters.index') }}"
                            class="no-underline flex items-center px-3 py-2 rounded-lg transition
                           {{ request()->routeIs('admin.newsletters.*')
                                ? 'bg-emerald-50 text-emerald-700 font-semibold'
                                : 'text-[#071434] hover:bg-emerald-50 hover:text-emerald-700' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>

                            <span x-show="sidebarOpen" x-transition class="ml-3">Newsletters</span>
                        </a>
                    </li>

                    <!-- Reviews -->
                    <li>
                        <a href="{{ route('admin.reviews.index') }}"
                            class="no-underline flex items-center px-3 py-2 rounded-lg transition
                           {{ request()->routeIs('admin.reviews.*')
                                ? 'bg-emerald-50 text-emerald-700 font-semibold'
                                : 'text-[#071434] hover:bg-emerald-50 hover:text-emerald-700' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>

                            <span x-show="sidebarOpen" x-transition class="ml-3">Reviews</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('admin.logout') }}" class="p-4 border-t border-gray-200">
            @csrf
            <button type="submit"
                class="no-underline flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg font-semibold
                       text-[#071434] hover:bg-emerald-50 hover:text-emerald-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
                <span x-show="sidebarOpen" x-transition>Logout</span>
            </button>
        </form>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
            <h1 class="text-lg font-extrabold text-[#071434]">
                @yield('title')
            </h1>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 bg-[#f6f8fb] text-[#071434]">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>

<style>
    /* ====== DataTables: match light admin UI ====== */
    table.dataTable {
        border-collapse: separate !important;
        border-spacing: 0 !important;
        width: 100% !important;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    table.dataTable thead th {
        border-bottom: 1px solid #e5e7eb !important;
        font-size: 12px;
        font-weight: 800;
        padding: 12px 14px !important;
        color: #071434;
        background: #f9fafb;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    table.dataTable tbody td {
        border-bottom: 1px solid #eef2f7 !important;
        font-size: 13px;
        padding: 12px 14px !important;
        color: #111827;
        background: #fff;
        vertical-align: middle;
    }

    table.dataTable tbody tr:hover td {
        background: #f9fafb;
    }

    /* remove old dark borders */
    table.dataTable td,
    table.dataTable thead th,
    table.dataTable tfoot th,
    table.dataTable tfoot td {
        border-left: none !important;
        border-right: none !important;
    }

    /* DataTables controls */
    .dataTables_wrapper .dataTables_filter input,
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 8px 10px;
        outline: none;
    }

    .dataTables_wrapper .dataTables_filter input:focus,
    .dataTables_wrapper .dataTables_length select:focus {
        border-color: rgba(16, 185, 129, .6);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, .15);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 10px !important;
        border: 1px solid #e5e7eb !important;
        background: #fff !important;
        color: #111827 !important;
        padding: 6px 10px !important;
        margin: 0 2px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: rgba(16, 185, 129, .12) !important;
        border-color: rgba(16, 185, 129, .35) !important;
        color: #047857 !important;
        font-weight: 700 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f9fafb !important;
        border-color: #d1d5db !important;
    }
</style>