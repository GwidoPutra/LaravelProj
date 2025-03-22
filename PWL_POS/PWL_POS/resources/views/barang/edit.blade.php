@extends('layouts.app')
 
 @section('content')

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Barang</h3>
            </div>

            <form method="post" action="../edit">
                @csrf <!-- {{ csrf_field() }} -->
         <div class="mb-3">
             <label for="kategori_id" class="form-label">ID Kategori</label>
             <input type="text" class="form-control" id="kategori_id" name="kategori_id" value="{{ $barang->kategori_id }}" required>
         </div>
         <div class="mb-3">
             <label for="barang_kode" class="form-label">Kode Barang</label>
             <input type="text" class="form-control" id="barang_kode" name="barang_kode" value="{{ $barang->barang_kode }}" required>
         </div>
         <div class="mb-3">
             <label for="barang_nama" class="form-label">Nama Barang</label>
             <input type="text" class="form-control" id="barang_nama" name="barang_nama" value="{{ $barang->barang_nama }}" required>
         </div>
         <div class="mb-3">
             <label for="harga_beli" class="form-label">Harga Beli</label>
             <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ $barang->harga_beli }}" required>
         </div>
         <div class="mb-3">
             <label for="harga_jual" class="form-label">Harga Jual</label>
             <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ $barang->harga_jual }}" required>
         </div>
         <button type="submit" class="btn btn-primary">Update</button>
         <a href="{{ url ('/barang') }}" class="btn btn-secondary">Kembali</a>
     </form>
 </div>
 @endsection