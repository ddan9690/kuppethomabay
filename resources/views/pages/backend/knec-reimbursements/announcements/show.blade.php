@extends('layouts.backend')

@section('title', $announcement->title . ' - Applications - KUPPET Homabay')

@section('content')
    <section class="bg-white py-6">
        <div class="container mx-auto px-2 sm:px-4 max-w-full">

            <!-- Top Navigation / Back Link -->
            <div class="mb-4">
                <a href="{{ route('admin.knec-reimbursements.index') }}"
                    class="text-xs text-green hover:underline inline-block">
                    &larr; Back to Announcements
                </a>
            </div>

            <!-- Header Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="bg-green-100 text-green-700 text-xs px-2.5 py-0.5 rounded font-bold">
                            Year: {{ $announcement->year }}
                        </span>
                        <span class="bg-indigo-100 text-indigo-700 text-xs px-2.5 py-0.5 rounded font-bold">
                            Level: {{ ucwords(str_replace('_', ' ', $announcement->level)) }}
                        </span>
                        <span
                            class="px-2.5 py-0.5 rounded text-xs font-semibold {{ $announcement->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            Status: {{ ucfirst($announcement->status) }}
                        </span>
                    </div>
                    <h2 class="text-lg md:text-xl font-bold text-green">
                        {{ $announcement->title }}
                    </h2>
                    <p class="text-xs text-gray-500 mt-1">
                        Total Applications Received: <span
                            class="font-bold text-gray-700">{{ $applications->total() }}</span>
                    </p>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('knec-reimbursements.pdf', $announcement->id) }}"
                        class="bg-gold text-white text-xs px-3 py-1.5 rounded hover:bg-gold-dark transition font-semibold">
                        Download PDF
                    </a>
                    <a href="{{ route('admin.knec-reimbursements.edit', [$announcement->id, $announcement->slug]) }}"
                        class="bg-green text-white text-xs px-3 py-1.5 rounded hover:bg-green-dark transition font-semibold">
                        Edit Portal
                    </a>
                </div>
            </div>

            <!-- Applications Table Section -->
            <div class="mb-3 flex justify-between items-center">
                <h3 class="text-base font-bold text-gray-800">Submitted Applications</h3>
            </div>

            <!-- Compact Table with No Text Wrapping, No Bolds, and M/F Gender -->
            <div class="bg-white border border-gray-300 rounded shadow-sm overflow-x-auto">
                <table class="w-full text-[11px] sm:text-xs table-auto border-collapse">
                    <thead class="bg-green text-white uppercase tracking-wider">
                        <tr>
                            <th class="p-1.5 border text-center whitespace-nowrap">#</th>
                            <th class="p-1.5 border text-left whitespace-nowrap">Name</th>
                            <th class="p-1.5 border text-center whitespace-nowrap">Gender</th>
                            <th class="p-1.5 border text-center whitespace-nowrap">PWD</th>
                            <th class="p-1.5 border text-center whitespace-nowrap">ID No.</th>
                            <th class="p-1.5 border text-center whitespace-nowrap">TSC No.</th>
                            <th class="p-1.5 border text-center whitespace-nowrap">Phone</th>
                            <th class="p-1.5 border text-left whitespace-nowrap">Sub County</th>
                            <th class="p-1.5 border text-left whitespace-nowrap">Zone</th>
                            <th class="p-1.5 border text-left whitespace-nowrap">School</th>
                            <th class="p-1.5 border text-left whitespace-nowrap">Subject/Paper</th>
                            <th class="p-1.5 border text-center whitespace-nowrap">Date of Training</th>
                            <th class="p-1.5 border text-center whitespace-nowrap">Date Applied</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($applications as $index => $app)
                            <tr class="hover:bg-gray-50">
                                <td class="p-1.5 border text-center text-gray-600 whitespace-nowrap">
                                    {{ $applications->firstItem() + $index }}
                                </td>
                                <td class="p-1.5 border text-gray-800 whitespace-nowrap">
                                    {{ $app->full_name }}
                                </td>
                                <td class="p-1.5 border text-center text-gray-800 whitespace-nowrap">
                                    {{ str_starts_with(strtoupper($app->gender), 'F') ? 'F' : 'M' }}
                                </td>
                                <td class="p-1.5 border text-center text-gray-800 whitespace-nowrap">
                                    {{ $app->pwd ? 'Yes' : '-' }}
                                </td>
                                <td class="p-1.5 border text-center font-mono text-gray-800 whitespace-nowrap">
                                    {{ $app->id_number }}
                                </td>
                                <td class="p-1.5 border text-center font-mono text-gray-800 whitespace-nowrap">
                                    {{ $app->tsc_number }}
                                </td>
                                <td class="p-1.5 border text-center text-gray-800 whitespace-nowrap">
                                    {{ $app->phone_number }}
                                </td>
                                <td class="p-1.5 border text-gray-800 whitespace-nowrap">
                                    {{ optional($app->subCounty)->name }}
                                </td>
                                <td class="p-1.5 border text-gray-800 whitespace-nowrap">
                                    {{ $app->zone }}
                                </td>
                                <td class="p-1.5 border text-gray-800 whitespace-nowrap">
                                    {{ $app->school }}
                                </td>
                                <td class="p-1.5 border text-gray-800 whitespace-nowrap">
                                    {{ $app->subject }} ({{ $app->paper }})
                                </td>
                                <td class="p-1.5 border text-center text-gray-800 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($app->date_of_training)->format('d/m/Y') }}
                                </td>
                                <td class="p-1.5 border text-center text-gray-800 whitespace-nowrap">
                                    {{ $app->created_at->format('d/m/y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="p-6 text-center text-gray-500">
                                    No applications have been submitted for this reimbursement portal yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $applications->links() }}
            </div>

        </div>
    </section>
@endsection