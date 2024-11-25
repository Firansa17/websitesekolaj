<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($infos as $info)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($info->image)
                        <img src="{{ asset('storage/' . $info->image) }}" 
                             alt="Info Image"
                             class="img-thumbnail"
                             style="max-width: 100px;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>{{ $info->title }}</td>
                <td>
                    <span class="badge bg-primary">{{ $info->category }}</span>
                </td>
                <td>{{ $info->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('dashboard.infos.edit', $info->id) }}" 
                       class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('dashboard.infos.destroy', $info->id) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn btn-sm btn-danger" 
                                onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 