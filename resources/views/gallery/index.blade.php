@extends('layouts.app')

@section('content')
<div class="gallery-container">
    <!-- Header Section -->
    <div class="gallery-header">
        <div class="container">
            <div class="text-center animate__animated animate__fadeIn">
                <span class="header-badge">Our Gallery</span>
                <h1 class="display-4 fw-bold mt-3">Galeri Karya Kami</h1>
                <p class="lead text-muted">Kumpulan karya terbaik dari siswa-siswi SMKN 4 Bogor</p>
                <div class="header-line mx-auto"></div>
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="container py-5">
        <div class="row g-4">
            @foreach($galleries as $gallery)
            <div class="col-lg-4 col-md-6">
                <div class="modern-gallery-card animate__animated animate__fadeInUp">
                    <div class="card-image">
                        @if ($gallery->photos->isNotEmpty())
                            <img src="{{ $gallery->photos->first()->image_url }}" 
                                 alt="{{ $gallery->title }}" 
                                 loading="lazy">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=No+Image" 
                                 alt="No Image Available" 
                                 loading="lazy">
                        @endif
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <span class="photo-count">
                                    <i class="fas fa-camera"></i>
                                    {{ $gallery->photos->count() }} Photos
                                </span>
                                <a href="{{ route('gallery.show', $gallery->id) }}" 
                                   class="view-gallery-btn">
                                    <i class="fas fa-eye"></i>
                                    View Gallery
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="content-wrapper">
                            <h3 class="gallery-title">{{ $gallery->title }}</h3>
                            <div class="gallery-meta">
                                <span class="date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $gallery->created_at->format('M d, Y') }}
                                </span>
                                <span class="category">
                                    <i class="fas fa-folder"></i>
                                    {{ $gallery->category ?? 'Uncategorized' }}
                                </span>
                            </div>
                            <p class="gallery-description">
                                {{ Str::limit($gallery->description ?? '', 100) }}
                            </p>
                            <a href="{{ route('gallery.show', $gallery->id) }}" 
                               class="explore-btn">
                                Explore Gallery
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.gallery-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
}

.gallery-header {
    padding: 5rem 0 3rem;
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    color: white;
    margin-bottom: 3rem;
    position: relative;
    overflow: hidden;
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

.modern-gallery-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.modern-gallery-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.card-image {
    position: relative;
    height: 300px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.modern-gallery-card:hover .card-image img {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    opacity: 0;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modern-gallery-card:hover .image-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    color: white;
}

.photo-count {
    display: block;
    font-size: 1.1rem;
    margin-bottom: 1rem;
}

.view-gallery-btn {
    background: white;
    color: var(--primary-color);
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.view-gallery-btn:hover {
    background: var(--primary-color);
    color: white;
    transform: scale(1.05);
}

.card-content {
    padding: 2rem;
}

.gallery-title {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.gallery-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.gallery-meta i {
    margin-right: 0.5rem;
}

.gallery-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.explore-btn {
    display: inline-flex;
    align-items: center;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.explore-btn:hover {
    transform: translateX(10px);
    color: var(--secondary-color);
}

.explore-btn i {
    transition: transform 0.3s ease;
}

.explore-btn:hover i {
    transform: translateX(5px);
}

@media (max-width: 768px) {
    .gallery-header {
        padding: 3rem 0;
    }
    
    .card-image {
        height: 250px;
    }
    
    .gallery-title {
        font-size: 1.2rem;
    }
    
    .card-content {
        padding: 1.5rem;
    }
}
</style>
@endsection