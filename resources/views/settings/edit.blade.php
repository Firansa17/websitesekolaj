@extends('layouts.admin.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-cog mr-2"></i>Pengaturan Aplikasi
                </h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit mr-2"></i>Edit Pengaturan
                </h3>
            </div>
            
            <form method="POST" action="{{ route('dashboard.settings') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="fas fa-building mr-1"></i>
                                    Nama Aplikasi
                                </label>
                                <input type="text" name="nama_aplikasi" class="form-control @error('nama_aplikasi') is-invalid @enderror" 
                                    value="{{ old('nama_aplikasi', $setting->nama_aplikasi) }}" placeholder="Masukkan nama aplikasi">
                                @error('nama_aplikasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>
                                    <i class="fas fa-image mr-1"></i>
                                    Logo
                                </label>
                                <div class="custom-file">
                                    <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="logo">
                                    <label class="custom-file-label" for="logo">Pilih file</label>
                                </div>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($setting->logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$setting->logo) }}" class="img-thumbnail" style="height: 100px">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>
                                    <i class="fas fa-icons mr-1"></i>
                                    Favicon
                                </label>
                                <div class="custom-file">
                                    <input type="file" name="favicon" class="custom-file-input @error('favicon') is-invalid @enderror" id="favicon">
                                    <label class="custom-file-label" for="favicon">Pilih file</label>
                                </div>
                                @error('favicon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($setting->favicon)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$setting->favicon) }}" class="img-thumbnail" style="height: 50px">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="fas fa-copyright mr-1"></i>
                                    Footer Aplikasi
                                </label>
                                <input type="text" name="footer_aplikasi" class="form-control @error('footer_aplikasi') is-invalid @enderror" 
                                    value="{{ old('footer_aplikasi', $setting->footer_aplikasi) }}" placeholder="Masukkan footer aplikasi">
                                @error('footer_aplikasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>
                                    <i class="fas fa-image mr-1"></i>
                                    Background
                                </label>
                                <div class="custom-file">
                                    <input type="file" name="background" class="custom-file-input @error('background') is-invalid @enderror" id="background">
                                    <label class="custom-file-label" for="background">Pilih file</label>
                                </div>
                                @error('background')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($setting->background)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$setting->background) }}" class="img-thumbnail" style="height: 150px">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Update label ketika file dipilih
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endpush
@endsection