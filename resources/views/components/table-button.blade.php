<div class="table-actions btn-group">
    @if($showButton)
        <a href="{{ route($route.'.show', $data) }}" class="table-action btn btn-info mr-2" data-toggle="tooltip" title="Lihat">
            <i class="fas fa-eye"></i>
        </a>
    @endif
    <a href="{{ route($route.'.edit',  $data ) }}" class="table-action btn btn-primary mr-2" data-toggle="tooltip" title="Ubah">
        <i class="fas fa-edit"></i>
    </a>
    <form action={{ route($route.'.destroy',  $data ) }} method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="table-action-delete btn btn-danger"
                data-toggle="tooltip" title="Hapus" onclick="return confirm('{{  'Apakah anda yakin menghapus ' . $data->name . '?' }}')"><i
                class="fas fa-trash"></i></button>
    </form>
</div>
