<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Info;
use App\Models\Agenda;
use App\Models\LoginActivity;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::where('role', 'user')->count();
        $galleryCount = Gallery::count();
        $infoCount = Info::count();
        $agendaCount = Agenda::count();
    
        $recentLogins = LoginActivity::latest()->take(5)->get();
    
        return view('admin.dashboard', compact(
            'userCount', 'galleryCount', 'infoCount', 'agendaCount', 'recentLogins'
        ));
    }
    
}

