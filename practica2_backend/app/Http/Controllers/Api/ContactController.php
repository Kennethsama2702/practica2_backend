<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'data' => $contacts
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($request->all());

        // Aquí puedes agregar el envío de email
        // Mail::to('admin@portfolio.com')->send(new ContactMail($contact));

        return response()->json([
            'message' => 'Mensaje enviado exitosamente',
            'data' => $contact
        ], 201);
    }

    public function show(Contact $contact)
    {
        return response()->json([
            'data' => $contact
        ]);
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update([
            'read' => true,
            'read_at' => now(),
        ]);

        return response()->json([
            'message' => 'Mensaje marcado como leído',
            'data' => $contact
        ]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json([
            'message' => 'Mensaje eliminado exitosamente'
        ]);
    }
}