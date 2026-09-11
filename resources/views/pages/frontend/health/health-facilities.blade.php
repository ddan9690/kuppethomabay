@extends('layouts.frontend')

@section('title', 'SHA Mwalimu Accredited Facilities Directory - KUPPET Homabay')

@section('content')
<section class="bg-gradient-to-b from-gray-50 to-white py-10 md:py-14">
    <div class="container mx-auto px-4 max-w-5xl" x-data="facilitiesDirectory()">

        {{-- Page Header --}}
        <div class="border-b border-gray-200 pb-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="text-xs font-bold text-green uppercase tracking-widest">
                        KUPPET Homabay Health Services
                    </span>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-green-dark mt-1 mb-2">
                        SHA Mwalimu Accredited Facilities Directory
                    </h1>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed max-w-3xl">
                        Locate accredited hospitals, clinics, dental units, and optical centers across Homa Bay sub-counties and regional partners where teachers and dependants access services.
                    </p>
                </div>
                <div>
                    <a href="{{ route('health') }}"
                       class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-semibold text-green bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition whitespace-nowrap">
                        &larr; Back to Health & SHA Guide
                    </a>
                </div>
            </div>
        </div>

        {{-- Controls Toolbar Card --}}
        <div class="bg-white p-5 md:p-6 rounded-2xl border border-gray-200 shadow-sm mb-8 space-y-4">
            
            {{-- Top Row: Search Input & Sub-County Filter Dropdown --}}
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                
                {{-- Search Input (7 cols) --}}
                <div class="md:col-span-7 relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                        &#128269;
                    </span>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="Search facility name, location, or specific service..."
                        class="w-full pl-10 pr-4 py-3 text-sm bg-gray-50 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green focus:border-green transition"
                    >
                    <button 
                        @click="search = ''" 
                        x-show="search.length > 0"
                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-xs text-gray-400 hover:text-gray-600"
                    >
                        Clear
                    </button>
                </div>

                {{-- Sub-County / Region Filter Dropdown (5 cols) --}}
                <div class="md:col-span-5 relative">
                    <select
                        x-model="selectedSubCounty"
                        class="w-full px-3.5 py-3 text-sm bg-gray-50 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green focus:border-green transition text-gray-700 font-medium"
                    >
                        <option value="all">📍 All Sub-Counties & Regions</option>
                        <option value="Homabay Sub-County">Homabay Sub-County</option>
                        <option value="Rangwe">Rangwe Sub-County</option>
                        <option value="Rachuonyo South">Rachuonyo South (Oyugis)</option>
                        <option value="Rachuonyo North">Rachuonyo North (Kendu Bay)</option>
                        <option value="Rachuonyo East">Rachuonyo East (Ringa / Mawego)</option>
                        <option value="Ndhiwa">Ndhiwa Sub-County</option>
                        <option value="Suba">Suba Sub-County</option>
                        <option value="Mbita">Mbita Sub-County</option>
                        <option value="Kisumu">Regional: Kisumu City</option>
                        <option value="Kisii">Regional: Kisii Town</option>
                        <option value="Migori">Regional: Migori Town</option>
                    </select>
                </div>

            </div>

            {{-- Bottom Row: Category Filter Tabs & Dynamic Counter --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-3 border-t border-gray-100 gap-4">
                
                {{-- Category Buttons --}}
                <div class="flex flex-wrap gap-2">
                    <button
                        type="button"
                        @click="selectedCategory = 'all'"
                        :class="selectedCategory === 'all' ? 'bg-green text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-3.5 py-2 text-xs font-semibold rounded-lg transition"
                    >
                        All Providers
                    </button>
                    <button
                        type="button"
                        @click="selectedCategory = 'general'"
                        :class="selectedCategory === 'general' ? 'bg-green text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-3.5 py-2 text-xs font-semibold rounded-lg transition"
                    >
                        General / Hospitals
                    </button>
                    <button
                        type="button"
                        @click="selectedCategory = 'dental'"
                        :class="selectedCategory === 'dental' ? 'bg-green text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-3.5 py-2 text-xs font-semibold rounded-lg transition"
                    >
                        Dental Clinics
                    </button>
                    <button
                        type="button"
                        @click="selectedCategory = 'optical'"
                        :class="selectedCategory === 'optical' ? 'bg-green text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-3.5 py-2 text-xs font-semibold rounded-lg transition"
                    >
                        Optical & Eye Care
                    </button>
                </div>

                {{-- Results Count Badge --}}
                <div class="text-xs font-medium text-gray-500 whitespace-nowrap">
                    Showing <span class="font-bold text-green-dark" x-text="filteredFacilities.length"></span> facilities
                </div>

            </div>
        </div>

        {{-- Facilities Table Layout --}}
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm mb-10">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs md:text-sm text-gray-700">
                    <thead class="bg-green text-white uppercase tracking-wider text-[11px]">
                        <tr>
                            <th class="p-4">Facility Name</th>
                            <th class="p-4">Category / Type</th>
                            <th class="p-4">Location / Sub-County</th>
                            <th class="p-4">Covered Services / Schedule</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <template x-for="facility in filteredFacilities" :key="facility.name">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-semibold text-green-dark" x-text="facility.name"></td>
                                <td class="p-4">
                                    <span class="inline-block px-2.5 py-1 text-[11px] font-bold rounded-full bg-gray-100 text-gray-800 border border-gray-200"
                                          x-text="facility.level">
                                    </span>
                                </td>
                                <td class="p-4 text-gray-600 font-medium" x-text="facility.location"></td>
                                <td class="p-4 text-gray-600 text-xs leading-relaxed" x-text="facility.services"></td>
                            </tr>
                        </template>

                        {{-- Empty State --}}
                        <template x-if="filteredFacilities.length === 0">
                            <tr>
                                <td colspan="4" class="p-12 text-center">
                                    <div class="max-w-sm mx-auto space-y-2">
                                        <div class="text-3xl">&#128269;</div>
                                        <p class="text-gray-800 font-semibold text-sm">No matching healthcare facilities found</p>
                                        <p class="text-gray-500 text-xs">Try resetting your sub-county filter or clearing your search keywords.</p>
                                        <button @click="search = ''; selectedSubCounty = 'all'; selectedCategory = 'all';" 
                                                class="mt-2 px-3 py-1.5 bg-green text-white text-xs font-medium rounded-lg hover:bg-green-dark transition">
                                            Reset All Filters
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Support Notice Box --}}
        <div class="bg-amber-50 border-l-4 border-gold p-4 rounded-r-xl text-amber-900 text-xs md:text-sm shadow-sm flex items-start gap-3">
            <span class="text-lg">&#9432;</span>
            <div>
                <strong>Member Tip:</strong> Always dial <code class="bg-white px-1.5 py-0.5 rounded border border-amber-200 font-mono font-bold">*147#</code> to verify your digital token status before checking into any empanelled facility. For escalations, visit the KUPPET Homabay BEC Office.
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    function facilitiesDirectory() {
        return {
            search: '',
            selectedCategory: 'all',
            selectedSubCounty: 'all',

            facilities: [
                // =====================================================
                // HOMABAY - GENERAL / HOSPITALS
                // =====================================================
                { name: 'The Healcare Hospital Limited', category: 'general', level: 'Private', location: 'Homabay Sub-County', services: 'Inpatient, Outpatient Care' },
                { name: 'Oasis Doctors Plaza Homabay', category: 'general', level: 'Private', location: 'Homabay Sub-County', services: 'Outpatient, Specialist Clinic' },
                { name: 'The Samarimed Centre', category: 'general', level: 'Private', location: 'Homabay Sub-County', services: 'Outpatient Medical Services' },
                { name: 'St. Lawrence Homa Bay Hospital', category: 'general', level: 'Private', location: 'Homabay Sub-County', services: 'Inpatient, Outpatient, Diagnostics' },
                { name: 'St. Paul Mission Hospital', category: 'general', level: 'Faith-Based (FBO)', location: 'Homabay Sub-County', services: 'Inpatient, Outpatient, Comprehensive Care' },

                // =====================================================
                // RANGWE - GENERAL / HOSPITALS
                // =====================================================
                { name: 'Janeiro Nursing Home Limited', category: 'general', level: 'Private', location: 'Rangwe Sub-County', services: 'Inpatient, Outpatient' },
                { name: 'St. Lawrence Hospital Rangwe', category: 'general', level: 'Private', location: 'Rangwe Sub-County', services: 'Outpatient, Nursing Care' },
                { name: 'Omoya Medical Centre', category: 'general', level: 'Private', location: 'Rangwe Sub-County', services: 'Outpatient Consultation' },
                { name: 'Odienya Medical Centre', category: 'general', level: 'Private', location: 'Rangwe Sub-County', services: 'Outpatient Care' },
                { name: 'Everheals Medical Centre', category: 'general', level: 'Private', location: 'Rangwe (Center)', services: 'Outpatient Care' },
                { name: 'Hope Hartshill Clinic', category: 'general', level: 'Private', location: 'Rangwe Sub-County', services: 'Outpatient Care' },
                { name: 'Olare Medical Centre', category: 'general', level: 'Private', location: 'Rangwe Sub-County', services: 'Outpatient Care' },
                { name: 'F.S.J. St. Theresa Asumbi Mission Hospital', category: 'general', level: 'Faith-Based (FBO)', location: 'Rangwe Sub-County', services: 'Inpatient, Outpatient, Maternity' },
                { name: 'St. Teresa Asante Nagoya Dispensary', category: 'general', level: 'Faith-Based (FBO)', location: 'Mbaka, Rangwe', services: 'Outpatient, Dispensary Services' },

                // =====================================================
                // RACHUONYO SOUTH - GENERAL / HOSPITALS
                // =====================================================
                { name: 'Matata Nursing Home', category: 'general', level: 'Private', location: 'Oyugis Town', services: 'Inpatient, Outpatient, Surgery' },
                { name: 'Evans Healthcare Clinic Ltd', category: 'general', level: 'Private', location: 'Rachuonyo South', services: 'Outpatient Care' },
                { name: 'RTC Mission Hospital', category: 'general', level: 'Private / FBO', location: 'Namba Saye', services: 'Inpatient, Outpatient' },
                { name: 'Hawi Family Hospital', category: 'general', level: 'Private', location: 'Ragwe Center', services: 'Outpatient Care' },
                { name: 'Lynda Care Medical Clinic', category: 'general', level: 'Private', location: 'Ragwe Center', services: 'Outpatient Care' },
                { name: 'Osman Medical Services', category: 'general', level: 'Private', location: 'Rachuonyo South', services: 'Outpatient Care' },
                { name: 'St. Elizabeth Swindon Clinic', category: 'general', level: 'Private', location: 'Sikri', services: 'Outpatient Care' },
                { name: "Beril's GWP Medical Center", category: 'general', level: 'Private', location: 'Ombek', services: 'Outpatient Care' },
                { name: 'Medswells Pharmacy and Medical Centre', category: 'general', level: 'Private', location: 'Rachuonyo South', services: 'Pharmacy, Outpatient' },
                { name: 'Nyalenda Christian Nursing Home', category: 'general', level: 'Private', location: 'Rachuonyo South', services: 'Nursing Care, Outpatient' },
                { name: 'Simbiri Nan Bell Community Health Centre', category: 'general', level: 'Private', location: 'Rachuonyo South', services: 'Community Health, Outpatient' },
                { name: 'Bware Complex Healthcare Ltd', category: 'general', level: 'Private', location: 'Gamba Road', services: 'Outpatient Care' },

                // =====================================================
                // RACHUONYO NORTH - GENERAL / HOSPITALS
                // =====================================================
                { name: 'Termary Healthcare', category: 'general', level: 'Private', location: 'Rachuonyo North', services: 'Outpatient Care' },
                { name: 'Apida Medical Centre', category: 'general', level: 'Private', location: 'Rachuonyo North', services: 'Outpatient Care' },
                { name: 'Norlook Medical Center', category: 'general', level: 'Private', location: 'Lida', services: 'Outpatient Care' },
                { name: 'Bernards Vision Medical Centre', category: 'general', level: 'Private', location: 'Rachuonyo North', services: 'Outpatient Care' },
                { name: 'Jerian Health Care', category: 'general', level: 'Private', location: 'Adiedo', services: 'Outpatient Care' },
                { name: 'Matata Hospital Satellite Medical Centre', category: 'general', level: 'Private', location: 'Nyakongo', services: 'Outpatient Care' },
                { name: 'Pona Medical Clinic', category: 'general', level: 'Private', location: 'Rachuonyo North', services: 'Outpatient Care' },
                { name: 'Sydo Plus Health Care Limited', category: 'general', level: 'Private', location: 'Kendu Bay', services: 'Outpatient Care' },

                // =====================================================
                // RACHUONYO EAST - GENERAL / HOSPITALS
                // =====================================================
                { name: 'Kensylus Medical Center', category: 'general', level: 'Private', location: 'Misambi', services: 'Outpatient Care' },
                { name: 'Ringa Community Hospital Limited', category: 'general', level: 'Private', location: 'Rachuonyo East', services: 'Inpatient, Outpatient' },
                { name: 'Holy Family Oriang Health Centre', category: 'general', level: 'Private', location: 'Rachuonyo East', services: 'Outpatient Care' },
                { name: 'Hopps Kliniks Clinic', category: 'general', level: 'Private', location: 'Near Mawego', services: 'Outpatient Care' },
                { name: 'Rehema Hospice and Clinic Limited', category: 'general', level: 'Private', location: 'Ringa', services: 'Outpatient, Hospice' },
                { name: 'Osman Medical Services Annex', category: 'general', level: 'Private', location: 'Misambi', services: 'Outpatient Care' },
                { name: 'St. Mary’s Ringa Health Centre', category: 'general', level: 'Faith-Based (FBO)', location: 'Ringa', services: 'Outpatient, Maternity' },

                // =====================================================
                // NDHIWA - GENERAL / HOSPITALS
                // =====================================================
                { name: 'First Choice Hospital Ltd', category: 'general', level: 'Private', location: 'Ratanga', services: 'Inpatient, Outpatient' },
                { name: 'Sori Lakeside Hospital - Ndhiwa', category: 'general', level: 'Private', location: 'Ndhiwa', services: 'Inpatient, Outpatient' },
                { name: 'Asego Afya Health Medical Limited', category: 'general', level: 'Private', location: 'Ndhiwa', services: 'Outpatient Care' },
                { name: 'Prof. Lucas Community Health System', category: 'general', level: 'Private', location: 'Kanyikela Bongu', services: 'Outpatient Care' },
                { name: 'Manyatta Community Nursing Home', category: 'general', level: 'Private', location: 'Kobodo', services: 'Nursing Home, Outpatient' },
                { name: 'Arombe Medical Centre', category: 'general', level: 'Private', location: 'Near Nyarongi Sec', services: 'Outpatient Care' },
                { name: 'Divine Sparkle Medical Centre', category: 'general', level: 'Private', location: 'Ogongo Market', services: 'Outpatient Care' },
                { name: 'Port Florence Community Hospital Ndhiwa', category: 'general', level: 'Faith-Based (FBO)', location: 'Ndhiwa', services: 'Inpatient, Outpatient' },
                { name: 'Mirogi Mission Health Centre', category: 'general', level: 'Faith-Based (FBO)', location: 'Ndhiwa', services: 'Outpatient, Mission Health' },

                // =====================================================
                // SUBA - GENERAL / HOSPITALS
                // =====================================================
                { name: 'Arrows Care Medical Center', category: 'general', level: 'Private', location: 'Suba Sub-County', services: 'Outpatient Care' },
                { name: 'Sori Lakeside Hospital - Sindo Branch', category: 'general', level: 'Private', location: 'Sindo Branch', services: 'Inpatient, Outpatient' },
                { name: 'Noorba Medical Centre Limited', category: 'general', level: 'Private', location: 'Suba Sub-County', services: 'Outpatient Care' },
                { name: 'The Sanura Medical Centre', category: 'general', level: 'Private', location: 'Suba Sub-County', services: 'Outpatient Care' },

                // =====================================================
                // MBITA - GENERAL / HOSPITALS
                // =====================================================
                { name: 'Katito Medical Centre - Mbita', category: 'general', level: 'Private', location: 'Kadel', services: 'Outpatient Care' },
                { name: 'Kasgunga Community Clinic', category: 'general', level: 'Private', location: 'Mbita', services: 'Outpatient Care' },
                { name: 'Mavens Healthcare Limited', category: 'general', level: 'Private', location: 'Mbita', services: 'Outpatient Care' },
                { name: 'Rusinga Island of Hope Humanist Healthcare Centre', category: 'general', level: 'Private', location: 'Rusinga Island', services: 'Outpatient Care' },
                { name: 'Med25 International Kenya', category: 'general', level: 'NGO', location: 'Mbita Sub-County', services: 'Community Health Support' },

                // =====================================================
                // DENTAL FACILITIES
                // =====================================================
                { name: 'Royal Dental Clinic', category: 'dental', level: 'Specialist Partner', location: 'HB Town (Sonyaco Plaza 3rd Flr)', services: 'Filling, Root Canal, Extractions, X-rays' },
                { name: 'St. Theresa Asumbi Mission Hospital (F.S.J.)', category: 'dental', level: 'Faith-Based / Dental', location: 'Asumbi, Homabay', services: 'Dental Consultations & Treatments' },
                { name: 'Matata Nursing Home (Dental Unit)', category: 'dental', level: 'Private Partner', location: 'Oyugis Town', services: 'Extractions, Scaling & Polishing, Fillings' },
                { name: 'Hawi Family Hospital (Dental - Wed & Sun)', category: 'dental', level: 'Private Partner', location: 'Oyugis Town', services: 'Oral Examinations, Extractions' },
                { name: 'Termary Health Care (Dental - Sun)', category: 'dental', level: 'Private Partner', location: 'Between Nyangweso & Kadel', services: 'Dental Care & Consultations' },
                { name: 'Homabay Teaching & Referral Hospital (HTRH) - Dental', category: 'dental', level: 'Public Level 5', location: 'Homabay Town', services: 'Comprehensive Dental Surgery & X-rays' },
                { name: 'Royal Dental Clinic (Kisumu)', category: 'dental', level: 'Specialist Partner', location: 'Kisumu City (Alpha House)', services: 'Root Canal, Extractions, Fillings' },
                { name: 'Lake Dental Clinic', category: 'dental', level: 'Specialist Partner', location: 'Kisumu City (Mega Plaza)', services: 'General Dental Treatments' },
                { name: 'Advanced Care Dental Clinic', category: 'dental', level: 'Specialist Partner', location: 'Kisumu City (Tom Mboya Estate)', services: 'Advanced Restorative Care' },
                { name: 'Dr. Shem Rakawa Dental Clinic', category: 'dental', level: 'Specialist Partner', location: 'Kisumu City', services: 'Dental Consultation & Extraction' },
                { name: 'JOOTRH Dental Clinic', category: 'dental', level: 'Public Specialist', location: 'Kisumu City', services: 'Maxillofacial & Dental Services' },
                { name: 'Royal Dental Clinic (Kisii)', category: 'dental', level: 'Specialist Partner', location: 'Kisii Town (Ouru Complex)', services: 'Dental Treatments & X-rays' },
                { name: 'RAM Hospital Dental Unit', category: 'dental', level: 'Private Accredited', location: 'Kisii Town (Near Law Courts)', services: 'Comprehensive Dental Surgery' },
                { name: 'Kisii Teaching & Referral Hospital (KTRH) - Dental', category: 'dental', level: 'Public Referral', location: 'Kisii Town', services: 'Specialist Dental Care' },
                { name: 'Royal Dental Clinic (Migori)', category: 'dental', level: 'Specialist Partner', location: 'Migori Town (Nyasare Road)', services: 'Dental Extractions & Fillings' },
                { name: 'St. Joseph’s / Ombo Mission Hospital Dental', category: 'dental', level: 'Faith-Based', location: 'Migori Town', services: 'Dental Consultations' },
                { name: 'St. Camillus Mission Hospital Dental', category: 'dental', level: 'Faith-Based', location: 'Sori Town', services: 'Dental Care Services' },

                // =====================================================
                // OPTICAL & EYE TREATMENT FACILITIES
                // =====================================================
                { name: 'Optex Opticians', category: 'optical', level: 'Opticals Only', location: 'HB Town (Salama)', services: 'Prescription Glasses, Frames, Eye Testing' },
                { name: 'St. Paul’s Mission Hospital (Eye Unit)', category: 'optical', level: 'Opticals Only', location: 'HB Town', services: 'Optical Services & Screening' },
                { name: 'Oasis Doctors Plaza (Eye Clinic)', category: 'optical', level: 'Opticals & Eye Treatment', location: 'HB Town (Salama)', services: 'Opticals, Consultations, Eye Treatment' },
                { name: 'Termary Health Care (Eye - Sunday)', category: 'optical', level: 'Opticals & Eye Treatment', location: 'Rachuonyo North', services: 'Specialist Eye Clinics' },
                { name: 'Hawi Family Hospital (Eye - Tuesday)', category: 'optical', level: 'Opticals & Eye Treatment', location: 'Oyugis Town (Kasimba)', services: 'Eye Screening & Opticals' },
                { name: 'Homabay Teaching & Referral Hospital (HTRH) - Eye Unit', category: 'optical', level: 'Eye Treatment Only', location: 'Homabay Town', services: 'Cataract Surgeries, Glaucoma Management' },
                { name: 'Optics Centre Limited', category: 'optical', level: 'Opticals & Eye Treatment', location: 'Kisumu City (Next to Winam Chemist)', services: 'Optical Frames, Eye Treatment (Sundays)' },
                { name: 'Iris Eye Clinic', category: 'optical', level: 'Opticals & Eye Treatment', location: 'Kisumu City (Alpha House)', services: 'Eye Examinations & Treatment' },
                { name: 'Your City Vision Centre Medical & Eye Clinic', category: 'optical', level: 'Opticals & Eye Treatment', location: 'Kisumu City', services: 'Vision Testing & Treatment' },
                { name: 'Trinity Opticals Limited', category: 'optical', level: 'Opticals Only', location: 'Kisumu City (Maseno Univ Plaza)', services: 'Optical Frames & Lenses' },
                { name: 'Kisii Family Medical Centre (Optical)', category: 'optical', level: 'Opticals Only', location: 'Kisii Town (New Sansora Building)', services: 'Optical Services' },
                { name: 'RAM Hospital Optical & Eye Unit', category: 'optical', level: 'Opticals & Eye Treatment', location: 'Kisii Town (Near Law Courts)', services: 'Comprehensive Eye Care & Opticals' },
                { name: 'Lifecare Hospital (Eye - Tuesday)', category: 'optical', level: 'Eye Treatment Only', location: 'Migori Town (Opposite Migori Primary)', services: 'Specialist Eye Treatment' },
                { name: 'Oasis Doctors Plaza (Migori)', category: 'optical', level: 'Opticals & Eye Treatment', location: 'Migori Town (Family Bank Building)', services: 'Opticals & Eye Care Services' }
            ],

            get filteredFacilities() {
                const searchTerm = this.search.toLowerCase().trim();

                return this.facilities.filter(facility => {
                    const matchesSearch = 
                        searchTerm === '' ||
                        facility.name.toLowerCase().includes(searchTerm) ||
                        facility.location.toLowerCase().includes(searchTerm) ||
                        facility.services.toLowerCase().includes(searchTerm);

                    const matchesCategory = 
                        this.selectedCategory === 'all' ||
                        facility.category === this.selectedCategory;

                    const matchesSubCounty = 
                        this.selectedSubCounty === 'all' ||
                        facility.location.toLowerCase().includes(this.selectedSubCounty.toLowerCase());

                    return matchesSearch && matchesCategory && matchesSubCounty;
                });
            }
        }
    }
</script>
@endpush