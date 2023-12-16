@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')

{{-- content --}}
<div style="margin-top:90px;">
    @foreach ($promotions as $promotion)
    <a href="{{ url('/promotion-detail/'.$promotion->id) }}" class="border-purple rounded-3 d-block text-decoration-none mb-3 py-3">
        <div class="d-flex justify-content-between">
            <div class="mx-3">
                <img class="rounded w-sm-100 m-auto d-block" src="{{ $promotion->img_url }}" width="90px" alt="">
            </div>
            <div class="mx-3">
                {{-- <h6 class="text-warning"></h6> --}}
                <p>
                    {{ $promotion->title }}
                </p>
            </div>
        </div>
    </a>
    @endforeach
</div>


{{-- content --}}

@include('user_layouts.footer')
@endsection

@section('script')

@endsection

