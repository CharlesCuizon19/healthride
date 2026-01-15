@extends('layouts.admin')

@section('title', 'Newsletter')

@section('content')
<h1 class="text-2xl font-semibold mb-6 text-[#0A8B6C]">
    NEWSLETTER
</h1>

<!-- Table -->
<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="table-fixed w-full border-collapse" id="newsletter-table">
        <thead>
            <tr class="bg-[#071434] text-white text-sm font-semibold">
                <th class="px-6 py-4 text-center w-16 rounded-tl-xl">ID</th>
                <th class="px-6 py-4 text-center">Email</th>
                <th class="px-6 py-4 text-center rounded-tr-xl w-56">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($newsletters as $subscriber)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-6 py-4 text-center font-medium text-gray-700">
                    {{ $subscriber->id }}
                </td>

                <td class="px-6 py-4 text-center text-gray-800 font-medium">
                    {{ $subscriber->email }}
                </td>

                <td class="px-6 py-4">
                    <div class="flex justify-center items-center gap-2">
                        <form action="{{ route('admin.newsletters.destroy', $subscriber->id) }}"
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
                <td colspan="3" class="text-center py-10 text-gray-500 italic">
                    No subscribers found.
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
        $('#newsletter-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search email...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ subscribers",
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
                title: "Delete Subscriber?",
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