@extends('layouts.app')

@section('content')
<div class="gallery-detail-container">
    <!-- Header Section -->
    <div class="gallery-header">
        <div class="container">
            <div class="header-content animate__animated animate__fadeIn">
                <span class="category-badge">Photo Gallery</span>
                <h1 class="gallery-title">{{ $gallery->title }}</h1>
                <div class="gallery-meta">
                    <span><i class="far fa-images"></i> {{ $gallery->photos->count() }} Photos</span>
                    <span><i class="far fa-calendar"></i> {{ $gallery->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="container py-5">
        <div class="masonry-grid">
            @foreach($gallery->photos as $photo)
            <div class="grid-item animate__animated animate__fadeInUp">
                <div class="photo-card" data-bs-toggle="modal" data-bs-target="#photoModal{{ $photo->id }}">
                    <div class="photo-wrapper">
                        <img src="{{ $photo->image_url }}" 
                             alt="{{ $photo->title }}" 
                             loading="lazy">
                        <div class="photo-overlay">
                            <div class="overlay-content">
                                <h4>{{ $photo->title }}</h4>
                                <p>{{ Str::limit($photo->description, 50) }}</p>
                                <span class="view-btn">
                                    <i class="fas fa-expand-alt"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Modal -->
            <div class="modal fade" id="photoModal{{ $photo->id }}" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="photo-modal-container">
                                <div class="modal-photo">
                                    <img src="{{ $photo->image_url }}" alt="{{ $photo->title }}">
                                </div>
                                <div class="modal-info">
                                    <button type="button" class="modal-close" data-bs-dismiss="modal">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="info-content">
                                        <h3>{{ $photo->title }}</h3>
                                        <p>{{ $photo->description }}</p>
                                        <div class="photo-actions">
                                            <a href="{{ route('photos.show', $photo->id) }}" class="action-btn comments-btn">
                                                <i class="fas fa-comments"></i>
                                                <span>View Comments</span>
                                            </a>
                                            @if($photo->downloadable)
                                            <a href="{{ $photo->download_url }}" class="action-btn download-btn">
                                                <i class="fas fa-download"></i>
                                                <span>Download</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
.gallery-detail-container {
    background: #f8f9fa;
    min-height: 100vh;
}

.gallery-header {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    padding: 4rem 0;
    color: white;
    text-align: center;
}

.category-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.5rem 1.5rem;
    border-radius: 30px;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.gallery-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 1.5rem 0;
}

.gallery-meta {
    display: flex;
    justify-content: center;
    gap: 2rem;
}

.gallery-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.masonry-grid {
    columns: 3 250px;
    column-gap: 1.5rem;
}

.grid-item {
    break-inside: avoid;
    margin-bottom: 1.5rem;
}

.photo-card {
    cursor: pointer;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.photo-card:hover {
    transform: translateY(-5px);
}

.photo-wrapper {
    position: relative;
}

.photo-wrapper img {
    width: 100%;
    display: block;
    transition: transform 0.5s ease;
}

.photo-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.photo-card:hover .photo-overlay {
    opacity: 1;
}

.overlay-content {
    color: white;
    text-align: center;
    padding: 1rem;
}

.overlay-content h4 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}

.view-btn {
    display: inline-block;
    background: white;
    color: var(--primary-color);
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    margin-top: 1rem;
}

.photo-modal-container {
    display: flex;
    background: #1a1a1a;
}

.modal-photo {
    flex: 1;
    max-height: 90vh;
}

.modal-photo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.modal-info {
    width: 300px;
    background: white;
    position: relative;
    padding: 2rem;
}

.modal-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: none;
    border: none;
    color: #666;
    font-size: 1.2rem;
}

.photo-actions {
    margin-top: 2rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: transform 0.3s ease;
}

.comments-btn {
    background: var(--primary-color);
    color: white;
}

.download-btn {
    background: var(--secondary-color);
    color: white;
}

.action-btn:hover {
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .masonry-grid {
        columns: 2 200px;
    }
    
    .photo-modal-container {
        flex-direction: column;
    }
    
    .modal-info {
        width: 100%;
    }
}

@media (max-width: 576px) {
    .masonry-grid {
        columns: 1;
    }
    
    .gallery-meta {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modalPhotos = document.querySelectorAll('.modal-photo img');
    modalPhotos.forEach(photo => {
        photo.addEventListener('click', function() {
            this.classList.toggle('zoomed');
        });
    });
});
</script>
@endsection
