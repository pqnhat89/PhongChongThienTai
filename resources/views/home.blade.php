@extends('layouts.app')

@section('content')

{{-- Carousel --}}
@component('component.carousel')@endcomponent

{{-- Post slider --}}
@component('component.post-carousel')@endcomponent

{{-- Team --}}
@component('component.team')@endcomponent

@endsection
