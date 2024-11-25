<div class="card">
    <div class="card-body">
        <form action="{{ isset($info) ? route('dashboard.infos.update', $info->id) : route('dashboard.infos.store') }}" 
              method="POST" 
              enctype="multipart/form-data">
            @csrf
            @if(isset($info)) @method('PUT') @endif

            <div class="mb-4">
                <label class="form-label">Judul Informasi</label>
                <input type="text" 
                       name="title" 
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $info->title ?? '') }}" 
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Akademik" {{ old('category', $info->category ?? '') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="Kegiatan" {{ old('category', $info->category ?? '') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="Pengumuman" {{ old('category', $info->category ?? '') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Konten</label>
                <textarea name="content" 
                          class="form-control @error('content') is-invalid @enderror" 
                          rows="5" 
                          required>{{ old('content', $info->content ?? '') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Gambar</label>
                <div class="image-upload-wrapper">
                    <input type="file" 
                           name="image" 
                           class="form-control @error('image') is-invalid @enderror"
                           accept="image/*"
                           onchange="previewImage(this)">
                    @if(isset($info) && $info->image)
                        <div class="current-image mt-2">
                            <img src="{{ asset('storage/' . $info->image) }}" 
                                 alt="Current Image" 
                                 class="img-thumbnail" 
                                 style="max-height: 200px">
                        </div>
                    @endif
                    <div id="image-preview" class="mt-2" style="display: none;">
                        <img src="" alt="Preview" class="img-thumbnail" style="max-height: 200px">
                    </div>
                </div>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <a href="{{ route('dashboard.infos.index') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-times me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const previewImg = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script> 