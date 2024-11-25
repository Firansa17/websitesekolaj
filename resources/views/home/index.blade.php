@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="hero-content">
                    <div class="logo-wrapper mb-4">
                        <img src="{{ asset('storage/' . ($settings->logo ?? 'logo.png')) }}" 
                             alt="SMK Negeri 4 Bogor" 
                             class="logo-img"
                             onerror="this.src='{{ asset('assets/images/logo/logo-smkn4.png') }}'"
                             style="max-height: 100px; width: auto;">
                    </div>
                    <div class="welcome-section">
                        <div class="badge-wrapper" data-aos="fade-up" data-aos-delay="100">
                            <button class="welcome-badge" id="welcomeButton">
                                <i class="fas fa-hand-sparkles me-2"></i>
                                Selamat Datang di
                            </button>
                        </div>
                        <div class="welcome-animation" id="welcomeAnimation">
                            <div class="text-animation">
                                <span class="letter">S</span>
                                <span class="letter">e</span>
                                <span class="letter">l</span>
                                <span class="letter">a</span>
                                <span class="letter">m</span>
                                <span class="letter">a</span>
                                <span class="letter">t</span>
                                <span class="letter">&nbsp;</span>
                                <span class="letter">D</span>
                                <span class="letter">a</span>
                                <span class="letter">t</span>
                                <span class="letter">a</span>
                                <span class="letter">n</span>
                                <span class="letter">g</span>
                                <span class="letter">&nbsp;</span>
                                <span class="letter">d</span>
                                <span class="letter">i</span>
                                <span class="letter">&nbsp;</span>
                                <span class="letter">W</span>
                                <span class="letter">e</span>
                                <span class="letter">b</span>
                                <span class="letter">s</span>
                                <span class="letter">i</span>
                                <span class="letter">t</span>
                                <span class="letter">e</span>
                                <span class="letter">&nbsp;</span>
                                <span class="letter">S</span>
                                <span class="letter">M</span>
                                <span class="letter">K</span>
                                <span class="letter">&nbsp;</span>
                                <span class="letter">N</span>
                                <span class="letter">e</span>
                                <span class="letter">g</span>
                                <span class="letter">e</span>
                                <span class="letter">r</span>
                                <span class="letter">i</span>
                                <span class="letter">&nbsp;</span>
                                <span class="letter">4</span>
                                <span class="letter">&nbsp;</span>
                                <span class="letter">K</span>
                                <span class="letter">o</span>
                                <span class="letter">t</span>
                                <span class="letter">a</span>
                                <span class="letter">&nbsp;</span>
                                <span class="letter">B</span>
                                <span class="letter">o</span>
                                <span class="letter">g</span>
                                <span class="letter">o</span>
                                <span class="letter">r</span>
                            </div>
                        </div>
                    </div>
                    <h1 class="hero-title" data-aos="fade-up" data-aos-delay="200">
                        SMK Negeri 4 <span class="text-primary">Bogor</span>
                    </h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="300">
                        Membentuk generasi unggul dengan pendidikan berkualitas dan berwawasan teknologi
                    </p>
                    <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
                        <a href="#features" class="btn btn-primary btn-lg">
                            Jelajahi
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="https://www.youtube.com/watch?v=N6cmqCbQllo" 
                           class="btn btn-outline-light btn-lg ms-3"
                           target="_blank"
                           rel="noopener noreferrer">
                            <i class="fas fa-play me-2"></i>
                            Video Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block" data-aos="fade-left">
                <div class="hero-image-wrapper">
                    <div class="stats-container">
                        <div class="stats-item" onclick="animateCount(this, 1000)">
                            <h4 class="counter" data-target="1000">0</h4>
                            <p>Siswa</p>
                            <div class="stats-animation">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                        </div>
                        <div class="stats-item" onclick="animateCount(this, 50)">
                            <h4 class="counter" data-target="50">0</h4>
                            <p>Guru</p>
                            <div class="stats-animation">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feature Cards Section -->
<section class="features-section" id="features">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Fitur Unggulan</h2>
            <p class="section-subtitle">Jelajahi berbagai fitur yang kami sediakan</p>
        </div>
        
        <div class="row g-4">
            <!-- Info Card -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('info.index') }}" class="feature-card-link">
                    <div class="feature-card">
                        <div class="card-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3>Informasi</h3>
                        <p>Berita terkini sekolah</p>
                        <div class="card-hover">
                            <span>Lihat Semua</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Agenda Card -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('agenda.index') }}" class="feature-card-link">
                    <div class="feature-card">
                        <div class="card-icon bg-success">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>Agenda</h3>
                        <p>Kegiatan mendatang</p>
                        <div class="card-hover">
                            <span>Lihat Semua</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Gallery Card -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('gallery.index') }}" class="feature-card-link">
                    <div class="feature-card">
                        <div class="card-icon bg-info">
                            <i class="fas fa-images"></i>
                        </div>
                        <h3>Galeri</h3>
                        <p>Dokumentasi kegiatan</p>
                        <div class="card-hover">
                            <span>Lihat Semua</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Contact Card -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('contact.index') }}" class="feature-card-link">
                    <div class="feature-card">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3>Kontak</h3>
                        <p>Hubungi kami</p>
                        <div class="card-hover">
                            <span>Lihat Semua</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="location-section bg-light py-5" id="location">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Lokasi Sekolah</h2>
            <p class="section-subtitle">SMK Negeri 4 Bogor (Nebrazka)</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="location-info">
                    <div class="info-card mb-4">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Alamat</h4>
                            <p>Jl. Raya Tajur, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</p>
                        </div>
                    </div>
                    
                    <div class="info-card mb-4">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Telepon</h4>
                            <p>(0251) 8242411</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email</h4>
                            <p>info@smkn4bogor.sch.id</p>
                        </div>
                    </div>

                    <a href="https://www.google.com/maps/place/SMK+Negeri+4+Bogor+(Nebrazka)/@-6.6407334,106.822119,17z/data=!4m6!3m5!1s0x2e69c8b16ee07ef5:0x14ab253dd267de49!8m2!3d-6.6407334!4d106.8246939!16s%2Fg%2F1hm2r8zh4?entry=ttu&g_ep=EgoyMDI0MTEwNi4wIKXMDSoASAFQAw%3D%3D" 
                       class="btn btn-primary mt-4" 
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="fas fa-directions me-2"></i>
                        Petunjuk Arah
                    </a>
                </div>
            </div>
            
            <div class="col-lg-7" data-aos="fade-left">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4583821517407!2d106.82211897475766!3d-6.640733393433037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sen!2sid!4v1707901234567!5m2!1sen!2sid" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary: #2563eb;
    --success: #16a34a;
    --info: #0891b2;
    --warning: #d97706;
    --dark: #1e293b;
    --light: #f8fafc;

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg'); /* URL gambar eksternal */
    background-size: cover;  /* Agar gambar menutupi seluruh elehttps://example.com/path/to/your-image.jpgmen */
    background-position: center;  /* Agar gambar terpusat di tengah */
    background-repeat: no-repeat;  /* Agar gambar tidak diulang */
    opacity: 0.7;  /* Jika ingin transparansi pada overlay */
}


.hero-content {
    position: relative;
    z-index: 1;
    color: white;
    padding: 2rem 0;
}

.welcome-badge {
    background: #0d6efd;
    color: white;
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2);
}

.welcome-badge:hover {
    background: #0b5ed7;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(13, 110, 253, 0.3);
}

.welcome-badge:active {
    transform: translateY(0);
    box-shadow: 0 2px 10px rgba(13, 110, 253, 0.2);
}

.welcome-badge i {
    color: rgba(255, 255, 255, 0.9);
}

.welcome-animation {
    background: rgba(13, 110, 253, 0.98);
}

.welcome-animation::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, #0d6efd, #0099ff);
    opacity: 0.2;
}

.letter {
    display: inline-block;
    color: white;
    font-size: 2.5rem;
    font-weight: 700;
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.5s ease;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.welcome-animation.active {
    display: flex;
}

.welcome-animation.active .letter {
    opacity: 1;
    transform: translateY(0);
}

.welcome-animation.fadeOut {
    animation: fadeOut 0.5s ease forwards;
}

.welcome-section {
    position: relative;
}

.welcome-badge {
    background: rgba(255, 255, 255, 0.1);
    color: var(--primary-color);
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    font-weight: 500;
    border: 2px solid var(--primary-color);
    cursor: pointer;
    transition: all 0.3s ease;
}

.welcome-badge:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

.welcome-animation {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.text-animation {
    text-align: center;
}

.letter {
    display: inline-block;
    color: white;
    font-size: 2.5rem;
    font-weight: 700;
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.5s ease;
}

.welcome-animation.active {
    display: flex;
}

.welcome-animation.active .letter {
    opacity: 1;
    transform: translateY(0);
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}

.welcome-animation.fadeOut {
    animation: fadeOut 0.5s ease forwards;
}

@media (max-width: 768px) {
    .welcome-badge {
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
    }
    
    .letter {
        font-size: 1.5rem;
    }
}

/* Animasi untuk badge dengan warna navbar */
@keyframes badgePulse {
    0% {
        box-shadow: 0 4px 15px rgba(28, 61, 90, 0.3);
        background: #1C3D5A;
    }
    50% {
        box-shadow: 0 4px 25px rgba(58, 109, 140, 0.5);
        background: #3A6D8C;
    }
    100% {
        box-shadow: 0 4px 15px rgba(28, 61, 90, 0.3);
        background: #1C3D5A;
    }
}

.welcome-badge {
    animation: badgePulse 2s infinite;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.hero-subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.hero-image-wrapper {
    position: relative;
    padding: 2rem;
}

.hero-image {
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.stats-container {
    display: flex;
    gap: 2rem;
    justify-content: center;
}

.stats-item {
    text-align: center;
    padding: 1.5rem;
    border-radius: 15px;
    background: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.stats-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.stats-item h4 {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.stats-item p {
    color: #666;
    font-size: 1.1rem;
    margin: 0;
}

.stats-animation {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    width: 100%;
    height: 100%;
    background: var(--primary-color);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.stats-animation i {
    font-size: 3rem;
    color: white;
    opacity: 0;
    transform: scale(0.5);
    transition: all 0.3s ease;
}

.stats-item.animating .stats-animation {
    animation: pulseAndFade 1.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.stats-item.animating .stats-animation i {
    animation: iconPop 1.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.stats-item.counting h4 {
    animation: numberPop 0.3s ease;
}

@keyframes pulseAndFade {
    0% {
        transform: translate(-50%, -50%) scale(0);
        opacity: 0;
    }
    50% {
        transform: translate(-50%, -50%) scale(1.2);
        opacity: 0.8;
    }
    100% {
        transform: translate(-50%, -50%) scale(0);
        opacity: 0;
    }
}

@keyframes iconPop {
    0% {
        transform: scale(0.5);
        opacity: 0;
    }
    50% {
        transform: scale(1.2);
        opacity: 1;
    }
    100% {
        transform: scale(0.5);
        opacity: 0;
    }
}

@keyframes numberPop {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

@media (max-width: 768px) {
    .stats-container {
        flex-direction: column;
        gap: 1rem;
    }
    
    .stats-item h4 {
        font-size: 2rem;
    }
}

/* Feature Cards */
.features-section {
    margin-top: -100px;
    padding-top: 150px;
    position: relative;
    z-index: 10;
}

.feature-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.1);
    position: relative;
    overflow: hidden;
}

.card-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    background: var(--primary);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.feature-card h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.card-hover {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
    background: linear-gradient(to top, white, transparent);
    display: flex;
    justify-content: space-between;
    align-items: center;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.feature-card:hover .card-hover {
    opacity: 1;
    transform: translateY(0);
}

/* News Section */
.news-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.news-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.news-date {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: white;
    padding: 0.5rem;
    border-radius: 10px;
    text-align: center;
    min-width: 60px;
}

.news-date .day {
    display: block;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--primary);
}

.news-content {
    padding: 1.5rem;
}

.news-category {
    display: inline-block;
    padding: 4px 12px;
    background: var(--light);
    color: var(--primary);
    border-radius: 20px;
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.news-card:hover {
    transform: translateY(-10px);
}

.news-card:hover .news-image img {
    transform: scale(1.1);
}

/* Responsive Design */
@media (max-width: 992px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .features-section {
        margin-top: -50px;
        padding-top: 100px;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .stats-card {
        position: relative;
        margin-top: 2rem;
    }
}

.location-section {
    position: relative;
    overflow: hidden;
}

.map-container {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid rgba(0,0,0,0.1);
}

.info-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.info-icon {
    width: 45px;
    height: 45px;
    background: var(--primary);
    color: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.info-content h4 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--dark);
}

.info-content p {
    margin: 0;
    color: #64748b;
    line-height: 1.5;
}

.btn-primary {
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
}

@media (max-width: 992px) {
    .location-info {
        margin-bottom: 2rem;
    }
}

@media (max-width: 768px) {
    .map-container {
        height: 300px;
    }
    
    .map-container iframe {
        height: 100%;
    }
}

.welcome-section {
    position: relative;
}

.welcome-badge {
    background: rgba(255, 255, 255, 0.1);
    color: var(--primary-color);
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    font-weight: 500;
    border: 2px solid var(--primary-color);
    cursor: pointer;
    transition: all 0.3s ease;
}

.welcome-badge:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

.welcome-animation {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.text-animation {
    text-align: center;
}

.letter {
    display: inline-block;
    color: white;
    font-size: 2.5rem;
    font-weight: 700;
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.5s ease;
}

.welcome-animation.active {
    display: flex;
}

.welcome-animation.active .letter {
    opacity: 1;
    transform: translateY(0);
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}

.welcome-animation.fadeOut {
    animation: fadeOut 0.5s ease forwards;
}

@media (max-width: 768px) {
    .letter {
        font-size: 1.5rem;
    }
}

#cameraContainer {
    margin-bottom: 1rem;
    border-radius: 8px;
    overflow: hidden;
    background-color: #000;
}

#camera {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    display: block;
}

.custom-switch .custom-control-label::before {
    width: 2rem;
    height: 1rem;
}

.custom-switch .custom-control-label::after {
    width: calc(1rem - 4px);
    height: calc(1rem - 4px);
}

.custom-switch .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(1rem);
}
</style>

<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const welcomeButton = document.getElementById('welcomeButton');
    const welcomeAnimation = document.getElementById('welcomeAnimation');
    const letters = document.querySelectorAll('.letter');
    
    welcomeButton.addEventListener('click', function() {
        welcomeAnimation.classList.add('active');
        
        // Animate each letter with delay
        letters.forEach((letter, index) => {
            setTimeout(() => {
                letter.style.transitionDelay = `${index * 50}ms`;
                letter.style.opacity = '1';
                letter.style.transform = 'translateY(0)';
            }, 100);
        });
        
        // Close animation after completion
        setTimeout(() => {
            welcomeAnimation.classList.add('fadeOut');
            setTimeout(() => {
                welcomeAnimation.classList.remove('active', 'fadeOut');
                // Reset letters
                letters.forEach(letter => {
                    letter.style.opacity = '0';
                    letter.style.transform = 'translateY(50px)';
                    letter.style.transitionDelay = '0ms';
                });
            }, 500);
        }, letters.length * 50 + 2000); // Wait for all letters + 2 seconds
    });
});
</script>

<script>
function animateCount(element, target) {
    // Prevent multiple animations
    if (element.classList.contains('animating')) return;
    
    const counter = element.querySelector('.counter');
    const current = parseInt(counter.innerText);
    
    // Add animation classes
    element.classList.add('animating');
    element.classList.add('counting');
    
    // Animate count
    let start = current;
    const duration = 1500;
    const step = (target - start) / (duration / 16);
    
    function updateCount() {
        start += step;
        if (start <= target) {
            counter.innerText = Math.floor(start);
            requestAnimationFrame(updateCount);
        } else {
            counter.innerText = target;
            // Add plus sign for 1000+
            if (target === 1000) counter.innerText += '+';
            if (target === 50) counter.innerText += '+';
        }
    }
    
    updateCount();
    
    // Remove animation classes
    setTimeout(() => {
        element.classList.remove('animating', 'counting');
    }, 1500);
}

// Optional: Animate on page load
document.addEventListener('DOMContentLoaded', function() {
    const statsItems = document.querySelectorAll('.stats-item');
    setTimeout(() => {
        statsItems.forEach(item => {
            const target = parseInt(item.querySelector('.counter').dataset.target);
            animateCount(item, target);
        });
    }, 500);
});
</script>

<script>
let stream = null;

document.getElementById('cameraToggle').addEventListener('change', function() {
    const cameraContainer = document.getElementById('cameraContainer');
    const video = document.getElementById('camera');

    if (this.checked) {
        // Aktifkan kamera
        cameraContainer.style.display = 'block';
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(mediaStream) {
                stream = mediaStream;
                video.srcObject = mediaStream;
            })
            .catch(function(error) {
                console.error('Error accessing camera:', error);
                alert('Tidak dapat mengakses kamera. Pastikan Anda memberikan izin akses kamera.');
                cameraToggle.checked = false;
                cameraContainer.style.display = 'none';
            });
    } else {
        // Nonaktifkan kamera
        cameraContainer.style.display = 'none';
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
            stream = null;
        }
        video.srcObject = null;
    }
});

// Pastikan kamera dimatikan saat meninggalkan halaman
window.addEventListener('beforeunload', function() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
});
</script>
@endsection