@extends('layouts.app')

@section('content')
<div class="info-detail-container">
    <div class="container py-5">
        <!-- Header Section -->
        <div class="info-header text-center animate__animated animate__fadeInDown">
            <div class="category-badge mb-4">
                <span class="badge-text">
                    <i class="fas fa-tag me-2"></i>{{ $info->category }}
                </span>
            </div>
            <h1 class="display-4 fw-bold mb-4">{{ $info->title }}</h1>
            <div class="meta-info mb-4">
                <span class="meta-item">
                    <i class="far fa-calendar-alt me-2"></i>
                    {{ $info->created_at->format('d M Y') }}
                </span>
                <span class="meta-divider">•</span>
                <span class="meta-item">
                    <i class="far fa-clock me-2"></i>
                    {{ $info->created_at->diffForHumans() }}
                </span>
            </div>
        </div>

        <!-- Content Section -->
        <div class="info-content-wrapper">
            <div class="info-content animate__animated animate__fadeIn">
                <div class="content-card">
                    @if($info->image)
                    <div class="featured-image mb-4">
                        <img src="{{ $info->image }}" alt="{{ $info->title }}" class="img-fluid rounded-4">
                    </div>
                    @endif
                    
                    <div class="content-text">
                        {{ $info->content }}
                    </div>

                    @if($info->attachments)
                    <div class="attachments-section mt-4">
                        <h5 class="mb-3">
                            <i class="fas fa-paperclip me-2"></i>Lampiran
                        </h5>
                        <div class="attachment-list">
                            @foreach($info->attachments as $attachment)
                            <a href="{{ $attachment->url }}" class="attachment-item">
                                <i class="fas fa-file-alt me-2"></i>
                                <span>{{ $attachment->name }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Navigation Section -->
        <div class="navigation-section mt-5 animate__animated animate__fadeInUp">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a href="{{ route('info.index') }}" class="back-button">
                        <i class="fas fa-arrow-left me-2"></i>
                        <span>Kembali ke Informasi</span>
                    </a>
                </div>
                <div class="col-auto">
                    <div class="share-buttons">
                        <span class="share-label me-2">Bagikan:</span>
                        <a href="#" class="share-button" onclick="shareOnWhatsApp()">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="share-button" onclick="shareOnFacebook()">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="share-button" onclick="shareOnTwitter()">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.info-detail-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.info-header {
    max-width: 800px;
    margin: 0 auto 3rem;
}

.category-badge .badge-text {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 0.9rem;
    font-weight: 500;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.meta-info {
    color: #6c757d;
    font-size: 0.95rem;
}

.meta-item {
    display: inline-flex;
    align-items: center;
}

.meta-divider {
    margin: 0 15px;
    color: #dee2e6;
}

.info-content-wrapper {
    max-width: 800px;
    margin: 0 auto;
}

.content-card {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.content-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #495057;
}

.featured-image img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.attachments-section {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 15px;
}

.attachment-item {
    display: inline-flex;
    align-items: center;
    padding: 10px 20px;
    background: white;
    border-radius: 30px;
    margin: 5px;
    color: var(--primary-color);
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.attachment-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.back-button {
    display: inline-flex;
    align-items: center;
    padding: 12px 24px;
    background: white;
    color: var(--primary-color);
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.back-button:hover {
    transform: translateX(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    color: var(--primary-color);
}

.share-buttons {
    display: flex;
    align-items: center;
}

.share-label {
    color: #6c757d;
    font-weight: 500;
}

.share-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    color: var(--primary-color);
    margin-left: 10px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.share-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    color: white;
    background: var(--primary-color);
}

@media (max-width: 768px) {
    .content-card {
        padding: 1.5rem;
    }
    
    .navigation-section .row {
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }
    
    .share-buttons {
        justify-content: center;
    }
}
</style>

<script>
function shareOnWhatsApp() {
    const text = encodeURIComponent(`${document.title}\n${window.location.href}`);
    window.open(`https://wa.me/?text=${text}`, '_blank');
}

function shareOnFacebook() {
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}`, '_blank');
}

function shareOnTwitter() {
    const text = encodeURIComponent(document.title);
    window.open(`https://twitter.com/intent/tweet?text=${text}&url=${encodeURIComponent(window.location.href)}`, '_blank');
}
</script>
@endsection
