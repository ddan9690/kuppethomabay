@extends('layouts.backend')

@section('title', 'Edit News')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">

        <h2 class="text-2xl font-bold text-green mb-6">Edit News</h2>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.news.update', $news->id) }}"
              method="POST"
              enctype="multipart/form-data"
              id="news-form"
              class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <input type="text" name="title"
                   value="{{ old('title', $news->title) }}"
                   class="w-full border p-2 rounded" required>

            {{-- Current Image --}}
            @if($news->image)
                <div>
                    <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/'.$news->image) }}" class="w-40 rounded">
                </div>
            @endif

            {{-- Replace Image --}}
            <div>
                <label class="block mb-1">Replace Image (optional)</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>

            {{-- Visibility --}}
            <select name="visibility" class="w-full border p-2 rounded">
                <option value="public" {{ $news->visibility=='public'?'selected':'' }}>Public</option>
                <option value="hidden" {{ $news->visibility=='hidden'?'selected':'' }}>Hidden</option>
            </select>

            {{-- Quill --}}
            <div id="quill-editor"></div>
            <textarea name="body" id="body" class="hidden">{{ old('body', $news->body) }}</textarea>

            <button class="bg-green text-white px-4 py-2 rounded">
                Update News
            </button>
        </form>

    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
const quill = new Quill('#quill-editor', {
    theme: 'snow'
});

// Load existing content
quill.root.innerHTML = `{!! old('body', addslashes($news->body)) !!}`;

// Sync before submit
document.getElementById('news-form').addEventListener('submit', function () {
    document.getElementById('body').value = quill.root.innerHTML;
});
</script>
@endpush