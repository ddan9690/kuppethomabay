@extends('layouts.frontend')

@section('title', 'Report SHA Health Facility Challenges for Teachers in Homa Bay | KUPPET Homabay')

@section('content')
<section class="bg-white py-10" x-data="facilityForm()">

    <div class="container mx-auto px-4 max-w-3xl">

        {{-- Heading --}}
        <h2 class="text-2xl md:text-3xl font-bold text-green mb-4 text-center">
            Health Facility Experience Report
        </h2>

        {{-- Intro --}}
        <p class="mb-4 text-gray-700 text-center">
            We recognize that the SHA scheme continues to present challenges to teachers across Homa Bay County.
        </p>

        <p class="mb-6 text-gray-700 text-center">
            Please share your experience to help the office follow up on SHA-related issues.
        </p>

        {{-- FORM --}}
        <form @submit.prevent="submitForm" class="space-y-5">

            @csrf

            {{-- Sub County --}}
            <div>
                <label class="block font-medium mb-2 text-gray-700">Sub-County</label>
                <select x-model="form.sub_county_id"
                        class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-green">
                    <option value="">-- Select Sub-County --</option>
                    @foreach ($subCounties as $subCounty)
                        <option value="{{ $subCounty->id }}">{{ $subCounty->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Facility Name --}}
            <div>
                <label class="block font-medium mb-2 text-gray-700">Health Facility Name</label>
                <input type="text" x-model="form.facility_name"
                    placeholder="Enter health facility name"
                    class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-green">
            </div>

            {{-- Details --}}
            <div>
                <label class="block font-medium mb-2 text-gray-700">Experience Details</label>
                <textarea rows="6" x-model="form.details"
                    placeholder="Describe your experience..."
                    class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-green"></textarea>
            </div>

            {{-- Submit --}}
            <div class="text-center">
                <button type="submit"
                    :disabled="submitting"
                    class="bg-green hover:bg-green-dark text-white px-6 py-3 rounded font-semibold transition disabled:opacity-50">

                    <span x-text="submitting ? 'Submitting...' : 'Submit Report'"></span>

                </button>
            </div>

        </form>
    </div>

{{-- SCRIPT --}}
<script>
function facilityForm() {
    return {
        submitting: false,

        form: {
            sub_county_id: '',
            facility_name: '',
            details: ''
        },

        submitForm() {
            this.submitting = true;

            fetch("{{ route('facility_experience.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(this.form)
            })
            .then(async response => {
                const data = await response.json();
                this.submitting = false;

                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Report Submitted',
                        text: data.success || 'Your report has been submitted successfully.'
                    }).then(() => {
                        window.location.href = '/';
                    });

                    // reset form
                    this.form.sub_county_id = '';
                    this.form.facility_name = '';
                    this.form.details = '';

                } else {
                    let errors = data.errors || {};
                    let messages = Object.values(errors).flat().join('\n');

                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: messages || 'Please check your input.'
                    });
                }
            })
            .catch(() => {
                this.submitting = false;

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });
            });
        }
    }
}
</script>

</section>
@endsection