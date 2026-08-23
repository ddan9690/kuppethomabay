@extends('layouts.backend')

@section('title', 'KNEC Examiner Reimbursements - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-6">
    <div class="container mx-auto px-2 sm:px-4 max-w-7xl">

        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-4">
            <h2 class="text-xl md:text-2xl font-bold text-green">
                KNEC Examiner Reimbursements
            </h2>

            <div class="flex items-center gap-2">
                {{-- Year Filter Form --}}
                <form method="GET" action="{{ route('admin.knec-reimbursements.index') }}" class="flex items-center gap-2">
                    <select name="year" onchange="this.form.submit()" class="border border-gray-300 rounded p-1.5 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-green">
                        @foreach($availableYears as $year)
                            <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                Year: {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <a href="{{ route('admin.knec-reimbursements.pdf', ['year' => $selectedYear]) }}" 
                   class="bg-blue-600 text-white text-xs sm:text-sm px-3 py-2 rounded hover:bg-blue-700 transition">
                    Download PDF
                </a>
            </div>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 text-xs sm:text-sm rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-x-auto">
            <table class="w-full text-xs sm:text-sm table-auto border border-gray-300">

                <thead class="bg-green text-white">
                    <tr>
                        <th class="p-1.5 sm:p-2 border text-center">#</th>
                        <th class="p-1.5 sm:p-2 border text-left">Full Name</th>
                        <th class="p-1.5 sm:p-2 border text-left">ID Number</th>
                        <th class="p-1.5 sm:p-2 border text-left">TSC Number</th>
                        <th class="p-1.5 sm:p-2 border text-left">Phone</th>
                        <th class="p-1.5 sm:p-2 border text-left">Sub-County</th>
                        <th class="p-1.5 sm:p-2 border text-left">School</th>
                        <th class="p-1.5 sm:p-2 border text-center">Status</th>
                        <th class="p-1.5 sm:p-2 border text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($applications as $app)
                        <tr class="hover:bg-gray-50">

                            <!-- pagination-safe numbering -->
                            <td class="p-1.5 sm:p-2 border text-center">
                                {{ $applications->firstItem() + $loop->index }}
                            </td>

                            <td class="p-1.5 sm:p-2 border font-medium">
                                {{ $app->full_name }}
                            </td>

                            <td class="p-1.5 sm:p-2 border">
                                {{ $app->id_number }}
                            </td>

                            <td class="p-1.5 sm:p-2 border">
                                {{ $app->tsc_number }}
                            </td>

                            <td class="p-1.5 sm:p-2 border">
                                {{ $app->phone }}
                            </td>

                            <td class="p-1.5 sm:p-2 border">
                                {{ $app->subCounty->name ?? '-' }}
                            </td>

                            <td class="p-1.5 sm:p-2 border">
                                {{ $app->school }}
                            </td>

                            <td class="p-1.5 sm:p-2 border text-center">
                                <span class="px-2 py-0.5 text-xs rounded font-semibold {{ $app->status === 'open' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($app->status) }}
                                </span>
                            </td>

                            <td class="p-1.5 sm:p-2 border text-center space-x-1 whitespace-nowrap">
                                <a href="{{ route('admin.knec-reimbursements.show', $app->id) }}" class="bg-gray-700 text-white px-2 py-1 rounded hover:bg-gray-800 transition text-xs font-semibold">
                                    View
                                </a>
                                <a href="{{ route('admin.knec-reimbursements.edit', $app->id) }}" class="bg-green text-white px-2 py-1 rounded hover:bg-green-dark transition text-xs font-semibold">
                                    Edit
                                </a>
                                <form action="{{ route('admin.knec-reimbursements.destroy', $app->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this application?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 transition text-xs font-semibold">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="p-4 text-center text-gray-dark text-xs sm:text-sm">
                                No KNEC examiner reimbursement applications found for year {{ $selectedYear }}.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="mt-4 text-xs sm:text-sm">
            {{ $applications->appends(['year' => $selectedYear])->links() }}
        </div> --}}

    </div>
</section>
@endsection