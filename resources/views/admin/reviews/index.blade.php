@extends('layouts.admin')

@section('title', 'Reviews')

@section('content')
<h1 class="text-2xl font-semibold mb-6 text-[#0A8B6C]">
    REVIEWS
</h1>

<!-- Table -->
<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="table-fixed w-full border-collapse" id="reviews-table">
        <thead>
            <tr class="bg-[#071434] text-white text-sm font-semibold">
                <th class="px-6 py-4 text-center w-16 rounded-tl-xl">ID</th>
                <th class="px-6 py-4 text-center">Full Name</th>
                <th class="px-6 py-4 text-center">Role</th>
                <th class="px-6 py-4 text-center">Review</th>
                <th class="px-6 py-4 text-center">Image</th>
                <th class="px-6 py-4 text-center rounded-tr-xl w-56">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($reviews as $review)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-6 py-4 text-center font-medium text-gray-700">
                    {{ $review->id }}
                </td>

                <td class="px-6 py-4 text-center text-gray-800 font-medium">
                    {{ $review->full_name }}
                </td>

                <td class="px-6 py-4 text-center text-gray-800 font-medium">
                    {{ $review->role }}
                </td>

                <td class="px-6 py-4 text-gray-700 text-sm max-w-xs truncate">
                    {{ $review->review }}
                </td>

                <td class="px-6 py-4 text-center">
                    @if($review->image_path)
                    <img src="{{ asset($review->image_path) }}" alt="Review Image"
                        class="w-20 h-20 object-cover rounded-xl border shadow-sm mx-auto">
                    @else
                    <span class="text-gray-400 italic text-sm">No image</span>
                    @endif
                </td>

                <td class="px-6 py-4">
                    <div class="flex justify-center items-center gap-2">
                        <!-- <a href="{{ route('admin.reviews.edit', $review->id) }}"
                            class="px-4 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                            Edit
                        </a> -->

                        <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                            method="POST" class="delete-form inline">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="delete-btn px-4 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-10 text-gray-500 italic">
                    No reviews found.
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

        // ✅ DataTable
        $('#reviews-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search reviews...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ reviews",
                paginate: {
                    previous: "Previous",
                    next: "Next"
                }
            },
            columnDefs: [{
                targets: "_all",
                className: "align-middle"
            }]
        });

        // ✅ SweetAlert Delete (form submit)
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();

            const form = $(this).closest('form');

            Swal.fire({
                title: "Delete Review?",
                text: "This will be permanently removed.",
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