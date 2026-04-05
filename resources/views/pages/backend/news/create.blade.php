<!-- resources/views/pages/backend/news/create.blade.php -->
@extends('layouts.backend')

@section('title', 'Add News - KUPPET Homabay Branch')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<style>
    .ql-toolbar.ql-snow {
        border: 1px solid #d1d5db;
        border-bottom: none;
        border-radius: 0.375rem 0.375rem 0 0;
        background-color: #f9fafb;
    }
    .ql-container.ql-snow {
        border: 1px solid #d1d5db;
        border-radius: 0 0 0.375rem 0.375rem;
        font-size: 0.95rem;
        font-family: inherit;
    }
    .ql-editor {
        min-height: 220px;
    }
    .ql-editor.ql-blank::before {
        font-style: normal;
        color: #9ca3af;
    }
</style>
@endpush

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">

        <h2 class="text-2xl md:text-3xl font-bold text-green mb-6">
            Add News
        </h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.news.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4"
              id="news-form"
        >
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block mb-1 font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                       class="w-full border border-gray-300 p-2 rounded"
                       value="{{ old('title') }}" required>
            </div>

            {{-- Image Checkbox --}}
            <div class="mb-2 flex items-center">
                <input type="checkbox" id="has_image" class="mr-2"
                       x-data x-on:change="document.getElementById('image-group').classList.toggle('hidden')">
                <label for="has_image" class="text-gray-700 font-medium">Add an Image?</label>
            </div>

            {{-- Image Input (hidden by default) --}}
            <div id="image-group" class="hidden">
                <label for="image" class="block mb-1 font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image"
                       class="w-full border border-gray-300 p-2 rounded">
            </div>

            {{-- Visibility --}}
            <div>
                <label for="visibility" class="block mb-1 font-medium text-gray-700">Visibility</label>
                <select name="visibility" id="visibility"
                        class="w-full border border-gray-300 p-2 rounded">
                    <option value="public"  {{ old('visibility') == 'public'  ? 'selected' : '' }}>Public</option>
                    <option value="hidden"  {{ old('visibility') == 'hidden'  ? 'selected' : '' }}>Hidden</option>
                </select>
            </div>

            {{-- Content (Quill Editor) --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Content</label>

                {{-- Quill Editor --}}
                <div id="quill-editor"></div>

                {{-- Hidden textarea submitted to Laravel --}}
                <textarea id="body" name="body" class="hidden">{{ old('body') }}</textarea>

                @error('body')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                        class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark transition">
                    Publish News
                </button>
            </div>

        </form>

    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Write your news content here...',
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ color: [] }, { background: [] }],
                [{ list: 'ordered' }, { list: 'bullet' }],
                [{ indent: '-1' }, { indent: '+1' }],
                [{ align: [] }],
                ['blockquote', 'code-block'],
                ['link'],
                ['clean'],
            ],
        },
    });

    // Restore old input on validation failure
    const oldBody = document.getElementById('body').value.trim();
    if (oldBody) {
        quill.clipboard.dangerouslyPasteHTML(oldBody);
    }

    // Sync Quill HTML into hidden textarea before submit
    document.getElementById('news-form').addEventListener('submit', function () {
        document.getElementById('body').value = quill.root.innerHTML;
    });
</script>
@endpush