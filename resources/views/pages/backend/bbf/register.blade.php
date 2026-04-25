@extends('layouts.frontend')

@section('title', 'BBF Membership Registration - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">

        <h2 class="text-2xl md:text-3xl font-bold text-green mb-6">
            BBF Membership Registration
        </h2>

        <form
            x-data="bbfForm()"
            @submit.prevent="submitForm"
            class="space-y-6"
        >
            @csrf

            {{-- STEP NAV --}}
            <div class="flex mb-6 border-b">
                <template x-for="(tab, index) in steps" :key="index">
                    <button type="button"
                        @click="step = index + 1"
                        :class="step === index + 1
                            ? 'border-b-4 border-green text-green font-semibold'
                            : 'text-gray-500'"
                        class="flex-1 py-2 text-center">
                        <span x-text="tab"></span>
                    </button>
                </template>
            </div>

            {{-- STEP 1 --}}
            <div x-show="step === 1" class="space-y-4">
                <h3 class="font-bold text-lg">Personal Information</h3>

                <input type="text" name="full_name" placeholder="Full Name" class="border p-2 w-full">
                <input type="text" name="tsc_number" placeholder="TSC Number" class="border p-2 w-full">
                <input type="text" name="national_id" placeholder="National ID (Optional)" class="border p-2 w-full">
                <input type="text" name="phone_number" placeholder="Phone Number" class="border p-2 w-full">

                <select name="gender" class="border p-2 w-full">
                    <option value="">Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>

            {{-- STEP 2 --}}
            <div x-show="step === 2" class="space-y-4">
                <h3 class="font-bold text-lg">Employment Details</h3>

                <input type="text" name="school_name" placeholder="School Name" class="border p-2 w-full">

                <select name="sub_county_id" class="border p-2 w-full">
                    <option value="">Sub County</option>
                    @foreach($subCounties as $sub)
                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                    @endforeach
                </select>

                <input type="text" name="zone" placeholder="Zone" class="border p-2 w-full">

                <select name="category" class="border p-2 w-full">
                    <option value="">Category</option>
                    <option value="Tertiary">Tertiary</option>
                    <option value="Senior">Senior</option>
                    <option value="Junior">Junior</option>
                    <option value="Primary">Primary</option>
                </select>

                <input type="number" name="year_posting" placeholder="Year of Posting" class="border p-2 w-full">
            </div>

            {{-- STEP 3 --}}
            <div x-show="step === 3" class="space-y-4">
                <h3 class="font-bold text-lg">Next of Kin</h3>

                <input type="text" name="nok_full_name" placeholder="Full Name" class="border p-2 w-full">
                <input type="text" name="nok_relationship" placeholder="Relationship" class="border p-2 w-full">
                <input type="text" name="nok_phone" placeholder="Phone Number" class="border p-2 w-full">
            </div>

            {{-- STEP 4 --}}
            <div x-show="step === 4" class="space-y-4">
                <h3 class="font-bold text-lg">Family Details</h3>

                <h4 class="font-semibold">Father</h4>
                <input type="text" name="father_name" placeholder="Father Name" class="border p-2 w-full">

                <select name="father_status" class="border p-2 w-full">
                    <option value="">Status</option>
                    <option value="Alive">Alive</option>
                    <option value="Deceased">Deceased</option>
                </select>

                <input type="text" name="father_id" placeholder="Father ID (Optional)" class="border p-2 w-full">

                <h4 class="font-semibold mt-4">Mother</h4>
                <input type="text" name="mother_name" placeholder="Mother Name" class="border p-2 w-full">

                <select name="mother_status" class="border p-2 w-full">
                    <option value="">Status</option>
                    <option value="Alive">Alive</option>
                    <option value="Deceased">Deceased</option>
                </select>

                <input type="text" name="mother_id" placeholder="Mother ID (Optional)" class="border p-2 w-full">

                {{-- SPOUSES --}}
                <h4 class="font-semibold mt-4">Spouses</h4>

                <template x-for="(spouse, index) in spouses" :key="index">
                    <div class="border p-2 mb-2 relative">
                        <button type="button" @click="removeSpouse(index)"
                            class="absolute top-1 right-1 text-red">×</button>

                        <input type="text" :name="'spouses['+index+'][full_name]'"
                            x-model="spouse.full_name"
                            placeholder="Full Name"
                            class="border p-2 w-full mb-2">

                        <input type="text" :name="'spouses['+index+'][id_number]'"
                            x-model="spouse.id_number"
                            placeholder="ID Number"
                            class="border p-2 w-full mb-2">

                        <input type="text" :name="'spouses['+index+'][phone_number]'"
                            x-model="spouse.phone_number"
                            placeholder="Phone Number"
                            class="border p-2 w-full">
                    </div>
                </template>

                <button type="button" @click="addSpouse"
                    class="bg-green text-white px-3 py-1 rounded">
                    Add Spouse
                </button>

                {{-- CHILDREN --}}
                <h4 class="font-semibold mt-4">Children</h4>

                <template x-for="(child, index) in children" :key="index">
                    <div class="border p-2 mb-2 relative">
                        <button type="button" @click="removeChild(index)"
                            class="absolute top-1 right-1 text-red">×</button>

                        <input type="text" :name="'children['+index+'][full_name]'"
                            x-model="child.full_name"
                            placeholder="Full Name"
                            class="border p-2 w-full mb-2">

                        <input type="date" :name="'children['+index+'][dob]'"
                            x-model="child.dob"
                            class="border p-2 w-full mb-2">

                        <input type="text" :name="'children['+index+'][birth_cert_no]'"
                            x-model="child.birth_cert_no"
                            placeholder="Birth Certificate No"
                            class="border p-2 w-full">
                    </div>
                </template>

                <button type="button" @click="addChild"
                    class="bg-green text-white px-3 py-1 rounded">
                    Add Child
                </button>
            </div>

            {{-- STEP 5: DECLARATION --}}
            <div x-show="step === 5" class="space-y-4">
                <h3 class="font-bold text-lg">Declaration</h3>

                <p class="text-gray-700">
                    I, the undersigned declare that the information provided above is true and accurate to the best of my knowledge.
                    I agree to abide by the KUPPET Homabay Welfare Scheme By-Laws.
                </p>

                <a href="http://127.0.0.1:8000/assets/documents/KUPPET%20Homabay%20Press%20Conference.pdf"
                   target="_blank"
                   class="text-green underline font-semibold">
                    📄 Download KUPPET Homabay By-Laws
                </a>

                <label class="block mt-3">
                    <input type="checkbox" x-model="agree">
                    I agree to the declaration
                </label>
            </div>

            {{-- NAV --}}
            <div class="flex justify-between mt-6">
                <button type="button" @click="prev()" x-show="step > 1"
                    class="bg-gray-500 text-white px-4 py-2 rounded">
                    Previous
                </button>

                <button type="button" @click="next()" x-show="step < steps.length"
                    class="bg-green text-white px-4 py-2 rounded">
                    Next
                </button>

                <button type="submit"
                    x-show="step === steps.length"
                    :disabled="!agree || loading"
                    class="bg-green text-white px-4 py-2 rounded">
                    <span x-text="loading ? 'Submitting...' : 'Submit'"></span>
                </button>
            </div>

        </form>
    </div>
</section>

<script>
function bbfForm() {
    return {
        step: 1,
        steps: ['Personal','Employment','Next of Kin','Family','Declaration'],
        loading: false,
        agree: false,
        spouses: [],
        children: [],

        next(){ if(this.step < this.steps.length) this.step++ },
        prev(){ if(this.step > 1) this.step-- },

        addSpouse(){ this.spouses.push({ full_name:'', id_number:'', phone_number:'' }) },
        removeSpouse(i){ this.spouses.splice(i,1) },

        addChild(){ this.children.push({ full_name:'', dob:'', birth_cert_no:'' }) },
        removeChild(i){ this.children.splice(i,1) },

        submitForm(){

            Swal.fire({
                title:'Confirm Submission',
                text:'Submit BBF Membership Application?',
                icon:'question',
                showCancelButton:true,
                confirmButtonText:'Yes Submit',
                confirmButtonColor:'#16a34a'
            }).then(result=>{

                if(!result.isConfirmed) return;

                this.loading = true;

                Swal.fire({
                    title:'Submitting your application...',
                    html:'Please wait...',
                    allowOutsideClick:false,
                    allowEscapeKey:false,
                    didOpen:()=>Swal.showLoading()
                });

                let formData = new FormData(this.$el);

                fetch("{{ route('bbf.register.store') }}",{
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN':'{{ csrf_token() }}',
                        'Accept':'application/json'
                    },
                    body:formData
                })
                .then(res=>res.json().then(data=>({status:res.status, body:data})))
                .then(res=>{

                    this.loading=false;

                    if(res.status!==200) throw res.body;

                    Swal.fire({
                        icon:'success',
                        title:'Success',
                        text:res.body.message
                    }).then(()=> window.location.href="/");

                })
                .catch(err=>{

                    this.loading=false;

                    let msg='Something went wrong';

                    if(err.errors){
                        msg = Object.values(err.errors).flat().join('\n');
                    } else if(err.message){
                        msg = err.message;
                    }

                    Swal.fire({
                        icon:'error',
                        title:'Error',
                        text:msg
                    });

                });

            });
        }
    }
}
</script>

@endsection