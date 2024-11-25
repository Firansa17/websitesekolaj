@extends('layouts.app')

@section('content')
<div class="agenda-detail-container">
    <!-- Header Section -->
    <div class="agenda-header">
        <div class="container">
            <div class="header-content animate__animated animate__fadeIn">
                <span class="category-badge">{{ $agenda->category ?? 'Event' }}</span>
                <h1 class="agenda-title">{{ $agenda->title }}</h1>
                <div class="event-meta">
                    <div class="meta-item">
                        <i class="far fa-calendar-alt"></i>
                        <span>{{ $agenda->event_date->format('d M Y') }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="far fa-clock"></i>
                        <span>{{ $agenda->event_date->format('H:i') }} WIB</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $agenda->location ?? 'SMKN 4 Bogor' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="content-card animate__animated animate__fadeInUp">
                    <div class="card-section">
                        <h3><i class="fas fa-info-circle"></i> Deskripsi Kegiatan</h3>
                        <p class="description">{{ $agenda->description }}</p>
                    </div>

                    @if($agenda->additional_info)
                    <div class="card-section">
                        <h3><i class="fas fa-list-ul"></i> Informasi Tambahan</h3>
                        <div class="additional-info">
                            {!! $agenda->additional_info !!}
                        </div>
                    </div>
                    @endif

                    @if($agenda->registration_link)
                    <div class="card-section text-center">
                        <div class="registration-box">
                            <h3><i class="fas fa-user-plus"></i> Pendaftaran</h3>
                            <p>Daftar sekarang untuk mengikuti kegiatan ini</p>
                            <a href="{{ $agenda->registration_link }}" class="register-btn" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                    @endif

                    <div class="navigation-section">
                        <a href="{{ route('agenda.index') }}" class="back-btn">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali ke Daftar Agenda
                        </a>
                        
                        @if($agenda->attachment)
                        <a href="{{ $agenda->attachment_url }}" class="download-btn" download>
                            <i class="fas fa-download me-2"></i>
                            Download Lampiran
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.agenda-detail-container {
    background: #f8f9fa;
    min-height: 100vh;
}

.agenda-header {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    padding: 4rem 0;
    color: white;
}

.header-content {
    text-align: center;
}

.category-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.5rem 1.5rem;
    border-radius: 30px;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 1.5rem;
    display: inline-block;
}

.agenda-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 2rem;
}

.event-meta {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1.1rem;
}

.content-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.card-section {
    padding: 2rem 0;
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.card-section:last-child {
    border-bottom: none;
}

.card-section h3 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    font-size: 1.4rem;
    font-weight: 600;
}

.card-section h3 i {
    margin-right: 0.5rem;
}

.description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
}

.registration-box {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 2rem;
    border-radius: 15px;
    margin: 1rem 0;
}

.register-btn {
    display: inline-block;
    background: var(--primary-color);
    color: white;
    padding: 1rem 2rem;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    margin-top: 1rem;
    transition: all 0.3s ease;
}

.register-btn:hover {
    background: var(--secondary-color);
    transform: translateY(-3px);
}

.navigation-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2rem;
}

.back-btn, .download-btn {
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.back-btn {
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
}

.back-btn:hover {
    background: var(--primary-color);
    color: white;
}

.download-btn {
    background: var(--secondary-color);
    color: white;
}

.download-btn:hover {
    background: var(--primary-color);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .agenda-header {
        padding: 3rem 0;
    }
    
    .agenda-title {
        font-size: 2rem;
    }
    
    .event-meta {
        gap: 1rem;
    }
    
    .navigation-section {
        flex-direction: column;
        gap: 1rem;
    }
    
    .back-btn, .download-btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection