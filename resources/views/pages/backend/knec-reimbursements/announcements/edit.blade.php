@extends('layouts.backend')

@section('title', 'Edit Reimbursement Portal - KUPPET Homabay')

@section('content')
<section class="bg-white py-6">
    <div class="container mx-auto px-4 max-w-2xl">
        <h2 class="text-xl md:text-2xl font-bold text-green mb-4">
            Edit KNEC Reimbursement Portal
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

        <form action="{{ route('admin.knec-reimbursements.update', [$announcement->id, $announcement->slug]) }}" method="POST" class="space-y-4 text-sm">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium mb-1">Announcement Title</label>
                <input type="text" name="title" value="{{ old('title', $announcement->title) }}" required class="border rounded p-2 w-full focus:ring-2 focus:ring-green">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Year</label>
                    <input type="number" value="{{ $announcement->year }}" disabled class="border rounded p-2 w-full bg-gray-100 text-gray-600 cursor-not-allowed">
                    <input type="hidden" name="year" value="{{ $announcement->year }}">
                </div>
                <div>
                    <label class="block font-medium mb-1">Level</label>
                    <select disabled class="border rounded p-2 w-full bg-gray-100 text-gray-600 cursor-not-allowed">
                        <option value="senior_school" {{ $announcement->level == 'senior_school' ? 'selected' : '' }}>Senior School</option>
                        <option value="junior_school" {{ $announcement->level == 'junior_school' ? 'selected' : '' }}>Junior School</option>
                        <option value="primary" {{ $announcement->level == 'primary' ? 'selected' : '' }}>Primary School</option>
                        <option value="tertiary" {{ $announcement->level == 'tertiary' ? 'selected' : '' }}>Tertiary</option>
                    </select>
                    <input type="hidden" name="level" value="{{ $announcement->level }}">
                </div>
            </div>

            <div>
                <label class="block font-medium mb-1">Status</label>
                <select name="status" required class="border rounded p-2 w-full focus:ring-2 focus:ring-green">
                    <option value="open" {{ old('status', $announcement->status) == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ old('status', $announcement->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <div class="flex gap-2 pt-4">
                <button type="submit" class="bg-green text-white px-6 py-2 rounded hover:bg-green-dark transition">Update Portal</button>
                <a href="{{ route('admin.knec-reimbursements.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection