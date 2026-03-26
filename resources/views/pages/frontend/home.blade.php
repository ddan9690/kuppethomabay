@extends('layouts.frontend')

@section('title', 'Welcome to KUPPET Homabay Branch')

@section('content')

    {{-- Hero Section --}}
    @include('partials.frontend.hero')

    {{-- About Section --}}
    @include('partials.frontend.about')

    {{-- News Section --}}
    @include('partials.frontend.news')

    {{-- Call-to-Action Section --}}
    @include('partials.frontend.cta')

    {{-- Contact Section --}}
    @include('partials.frontend.contact')

@endsection