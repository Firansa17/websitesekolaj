<?php

namespace App\Http\Controllers;
use App\Models\Photo;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->take(10)->get(); // Ambil 3 foto terbaru
        $welcomeMessage = "Temukan Berbagai Momen Berharga Bersama Kami.";
        return view('home.index', compact('photos', 'welcomeMessage'));
    }
    
}
