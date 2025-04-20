<x-app>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Info Book</h1>
    <a href="{{ route('books.index') }}" class="btn btn-danger">Back</a>

    <!-- DataTales Example -->
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Book Details</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ $book->title }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" class="form-control" value="{{ $book->description }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Author</label>
                    <input type="text" class="form-control" value="{{ $book->author }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Publisher</label>
                    <input type="text" class="form-control" value="{{ $book->publisher }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Year</label>
                    <input type="text" class="form-control" value="{{ $book->year }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category</label>
                    <select class="form-control" disabled>
                        <option value="{{ $book->category }}" selected>{{ $book->category }}</option>
                        <option>Novel</option>
                        <option>Komik</option>
                        <option>Dongeng</option>
                        <option>Biografi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Code Book</label>
                    <input type="text" class="form-control" value="{{ $book->code_book }}" disabled>
                </div>
            </form>
        </div>
    </div>
</x-app>
