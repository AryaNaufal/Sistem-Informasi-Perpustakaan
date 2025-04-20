<x-app>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Book</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>

    <!-- Content Row -->
    <div class="row" id="card-list">
        @foreach ($books as $book)
            <div class="p-3 col-sm-12 col-md-4 col-xl-3">
                <div class="card shadow-sm h-100">
                    <img src="https://i.pinimg.com/736x/3a/dc/ff/3adcff7a670cde2ea2bb8ceadb6cceac.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $book->title }}</h5>
                        <p class="card-text"
                            style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical">
                            {{ $book->description }}
                        </p>
                        <div class="btn-wrapper text-right">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Info</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline"
                                id="delete-form-{{ $book->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $book->id }}">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Content Row -->

    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const bookId = this.getAttribute('data-id');
                const form = document.getElementById('delete-form-' + bookId);

                Swal.fire({
                    title: 'Yakin ingin menghapus buku ini?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    confirmButtonColor: '#4e73df',
                    cancelButtonText: 'Batal',
                    cancelButtonColor: '#d33',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app>
