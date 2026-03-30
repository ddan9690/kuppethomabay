@extends('layouts.backend')

@section('title', 'Sub-County BBF Reps - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-5xl">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-green">
                Sub-County BBF Reps
            </h2>

            <a href="{{ route('sub_county_bbf_reps.add') }}" 
               class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark transition">
               Add New Sub-County BBF Rep
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300">
                <thead class="bg-green text-white">
                    <tr>
                        <th class="p-2 border">#</th>
                        <th class="p-2 border">Name</th>
                        <th class="p-2 border">Sub-County</th>
                        <th class="p-2 border">Phone</th>
                        <th class="p-2 border">TSC No.</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Appointed On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reps as $rep)
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 border">{{ $loop->iteration }}</td>
                            <td class="p-2 border">{{ $rep->user->name ?? '-' }}</td>
                            <td class="p-2 border">{{ $rep->subCounty->name ?? '-' }}</td>
                            <td class="p-2 border">{{ $rep->user->phone ?? '-' }}</td>
                            <td class="p-2 border">{{ $rep->user->tsc_no ?? '-' }}</td>
                            <td class="p-2 border">{{ ucfirst($rep->status) }}</td>
                            <td class="p-2 border">{{ $rep->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-2 border text-center">
                                No sub-county BBF reps found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $reps->links() }}
        </div>

    </div>
</section>
@endsection