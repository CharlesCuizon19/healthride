<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    /**
     * Display all contact messages.
     */
    public function index()
    {
        $contacts = ContactUs::orderBy('created_at', 'desc')->get();
        return view('admin.contact-us.index', compact('contacts'));
    }

    /**
     * Store a new contact message (public form).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'phone_number'  => 'nullable|string|max:20',
            'email'         => 'required|email|max:255',
            'subject'       => 'required|string|max:255',
            'message'       => 'required|string|max:1000',
        ]);

        ContactUs::create($validated);

        return redirect()
            ->back()
            ->with('contact_success', 'Thank you! Your message has been sent successfully.');
    }



    /**
     * Delete a contact message.
     */
    public function destroy(Request $request, ContactUs $contact_u)
    {
        // Log before deletion
        logger()->info('Deleting contact message', [
            'id' => $contact_u->id,
            'full_name' => $contact_u->full_name,
            'email' => $contact_u->email,
        ]);

        $contact_u->delete();

        // Log after deletion
        logger()->info('Contact message deleted successfully', [
            'id' => $contact_u->id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Contact message deleted successfully'
        ]);
    }
}
