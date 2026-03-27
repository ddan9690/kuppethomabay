<section x-data="heroCarousel()" x-init="init()" class="relative w-full overflow-hidden h-[450px] md:h-[550px]">
    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="current === index" 
             x-transition:enter="transition-opacity duration-1000" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-1000" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full flex justify-center items-center">
            
            <!-- Image -->
            <img :src="slide.image" alt="" class="w-full h-full object-contain">
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/20"></div>
            
            <!-- Overlay Text -->
            <div class="absolute inset-0 flex flex-col justify-center items-center md:items-start px-6 md:px-20 text-center md:text-left">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-2 drop-shadow-lg" x-text="slide.title"></h1>
                <p class="text-base md:text-xl mb-4 leading-relaxed text-white drop-shadow-md" x-text="slide.subtitle"></p>
                <div class="flex flex-col md:flex-row gap-4">
                    <a href="{{ url('/contact') }}"
                       class="bg-gold hover:bg-gold-dark text-white px-5 py-2 rounded font-semibold transition">
                        Get in Touch
                    </a>
                    <a href="{{ url('/about') }}"
                       class="bg-white hover:bg-gray-light text-green px-5 py-2 rounded font-semibold transition">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Dots -->
    <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="goToSlide(index)" 
                    :class="{'bg-gold': current === index, 'bg-white/50': current !== index}"
                    class="w-3 h-3 rounded-full transition-all"></button>
        </template>
    </div>
</section>

<script>
function heroCarousel() {
    return {
        current: 0,
        slides: [
            {
                image: '/assets/images/tom-odhiambo-kuppet-homabay-executive-secretary-handover.jpg',
                title: 'Welcome to KUPPET Homa Bay',
                subtitle: 'Empowering teachers and shaping the future of education'
            },
            {
                image: '/assets/images/kuppet-officials-led-by-chairman-donating-trophy.jpg',
                title: 'Supporting Co-Curricular Excellence',
                subtitle: 'KUPPET promotes holistic development through school activities'
            },
            {
                image: '/assets/images/treasurer-tembo-mwadime-presenting-trophy.jpg',
                title: 'Recognizing Outstanding Achievements',
                subtitle: 'Celebrating success and inspiring future leaders'
            }
        ],
        init() {
            this.startAutoSlide();
        },
        startAutoSlide() {
            setInterval(() => {
                this.current = (this.current + 1) % this.slides.length;
            }, 5000);
        },
        goToSlide(index) {
            this.current = index;
        }
    }
}
</script>