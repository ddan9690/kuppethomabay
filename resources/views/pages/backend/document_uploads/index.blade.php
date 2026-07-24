@extends('layouts.backend')

@section('title', 'Document Management')

@section('content')
<div class="max-w-6xl mx-auto space-y-6 px-4 sm:px-6">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Document Management</h1>
            <p class="text-gray-600 text-xs sm:text-sm">Upload and manage public downloads, BEC circulars, and petitions/memoranda.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-sm text-xs sm:text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-sm text-xs sm:text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Upload Form Card --}}
    <div class="bg-white rounded-lg shadow p-4 sm:p-6 border border-gray-200">
        <h2 class="text-base sm:text-lg font-bold text-gray-800 mb-4">Upload New Document</h2>

        <form action="{{ route('admin.document_uploads.store') }}" method="POST" enctype="multipart/form-data" 
              x-data="{ submitting: false }" @submit="submitting = true" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            @csrf

            <div>
                <label class="block font-medium text-xs sm:text-sm text-gray-700 mb-1">Document Title</label>
                <input type="text" name="title" value="{{ old('title') }}" 
                    class="border-gray-300 rounded-md shadow-sm w-full border p-2 text-xs sm:text-sm focus:ring-green focus:border-green" 
                    placeholder="e.g. KUPPET By-Laws 2026" required>
            </div>

            <div>
                <label class="block font-medium text-xs sm:text-sm text-gray-700 mb-1">Category Section</label>
                <select name="category" 
                    class="border-gray-300 rounded-md shadow-sm w-full border p-2 text-xs sm:text-sm focus:ring-green focus:border-green" required>
                    <option value="downloads">General Downloads</option>
                    <option value="circulars">BEC Circulars</option>
                    <option value="petitions-memoranda">Petitions & Memoranda</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-xs sm:text-sm text-gray-700 mb-1">Select File (PDF, Word, Image)</label>
                <input type="file" name="document_file" 
                    class="border-gray-300 rounded-md shadow-sm w-full text-xs sm:text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
            </div>

            <div class="md:col-span-3 flex justify-end mt-2">
                <button type="submit" 
                        :disabled="submitting"
                        :class="submitting ? 'opacity-75 cursor-not-allowed' : 'hover:bg-green-dark'"
                        class="bg-green text-white px-5 sm:px-6 py-2 rounded-md font-semibold text-xs sm:text-sm transition flex items-center gap-2">
                    <span x-show="submitting" class="inline-block animate-spin">&#9696;</span>
                    <span x-text="submitting ? 'Publishing...' : 'Upload & Publish'"></span>
                </button>
            </div>
        </form>
    </div>

    {{-- Uploaded Documents Table Card --}}
    <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <h2 class="text-base sm:text-lg font-bold text-gray-800">Published Documents</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 uppercase text-[10px] sm:text-xs tracking-wider border-b">
                        <th class="p-3 sm:p-4">Title</th>
                        <th class="p-3 sm:p-4">Category</th>
                        <th class="p-3 sm:p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-xs sm:text-sm">
                    @forelse($documents as $doc)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 sm:p-4 font-medium text-gray-900">
                            <a href="{{ route('admin.document_uploads.download', $doc->id) }}" class="text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-1.5">
                                <i class='bx bx-download text-sm sm:text-base shrink-0'></i>
                                <span>{{ $doc->title }}</span>
                            </a>
                        </td>
                        <td class="p-3 sm:p-4">
                            <span class="px-2 sm:px-2.5 py-0.5 sm:py-1 text-[10px] sm:text-xs font-semibold rounded-full bg-green-50 text-green-700 uppercase">
                                {{ str_replace('-', ' ', $doc->category) }}
                            </span>
                        </td>
                        <td class="p-3 sm:p-4 text-right">
                            <form action="{{ route('admin.document_uploads.destroy', $doc->id) }}" method="POST" class="inline-block" 
                                  onsubmit="return confirm('Are you sure you want to delete this document?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 hover:underline font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-6 text-center text-gray-500 text-xs sm:text-sm">No documents have been uploaded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($documents->hasPages())
            <div class="p-3 sm:p-4 border-t border-gray-200 text-xs sm:text-sm">
                {{ $documents->links() }}
            </div>
        @endif
    </div>

</div>
@endsection