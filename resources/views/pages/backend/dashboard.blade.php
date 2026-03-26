{{-- resources/views/pages/backend/dashboard.blade.php --}}

@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-3xl font-bold text-green mb-2">
            Welcome, {{ auth()->user()->name }}!
        </h1>
        <p class="text-gray-700 text-lg">
            You are now logged in to the KUPPET Homa Bay Branch Dashboard.
        </p>
    </div>
@endsection