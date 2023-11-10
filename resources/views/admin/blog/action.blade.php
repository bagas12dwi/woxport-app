<div class="d-flex align-middle">
    <a href="{{ url('manage-blog/' . $blog->id . '/edit') }}" class="btn btn-success me-2">
        <i class="bi bi-pencil-fill"></i>
    </a>
    <form action="{{ url('manage-blog/' . $blog->id) }}" method="post">
        @csrf
        @method('delete')
        <button href="" class="btn btn-danger" data-toggle="tooltip" data-original-title="Hapus"
            onclick="return confirm('Apakah anda yakin?')">
            <i class="bi bi-trash3"></i>
        </button>
    </form>
</div>
