@extends('layouts.backend')

@section('title', 'Youthful Teachers Database 2026 - KUPPET Homabay')

@section('content')
<section class="bg-white py-6">
    <div class="container mx-auto px-2">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4 px-2">
            <h2 class="text-lg font-bold text-green-700">Database Records ({{ $teachers->total() }})</h2>
            
            {{-- Updated Export Link --}}
            <a href="{{ route('youthful-teachers.pdf') }}" 
               class="bg-green hover:bg-green-dark text-white text-[10px] px-3 py-2 rounded shadow transition">
                Export to PDF
            </a>
        </div>

        {{-- Comprehensive Table --}}
        <div class="overflow-x-auto border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200 text-[10px]">
                <thead class="bg-gray-50">
                    <tr class="text-[9px] uppercase">
                        <th class="px-2 py-2 text-left">Reg Date</th>
                        <th class="px-2 py-2 text-left whitespace-nowrap">Name</th>
                        <th class="px-2 py-2 text-left">TSC No</th>
                        <th class="px-2 py-2 text-left">Email</th>
                        <th class="px-2 py-2 text-left">Phone</th>
                        <th class="px-2 py-2 text-left">Sub-County</th>
                        <th class="px-2 py-2 text-left whitespace-nowrap">Age</th>
                        <th class="px-2 py-2 text-left">Level</th>
                        <th class="px-2 py-2 text-left">Subjects</th>
                        <th class="px-2 py-2 text-left">Status</th>
                        <th class="px-2 py-2 text-left">Service Yrs</th>
                        <th class="px-2 py-2 text-left">Activities</th>
                        <th class="px-2 py-2 text-left">Trainings</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($teachers as $teacher)
                        <tr class="hover:bg-gray-50">
                            <td class="px-2 py-2 whitespace-nowrap">{{ $teacher->created_at->format('d M y') }}</td>
                            <td class="px-2 py-2 font-bold whitespace-nowrap">{{ $teacher->full_name }}</td>
                            <td class="px-2 py-2 whitespace-nowrap">{{ $teacher->tsc_number }}</td>
                            <td class="px-2 py-2">{{ $teacher->email }}</td>
                            <td class="px-2 py-2 whitespace-nowrap">{{ $teacher->phone_number }}</td>
                            <td class="px-2 py-2 whitespace-nowrap">{{ $teacher->subCounty->name ?? 'N/A' }}</td>
                            <td class="px-2 py-2 whitespace-nowrap">{{ $teacher->age_bracket }}</td>
                            <td class="px-2 py-2 whitespace-nowrap">{{ $teacher->teaching_level }}</td>
                            <td class="px-2 py-2 whitespace-nowrap">{{ $teacher->teaching_subject_1 }}/{{ $teacher->teaching_subject_2 }}</td>
                            <td class="px-2 py-2 whitespace-nowrap">
                                {{ $teacher->employment_status === 'Permanent and Pensionable' ? 'PnP' : $teacher->employment_status }}
                            </td>
                            <td class="px-2 py-2 whitespace-nowrap">{{ $teacher->years_in_service }}</td>
                            <td class="px-2 py-2">
                                {{ $teacher->interested_activities ? implode(', ', $teacher->interested_activities) : '-' }}
                            </td>
                            <td class="px-2 py-2">
                                {{ $teacher->beneficial_trainings ? implode(', ', $teacher->beneficial_trainings) : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center py-4 text-gray-500">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $teachers->links() }}
        </div>

    </div>
</section>
@endsection