<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title> <!-- Menentukan judul halaman di tab browser -->
</head>
<body>
    <h1>Add Item</h1> <!-- Judul utama halaman -->
    <form action="{{ route('items.store') }}" method="POST"> <!-- Form untuk menambahkan item baru --> <!-- Mengarah ke route 'items.store' dengan metode POST -->
        @csrf <!-- Token keamanan untuk mencegah serangan CSRF -->
        <!-- Input untuk nama item -->
        <label for="name">Name:</label> <!-- Label untuk input nama -->
        <input type="text" name="name" required> <!-- Input teks untuk nama, wajib diisi -->
        <br>
        <!-- Input untuk deskripsi item -->
        <label for="description">Description:</label> <!-- Label untuk input deskripsi -->
        <textarea name="description" required></textarea> <!-- Textarea untuk deskripsi, wajib diisi -->
        <br>
        <!-- Tombol untuk menambahkan item -->
        <button type="submit">Add Item</button> <!-- Tombol submit untuk mengirimkan form -->
    </form>
    <!-- Link untuk kembali ke daftar item -->
    <a href="{{ route('items.index') }}">Back to List</a> <!-- Link kembali ke halaman daftar item -->
</body>
</html>