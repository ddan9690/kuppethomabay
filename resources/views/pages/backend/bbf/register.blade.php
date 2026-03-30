@extends('layouts.frontend')

@section('title', 'BBF Membership Registration - KUPPET Homabay Branch')

@section('content')
    <section class="bg-white py-10">
        <div class="container mx-auto px-4 max-w-3xl">

            <h2 class="text-2xl md:text-3xl font-bold text-green mb-6">
                BBF Membership Registration
            </h2>

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 p-4 bg-green text-white rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('bbf.register.store') }}" method="POST" x-data="{
                step: 1,
                steps: ['Personal', 'Employment', 'Next of Kin', 'Family', 'Declaration'],
                agree: false,
                submitting: false,
                spouses: [],
                children: [],
                maxSpouses: 2,
                maxChildren: 7,
                goToStep(index) { this.step = index + 1 },
                next() { if (this.step < this.steps.length) this.step++ },
                prev() { if (this.step > 1) this.step-- },
                addSpouse() { if (this.spouses.length < this.maxSpouses) this.spouses.push({ full_name: '', id_number: '', phone_number: '' }) },
                removeSpouse(index) { this.spouses.splice(index, 1) },
                addChild() { if (this.children.length < this.maxChildren) this.children.push({ full_name: '', dob: '', birth_cert_no: '' }) },
                removeChild(index) { this.children.splice(index, 1) }
            }" @submit="submitting = true"
                class="space-y-6">
                @csrf

                {{-- Tab Headings --}}
                <div class="flex mb-6 border-b">
                    <template x-for="(tab, index) in steps" :key="index">
                        <button type="button" @click="goToStep(index)"
                            :class="step === index + 1 ? 'border-b-4 border-green text-green font-semibold' :
                                'text-gray-500 hover:text-green'"
                            class="flex-1 py-2 text-center">
                            <span x-text="tab"></span>
                        </button>
                    </template>
                </div>

                {{-- STEP 1: Personal Info --}}
                <div x-show="step === 1" class="space-y-4">
                    <h3 class="font-bold text-lg mb-2">Personal Information</h3>
                    <div>
                        <label>Full Name</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>TSC Number</label>
                        <input type="text" name="tsc_number" value="{{ old('tsc_number') }}" required
                            class="border rounded p-2 w-full">
                    </div>

                    <div>
                        <label>National ID Number</label>
                        <input type="text" name="national_id" value="{{ old('national_id') }}"
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" value="{{ old('phone_number') }}" required
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Gender</label>
                        <select name="gender" required class="border rounded p-2 w-full">
                            <option value="">-- Select --</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>

                {{-- STEP 2: Employment --}}
                <div x-show="step === 2" class="space-y-4">
                    <h3 class="font-bold text-lg mb-2">Employment Details</h3>
                    <div>
                        <label>School Name</label>
                        <input type="text" name="school_name" value="{{ old('school_name') }}" required
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Sub-County</label>
                        <select name="sub_county_id" required class="border rounded p-2 w-full">
                            <option value="">-- Select Sub-County --</option>
                            @foreach ($subCounties as $subCounty)
                                <option value="{{ $subCounty->id }}"
                                    {{ old('sub_county_id') == $subCounty->id ? 'selected' : '' }}>{{ $subCounty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Zone</label>
                        <input type="text" name="zone" value="{{ old('zone') }}" required
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Category</label>
                        <select name="category" required class="border rounded p-2 w-full">
                            <option value="">-- Select --</option>
                            <option value="Tertiary" {{ old('category') == 'Tertiary' ? 'selected' : '' }}>Tertiary</option>
                            <option value="Senior" {{ old('category') == 'Senior' ? 'selected' : '' }}>Senior</option>
                            <option value="Junior" {{ old('category') == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Primary" {{ old('category') == 'Primary' ? 'selected' : '' }}>Primary</option>
                        </select>
                    </div>
                    <div>
                        <label>Year of Posting</label>
                        <input type="number" name="year_posting" value="{{ old('year_posting') }}" required
                            class="border rounded p-2 w-full">
                    </div>
                </div>

                {{-- STEP 3: Next of Kin --}}
                <div x-show="step === 3" class="space-y-4">
                    <h3 class="font-bold text-lg mb-2">Next of Kin</h3>
                    <div>
                        <label>Full Name</label>
                        <input type="text" name="nok_full_name" value="{{ old('nok_full_name') }}"
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Relationship</label>
                        <input type="text" name="nok_relationship" value="{{ old('nok_relationship') }}"
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="text" name="nok_phone" value="{{ old('nok_phone') }}"
                            class="border rounded p-2 w-full">
                    </div>
                </div>

                {{-- STEP 4: Family --}}
                <div x-show="step === 4" class="space-y-4">
                    <h3 class="font-bold text-lg mb-2">Family Details</h3>

                    {{-- Father --}}
                    <h4 class="font-semibold">Father</h4>
                    <div>
                        <label>Name</label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}"
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Status</label>
                        <select name="father_status" class="border rounded p-2 w-full">
                            <option value="">-- Select --</option>
                            <option value="Alive" {{ old('father_status') == 'Alive' ? 'selected' : '' }}>Alive</option>
                            <option value="Deceased" {{ old('father_status') == 'Deceased' ? 'selected' : '' }}>Deceased
                            </option>
                        </select>
                    </div>
                    <div>
                        <label>National ID</label>
                        <input type="text" name="father_id" value="{{ old('father_id') }}"
                            class="border rounded p-2 w-full">
                    </div>

                    {{-- Mother --}}
                    <h4 class="font-semibold">Mother</h4>
                    <div>
                        <label>Name</label>
                        <input type="text" name="mother_name" value="{{ old('mother_name') }}"
                            class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Status</label>
                        <select name="mother_status" class="border rounded p-2 w-full">
                            <option value="">-- Select --</option>
                            <option value="Alive" {{ old('mother_status') == 'Alive' ? 'selected' : '' }}>Alive</option>
                            <option value="Deceased" {{ old('mother_status') == 'Deceased' ? 'selected' : '' }}>Deceased
                            </option>
                        </select>
                    </div>
                    <div>
                        <label>National ID</label>
                        <input type="text" name="mother_id" value="{{ old('mother_id') }}"
                            class="border rounded p-2 w-full">
                    </div>

                    {{-- Spouses --}}
                    <h4 class="font-semibold mt-4">Spouse</h4>
                    <template x-for="(spouse, index) in spouses" :key="index">
                        <div class="border p-2 mb-2 rounded relative">
                            <button type="button" @click="removeSpouse(index)"
                                class="absolute top-1 right-1 text-white bg-red px-2 py-0.5 rounded hover:bg-red-600">&times;</button>
                            <div class="mb-2">
                                <label>Full Name</label>
                                <input type="text" :name="'spouses[' + index + '][full_name]'"
                                    x-model="spouses[index].full_name" class="border rounded p-2 w-full">
                            </div>
                            <div class="mb-2">
                                <label>ID Number</label>
                                <input type="text" :name="'spouses[' + index + '][id_number]'"
                                    x-model="spouses[index].id_number" class="border rounded p-2 w-full">
                            </div>
                            <div>
                                <label>Phone Number</label>
                                <input type="text" :name="'spouses[' + index + '][phone_number]'"
                                    x-model="spouses[index].phone_number" class="border rounded p-2 w-full">
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="addSpouse()" class="px-3 py-1 bg-green text-white rounded mt-2"
                        x-show="spouses.length < maxSpouses">Add Spouse</button>

                    {{-- Children --}}
                    <h4 class="font-semibold mt-4">Children</h4>
                    <template x-for="(child, index) in children" :key="index">
                        <div class="border p-2 mb-2 rounded relative">
                            <button type="button" @click="removeChild(index)"
                                class="absolute top-1 right-1 text-white bg-red px-2 py-0.5 rounded hover:bg-red-600">&times;</button>
                            <div class="mb-2">
                                <label>Full Name</label>
                                <input type="text" :name="'children[' + index + '][full_name]'"
                                    x-model="children[index].full_name" class="border rounded p-2 w-full">
                            </div>
                            <div class="mb-2">
                                <label>Date of Birth</label>
                                <input type="date" :name="'children[' + index + '][dob]'" x-model="children[index].dob"
                                    class="border rounded p-2 w-full">
                            </div>
                            <div>
                                <label>Birth Certificate Number</label>
                                <input type="text" :name="'children[' + index + '][birth_cert_no]'"
                                    x-model="children[index].birth_cert_no" class="border rounded p-2 w-full">
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="addChild()" class="px-3 py-1 bg-green text-white rounded mt-2"
                        x-show="children.length < maxChildren">Add Child</button>
                </div>

                {{-- STEP 5: Declaration --}}
                <div x-show="step === 5" class="space-y-4">
                    <h3 class="font-bold text-lg mb-2">Declaration</h3>
                    <p>I hereby declare that the information provided above is correct to the best of my knowledge.</p>
                    <label class="block mt-2">
                        <input type="checkbox" x-model="agree" required>
                        I agree to the declaration
                    </label>
                </div>

                {{-- Navigation Buttons --}}
                <div class="flex justify-between mt-6">
                    <button type="button" @click="prev()" x-show="step>1"
                        class="bg-gray-dark text-white px-4 py-2 rounded hover:bg-gray-500">Previous</button>
                    <button type="button" @click="next()" x-show="step<steps.length"
                        class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark">Next</button>
                    <button type="submit" x-show="step===steps.length" :disabled="!agree || submitting"
                        class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark disabled:opacity-50">
                        <span x-text="submitting ? 'Submitting...' : 'Submit'"></span>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
