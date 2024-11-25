<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:10'
        ]);

        // Simpan ke database
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        // Kirim notifikasi ke email admin (opsional)
        /*
        Mail::send('emails.contact', [
            'contact' => $contact
        ], function($message) use ($contact) {
            $message->to('admin@example.com')
                    ->subject('Pesan Kontak Baru dari ' . $contact->name);
        });
        */

        return redirect()->route('contact.index')
                        ->with('success', 'Pesan Anda telah berhasil dikirim!');
    }
} 