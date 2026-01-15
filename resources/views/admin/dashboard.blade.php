@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh] text-center space-y-6">

    <div class="flex flex-col items-center">

        {{-- HealthRide Logo --}}
        <img src="{{ asset('images/logo.png') }}" alt="HealthRide Logo"
            class="h-28 w-auto mb-4 drop-shadow-[0_0_28px_rgba(10,139,108,0.35)]">

        {{-- Welcome Title --}}
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#071434] tracking-wide">
            Welcome Back, {{ Auth::user()->name ?? 'Administrator' }}!
        </h1>

        {{-- Subtext --}}
        <p class="text-gray-600 text-lg md:text-xl max-w-2xl mt-4">
            You’re now logged in to the
            <span class="text-[#0A8B6C] font-semibold">HealthRide</span>
            Admin Panel.
        </p>

        {{-- Optional quick chips (nice on dashboards) --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-white border border-gray-200 shadow-sm text-sm font-semibold text-[#071434]">
                Secure Admin Access
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-white border border-gray-200 shadow-sm text-sm font-semibold text-[#071434]">
                Manage Content & Reviews
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-white border border-gray-200 shadow-sm text-sm font-semibold text-[#071434]">
                Monitor Updates
            </span>
        </div>

    </div>

</div>
@endsection