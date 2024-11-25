@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-5 fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h1>

    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-4x text-primary mb-3"></i>
                    <h5 class="card-title fw-bold">Manage Users</h5>
                    <p class="text-muted">Total Pengguna: <strong>{{ $userCount }}</strong></p>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100 rounded-pill">
                        <i class="fas fa-arrow-right me-1"></i> Lihat Pengguna
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-images fa-4x text-success mb-3"></i>
                    <h5 class="card-title fw-bold">Manage Galleries</h5>
                    <p class="text-muted">Total Galeri: <strong>{{ $galleryCount }}</strong></p>
                    <a href="{{ route('dashboard.galleries.index') }}" class="btn btn-outline-success w-100 rounded-pill">
                        <i class="fas fa-arrow-right me-1"></i> Lihat Galeri
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-info-circle fa-4x text-secondary mb-3"></i>
                    <h5 class="card-title fw-bold">Manage Info</h5>
                    <p class="text-muted">Total Informasi: <strong>{{ $infoCount }}</strong></p>
                    <a href="{{ route('dashboard.infos.index') }}" class="btn btn-outline-secondary w-100 rounded-pill">
                        <i class="fas fa-arrow-right me-1"></i> Lihat Informasi
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-alt fa-4x text-warning mb-3"></i>
                    <h5 class="card-title fw-bold">Manage Agendas</h5>
                    <p class="text-muted">Total Agenda: <strong>{{ $agendaCount }}</strong></p>
                    <a href="{{ route('dashboard.agendas.index') }}" class="btn btn-outline-warning w-100 rounded-pill">
                        <i class="fas fa-arrow-right me-1"></i> Lihat Agenda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2 class="mb-4"><i class="fas fa-chart-bar me-2"></i>Statistik Pengguna</h2>
        <canvas id="userStatsChart"></canvas>
    </div>

    <div class="mt-5">
        <h2 class="mb-4"><i class="fas fa-history me-2"></i>Recent Login Activity</h2>
        <ul class="list-group">
            @forelse ($recentLogins as $login)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $login->user->name }} logged in</span>
                    <span class="text-muted">{{ $login->created_at->diffForHumans() }}</span>
                </li>
            @empty
                <li class="list-group-item text-center text-muted">No recent login activity found.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('userStatsChart').getContext('2d');

        const chartData = {
            labels: ['Users', 'Galleries', 'Info', 'Agendas'],
            datasets: [{
                label: 'Total Count',
                data: [{{ $userCount ?? 0 }}, {{ $galleryCount ?? 0 }}, {{ $infoCount ?? 0 }}, {{ $agendaCount ?? 0 }}],
                backgroundColor: ['#007bff', '#28a745', '#6c757d', '#ffc107'],
                borderColor: ['#0056b3', '#1c7430', '#5a6268', '#e0a800'],
                borderWidth: 1
            }]
        };

        const chartOptions = {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        };

        new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: chartOptions
        });
    });
</script>
