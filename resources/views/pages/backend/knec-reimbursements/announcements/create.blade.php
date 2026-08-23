@extends('layouts.backend')

@section('title', 'Create Reimbursement Portal - KUPPET Homabay')

@section('content')
<section class="bg-white py-6">
    <div class="container mx-auto px-4 max-w-2xl">
        <h2 class="text-xl md:text-2xl font-bold text-green mb-4">
            Create KNEC Reimbursement Portal
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-xs">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.knec-reimbursements.store') }}" method="POST" class="space-y-4 text-sm">
            @csrf

            <div>
                <label class="block font-medium mb-1">Announcement Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. 2026 Senior School KNEC Examiner Reimbursement" class="border rounded p-2 w-full focus:ring-2 focus:ring-green">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Year</label>
                    <input type="number" name="year" value="{{ old('year', date('Y')) }}" required class="border rounded p-2 w-full focus:ring-2 focus:ring-green">
                </div>
                <div>
                    <label class="block font-medium mb-1">Educational Level</label>
                    <select name="level" required class="border rounded p-2 w-full focus:ring-2 focus:ring-green">
                        <option value="senior_school" {{ old('level') == 'senior_school' ? 'selected' : '' }}>Senior School</option>
                        <option value="junior_school" {{ old('level') == 'junior_school' ? 'selected' : '' }}>Junior School</option>
                        <option value="primary" {{ old('level') == 'primary' ? 'selected' : '' }}>Primary School</option>
                        <option value="tertiary" {{ old('level') == 'tertiary' ? 'selected' : '' }}>Tertiary</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Announced On Date</label>
                    <input type="date" name="announced_on" value="{{ old('announced_on', date('Y-m-d')) }}" class="border rounded p-2 w-full focus:ring-2 focus:ring-green">
                </div>
                <div>
                    <label class="block font-medium mb-1">Initial Status</label>
                    <select name="status" required class="border rounded p-2 w-full focus:ring-2 focus:ring-green">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" class="rounded text-green focus:ring-green" {{ old('is_active') ? 'checked' : '' }}>
                <label for="is_active" class="font-medium">Set as Active Portal (Frontend visible)</label>
            </div>

            <div class="flex gap-2 pt-4">
                <button type="submit" class="bg-green text-white px-6 py-2 rounded hover:bg-green-dark transition">Save Portal</button>
                <a href="{{ route('admin.knec-reimbursements.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection