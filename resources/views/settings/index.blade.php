@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Pengaturan Website</h5>
        </div>
        
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="/dashboard/settings">
                @csrf

                <div class="row">
                    <!-- Logo Section -->
                    <div class="col-md-12 mb-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title"><i class="fas fa-image me-2"></i>Logo Website</h6>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center">
                                        @if(isset($settings['logo']))
                                            <div class="me-3">
                                                <img src="{{ Storage::url($settings['logo']) }}" 
                                                     alt="Current Logo" 
                                                     class="img-thumbnail" 
                                                     style="max-height: 100px">
                                            </div>
                                        @endif
                                        <div class="flex-grow-1">
                                            <input type="file" 
                                                   class="form-control @error('logo') is-invalid @enderror" 
                                                   id="logo" 
                                                   name="logo">
                                            <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB)</small>
                                            @error('logo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text Settings Section -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-4"><i class="fas fa-text-height me-2"></i>Pengaturan Teks</h6>
                                
                                <!-- Application Name -->
                                <div class="mb-4">
                                    <label for="apk_name" class="form-label fw-bold">Nama Aplikasi</label>
                                    <input type="text" 
                                           class="form-control @error('apk_name') is-invalid @enderror" 
                                           id="apk_name" 
                                           name="apk_name" 
                                           value="{{ old('apk_name', $settings['apk_name'] ?? '') }}">
                                    @error('apk_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Welcome Text -->
                                <div class="mb-4">
                                    <label for="welcome_teks" class="form-label fw-bold">Teks Selamat Datang</label>
                                    <textarea class="form-control @error('welcome_teks') is-invalid @enderror" 
                                              id="welcome_teks" 
                                              name="welcome_teks" 
                                              rows="3">{{ old('welcome_teks', $settings['welcome_teks'] ?? '') }}</textarea>
                                    @error('welcome_teks')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Information Text -->
                                <div class="mb-4">
                                    <label for="informasi_teks" class="form-label fw-bold">Teks Informasi</label>
                                    <textarea class="form-control @error('informasi_teks') is-invalid @enderror" 
                                              id="informasi_teks" 
                                              name="informasi_teks" 
                                              rows="3">{{ old('informasi_teks', $settings['informasi_teks'] ?? '') }}</textarea>
                                    @error('informasi_teks')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Agenda Text -->
                                <div class="mb-4">
                                    <label for="agenda_teks" class="form-label fw-bold">Teks Agenda</label>
                                    <textarea class="form-control @error('agenda_teks') is-invalid @enderror" 
                                              id="agenda_teks" 
                                              name="agenda_teks" 
                                              rows="3">{{ old('agenda_teks', $settings['agenda_teks'] ?? '') }}</textarea>
                                    @error('agenda_teks')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Album Text -->
                                <div class="mb-4">
                                    <label for="album_teks" class="form-label fw-bold">Teks Album</label>
                                    <textarea class="form-control @error('album_teks') is-invalid @enderror" 
                                              id="album_teks" 
                                              name="album_teks" 
                                              rows="3">{{ old('album_teks', $settings['album_teks'] ?? '') }}</textarea>
                                    @error('album_teks')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gallery Text -->
                                <div class="mb-4">
                                    <label for="gallery_teks" class="form-label fw-bold">Teks Galeri</label>
                                    <textarea class="form-control @error('gallery_teks') is-invalid @enderror" 
                                              id="gallery_teks" 
                                              name="gallery_teks" 
                                              rows="3">{{ old('gallery_teks', $settings['gallery_teks'] ?? '') }}</textarea>
                                    @error('gallery_teks')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.card-header {
    border-bottom: none;
}

.form-control:focus {
    border-color: #1C3D5A;
    box-shadow: 0 0 0 0.2rem rgba(28, 61, 90, 0.25);
}

.btn-primary {
    background-color: #1C3D5A;
    border-color: #1C3D5A;
}

.btn-primary:hover {
    background-color: #15304d;
    border-color: #15304d;
}

.invalid-feedback {
    font-size: 0.875rem;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

.bg-light {
    background-color: #f8f9fa !important;
}
</style>
@endsection
