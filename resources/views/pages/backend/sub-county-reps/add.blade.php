@extends('layouts.backend')

@section('title', 'Add Sub-County BBF Rep - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">

        <h2 class="text-2xl md:text-3xl font-bold text-green mb-6">
            Add Sub-County BBF Rep
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('sub_county_bbf_reps.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="user_id" class="block mb-1 font-medium text-gray-700">Select User</label>
                <select name="user_id" id="user_id" class="w-full border border-gray-300 p-2 rounded">
                    <option value="">-- Choose User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ ($user->salutation ?? '') . ' ' . $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="sub_county_id" class="block mb-1 font-medium text-gray-700">Sub-County</label>
                <select name="sub_county_id" id="sub_county_id" class="w-full border border-gray-300 p-2 rounded">
                    <option value="">-- Choose Sub-County --</option>
                    @foreach($subCounties as $subCounty)
                        <option value="{{ $subCounty->id }}">{{ $subCounty->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark transition">
                    Add Sub-County BBF Rep
                </button>
            </div>
        </form>

    </div>
</section>
@endsection