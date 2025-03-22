@extends('layouts.app')

@section('subtitle', 'Barang')
@section('content_header_title', 'Barang')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Barang Baru</h3>
            </div>
            <form method="POST" action="{{ route('barang.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori_id">ID Kategori</label>
                        <input type="text" class="form-control" id="kategori_id" name="kategori_id" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="barang_kode">Kode Barang</label>
                        <input type="text" class="form-control" id="barang_kode" name="barang_kode" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="barang_nama">Nama Barang</label>
                        <input type="text" class="form-control" id="barang_nama" name="barang_nama" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection