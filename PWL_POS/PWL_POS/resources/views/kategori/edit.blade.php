@extends('layouts.app')

@section('subtitle','Kategori')
@section('content_header_title','Kategori')
@section('content_header_subtitle','Edit')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
            </div>

            <form method="post" action="../edit">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="Kategori_id">ID Kategori</label>
                        <input type="text" name="kategori_id" class="form-control" value="{{ $kategori->kategori_id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" name="kodeKategori" class="form-control" id="kodeKategori" value="{{ $kategori->kategori_kode }}">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" class="form-control" id="namaKategori" value="{{ $kategori->kategori_nama }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection