{{-- resources/views/pages/backend/dashboard.blade.php --}}

@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
   
    {{-- QUICK ACCESS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- SHA Chronic Illness Feedback VIEW ONLY --}}
        <a href="{{ route('chronic-illness-infos.index') }}"
           class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition border-l-4 border-green">

            <h2 class="text-xl font-bold text-gray-800 mb-2">
                SHA Chronic Illness Reports
            </h2>

            <p class="text-gray-600">
                View feedback submitted by teachers regarding chronic disease management and medication.
            </p>

            <div class="mt-4 text-green font-semibold">
                View Reports →
            </div>

        </a>

        {{-- SHA Reports VIEW ONLY --}}
        <a href="{{ route('facility_experience.index') }}"
           class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition border-l-4 border-green">

            <h2 class="text-xl font-bold text-gray-800 mb-2">
                SHA Facility Reports
            </h2>

            <p class="text-gray-600">
                View reports submitted by teachers on SHA health facility experiences.
            </p>

            <div class="mt-4 text-green font-semibold">
                View Reports →
            </div>

        </a>

    </div>
@endsection