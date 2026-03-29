@extends('layouts.frontend')

@section('title', 'Join BBF - KUPPET Homabay Branch')

@section('content')
    <section class="bg-white py-10">
        <div class="container mx-auto px-4 max-w-5xl">
            <h2 class="text-2xl md:text-3xl font-bold text-green mb-4">
                Join BBF - Membership Registration
            </h2>

            <form action="{{ route('bbf.register.store') }}" method="POST" x-data="bbfForm()"
                x-on:submit.prevent="submitForm($event)" class="space-y-6">
                @csrf

                {{-- Tabs --}}
                <div class="flex gap-2 mb-6">
                    <template x-for="(tab,index) in tabs" :key="index">
                        <button type="button" @click="currentStep=index"
                            :class="{ 'bg-green text-white': currentStep === index, 'bg-gray-100 text-gray-800': currentStep !==
                                    index }"
                            class="px-4 py-2 rounded font-medium hover:bg-green hover:text-white transition">
                            <span x-text="tab"></span>
                        </button>
                    </template>
                </div>

                {{-- Step 1: Membership Details --}}
                <div x-show="currentStep===0" class="space-y-4">
                    <h3 class="font-bold text-green mb-2">Section A: Membership Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>Full Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}"
                                class="border p-2 w-full rounded">
                            @error('full_name')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>TSC Number</label>
                            <input type="text" name="tsc_number" value="{{ old('tsc_number') }}"
                                class="border p-2 w-full rounded">
                            @error('tsc_number')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                class="border p-2 w-full rounded">
                            @error('phone_number')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="border p-2 w-full rounded">
                            @error('email')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Gender</label>
                            <select name="gender" class="border p-2 w-full rounded">
                                <option value="">-- Select --</option>
                                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Step 2: Employment Details --}}
                <div x-show="currentStep===1" class="space-y-4">
                    <h3 class="font-bold text-green mb-2">Section B: Employment Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>School Name</label>
                            <input type="text" name="school_name" value="{{ old('school_name') }}"
                                class="border p-2 w-full rounded">
                            @error('school_name')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Sub-County</label>
                            <select name="sub_county_id" class="border p-2 w-full rounded">
                                <option value="">-- Select Sub-County --</option>
                                @foreach ($subCounties as $subCounty)
                                    <option value="{{ $subCounty->id }}"
                                        {{ old('sub_county_id') == $subCounty->id ? 'selected' : '' }}>{{ $subCounty->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sub_county_id')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Zone</label>
                            <input type="text" name="zone" value="{{ old('zone') }}"
                                class="border p-2 w-full rounded">
                            @error('zone')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Category</label>
                            <select name="category" class="border p-2 w-full rounded">
                                <option value="">-- Select --</option>
                                <option value="Tertiary" {{ old('category') == 'Tertiary' ? 'selected' : '' }}>Tertiary</option>
                                <option value="Senior" {{ old('category') == 'Senior' ? 'selected' : '' }}>Senior</option>
                                <option value="Junior" {{ old('category') == 'Junior' ? 'selected' : '' }}>Junior</option>
                                <option value="Primary" {{ old('category') == 'Primary' ? 'selected' : '' }}>Primary</option>
                            </select>
                            @error('category')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Year of Posting</label>
                            <input type="number" name="year_posting" value="{{ old('year_posting') }}"
                                class="border p-2 w-full rounded">
                            @error('year_posting')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Step 3: Next of Kin --}}
                <div x-show="currentStep===2" class="space-y-4">
                    <h3 class="font-bold text-green mb-2">Section C: Next of Kin</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label>NOK Full Name</label>
                            <input type="text" name="nok_full_name" value="{{ old('nok_full_name') }}"
                                class="border p-2 w-full rounded">
                            @error('nok_full_name')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Relationship</label>
                            <input type="text" name="nok_relationship" value="{{ old('nok_relationship') }}"
                                class="border p-2 w-full rounded">
                            @error('nok_relationship')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Phone</label>
                            <input type="text" name="nok_phone" value="{{ old('nok_phone') }}"
                                class="border p-2 w-full rounded">
                            @error('nok_phone')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Step 4: Dependants --}}
                <div x-show="currentStep===3" class="space-y-4">
                    <h3 class="font-bold text-green mb-2">Section D: Dependants</h3>

                    {{-- Spouses --}}
                    <div>
                        <label class="block font-medium mb-1">Spouses</label>
                        <template x-for="(spouse,index) in form.spouses" :key="index">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-2">
                                <input type="text" :name="'spouses[' + index + '][full_name]'" x-model="spouse.full_name"
                                    placeholder="Full Name" class="border p-2 rounded">
                                <input type="text" :name="'spouses[' + index + '][id]'" x-model="spouse.id"
                                    placeholder="ID Number" class="border p-2 rounded">
                                <input type="text" :name="'spouses[' + index + '][phone]'" x-model="spouse.phone"
                                    placeholder="Phone" class="border p-2 rounded">
                                <button type="button" @click="form.spouses.splice(index,1)"
                                    class="bg-red-500 text-white px-2 rounded">Remove</button>
                            </div>
                        </template>
                        <button type="button" @click="form.spouses.push({full_name:'',id:'',phone:''})"
                            class="bg-green text-white px-4 py-1 rounded">Add Spouse</button>
                    </div>

                    {{-- Children --}}
                    <div class="mt-4">
                        <label class="block font-medium mb-1">Children</label>
                        <template x-for="(child,index) in form.children" :key="index">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-2">
                                <input type="text" :name="'children[' + index + '][full_name]'" x-model="child.full_name"
                                    placeholder="Full Name" class="border p-2 rounded">
                                <input type="date" :name="'children[' + index + '][dob]'" x-model="child.dob"
                                    class="border p-2 rounded">
                                <input type="text" :name="'children[' + index + '][birth_certificate_no]'"
                                    x-model="child.birth_certificate_no" placeholder="Birth Certificate No"
                                    class="border p-2 rounded">
                                <button type="button" @click="form.children.splice(index,1)"
                                    class="bg-red-500 text-white px-2 rounded">Remove</button>
                            </div>
                        </template>
                        <button type="button" @click="form.children.push({full_name:'',dob:'',birth_certificate_no:''})"
                            class="bg-green text-white px-4 py-1 rounded">Add Child</button>
                    </div>
                </div>

                {{-- Navigation --}}
                <div class="flex justify-between mt-4">
                    <button type="button" @click="prevStep()" class="bg-gray-300 px-4 py-2 rounded"
                        :disabled="currentStep === 0">Previous</button>
                    <button type="button" @click="nextStep()" class="bg-green text-white px-4 py-2 rounded"
                        :disabled="currentStep === tabs.length - 1">Next</button>
                </div>

                {{-- Submit --}}
                <div class="mt-6" x-show="currentStep===tabs.length-1">
                    <button type="submit" class="bg-green text-white px-6 py-2 rounded" :disabled="submitting">
                        <span x-text="submitting ? 'Submitting...' : 'Submit'"></span>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        function bbfForm() {
            return {
                currentStep: 0,
                submitting: false,
                tabs: ['Membership Details', 'Employment Details', 'Next of Kin', 'Dependants'],
                form: {
                    spouses: @json(old('spouses', [])),
                    children: @json(old('children', []))
                },
                nextStep() {
                    if (this.currentStep < this.tabs.length - 1) this.currentStep++;
                },
                prevStep() {
                    if (this.currentStep > 0) this.currentStep--;
                },
                async submitForm(e) {
                    this.submitting = true;
                    let fd = new FormData(e.target);
                    try {
                        let res = await fetch(e.target.action, {
                            method: e.target.method,
                            body: fd,
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                            }
                        });
                        this.submitting = false;

                        if (res.ok) {
                            let data = await res.json();
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.success
                            }).then(() => window.location.href = '/');
                        } else if (res.status === 422) {
                            let data = await res.json();
                            // Flatten all error messages into a single string
                            let messages = Object.values(data.errors).flat().join('\n');

                            Swal.fire({
                                icon: 'warning',
                                title: 'Sorry',
                                html: messages.replace(/\n/g, '<br>'), // line breaks in SweetAlert
                                confirmButtonText: 'Ok'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Something went wrong. Please try again later.',
                                confirmButtonText: 'Ok'
                            });
                        }
                    } catch (err) {
                        this.submitting = false;
                        console.error(err);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Unable to submit form. Check your internet connection or try again.',
                            confirmButtonText: 'Ok'
                        });
                    }
                }
            }
        }
    </script>
@endsection
