@extends('layouts.frontend')

@section('title', 'BBF Membership Applications - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-6xl">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl md:text-3xl font-bold text-green">
                BBF Membership Applications
            </h2>

            {{-- DOWNLOAD PDF BUTTON --}}
            <a href="{{ route('bbf.applications.pending.pdf') }}"
               class="bg-green text-white px-4 py-2 rounded-lg shadow hover:bg-green-dark transition">

                Download PDF
            </a>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto bg-white shadow rounded-lg">

            <table class="min-w-full text-sm text-left">

                {{-- HEADER --}}
                <thead class="bg-green text-white uppercase text-xs">
                    <tr>
                        <th class="p-3">Applicant</th>
                        <th class="p-3">TSC No</th>
                        <th class="p-3">Sub County</th>
                        <th class="p-3">Category</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Date Submitted</th>
                        <th class="p-3 text-right">Action</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody class="divide-y">

                    @forelse($applications as $app)

                        <tr class="hover:bg-gray-light">

                            {{-- Applicant --}}
                            <td class="p-3 font-medium text-gray-dark">
                                {{ $app->full_name }}
                            </td>

                            {{-- TSC --}}
                            <td class="p-3 text-gray-dark">
                                {{ $app->tsc_number }}
                            </td>

                            {{-- Sub County --}}
                            <td class="p-3 text-gray-dark">
                                {{ $app->subCounty->name ?? 'N/A' }}
                            </td>

                            {{-- Category --}}
                            <td class="p-3 text-gray-dark">
                                {{ $app->category }}
                            </td>

                            {{-- STATUS --}}
                            <td class="p-3">
                                @if($app->status === 'Approved')
                                    <span class="px-2 py-1 text-xs bg-green text-white rounded">
                                        Approved
                                    </span>
                                @elseif($app->status === 'Rejected')
                                    <span class="px-2 py-1 text-xs bg-red text-white rounded">
                                        Rejected
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs bg-gold text-gray-dark rounded">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            {{-- DATE --}}
                            <td class="p-3 text-gray-dark">
                                {{ $app->created_at->format('d M y') }}
                            </td>

                            {{-- ACTION --}}
                            <td class="p-3 text-right">
                                <a href="{{ route('bbf.members.show', $app->id) }}"
                                   class="text-green font-semibold hover:underline">
                                    View
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="p-6 text-center text-gray">
                                No applications found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="mt-6">
            {{ $applications->links() }}
        </div>

    </div>
</section>
@endsection