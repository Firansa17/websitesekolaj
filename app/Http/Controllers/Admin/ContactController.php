<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('dashboard.contacts.index')
                        ->with('success', 'Pesan berhasil dihapus!');
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['status' => 'read']);
        return redirect()->back()->with('success', 'Status pesan diubah menjadi telah dibaca');
    }
} 