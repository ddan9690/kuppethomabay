@extends('layouts.backend')

@section('title', 'Manage News - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-6xl">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-green">
                Manage News
            </h2>

            <a href="{{ route('admin.news.create') }}"
               class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark transition">
                + Add News
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="newsTable" class="min-w-full border border-gray-200 rounded">
                
                <thead class="bg-green text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2 text-left">Created</th>
                        <th class="px-4 py-2 text-left">Image</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($newsItems as $news)
                        <tr class="hover:bg-gray-50 transition">

                            {{-- Title --}}
                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ $news->title }}
                            </td>

                            {{-- Date --}}
                            <td class="px-4 py-3 text-gray-600">
                                {{ $news->created_at->format('d M y') }}
                            </td>

                            {{-- Image --}}
                            <td class="px-4 py-3">
                                @if($news->image)
                                    <img src="{{ asset('storage/'.$news->image) }}" 
                                         alt="{{ $news->title }}" 
                                         class="w-20 h-14 object-cover rounded shadow">
                                @else
                                    <span class="text-gray-400 text-sm">No Image</span>
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-3">
                                <div class="flex justify-center items-center gap-2">

                                    <a href="{{ route('admin.news.edit', $news) }}"
                                       class="bg-blue text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.news.destroy', $news) }}" 
                                          method="POST"
                                          onsubmit="return confirm('Delete this news article?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" 
                                                class="bg-red text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                                No news found. Start by adding your first article.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#newsTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true
        });
    });
</script>
@endpush