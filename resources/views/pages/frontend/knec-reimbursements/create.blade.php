@extends('layouts.frontend')

@section('title', 'Apply for ' . $announcement->title . ' - KUPPET Homabay')

@section('content')
<section class="bg-white py-8">
    <div class="container mx-auto px-4 max-w-3xl" 
         x-data="{ 
            loading: false, 
            errors: {}, 
            submitForm(e) {
                let form = e.target;

                // Step 1: Prompt user for confirmation before submitting
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Please review your details carefully before submitting your reimbursement application.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#16a34a',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit Application',
                    cancelButtonText: 'Review Again'
                }).then((result) => {
                    // Step 2: Proceed only if the user confirms
                    if (result.isConfirmed) {
                        this.loading = true;
                        this.errors = {};
                        
                        let formData = new FormData(form);

                        fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=&quot;csrf-token&quot;]').getAttribute('content')
                            },
                            body: formData
                        })
                        .then(response => {
                            return response.json().then(data => ({
                                status: response.status,
                                body: data
                            }));
                        })
                        .then(res => {
                            this.loading = false;
                            if (res.status === 200 || res.status === 201) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Application Submitted!',
                                    text: res.body.message || 'Your reimbursement application has been successfully submitted.',
                                    confirmButtonColor: '#16a34a'
                                }).then(() => {
                                    if(res.body.redirect) {
                                        window.location.href = res.body.redirect;
                                    } else {
                                        form.reset();
                                    }
                                });
                            } else if (res.status === 422) {
                                this.errors = res.body.errors || {};
                                
                                let errorMessage = res.body.message || 'Please check the form for required fields or errors and try again.';

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Notice',
                                    text: errorMessage,
                                    confirmButtonColor: '#16a34a'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: res.body.message || 'Something went wrong. Please try again later.',
                                    confirmButtonColor: '#16a34a'
                                });
                            }
                        })
                        .catch(error => {
                            this.loading = false;
                            Swal.fire({
                                icon: 'error',
                                title: 'Network Error',
                                text: 'Unable to connect to the server. Check your connection and try again.',
                                confirmButtonColor: '#16a34a'
                            });
                        });
                    }
                });
            }
         }">

        <div class="mb-6">
            <a href="{{ route('knec-reimbursements.index') }}" class="text-xs text-green hover:underline mb-1 inline-block">
                &larr; Back to Open Portals
            </a>
            <h2 class="text-xl md:text-2xl font-bold text-green">
                {{ $announcement->title }}
            </h2>
            <p class="text-xs text-gray-500 mt-1">
                Fill in all required details accurately to submit your reimbursement application.
            </p>
        </div>

        <form @submit.prevent="submitForm" action="{{ route('knec-reimbursements.store', [$announcement->id, $announcement->slug]) }}" method="POST" class="bg-gray-50 border border-gray-200 rounded-lg p-6 space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Full Name -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Full Name *</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" required 
                           class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 focus:ring-green focus:border-green">
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Gender *</label>
                    <select name="gender" required class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 bg-white focus:ring-green focus:border-green">
                        <option value="">-- Select Gender --</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- ID Number -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">ID Number *</label>
                    <input type="text" name="id_number" value="{{ old('id_number') }}" required 
                           class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 focus:ring-green focus:border-green">
                </div>

                <!-- TSC Number -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">TSC Number *</label>
                    <input type="text" name="tsc_number" value="{{ old('tsc_number') }}" required 
                           class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 focus:ring-green focus:border-green">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Phone Number -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Phone Number *</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" required 
                           class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 focus:ring-green focus:border-green">
                </div>

                <!-- School Level -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">School Level *</label>
                    <select name="level" required class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 bg-white focus:ring-green focus:border-green">
                        <option value="">-- Select School Level --</option>
                        <option value="Primary" {{ old('level') == 'Primary' ? 'selected' : '' }}>Primary</option>
                        <option value="Junior School" {{ old('level') == 'Junior School' ? 'selected' : '' }}>Junior School</option>
                        <option value="Senior School" {{ old('level') == 'Senior School' ? 'selected' : '' }}>Senior School</option>
                        <option value="Tertiary" {{ old('level') == 'Tertiary' ? 'selected' : '' }}>Tertiary</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Sub County -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Sub County *</label>
                    <select name="sub_county_id" required class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 bg-white focus:ring-green focus:border-green">
                        <option value="">-- Select Sub County --</option>
                        @foreach($subCounties as $subCounty)
                            <option value="{{ $subCounty->id }}" {{ old('sub_county_id') == $subCounty->id ? 'selected' : '' }}>
                                {{ $subCounty->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- School -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">School *</label>
                    <input type="text" name="school" value="{{ old('school') }}" required 
                           class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 focus:ring-green focus:border-green">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Date of Training -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Date of Training *</label>
                    <input type="date" name="date_of_training" value="{{ old('date_of_training') }}" required 
                           class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 focus:ring-green focus:border-green">
                </div>

                <!-- Training Center -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Training Center *</label>
                    <input type="text" name="training_center" value="{{ old('training_center') }}" required 
                           class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 focus:ring-green focus:border-green">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Subject with Categories -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Subject / Learning Area *</label>
                    <select name="subject" required class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 bg-white focus:ring-green focus:border-green">
                        <option value="">-- Select Subject / Learning Area --</option>
                        
                        <optgroup label="KCSE Subjects">
                            <option value="Agriculture" {{ old('subject') == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                            <option value="Arabic" {{ old('subject') == 'Arabic' ? 'selected' : '' }}>Arabic</option>
                            <option value="Art and Design" {{ old('subject') == 'Art and Design' ? 'selected' : '' }}>Art and Design</option>
                            <option value="Biology" {{ old('subject') == 'Biology' ? 'selected' : '' }}>Biology</option>
                            <option value="Business Studies" {{ old('subject') == 'Business Studies' ? 'selected' : '' }}>Business Studies</option>
                            <option value="Chemistry" {{ old('subject') == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                            <option value="Christian Religious Education (CRE)" {{ old('subject') == 'Christian Religious Education (CRE)' ? 'selected' : '' }}>Christian Religious Education (CRE)</option>
                            <option value="Computer Studies" {{ old('subject') == 'Computer Studies' ? 'selected' : '' }}>Computer Studies</option>
                            <option value="Electricity" {{ old('subject') == 'Electricity' ? 'selected' : '' }}>Electricity</option>
                            <option value="English" {{ old('subject') == 'English' ? 'selected' : '' }}>English</option>
                            <option value="French" {{ old('subject') == 'French' ? 'selected' : '' }}>French</option>
                            <option value="Geography" {{ old('subject') == 'Geography' ? 'selected' : '' }}>Geography</option>
                            <option value="German" {{ old('subject') == 'German' ? 'selected' : '' }}>German</option>
                            <option value="History and Government" {{ old('subject') == 'History and Government' ? 'selected' : '' }}>History and Government</option>
                            <option value="Home Science" {{ old('subject') == 'Home Science' ? 'selected' : '' }}>Home Science</option>
                            <option value="Islamic Religious Education (IRE)" {{ old('subject') == 'Islamic Religious Education (IRE)' ? 'selected' : '' }}>Islamic Religious Education (IRE)</option>
                            <option value="Kiswahili" {{ old('subject') == 'Kiswahili' ? 'selected' : '' }}>Kiswahili</option>
                            <option value="Mathematics" {{ old('subject') == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                            <option value="Music" {{ old('subject') == 'Music' ? 'selected' : '' }}>Music</option>
                            <option value="Physics" {{ old('subject') == 'Physics' ? 'selected' : '' }}>Physics</option>
                        </optgroup>

                        <optgroup label="CBC Junior School Learning Areas">
                            <option value="Agriculture and Nutrition" {{ old('subject') == 'Agriculture and Nutrition' ? 'selected' : '' }}>Agriculture and Nutrition</option>
                            <option value="Creative Arts and Sports" {{ old('subject') == 'Creative Arts and Sports' ? 'selected' : '' }}>Creative Arts and Sports</option>
                            <option value="English" {{ old('subject') == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Integrated Science" {{ old('subject') == 'Integrated Science' ? 'selected' : '' }}>Integrated Science</option>
                            <option value="Kiswahili" {{ old('subject') == 'Kiswahili' ? 'selected' : '' }}>Kiswahili</option>
                            <option value="Mathematics" {{ old('subject') == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                            <option value="Pre-Technical Studies" {{ old('subject') == 'Pre-Technical Studies' ? 'selected' : '' }}>Pre-Technical Studies</option>
                            <option value="Social Studies" {{ old('subject') == 'Social Studies' ? 'selected' : '' }}>Social Studies</option>
                        </optgroup>
                    </select>
                </div>

                <!-- Paper -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Paper *</label>
                    <input type="text" name="paper" value="{{ old('paper') }}" required 
                           class="w-full text-xs sm:text-sm border border-gray-300 rounded p-2 focus:ring-green focus:border-green">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                        :disabled="loading"
                        class="w-full bg-green text-white py-2.5 rounded text-sm font-bold hover:bg-green-dark transition flex items-center justify-center">
                    <span x-show="!loading">Submit Application</span>
                    <span x-show="loading" style="display: none;">Submitting...</span>
                </button>
            </div>
        </form>

    </div>
</section>
@endsection

@push('scripts')
@endpush