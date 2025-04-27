@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        </div>

        <div class="row">
            @foreach ($infoBoxes as $box)
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-{{ $box['color'] }}">
                        <div class="inner">
                            <h3>{{ $box['count'] }}</h3>
                            <p>{{ $box['title'] }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas {{ $box['icon'] }}"></i>
                        </div>
                        <a href="{{ $box['url'] }}" class="small-box-footer">
                            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection