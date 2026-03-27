@extends('layouts.backend')

@section('title', 'Agency Fee Payers - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-5xl">

        {{-- Heading with Download PDF Button --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-green">
                Agency Fee Payers
            </h2>

            {{-- Download PDF Button --}}
            <a href="{{ route('agency_payer.pdf') }}" 
               class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark transition">
               Download PDF
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300">
                <thead class="bg-green text-white">
                    <tr>
                        <th class="p-2 border">#</th>
                        <th class="p-2 border">Name</th>
                        <th class="p-2 border">Sub-County</th>
                        <th class="p-2 border">TSC No.</th>
                        <th class="p-2 border">Phone</th>
                        <th class="p-2 border">Submitted On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agencyPayers as $payer)
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 border">{{ $loop->iteration }}</td>
                            <td class="p-2 border">{{ $payer->full_name }}</td>
                            <td class="p-2 border">{{ $payer->subCounty->name ?? '-' }}</td>
                            <td class="p-2 border">{{ $payer->tsc_no }}</td>
                            <td class="p-2 border">{{ $payer->phone }}</td>
                            <td class="p-2 border">{{ $payer->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-2 border text-center">
                                No agency payers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $agencyPayers->links() }}
        </div>

    </div>
</section>
@endsection