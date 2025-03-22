@extends('layouts.app')

@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Edit')

@section('content')
<div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Level</h3>
            </div>

            <form method="post" action="../edit">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="level_id">ID Level</label>
                        <input type="text" name="level_id" class="form-control" value="{{ $level->level_id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kodeLevel">Kode Level</label>
                        <input type="text" name="kodeLevel" class="form-control" id="kodeLevel" value="{{ $level->level_kode }}">
                    </div>
                    <div class="form-group">
                        <label for="namaLevel">Nama Level</label>
                        <input type="text" name="namaLevel" class="form-control" id="namaLevel" value="{{ $level->level_nama }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
