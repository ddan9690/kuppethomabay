@extends('layouts.frontend') {{-- Update to match your layout name if different --}}

@section('content')
<div class="bg-gray-light py-12">
    <div class="container mx-auto px-4 max-w-5xl bg-white p-8 rounded shadow">

        {{-- Main Announcement Heading --}}
        <h1 class="text-2xl md:text-3xl font-bold text-green mb-6 uppercase">
            Notification of BEC-Selected Pro-Rata Delegates to the 2026 Annual Delegates Conference (ADC)
        </h1>

        {{-- Recipient info --}}
        <p class="font-semibold text-gray-dark mb-4">TO: ALL KUPPET HOMA BAY BRANCH MEMBERS.</p>

        {{-- Descriptive Text from Announcement --}}
        <div class="text-gray-dark space-y-4 mb-8 leading-relaxed text-base">
            <p>
                The Branch Executive Committee (BEC) wishes to inform all members that it has selected 44 pro-rata delegates from KUPPET Homa Bay Branch to participate in the forthcoming Annual Delegates Conference (ADC), scheduled for Saturday, 21st November 2026, in Diani, Kwale County.
            </p>
            <p>
                The selected delegates are as follows:
            </p>
        </div>

        {{-- Data Table (Exact contents un-modified) --}}
        <div class="overflow-x-auto mb-8">
            <table class="w-full border-collapse border border-gray-300 text-left text-sm">
                <thead>
                    <tr class="bg-green text-white">
                        <th class="border border-gray-300 p-3 w-16">Sno</th>
                        <th class="border border-gray-300 p-3">Name</th>
                        <th class="border border-gray-300 p-3">School</th>
                        <th class="border border-gray-300 p-3">Sub-County</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr><td class="border p-2">1</td><td class="border p-2">Olonde Jackline</td><td class="border p-2">Othoro SS</td><td class="border p-2">Rachounyo East</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">2</td><td class="border p-2">Brian Okumu</td><td class="border p-2">Kolwa JS</td><td class="border p-2">Rachuonyo East</td></tr>
                    <tr><td class="border p-2">3</td><td class="border p-2">Martin Ouma</td><td class="border p-2">Ringa Boys SS</td><td class="border p-2">Rachuonyo East</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">4</td><td class="border p-2">Kenton Wayoga</td><td class="border p-2">Ringa JS</td><td class="border p-2">Rachuonyo East</td></tr>
                    <tr><td class="border p-2">5</td><td class="border p-2">Fredrick Otieno</td><td class="border p-2">Ringa Girls SS</td><td class="border p-2">Rachuonyo East</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">6</td><td class="border p-2">Violet Moraa</td><td class="border p-2">Dudi Girls SS</td><td class="border p-2">Rachuonyo East</td></tr>
                    <tr><td class="border p-2">7</td><td class="border p-2">Everline Achieng</td><td class="border p-2">Agoro Sare SS</td><td class="border p-2">Rachuonyo South</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">8</td><td class="border p-2">Peter Ochieng</td><td class="border p-2">Nyalenda SS</td><td class="border p-2">Rachuonyo South</td></tr>
                    <tr><td class="border p-2">9</td><td class="border p-2">Erick Odhiambo</td><td class="border p-2">Nyagowa JS</td><td class="border p-2">Rachuonyo South</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">10</td><td class="border p-2">Isaac Jelix</td><td class="border p-2">Nyagowa Lutheran SS</td><td class="border p-2">Rachuonyo South</td></tr>
                    <tr><td class="border p-2">11</td><td class="border p-2">Glance Omolo</td><td class="border p-2">Nyatwere JS</td><td class="border p-2">Rachuonyo South</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">12</td><td class="border p-2">Valary Achieng</td><td class="border p-2">Akwakra JS</td><td class="border p-2">Rachuonyo North</td></tr>
                    <tr><td class="border p-2">13</td><td class="border p-2">Kennedy Othim</td><td class="border p-2">Kobala SS</td><td class="border p-2">Rachuonyo North</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">14</td><td class="border p-2">Maurice Miri</td><td class="border p-2">Kendu Muslim SS</td><td class="border p-2">Rachuonyo North</td></tr>
                    <tr><td class="border p-2">15</td><td class="border p-2">Linda Akinyi</td><td class="border p-2">Gogo SS</td><td class="border p-2">Rachuonyo West</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">16</td><td class="border p-2">Robert Jowi</td><td class="border p-2">St. Benards Otaro SS</td><td class="border p-2">Rachuonyo West</td></tr>
                    <tr><td class="border p-2">17</td><td class="border p-2">Adika David</td><td class="border p-2">Kisindi JS</td><td class="border p-2">Rachuonyo West</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">18</td><td class="border p-2">Erick Mikume</td><td class="border p-2">Got Okii JS</td><td class="border p-2">Rachuonyo West</td></tr>
                    <tr><td class="border p-2">19</td><td class="border p-2">Jared Ngole</td><td class="border p-2">Luora SS</td><td class="border p-2">Rangwe</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">20</td><td class="border p-2">Phanice Akinyi</td><td class="border p-2">Ang'iro SS</td><td class="border p-2">Rangwe</td></tr>
                    <tr><td class="border p-2">21</td><td class="border p-2">Raynhard Abugi</td><td class="border p-2">Achego JS</td><td class="border p-2">Rangwe</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">22</td><td class="border p-2">Wycliffe Sing'a</td><td class="border p-2">Nyawita SS</td><td class="border p-2">Rangwe</td></tr>
                    <tr><td class="border p-2">23</td><td class="border p-2">Garret Oloo</td><td class="border p-2">Asumbi Mixed JS</td><td class="border p-2">Rangwe</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">24</td><td class="border p-2">Reagan Otieno</td><td class="border p-2">Nyahuu Girls SS</td><td class="border p-2">Homa Bay</td></tr>
                    <tr><td class="border p-2">25</td><td class="border p-2">Quinter Akoth</td><td class="border p-2">Ogande Girls SS</td><td class="border p-2">Homa Bay</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">26</td><td class="border p-2">Lazarus Buore</td><td class="border p-2">Muche JS</td><td class="border p-2">Homa Bay</td></tr>
                    <tr><td class="border p-2">27</td><td class="border p-2">Kennedy Omollo</td><td class="border p-2">St. Ambrose Got Rabuor SS</td><td class="border p-2">Homa Bay</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">28</td><td class="border p-2">Walter Odiaga</td><td class="border p-2">Rarage SS</td><td class="border p-2">Ndhiwa East</td></tr>
                    <tr><td class="border p-2">29</td><td class="border p-2">Sophia Adhiambo</td><td class="border p-2">Obera Boys SS</td><td class="border p-2">Ndhiwa East</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">30</td><td class="border p-2">Erick Oketch</td><td class="border p-2">Omoya JS</td><td class="border p-2">Ndhiwa East</td></tr>
                    <tr><td class="border p-2">31</td><td class="border p-2">James Wandugu</td><td class="border p-2">Kamasi JS</td><td class="border p-2">Ndhiwa West</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">32</td><td class="border p-2">Belinda Atieno</td><td class="border p-2">Oridi Girls</td><td class="border p-2">Ndhiwa West</td></tr>
                    <tr><td class="border p-2">33</td><td class="border p-2">Bonpeter Ogutu</td><td class="border p-2">Nyoniang' JS</td><td class="border p-2">Ndhiwa West</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">34</td><td class="border p-2">Victor Opija</td><td class="border p-2">Alara SS</td><td class="border p-2">Ndhiwa West</td></tr>
                    <tr><td class="border p-2">35</td><td class="border p-2">Isasi Michael</td><td class="border p-2">Waondo SS</td><td class="border p-2">Suba North</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">36</td><td class="border p-2">Eunice Rayuoyi</td><td class="border p-2">Lambwe SS</td><td class="border p-2">Suba North</td></tr>
                    <tr><td class="border p-2">37</td><td class="border p-2">Goroba Daniel</td><td class="border p-2">Tom Mboya Boys SS</td><td class="border p-2">Suba North</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">38</td><td class="border p-2">Fredrick Kisumu</td><td class="border p-2">Usare JS</td><td class="border p-2">Suba North</td></tr>
                    <tr><td class="border p-2">39</td><td class="border p-2">Nancy Otenga</td><td class="border p-2">God Oloo SS</td><td class="border p-2">Suba South</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">40</td><td class="border p-2">Victor Arende</td><td class="border p-2">Seka JS</td><td class="border p-2">Suba South</td></tr>
                    <tr><td class="border p-2">41</td><td class="border p-2">George Kennedy</td><td class="border p-2">Moi Girl's Sindo SS</td><td class="border p-2">Suba Central</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">42</td><td class="border p-2">Clemensia Mandere</td><td class="border p-2">Bongu JS</td><td class="border p-2">Suba Central</td></tr>
                    <tr><td class="border p-2">43</td><td class="border p-2">Edwin Otieno</td><td class="border p-2">Nyakweri SS</td><td class="border p-2">Suba West</td></tr>
                    <tr class="bg-gray-50"><td class="border p-2">44</td><td class="border p-2">Fredrick Otieno</td><td class="border p-2">Nyakweri SS</td><td class="border p-2">Suba West</td></tr>
                </tbody>
            </table>
        </div>

        {{-- Concluding statement & signatures --}}
        <div class="text-gray-dark space-y-4 mb-8 text-base">
            <p>
                The selected delegates are expected to represent the interests of KUPPET Homa Bay Branch and participate actively in the deliberations and other proceedings of the conference.
            </p>
            <p class="font-semibold pt-2">
                Yours in Service,<br>
                <span class="text-lg text-black font-bold">Thomas Odhiambo Okoth.</span><br>
                Executive Secretary (KUPPET Homa Bay).
            </p>
        </div>

        {{-- Download Document Link / Button --}}
        <div class="border-t pt-6 flex justify-between items-center">
            <a href="{{ route('downloads') }}" class="text-green hover:underline font-semibold text-sm">
                &larr; Back to Downloads / Announcements
            </a>
            
            {{-- Download link mapping directly to public/assets/documents/HB Branch Pro-rata list.pdf --}}
            <a href="{{ asset('assets/documents/HB Branch Pro-rata list.pdf') }}" download class="inline-flex items-center gap-2 bg-gold hover:bg-gold-dark text-white px-6 py-3 rounded font-bold transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Download
            </a>
        </div>

    </div>
</div>
@endsection