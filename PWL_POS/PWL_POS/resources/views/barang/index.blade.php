@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Barang')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Barang')

@section('content')
    <div class="container">
        <div class="card">
                <div class="card-header">Manage Barang</div>
                <div class="card-body">
                    <a href="{{ route('barang.create') }}" class="btn btn-primary ">Add</a>
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
