<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | HealthRide</title>

    @vite('resources/css/app.css')
</head>

<body class="h-screen w-screen bg-gradient-to-br from-[#071434] via-[#0b1b3a] to-[#071732] flex items-center justify-center">

    <div class="grid grid-cols-1 md:grid-cols-2 w-full h-full">

        <!-- LEFT BRAND PANEL -->
        <div class="hidden md:flex bg-[#071434] items-center justify-center relative overflow-hidden">

            <!-- Teal Glow -->
            <div class="absolute w-[520px] h-[520px] bg-[#19957b]/25 rounded-full blur-3xl"></div>

            <!-- Logo + Brand -->
            <div class="flex flex-col items-center text-center relative z-10 transition-transform duration-500 hover:scale-105">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="HealthRide Logo"
                    class="h-28 mb-6 drop-shadow-[0_12px_25px_rgba(25,149,123,0.6)]">

                <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                    HealthRide
                </h1>

                <p class="mt-2 text-[#9fe3d6] tracking-wide text-sm uppercase">
                    Medical Transport LLC
                </p>
            </div>
        </div>

        <!-- RIGHT LOGIN PANEL -->
        <div class="flex items-center justify-center px-6 relative">
            <div
                class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8
                       transform transition-all duration-500
                       hover:-translate-y-2
                       hover:shadow-[0_25px_45px_rgba(0,0,0,0.35)]">

                <!-- Heading -->
                <h2 class="text-3xl font-bold text-[#071434] mb-6 flex items-center gap-3">
                    <span class="border-l-4 border-[#19957b] pl-3"></span>
                    <span>Administrator Login</span>
                </h2>

                <!-- Success -->
                @if(session('success'))
                <div class="bg-emerald-100 text-emerald-700 p-3 rounded mb-4 text-center text-sm font-medium shadow-inner">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Error -->
                @if($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center text-sm font-medium shadow-inner">
                    {{ $errors->first() }}
                </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-600 mb-1 font-medium">
                            Email Address
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="admin@healthride.com"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2
                                   focus:outline-none
                                   focus:border-[#19957b]
                                   focus:ring-2 focus:ring-[#19957b]/50
                                   shadow-sm">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-gray-600 mb-1 font-medium">
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2
                                   focus:outline-none
                                   focus:border-[#19957b]
                                   focus:ring-2 focus:ring-[#19957b]/50
                                   shadow-sm">
                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full bg-[#19957b] text-white py-3 rounded-lg font-semibold
                               shadow-lg transition-all duration-300
                               hover:-translate-y-1
                               hover:bg-[#007748]
                               hover:shadow-[0_12px_25px_rgba(25,149,123,0.6)]">
                        Login
                    </button>
                </form>

                <!-- Footer -->
                <p class="text-center text-xs text-gray-400 mt-6">
                    © {{ date('Y') }} HealthRide Medical Transport LLC
                </p>
            </div>
        </div>

    </div>

</body>
</html>