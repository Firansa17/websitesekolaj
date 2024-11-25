@extends('layouts.app')

@section('content')
<div class="info-container">
    <div class="container py-5">
        <div class="section-header text-center mb-5 animate__animated animate__fadeInDown">
            <span class="badge bg-gradient mb-3">
                <i class="fas fa-newspaper me-2"></i>Latest Updates
            </span>
            <h1 class="display-4 fw-bold">Informasi Terbaru</h1>
            <div class="header-line mx-auto my-3"></div>
            <p class="text-muted lead">Tetap update dengan informasi terkini dari SMKN 4 Bogor</p>
        </div>

        <div class="row g-4">
            @foreach ($infos as $info)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="modern-card h-100 animate__animated animate__fadeInUp">
                    <div class="card-content">
                        @if($info->image)
                        <div class="card-image">
                            <img src="{{ asset('storage/' . $info->image) }}" 
                                 alt="{{ $info->title }}"
                                 class="img-fluid">
                        </div>
                        @endif
                        
                        <div class="category-badge">
                            <span class="badge-text">{{ $info->category }}</span>
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $info->title }}</h5>
                            <p class="card-text">{{ Str::limit($info->content, 100) }}</p>
                            
                            <div class="card-footer">
                                <div class="meta-info">
                                    <span class="date">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ $info->created_at->format('d M Y') }}
                                    </span>
                                </div>
                                <a href="{{ route('infos.show', $info->id) }}" 
                                   class="read-more-btn">
                                    <span>Baca Selengkapnya</span>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>


.section-header .badge {
    padding: 12px 24px;
    font-size: 1rem;
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    border: none;
    margin-bottom: 1.5rem;
}

.header-line {
    width: 80px;
    height: 4px;
    background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
    border-radius: 2px;
}

.modern-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05);
}

.modern-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.category-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 1;
}

.badge-text {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 8px 16px;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 500;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.card-body {
    padding: 2rem;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.card-text {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(0,0,0,0.05);
}

.meta-info {
    font-size: 0.9rem;
    color: #6c757d;
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    padding: 8px 20px;
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.read-more-btn:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    color: white;
}

.read-more-btn i {
    transition: transform 0.3s ease;
}

.read-more-btn:hover i {
    transform: translateX(5px);
}

.card-image {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
    border-radius: 20px 20px 0 0;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.modern-card:hover .card-image img {
    transform: scale(1.1);
}

@media (max-width: 768px) {
    .section-header h1 {
        font-size: 2rem;
    }
    
    .card-footer {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }
}
</style>
@endsection
