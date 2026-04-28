@extends('layouts.backend')

@section('title', 'Add Sub-County BBF Rep - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10" x-data="bbfRepForm()">

    <div class="container mx-auto px-4 max-w-3xl">

        <h2 class="text-2xl md:text-3xl font-bold text-green mb-6">
            Add Sub-County BBF Rep
        </h2>

        <!-- Success Message -->
        <template x-if="successMessage">
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                <span x-text="successMessage"></span>
            </div>
        </template>

        <!-- Error Message -->
        <template x-if="errorMessage">
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <span x-text="errorMessage"></span>
            </div>
        </template>

        <form @submit.prevent="submitForm" class="space-y-4">

            <!-- Sub County FIRST -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Sub-County</label>
                <select x-model="form.sub_county_id" class="w-full border border-gray-300 p-2 rounded">
                    <option value="">-- Choose Sub-County --</option>
                    @foreach($subCounties as $subCounty)
                        <option value="{{ $subCounty->id }}">
                            {{ $subCounty->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Level SECOND -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Level (Optional)</label>
                <select x-model="form.level" class="w-full border border-gray-300 p-2 rounded">
                    <option value="">-- Optional --</option>
                    <option value="junior">Junior</option>
                    <option value="senior">Senior</option>
                </select>
            </div>

            <!-- User LAST -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Select User</label>
                <select x-model="form.user_id" class="w-full border border-gray-300 p-2 rounded">
                    <option value="">-- Choose User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ ($user->salutation ?? '') . ' ' . $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit -->
            <div>
                <button
                    type="submit"
                    class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark transition w-full"
                    :disabled="loading"
                >
                    <span x-show="!loading">Add Sub-County BBF Rep</span>
                    <span x-show="loading">Saving...</span>
                </button>
            </div>

        </form>

    </div>
</section>

<script>
function bbfRepForm() {
    return {
        loading: false,
        successMessage: '',
        errorMessage: '',

        form: {
            sub_county_id: '',
            level: '',
            user_id: ''
        },

        submitForm() {
            this.loading = true;
            this.successMessage = '';
            this.errorMessage = '';

            fetch("{{ route('sub_county_bbf_reps.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(this.form)
            })
            .then(async (response) => {
                this.loading = false;

                const data = await response.json();

                if (!response.ok) {
                    this.errorMessage = data.message || 'Validation failed';
                    return;
                }

                this.successMessage = data.message;

                // reset form
                this.form.sub_county_id = '';
                this.form.level = '';
                this.form.user_id = '';
            })
            .catch(() => {
                this.loading = false;
                this.errorMessage = 'Network error. Please try again.';
            });
        }
    }
}
</script>

@endsection