@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<h1 class="text-2xl font-semibold mb-6 text-[#0A8B6C]">
    SERVICES
</h1>

<!-- Top Bar -->
<div class="flex justify-end items-center mb-6">
    <a href="{{ route('admin.services.create') }}"
        style="background: linear-gradient(to right, #0A8B6C, #0fbf9b); color:#fff;"
        class="inline-flex items-center gap-2 text-sm px-6 py-3 rounded-xl shadow-md
              hover:shadow-lg hover:scale-105 transition-transform duration-200 no-underline">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Service
    </a>
</div>

<!-- Table -->
<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="table-fixed w-full border-collapse" id="services-table">
        <thead>
            <tr class="bg-[#071434] text-white text-sm font-semibold">
                <th class="px-6 py-4 text-center w-16 rounded-tl-xl">ID</th>
                <th class="px-6 py-4 text-center">Title</th>
                <th class="px-6 py-4 text-center">Description</th>
                <th class="px-6 py-4 text-center">Benefits</th>
                <th class="px-6 py-4 text-center">Thumbnail</th>
                <th class="px-6 py-4 text-center">Service Images</th>
                <th class="px-10 py-3 rounded-tr-lg text-center w-1/4">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($services as $service)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-6 py-4 text-center font-medium text-gray-700">
                    {{ $service->id }}
                </td>

                <td class="px-6 py-4 text-gray-800 font-medium text-center">
                    {{ $service->title }}
                </td>

                <td class="px-6 py-4 text-gray-700 text-center">
                    {{ \Illuminate\Support\Str::limit(strip_tags($service->description), 80) }}
                </td>

                <td class="px-6 py-4 text-gray-700 text-center">
                    {{ \Illuminate\Support\Str::limit(strip_tags($service->benefits), 80) }}
                </td>

                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center">
                        @if($service->thumbnail)
                        <img src="{{ asset($service->thumbnail) }}"
                            class="w-32 h-16 object-cover rounded-lg shadow border"
                            alt="Thumbnail">
                        @else
                        <span class="text-gray-400">—</span>
                        @endif
                    </div>
                </td>

                {{-- SERVICE IMAGES --}}
                <td class="px-6 py-4 text-center">
                    @if($service->images->count())
                    <div class="flex justify-center items-center gap-2">
                        {{-- First image --}}
                        <img src="{{ asset($service->images->first()->image) }}"
                            class="w-16 h-16 object-cover rounded-lg border shadow">

                        {{-- + more --}}
                        @if($service->images->count() > 1)
                        <div class="w-16 h-16 flex items-center justify-center
                            rounded-lg bg-gray-100 text-gray-600 text-sm font-semibold border">
                            +{{ $service->images->count() - 1 }}
                        </div>
                        @endif
                    </div>
                    @else
                    <span class="text-gray-400">—</span>
                    @endif
                </td>


                <td class="px-6 py-4">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.services.edit', $service->id) }}"
                            class="px-6 py-1 rounded text-white bg-green-500 hover:bg-green-600 transition no-underline">
                            Edit
                        </a>

                        <form action="{{ route('admin.services.destroy', $service->id) }}"
                            method="POST" class="delete-form inline">
                            @csrf
                            @method('DELETE')

                            <button type="button"
                                class="delete-btn px-6 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-10 text-gray-500 italic">
                    No services found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#services-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search services...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ services",
                paginate: {
                    previous: "Previous",
                    next: "Next"
                }
            },
            columnDefs: [{
                    targets: "_all",
                    className: "align-middle"
                },
                {
                    targets: [0, 1, 2, 3, 4, 5],
                    className: "text-center"
                }
            ]
        });

        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');

            Swal.fire({
                title: "Delete Service?",
                text: "This service will be permanently removed.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc2626",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Yes, delete it"
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endpush