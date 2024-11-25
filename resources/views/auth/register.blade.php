@extends('layouts.app')

@section('content')
<div class="register-container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="register-card">
                <div class="register-form-container">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/images/logo/logo-smkn4.png') }}" 
                             alt="Logo" 
                             class="register-logo">
                        <h4 class="mt-3 fw-bold">SMK NEGERI 4 BOGOR</h4>
                        <p class="text-muted">Daftar akun baru</p>
                    </div>

                    <form method="POST" action="{{ route('register.store') }}" class="register-form">
                        @csrf
                        
                        <div class="form-group mb-4">
                            <div class="modern-input-group">
                                <span class="input-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" 
                                       class="modern-form-control @error('name') is-invalid @enderror"
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       placeholder="Nama Lengkap">
                            </div>
                            @error('name')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="modern-input-group">
                                <span class="input-icon">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" 
                                       class="modern-form-control @error('email') is-invalid @enderror"
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       placeholder="Email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="modern-input-group">
                                <span class="input-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" 
                                       class="modern-form-control @error('password') is-invalid @enderror"
                                       name="password" 
                                       required 
                                       placeholder="Password">
                                <button type="button" class="btn-toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-modern-primary w-100 mb-3">
                                <i class="fas fa-user-plus me-2"></i> Daftar
                            </button>

                            <div class="text-center">
                                <p class="mb-0">Sudah punya akun?</p>
                                <a href="{{ route('login') }}" class="btn btn-modern-secondary w-100 mt-2">
                                    <i class="fas fa-sign-in-alt me-2"></i> Login
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.register-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #1C3D5A 0%, #3A6D8C 100%);
    padding: 1rem;
}

.register-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.register-form-container {
    padding: 2rem;
}

.register-logo {
    max-width: 100px;
    height: auto;
}

.modern-input-group {
    position: relative;
    background: #f8f9fa;
    border-radius: 12px;
    padding: 0.75rem 1rem;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.modern-input-group:focus-within {
    background: white;
    box-shadow: 0 0 0 2px #1C3D5A;
}

.input-icon {
    color: #1C3D5A;
    margin-right: 0.75rem;
}

.modern-form-control {
    border: none;
    background: transparent;
    width: calc(100% - 40px);
    padding: 0.25rem;
    outline: none;
}

.btn-toggle-password {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #1C3D5A;
    cursor: pointer;
    padding: 0;
}

.btn-modern-primary {
    background: #1C3D5A;
    color: white;
    border: none;
    padding: 0.75rem;
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-modern-primary:hover {
    background: #3A6D8C;
    transform: translateY(-2px);
}

.btn-modern-secondary {
    background: transparent;
    border: 2px solid #1C3D5A;
    color: #1C3D5A;
    padding: 0.75rem;
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-modern-secondary:hover {
    background: #1C3D5A;
    color: white;
}

@media (max-width: 576px) {
    .register-form-container {
        padding: 1.5rem;
    }
    
    .register-logo {
        max-width: 80px;
    }
    
    h4 {
        font-size: 1.25rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password visibility toggle
    const togglePassword = document.querySelector('.btn-toggle-password');
    const passwordInput = document.querySelector('input[name="password"]');
    
    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    }
});
</script>
@endsection