@extends('layouts.admin')

@section('title', 'Homepage Banners')

@section('content')
<h1 class="text-2xl font-semibold mb-6 text-[#0A8B6C]">
    HOMEPAGE BANNERS
</h1>

<!-- Top Bar -->
<div class="flex justify-end items-center mb-6">
    <a href="{{ route('admin.banners.create') }}"
        style="background: linear-gradient(to right, #0A8B6C, #0fbf9b); color:#fff;"
        class="inline-flex items-center gap-2 text-sm px-6 py-3 rounded-xl shadow-md
              hover:shadow-lg hover:scale-105 transition-transform duration-200 no-underline">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Banner
    </a>
</div>


<!-- Table -->
<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="table-fixed w-full border-collapse" id="banners-table">
        <thead>
            <tr class="bg-[#071434] text-white text-sm font-semibold">
                <th class="px-6 py-4 text-center w-16 rounded-tl-xl">ID</th>
                <th class="px-6 py-4 text-center">Title</th>
                <th class="px-6 py-4 text-center">Sub Title</th>
                <th class="px-6 py-4 text-center">Image</th>
                <th class="px-10 py-3 rounded-tr-lg text-center w-1/4">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($banners as $banner)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-6 py-4 text-center font-medium text-gray-700">
                    {{ $banner->id }}
                </td>

                <td class="px-6 py-4 text-gray-800 font-medium text-center">
                    {{ $banner->title }}
                </td>
                <td class="px-6 py-4 text-gray-800 font-medium text-center">
                    {{ $banner->sub_title }}
                </td>

                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center">
                        <img src="{{ asset($banner->image_path) }}"
                            class="w-32 h-16 object-cover rounded-lg shadow border"
                            alt="Banner Image">
                    </div>
                </td>

                <td class="px-6 py-4">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.banners.edit', $banner->id) }}"
                            class="px-6 py-1 rounded text-white bg-green-500 hover:bg-green transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.banners.destroy', $banner->id) }}"
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
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#banners-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search banners...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ banners",
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
                    targets: [0, 2, 3],
                    className: "text-center"
                }
            ]
        });

        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');

            Swal.fire({
                title: "Delete Banner?",
                text: "This banner will be permanently removed.",
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