@extends('layouts.frontend')

@section('title', 'Collection of Teachers Medical Scheme Issues - Chronic Disease Management & Medication | KUPPET Homa-Bay')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">
        
        <h2 class="text-2xl md:text-3xl font-bold text-green mb-4 border-b pb-4">
            Collection of Teachers Medical Scheme Issues: Chronic Disease Management & Medication
        </h2>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 mb-6 text-gray-700 space-y-3 text-sm md:text-base leading-relaxed">
            <p>
                KUPPET Homa-Bay Branch is in the process of collecting critical data regarding challenges teachers encounter when accessing chronic illness-related services, disease management support, and essential medications under the current medical scheme / Social Health Authority (SHA).
            </p>
            <p>
                The information provided through this initiative will remain strictly anonymous and will be instrumental in helping the union follow up, engage relevant stakeholders, and systematically address persistent issues related to chronic illness care among our teachers.
            </p>
        </div>

        <form action="{{ route('chronic-illness-infos.store') }}" 
              method="POST" 
              x-data="{ submitting: false }" 
              x-on:submit="submitting = true" 
              class="space-y-6">
            @csrf

            {{-- Sub-County --}}
            <div>
                <label class="block font-bold mb-2 text-sm">Sub-County <span class="text-red-500">*</span></label>
                <select name="sub_county_id" class="border p-2 w-full rounded focus:ring focus:ring-green-300" required>
                    <option value="">Select Sub-County</option>
                    @foreach($subCounties as $sc)
                        <option value="{{ $sc->id }}">{{ $sc->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Affected Party --}}
            <div>
                <label class="block font-bold mb-2 text-sm">Who is affected? <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <label class="border p-3 rounded flex items-center gap-2 cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="affected_party" value="Self" required class="text-green focus:ring-green"> Self (Teacher)
                    </label>
                    <label class="border p-3 rounded flex items-center gap-2 cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="affected_party" value="Dependant" class="text-green focus:ring-green"> Dependant
                    </label>
                    <label class="border p-3 rounded flex items-center gap-2 cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="affected_party" value="Both" class="text-green focus:ring-green"> Both Self & Dependant
                    </label>
                </div>
            </div>

            {{-- Experience Description --}}
            <div>
                <label class="block font-bold mb-2 text-sm">Detailed Experience / Challenges Faced <span class="text-red-500">*</span></label>
                <textarea name="experience_description" 
                          rows="5" 
                          placeholder="Describe your challenges accessing chronic illness medications, approvals, facility turnaround times, or coverage limitations under the medical scheme..." 
                          class="border p-3 w-full rounded focus:ring focus:ring-green-300" 
                          required></textarea>
                <p class="text-xs text-gray-500 mt-1">Please be as descriptive as possible to assist the union in effective advocacy.</p>
            </div>

            {{-- Submit Button --}}
            <button type="submit" 
                    class="bg-green hover:bg-green-dark text-white w-full py-4 rounded font-bold text-lg transition shadow-md disabled:opacity-50 disabled:cursor-not-allowed" 
                    x-bind:disabled="submitting" 
                    x-text="submitting ? 'Submitting...' : 'Submit Feedback'">
            </button>

            {{-- Bottom Assurance Note --}}
            <p class="text-xs italic text-green text-center pt-2">
                Please note that all details submitted here are treated with utmost confidentiality and will be used solely by KUPPET Homa-Bay Branch for targeted welfare advocacy and service improvement.
            </p>
        </form>
    </div>
</section>

{{-- SweetAlert Script with Auto-Redirect --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        @if(session('swal_success') || session('swal_info'))
            Swal.fire({
                icon: '{{ session('swal_success') ? 'success' : 'info' }}',
                title: '{{ session('swal_success') ? 'Feedback Received' : 'Notice' }}',
                text: '{{ session('swal_success') ?? session('swal_info') }}',
                confirmButtonColor: '#059669',
                allowOutsideClick: false,
                footer: '<div style="font-size: 0.8em; color: #666;">KUPPET Homa-Bay Branch • Welfare & Medical Advocacy Desk</div>'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/';
                }
            });
        @endif
    });
</script>
@endsection