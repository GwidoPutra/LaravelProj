
<!DOCTYPE html>
<head>
    <title>Item List</title> <!-- Menentukan judul halaman -->
</head>
<body>
    <h1>Items</h1> <!-- Heading utama halaman -->
    @if(session('success')) <!-- Menampilkan pesan sukses jika ada -->
        <p>{{ session('success') }}</p> <!-- Menampilkan pesan sukses dari session -->
    @endif
    <!-- Link untuk menambahkan item baru -->
    <a href="{{ route('items.create') }}">Add Item</a>
    <ul>
        <!-- Loop melalui semua item dan menampilkannya dalam daftar -->
        @foreach ($items as $item)
            <li>
                <!-- Menampilkan nama item -->
                {{ $item->name }} - 
                <!-- Link untuk mengedit item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <!-- Formulir untuk menghapus item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf <!-- Token CSRF untuk keamanan -->
                    @method('DELETE') <!-- Menggunakan metode DELETE untuk menghapus item -->
                    <button type="submit">Delete</button> <!-- Tombol untuk menghapus item -->
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
