<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
</head>
<body>
    <h1>Add New Book</h1>
    <form action="{{ route('admin.books.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="idBook">ISBN</label>
            <input type="text" name="idBook" required>
        </div>
        <div>
            <label for="titleBook">Title</label>
            <input type="text" name="titleBook" required>
        </div>
        <div>
            <label for="idCategory">Category</label>
            <select name="idCategory" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->titleCategory }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="priceBook">Price</label>
            <input type="number" name="priceBook" step="0.01" required>
        </div>
        <div>
            <label for="authorBook">Author</label>
            <input type="text" name="authorBook" required>
        </div>
        <div>
            <label for="publisherBook">Publisher</label>
            <input type="text" name="publisherBook" required>
        </div>
        <div>
            <label for="publishedBook">Published Date</label>
            <input type="date" name="publishedBook" required>
        </div>
        <div>
            <label for="descriptionBook">Description</label>
            <textarea name="descriptionBook"></textarea>
        </div>
        <div>
            <label for="coverBook">Cover</label>
            <input type="file" name="coverBook">
        </div>
        <div>
            <label for="stockBook">Stock</label>
            <input type="number" name="stockBook" required>
        </div>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>