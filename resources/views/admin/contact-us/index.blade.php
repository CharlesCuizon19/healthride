@extends('layouts.admin')

@section('title', 'Contact Us')

@section('content')
<h1 class="text-2xl font-semibold mb-6 text-[#0A8B6C]">
    CONTACT US
</h1>

<!-- Contact Messages Table -->
<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="table-fixed w-full border-collapse" id="contact-table">
        <thead>
            <tr class="bg-[#071434] text-white text-sm font-semibold">
                <th class="px-6 py-4 text-center w-16 rounded-tl-xl">ID</th>
                <th class="px-6 py-4 text-center w-56">Full Name</th>
                <th class="px-6 py-4 text-center w-56">Email</th>
                <th class="px-6 py-4 text-center w-44">Phone</th>
                <th class="px-6 py-4 text-center w-56">Subject</th>
                <th class="px-6 py-4 text-center">Message</th>
                <th class="px-6 py-4 text-center w-56">Date</th>
                <th class="px-6 py-4 text-center w-40 rounded-tr-xl">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($contacts as $c)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-6 py-4 text-center font-medium text-gray-700">
                    {{ $c->id }}
                </td>

                <td class="px-6 py-4 text-center text-gray-800 font-medium">
                    {{ $c->full_name }}
                </td>

                <td class="px-6 py-4 text-center text-gray-800">
                    {{ $c->email }}
                </td>

                <td class="px-6 py-4 text-center text-gray-800">
                    {{ $c->phone_number ?? '-' }}
                </td>

                <td class="px-6 py-4 text-center text-gray-800">
                    {{ $c->subject }}
                </td>

                <!-- Message (truncate for table) -->
                <td class="px-6 py-4">
                    <div class="max-w-[560px] mx-auto text-left text-gray-700 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($c->message, 120) }}
                    </div>
                </td>

                <td class="px-6 py-4 text-center text-gray-700">
                    {{ optional($c->created_at)->format('M d, Y h:i A') }}
                </td>

                <td class="px-6 py-4">
                    <div class="flex justify-center">
                        <button
                            type="button"
                            class="delete-btn px-6 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition"
                            data-id="{{ $c->id }}">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-10 text-gray-500 italic">
                    No messages found.
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

        const table = $('#contact-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search contact...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ messages",
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

        // AJAX Delete (matches your controller returning JSON)
        $(document).on('click', '.delete-btn', async function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            const btn = $(this);

            const result = await Swal.fire({
                title: 'Delete Message?',
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it'
            });

            if (!result.isConfirmed) return;

            try {
                const url = "{{ route('admin.contact-us.destroy', ':id') }}".replace(':id', id);

                const response = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json().catch(() => ({}));

                if (response.ok && data.success) {
                    table.row(btn.closest('tr')).remove().draw();

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: data.message || 'Contact message deleted successfully.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire('Error', data.message || 'Failed to delete message.', 'error');
                }
            } catch (err) {
                console.error(err);
                Swal.fire('Error', 'Something went wrong.', 'error');
            }
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