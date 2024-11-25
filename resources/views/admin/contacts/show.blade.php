@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">Detail Pesan</h1>
        <a href="{{ route('dashboard.contacts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Kembali
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0">{{ $contact->subject }}</h6>
                    <small class="text-muted">{{ $contact->created_at->format('d M Y H:i') }}</small>
                </div>
                <span class="badge {{ $contact->status == 'unread' ? 'bg-danger' : 'bg-success' }}">
                    {{ $contact->status == 'unread' ? 'Belum Dibaca' : 'Sudah Dibaca' }}
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h6 class="fw-bold">Pengirim:</h6>
                <p>{{ $contact->name }} ({{ $contact->email }})</p>
            </div>
            
            <div class="mb-4">
                <h6 class="fw-bold">Pesan:</h6>
                <p>{{ $contact->message }}</p>
            </div>

            <div class="d-flex justify-content-end gap-2">
                @if($contact->status == 'unread')
                <form action="{{ route('dashboard.contacts.mark-as-read', $contact) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-1"></i>Tandai Sudah Dibaca
                    </button>
                </form>
                @endif

                <form action="{{ route('dashboard.contacts.destroy', $contact) }}" 
                      method="POST"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i>Hapus Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 