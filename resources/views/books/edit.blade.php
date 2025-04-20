<x-app>
    <h1 class="h3 mb-4 text-gray-800">Edit Book</h1>
    <a href="{{ route('books.index') }}" class="btn btn-danger">Back</a>

    <!-- DataTales Example -->
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Book Details</h6>
        </div>
        <div class="card-body">
            <form id="edit-book-form" action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title"
                        value="{{ old('title', $book->title) }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="description"
                        value="{{ old('description', $book->description) }}">
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" id="author"
                        value="{{ old('author', $book->author) }}">
                    @error('author')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text" name="publisher" class="form-control" id="publisher"
                        value="{{ old('publisher', $book->publisher) }}">
                    @error('publisher')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" id="year"
                        value="{{ old('year', $book->year) }}">
                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" name="category" id="category">
                        <option value="Novel" {{ $book->category == 'Novel' ? 'selected' : '' }}>Novel</option>
                        <option value="Komik" {{ $book->category == 'Komik' ? 'selected' : '' }}>Komik</option>
                        <option value="Dongeng" {{ $book->category == 'Dongeng' ? 'selected' : '' }}>Dongeng</option>
                        <option value="Biografi" {{ $book->category == 'Biografi' ? 'selected' : '' }}>Biografi
                        </option>
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="code_book" class="form-label">Code Book</label>
                    <input type="text" name="code_book" class="form-control" id="code_book"
                        value="{{ old('code_book', $book->code_book) }}">
                    @error('code_book')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="button" id="submit-button" class="btn btn-primary">Update Book</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.js"></script>
    <script>
        document.getElementById('submit-button').addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda sudah yakin?',
                text: "Perubahan yang Anda buat akan disimpan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Update!',
                confirmButtonColor: '#4e73df',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#d33',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('edit-book-form').submit();
                }
            });
        });
    </script>
</x-app>
