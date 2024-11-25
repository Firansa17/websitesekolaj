<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Website resmi SMK Negeri 4 Bogor dengan informasi terkini, galeri, dan agenda sekolah.">

    <title>SMK NEGERI 4 BOGOR</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --primary-color: #1C3D5A;
            --secondary-color: #3A6D8C;
            --accent-color: #6A9AB0;
            --background-color: #f2f5f9;
            --text-light: #FFFFFF;
            --text-dark: #333333;
            --transition: all 0.3s ease;
        }

        body {
            background-color: var(--background-color);
            color: var(--primary-color);
            font-family: 'Poppins', sans-serif;
            transition: var(--transition);
        }

        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .navbar-brand img {
            height: 40px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        .nav-link {
            color: var(--text-light);
            transition: var(--transition);
        }

        .nav-link.active,
        .nav-link:hover {
            color: var(--accent-color) !important;
            transform: scale(1.1);
        }

        .btn-outline-light {
            border-color: var(--accent-color);
            transition: var(--transition);
        }

        .btn-outline-light:hover {
            background-color: var(--accent-color);
            color: var(--primary-color);
        }

        .dark-mode {
            --primary-color: #EAD8B1;
            --background-color: #1C3D5A;
            --text-light: #333333;
            --text-dark: #FFFFFF;
        }

        footer {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.1);
        }

        .social-icons a {
            color: var(--text-light);
            font-size: 1.5rem;
            margin: 0 8px;
            transition: var(--transition);
        }

        .social-icons a:hover {
            color: var(--accent-color);
        }

        /* Sticky Navbar */
        .navbar-scrolled {
            background-color: rgba(28, 61, 90, 0.9);
        }

        @media (max-width: 768px) {
            .navbar-brand span {
                font-size: 1rem;
            }

            .nav-link {
                font-size: 0.9rem;
            }

            footer {
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                @php
                    $setting = \App\Models\Setting::first();
                @endphp
                @if($setting && $setting->logo)
                    <img src="{{ Storage::url('logos/' . $setting->logo) }}" alt="Logo" style="height: 40px;">
                @else
                    <img src="{{ asset('assets/images/logo/logo-smkn4.png') }}" alt="Logo Default" style="height: 40px;">
                @endif

                <span class="ms-2 fw-bold">SMK NEGERI 4 BOGOR</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">
                            <i class="fas fa-images me-1"></i> Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('info.index') ? 'active' : '' }}" href="{{ route('info.index') }}">
                            <i class="fas fa-info-circle me-1"></i> Informasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}" href="{{ route('agenda.index') }}">
                            <i class="fas fa-calendar-alt me-1"></i> Agenda
                        </a>
                    </li>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                                    <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                                </a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                            <i class="fas fa-envelope me-1"></i> Kontak
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                        @csrf
                                        <button class="btn btn-link text-decoration-none w-100 text-start">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-light px-4 py-2" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <button class="btn btn-outline-light ms-2" id="toggleDarkMode">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="container py-5 mt-5">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-auto">
        <div class="container">
            <p>© {{ date('Y') }} SMK NEGERI 4 BOGOR. All rights reserved.</p>
            <div class="social-icons mt-2">
                <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
