@extends('layouts.backend')

@section('title', 'Reset Password')

@section('content')
<div class="flex items-center justify-center h-full">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Change Your Password</h2>

        {{-- Show validation errors --}}
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-500 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.reset') }}">
            @csrf

            {{-- New Password --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-2">New Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green focus:border-green">
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green focus:border-green">
            </div>

            {{-- Submit --}}
            <button type="submit" 
                    class="w-full bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded transition mb-4">
                Update Password
            </button>
        </form>

        {{-- Back to Dashboard --}}
        <a href="{{ route('dashboard') }}" 
           class="block text-center text-green hover:text-green-dark font-semibold">
            &larr; Back to Dashboard
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Toastr notifications for success or error
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
@endpush