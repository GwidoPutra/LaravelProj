
<!DOCTYPE html>
<html>
<head>
    <title>Item List</title> <!-- Menentukan judul halaman di tab browser -->
</head>
<body>
    <h1>Items</h1> <!-- Judul utama halaman -->
    @if(session('success')) <!-- Menampilkan pesan sukses jika ada -->
        <p>{{ session('success') }}</p> <!-- Menampilkan pesan sukses dari session -->
    @endif
    <a href="{{ route('items.create') }}">Add Item</a> <!-- Link untuk menambahkan item baru -->
    <ul>
        @foreach($items as $item) <!-- Melakukan perulangan untuk menampilkan daftar item -->
            <li> 
                {{ $item->name }} -   <!-- Menampilkan nama item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- Link untuk mengedit item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;"> <!-- Form untuk menghapus item -->
                    @csrf <!-- Token keamanan untuk mencegah serangan CSRF -->
                    @method('DELETE') <!-- Mengubah method menjadi DELETE -->
                    <button type="submit">Delete</button> <!-- Tombol untuk menghapus item -->
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
