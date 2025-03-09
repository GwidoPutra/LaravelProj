# LAPORAN JOSBHEET 4 <align center>

## Praktikum 2.1 – Retrieving Single Models
### Langkah 3
Menggunakan method find untuk mengambil data berdasarkan ID tertentu. Bila data ditemukan, maka akan dikembalikan sebagai objek model, tetapi Bila tidak ditemukan, akan mengembalikan null.
### Langkah 5
Menggunakan method first untuk mengambil entri pertama dari tabel berdasarkan query yang diberikan. Beda dengan find, method ini tidak harus menggunakan ID sebagai parameter.
### Langkah 7
Menggunakan method firstWhere untuk mencari data berdasarkan kondisi tertentu selain ID. Misal, mencari user berdasarkan email atau username tertentu.
### Langkah 9
Mencari pengguna berdasarkan id = 1, tetapi hanya mengambil kolom username dan nama. Bila tidak ditemukan, muncul error 404.
### Langkah 11
Bila tidak ditemukan data dengan id = 20, maka output akan error.

## Praktikum 2.2 – Not Found Exceptions
### Langkah 2
Menggunakan method findOrFail untuk mengambil data berdasarkan ID. Bila data ditemukan, maka akan dikembalikan seperti biasa, tapi Bila tidak ditemukan, akan memunculkan ModelNotFoundException, yang bisa digunakan untuk menampilkan halaman error 404.
### Langkah 4
Menggunakan method firstOrFail untuk mengambil entri pertama dari database. Bila tidak ditemukan, akan melemparkan ModelNotFoundException, yang bisa ditangani dengan mekanisme try-catch.


## Praktikum 2.3 – Retrieving Aggregates
### Langkah 2
Dengna menggunakan dd($user); akan menampilkan hasil jumlah pengguna dan menghentikan eksekusi program. dd() digunakan untuk debugging.


## Praktikum 2.4 – Retrieving or Creating Models
### Langkah 3
Menggunakan method firstOrCreate untuk mencari data berdasarkan atribut tertentu. Bila data ditemukan, maka data yang ada akan dikembalikan. Bila tidak ditemukan, data baru akan dibuat dan langsung disimpan ke database.
### Langkah 5
Jika data tidak ada, firstOrCreate(); akan membuat pengguna baru dengan atribut yang diberikan.
### Langkah 7
Jika data manager sudah ada, maka tidak perlu dibuat ulang
### Langkah 9
Perintah firstOrNew() akan membuat instance model tanpa menyimpannya ke database
### Langkah 11
Menambahkan $user->save(); untukmenyimpan data baru ke database jika belum ada.


## Praktikum 2.5 – Attribute Changes
### Langkah 2
Menggunakan method isDirty untuk mengecek apakah ada perubahan data pada model sejak pertama kali diambil dari database. Bila ada perubahan, maka akan mengembalikan true, Bila tidak, akan mengembalikan false.
### Langkah 4
Menggunakan method wasChanged untuk mengecek apakah ada perubahan data sejak terakhir kali disimpan. Bila ada perubahan, akan mengembalikan true, Bila tidak ada perubahan, akan mengembalikan false.


## Praktikum 2.6 – CRUD (Create, Read, Update, Delete)
### Langkah 3
Menggunakan method all untuk mengambil semua data dari tabel dan menampilkannya di halaman browser
### Langkah 7
Menggunakan form HTML untuk menambahkan data baru. Saat tombol "+ Tambah User" diklik, seharusnya form input muncul.
### Langkah 10
Menggunakan method create untuk menyimpan data yang dikirim dari form input ke dalam database.
### Langkah 14
Menggunakan method find untuk mengambil data yang akan diedit dan menampilkannya dalam form update.
### Langkah 17
Menggunakan method update untuk menyimpan perubahan data yang telah diedit
### Langkah 20
Menggunakan method delete untuk menghapus data berdasarkan ID yang diberikan.

## Praktikum 2.7 – Relationships
## Langaah 3
Menggunakan method hasOne untuk membuat relasi One-to-One antara dua model. Misal, model User memiliki satu Profile
### Langkah 6
Menggunakan method hasMany dan belongsTo untuk membuat relasi One-to-Many antara model induk dan model turunan. Misal, model Category memiliki banyak Product