<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form action="{{ route('admin.books.update', $book->idBook) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="idBook">ISBN</label>
            <input type="text" name="idBook" value="{{ $book->idBook }}" required>
        </div>
        <div>
            <label for="titleBook">Title</label>
            <input type="text" name="titleBook" value="{{ $book->titleBook }}" required>
        </div>
        <div>
            <label for="idCategory">Category</label>
            <select name="idCategory" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $book->idCategory == $category->id ? 'selected' : '' }}>{{ $category->titleCategory }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="priceBook">Price</label>
            <input type="number" name="priceBook" step="0.01" value="{{ number_format($book->priceBook, 0, ',', '') }}" required>
        </div>
        <div>
            <label for="authorBook">Author</label>
            <input type="text" name="authorBook" value="{{ $book->authorBook }}" required>
        </div>
        <div>
            <label for="publisherBook">Publisher</label>
            <input type="text" name="publisherBook" value="{{ $book->publisherBook }}" required>
        </div>
        <div>
            <label for="publishedBook">Published Date</label>
            <input type="date" name="publishedBook" value="{{ $book->publishedBook }}" required>
        </div>
        <div>
            <label for="descriptionBook">Description</label>
            <textarea name="descriptionBook">{{ $book->descriptionBook }}</textarea>
        </div>
        <div>
            <label for="coverBook">Cover</label>
            <input type="file" name="coverBook">
            @if($book->coverBook)
            <img src="{{ asset('covers/' . $book->coverBook) }}" alt="Book Cover" width="100">
            @endif
        </div>
        <div>
            <label for="stockBook">Stock</label>
            <input type="number" name="stockBook" value="{{ $book->stockBook }}" required>
        </div>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>