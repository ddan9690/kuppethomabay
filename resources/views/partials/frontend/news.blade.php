<section class="bg-gray-light py-16">
    <div class="container mx-auto px-4">

        <h2 class="text-3xl md:text-4xl font-bold text-green text-center mb-10">
            Latest News & Updates
        </h2>

        <div class="grid gap-8 md:grid-cols-2">
            @forelse($newsItems as $news)
                <div class="bg-white rounded shadow hover:shadow-lg transition overflow-hidden">
                    
                    {{-- Image --}}
                    @if($news->image)
                        <img 
                            src="{{ asset('storage/' . $news->image) }}" 
                            alt="{{ $news->title }}" 
                            class="w-full aspect-[16/9] object-cover object-top"
                        >
                    @endif

                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-green mb-2">
                            {{ $news->title }}
                        </h3>

                        {{-- Excerpt --}}
                        <p class="text-gray-dark mb-4">
                            {{ $news->excerpt }}
                        </p>

                        <a href="{{ route('news.show', $news->slug) }}" 
                           class="text-gold hover:text-gold-dark font-semibold transition">
                            Read More →
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-2">
                    No news available at the moment.
                </p>
            @endforelse
        </div>

    </div>
</section>