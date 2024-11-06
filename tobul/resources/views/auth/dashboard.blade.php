<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
        <a href="{{ route('admin.books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Book</a>
        <div class="mt-4">
            <div class="relative">
                <input type="text" id="search" class="w-full p-2 border border-gray-300 rounded" placeholder="Search...">
            </div>
            <div class="mt-4">
                <select id="categoryFilter" class="p-2 border border-gray-300 rounded">
                    <option value="">All Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->titleCategory }}</option>
                    @endforeach
                </select>
            </div>
            <table class="w-full mt-4 bg-white shadow-md rounded">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2">Title</th>
                        <th class="p-2">ISBN</th>
                        <th class="p-2">Category</th>
                        <th class="p-2">Price</th>
                        <th class="p-2">Stock</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr class="border-b border-gray-200" data-category-id="{{ $book->category->id }}">
                        <td class="p-2">{{ $book->titleBook }}</td>
                        <td class="p-2">{{ $book->idBook }}</td>
                        <td class="p-2">{{ $book->category->titleCategory }}</td>
                        <td class="p-2">{{ number_format($book->priceBook, 0, ',', '.') }}</td>
                        <td class="p-2">{{ $book->stockBook }}</td>
                        <td class="p-2">
                            <a href="{{ route('admin.books.edit', $book->idBook) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book->idBook) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="{{ route('logout') }}" method="post" class="mt-4">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const title = row.children[0].textContent.toLowerCase();
                if (title.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.getElementById('categoryFilter').addEventListener('change', function() {
            const categoryId = this.value;
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const rowCategoryId = row.getAttribute('data-category-id');
                if (categoryId === '' || rowCategoryId === categoryId) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>