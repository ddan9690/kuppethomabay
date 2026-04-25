@extends('layouts.backend')

@section('content')

<div class="p-6 bg-gray-light min-h-screen"
     x-data="bbfActions({{ $member->id }}, '{{ $member->status }}')">

    {{-- HEADER --}}
    <div class="bg-green text-white p-6 rounded-lg shadow mb-6">

        <h1 class="text-xl md:text-2xl font-bold uppercase tracking-wide">
            HOMABAY KUPPET BBF MEMBERSHIP APPLICATION
        </h1>

        <p class="text-sm opacity-90 mt-1">
            Applicant Verification & Approval Panel
        </p>

        <div class="mt-4 flex justify-between items-center">

            <div>
                <h2 class="text-lg font-semibold">
                    {{ $member->full_name }}
                </h2>
                <p class="text-sm opacity-90">
                    TSC No: {{ $member->tsc_number }}
                </p>
            </div>

            <span class="px-3 py-1 rounded-full text-sm font-semibold"
                  :class="statusClass">
                {{ $member->status }}
            </span>

        </div>
    </div>

    {{-- GRID --}}
    <div class="grid md:grid-cols-3 gap-6">

        {{-- LEFT --}}
        <div class="md:col-span-2 space-y-6">

            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-bold mb-3 border-b pb-2 text-gray-dark">
                    Personal & Employment Details
                </h3>

                <div class="grid md:grid-cols-2 gap-3 text-sm text-gray-dark">

                    <p><strong>Phone:</strong> {{ $member->phone_number }}</p>
                    <p><strong>Email:</strong> {{ $member->email ?? 'N/A' }}</p>
                    <p><strong>Gender:</strong> {{ $member->gender }}</p>
                    <p><strong>School:</strong> {{ $member->school_name }}</p>
                    <p><strong>Sub County:</strong> {{ $member->subCounty->name ?? 'N/A' }}</p>
                    <p><strong>Zone:</strong> {{ $member->zone }}</p>
                    <p><strong>Category:</strong> {{ $member->category }}</p>
                    <p><strong>Year Posting:</strong> {{ $member->year_posting }}</p>

                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-bold mb-3 border-b pb-2 text-gray-dark">
                    Family Details
                </h3>

                <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-dark">

                    <div>
                        <h4 class="font-semibold">Father</h4>
                        <p>{{ $member->father_name ?? 'N/A' }}</p>
                        <p>{{ $member->father_status ?? '' }}</p>
                    </div>

                    <div>
                        <h4 class="font-semibold">Mother</h4>
                        <p>{{ $member->mother_name ?? 'N/A' }}</p>
                        <p>{{ $member->mother_status ?? '' }}</p>
                    </div>

                </div>
            </div>

        </div>

        {{-- RIGHT --}}
        <div class="space-y-6">

            {{-- NEXT OF KIN --}}
            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-bold mb-3 border-b pb-2 text-gray-dark">
                    Next of Kin
                </h3>

                <p class="text-sm"><strong>Name:</strong> {{ $member->nok_full_name }}</p>
                <p class="text-sm"><strong>Relationship:</strong> {{ $member->nok_relationship }}</p>
                <p class="text-sm"><strong>Phone:</strong> {{ $member->nok_phone }}</p>
            </div>

            {{-- SPOUSES --}}
            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-bold mb-3 border-b pb-2 text-gray-dark">
                    Spouses
                </h3>

                @forelse($member->spouses as $spouse)
                    <div class="text-sm border-b py-2 text-gray-dark">
                        <p><strong>Name:</strong> {{ $spouse['full_name'] ?? '' }}</p>
                        <p><strong>ID:</strong> {{ $spouse['id_number'] ?? '' }}</p>
                        <p><strong>Phone:</strong> {{ $spouse['phone_number'] ?? '' }}</p>
                    </div>
                @empty
                    <p class="text-gray">No spouse data</p>
                @endforelse
            </div>

            {{-- CHILDREN --}}
            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-bold mb-3 border-b pb-2 text-gray-dark">
                    Children
                </h3>

                @forelse($member->children as $child)
                    <div class="text-sm border-b py-2 text-gray-dark">
                        <p><strong>Name:</strong> {{ $child['full_name'] ?? '' }}</p>
                        <p><strong>DOB:</strong> {{ $child['dob'] ?? '' }}</p>
                        <p><strong>Cert No:</strong> {{ $child['birth_cert_no'] ?? '' }}</p>
                    </div>
                @empty
                    <p class="text-gray">No children data</p>
                @endforelse
            </div>

        </div>
    </div>

    {{-- ACTIONS --}}
    <div class="mt-6 flex justify-end gap-3 bg-white p-4 rounded-lg shadow">

        <button
            @click="reject()"
            class="px-5 py-2 rounded-lg text-white font-semibold transition"
            :class="status !== 'Pending'
                ? 'bg-gray cursor-not-allowed'
                : 'bg-red hover:bg-red'"
            :disabled="status !== 'Pending'">

            Reject Application
        </button>

        <button
            @click="approve()"
            class="px-5 py-2 rounded-lg text-white font-semibold transition"
            :class="status !== 'Pending'
                ? 'bg-gray cursor-not-allowed'
                : 'bg-green hover:bg-green-dark'"
            :disabled="status !== 'Pending'">

            Approve Application
        </button>

    </div>

</div>

{{-- ALPINE + SWEETALERT --}}
<script>
function bbfActions(id, status) {
    return {
        id,
        status,

        get statusClass() {
            return {
                'Approved': 'bg-green text-white',
                'Rejected': 'bg-red text-white',
                'Pending': 'bg-gold text-gray-dark'
            }[this.status]
        },

        approve() {
            Swal.fire({
                title: 'Approve Application?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#008C45',
                cancelButtonColor: '#B0B0B0',
                confirmButtonText: 'Yes, Approve'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/bbf/members/${this.id}/approve`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.status = 'Approved';
                        Swal.fire('Approved!', data.message, 'success');
                    });
                }
            });
        },

        reject() {
            Swal.fire({
                title: 'Reject Application?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#E63946',
                cancelButtonColor: '#B0B0B0',
                confirmButtonText: 'Yes, Reject'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/bbf/members/${this.id}/reject`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.status = 'Rejected';
                        Swal.fire('Rejected!', data.message, 'success');
                    });
                }
            });
        }
    }
}
</script>

@endsection