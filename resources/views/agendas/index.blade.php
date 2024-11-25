@extends('layouts.app')

@section('content')
<div class="agenda-container">
    <!-- Header Section -->
    <div class="agenda-header">
        <div class="container">
            <div class="text-center animate__animated animate__fadeIn">
                <span class="header-badge">Event Calendar</span>
                <h1 class="display-4 fw-bold mt-3">Agenda Kegiatan</h1>
                <p class="lead text-light">Jadwal dan kegiatan terbaru SMKN 4 Bogor</p>
                <div class="header-line mx-auto"></div>
            </div>
        </div>
    </div>

    <!-- Agenda Grid -->
    <div class="container py-5">
        <div class="row g-4">
            @foreach ($agendas as $agenda)
            <div class="col-lg-4 col-md-6">
                <div class="modern-agenda-card animate__animated animate__fadeInUp">
                    <div class="card-date">
                        <span class="date-day">{{ $agenda->event_date->format('d') }}</span>
                        <span class="date-month">{{ $agenda->event_date->format('M') }}</span>
                    </div>
                    
                    <div class="card-content">
                        <div class="agenda-category">
                            <span class="category-badge">{{ $agenda->category ?? 'Event' }}</span>
                        </div>
                        
                        <h3 class="agenda-title">{{ $agenda->title }}</h3>
                        
                        <div class="agenda-meta">
                            <span class="meta-item">
                                <i class="far fa-clock"></i>
                                {{ $agenda->event_date->format('H:i') }} WIB
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $agenda->location ?? 'SMKN 4 Bogor' }}
                            </span>
                        </div>
                        
                        <p class="agenda-description">
                            {{ Str::limit($agenda->description, 120) }}
                        </p>
                        
                        <div class="card-actions">
                            <a href="{{ route('agenda.show', $agenda->id) }}" class="details-btn">
                                Lihat Detail
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            @if($agenda->registration_link)
                            <a href="{{ $agenda->registration_link }}" class="register-btn">
                                <i class="fas fa-user-plus me-1"></i>
                                Daftar
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.agenda-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
}

.agenda-header {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    padding: 5rem 0 3rem;
    color: white;
    margin-bottom: 3rem;
    position: relative;
}

.header-badge {
    background: rgba(255, 255, 255, 0.1);
    padding: 0.5rem 1.5rem;
    border-radius: 30px;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.header-line {
    width: 80px;
    height: 4px;
    background: rgba(255, 255, 255, 0.2);
    margin-top: 2rem;
    border-radius: 2px;
}

.modern-agenda-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
}

.modern-agenda-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.card-date {
    position: absolute;
    top: 20px;
    right: 20px;
    background: var(--primary-color);
    color: white;
    padding: 10px;
    border-radius: 12px;
    text-align: center;
    min-width: 80px;
}

.date-day {
    display: block;
    font-size: 1.8rem;
    font-weight: 700;
    line-height: 1;
}

.date-month {
    display: block;
    font-size: 1rem;
    text-transform: uppercase;
    margin-top: 4px;
}

.card-content {
    padding: 2rem;
}

.agenda-category {
    margin-bottom: 1rem;
}

.category-badge {
    background: var(--secondary-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 500;
}

.agenda-title {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.agenda-meta {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1rem;
}

.meta-item {
    color: #6c757d;
    font-size: 0.9rem;
}

.meta-item i {
    margin-right: 0.5rem;
}

.agenda-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.card-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(0,0,0,0.05);
}

.details-btn {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
}

.details-btn:hover {
    transform: translateX(5px);
}

.register-btn {
    background: var(--primary-color);
    color: white;
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.register-btn:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .agenda-header {
        padding: 3rem 0;
    }
    
    .card-content {
        padding: 1.5rem;
    }
    
    .agenda-title {
        font-size: 1.2rem;
    }
    
    .card-actions {
        flex-direction: column;
        gap: 1rem;
    }
    
    .register-btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection