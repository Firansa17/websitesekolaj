<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <style>
         h1 {
        color: var(--primary-color);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        color: var(--text-light);
    }

    .btn-outline-success:hover {
        background-color: var(--accent-color);
        color: var(--text-light);
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: var(--text-light);
    }

    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: var(--text-light);
    }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #001F3F;
        }

        .navbar .navbar-brand {
            font-weight: 600;
            color: #fff;
            font-size: 1.5rem;
        }

        .navbar .navbar-brand:hover {
            color: #FFD700;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-nav .nav-link:hover {
            color: #FFD700;
        }

        .sidebar {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 15px;
            border-right: 1px solid #ddd;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link.active {
            background-color: #001F3F;
            color: #fff;
        }

        .sidebar .nav-link:hover {
            background-color: #001F3F;
            color: #fff;
        }

        .sidebar .nav-link i {
            margin-right: 8px;
        }

        .content-header {
            padding: 20px 0;
        }

        .card-header {
            background-color: #001F3F;
            color: #fff;
        }

        .btn-logout {
            color: #fff !important;
        }

        .btn-logout:hover {
            color: #FFD700 !important;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .navbar-toggler {
                display: block;
            }

            .content-header {
                margin-top: 70px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <i class="fas fa-tachometer-alt me-2"></i> Admin Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link btn-logout">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                                href="{{ route('dashboard.index') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                <i class="fas fa-users"></i> Manage Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.galleries.index') ? 'active' : '' }}" href="{{ route('dashboard.galleries.index') }}">
                                <i class="fas fa-images"></i> Manage Galleries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.infos.index') ? 'active' : '' }}" href="{{ route('dashboard.infos.index') }}">
                                <i class="fas fa-info-circle"></i> Manage Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.agendas.index') ? 'active' : '' }}" href="{{ route('dashboard.agendas.index') }}">
                                <i class="fas fa-calendar-alt"></i> Manage Agendas
                            </a>
                        </li>
                        <!-- Tambahkan menu Contact di sidebar -->
                        <div class="sb-sidenav-menu-heading">Komunikasi</div>
                        <a class="nav-link {{ Request::routeIs('dashboard.contacts.*') ? 'active' : '' }}" 
                           href="{{ route('dashboard.contacts.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Pesan Masuk
                            @php
                                $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
                            @endphp
                            @if($unreadCount > 0)
                                <span class="badge bg-danger ms-2">{{ $unreadCount }}</span>
                            @endif
                        </a>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="content-header">
                    <h4>@yield('page-title')</h4>
                </div>
                <div class="content-body">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
