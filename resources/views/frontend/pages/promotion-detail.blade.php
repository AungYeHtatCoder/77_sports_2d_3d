@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')

{{-- content --}}
<div style="margin-top:90px;">
    <img src="{{ $promotion->img_url }}" class="w-100 rounded border border-1 border-purple shadow" alt="">
    <div class="mt-4">
        <h5>{{ $promotion->title }}</h5>
        <p>{!! $promotion->description !!}</p>
    </div>
</div>


{{-- content --}}

@include('user_layouts.footer')
@endsection

@section('script')

@endsection

