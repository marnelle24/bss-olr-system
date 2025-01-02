<x-guest-layout>
    <!-- Main container with gradient background -->
    <div class="min-h-screen bg-gradient-to-b from-zinc-50 via-25% via-teal-100 to-teal-500">
        <div class="relative w-full xl:h-[650px] h-auto overflow-hidden">
            @php
                $isCarousel = false;
            @endphp
            @if ($isCarousel)
                <div class="carousel relative w-full h-full">
                    <!-- Carousel items -->
                    <div x-data="{ activeSlide: 0, slides: [1, 2, 3] }" class="relative w-full h-full">
                        <!-- Slides -->
                        <div class="relative h-full">
                            <template x-for="(slide, index) in slides" :key="index">
                                <div x-show="activeSlide === index" 
                                    class="absolute top-0 left-0 w-full h-full transition-opacity duration-500"
                                    x-transition:enter="transition ease-out duration-500"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-500"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0">
                                    <img :src="`/images/slide-${slide}.jpg`" class="object-cover w-full h-full" alt="Slide">
                                    <div class="absolute inset-0 bg-zinc-100 opacity-10"></div>
                                    <div class="absolute inset-0 flex items-center justify-center text-indigo-700">
                                        <div class="text-center">
                                            <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">Welcome to Our Community</h1>
                                            <p class="text-xl drop-shadow-lg">Discover amazing events and connect with others</p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <!-- Carousel Controls -->
                        <div class="absolute bottom-5 left-0 right-0 flex justify-center space-x-2">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button @click="activeSlide = index" 
                                    :class="{'bg-white': activeSlide === index, 'bg-white/50': activeSlide !== index}"
                                    class="w-3 h-3 rounded-full transition-all duration-300"></button>
                            </template>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Image Vector Section -->
            <div class="max-w-6xl mx-auto px-4 py-16">
                <div class="grid lg:grid-cols-2 md:grid-cols-2 gap-8">
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="w-full xl:text-6xl text-4xl xl:text-left md:text-left text-center font-extrabold font-nunito mb-4 drop-shadow-lg text-teal-600">
                            Welcome to the streams and life's lesson
                        </h1>
                        <div class="flex flex-col gap-4">
                            <p class="xl:text-xl text-md xl:text-left md:text-left text-center text-teal-600 drop-shadow">
                                Discover amazing events and connect with others. Learn more about Streams Of Life.
                            </p>
                            <p class="xl:text-xl text-lg xl:text-left md:text-left text-center text-teal-600 drop-shadow">
                                High quality, high impact, high value trainers & speakers.
                            </p>
                        </div>
                        <div class="w-full flex xl:justify-start md:justify-start justify-center items-start mt-8">
                            <button class="bg-teal-600 text-white px-7 xl:py-3 py-2 hover:-translate-y-1 text-xl rounded-full duration-300 hover:bg-teal-500 shadow-md drop-shadow">
                                Learn More
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('images/people-vector.png') }}" alt="Hero Image" class="xl:w-full xl:h-full lg:w-96 lg:h-full md:w-100 md:h-80 sm:h-48 sm:w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Carousel Section -->
        <div class="border-t-4 border-teal-800/10 bg-gradient-to-b from-teal-800/20 to-white/40 via-teal-100 via-80%">
            <x-programme.events-carousel :events="$events" />
        </div>

        <!-- Courses Carousel Section -->
        <div class="bg-gradient-to-b from-teal-800/10 to-white/60 via-white/10 via-80%">
            <x-programme.courses-carousel :courses="$courses" />
        </div>

        <!-- About Us Section -->
        <div class="bg-gradient-to-b from-white/10 to-white/60 via-white/10 via-80%">
            <div class="max-w-6xl mx-auto px-4 py-16">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="text-white">
                        <h2 class="text-3xl font-bold mb-6">About Us</h2>
                        <p class="text-white/80 mb-6">
                            We are a community dedicated to spreading love, hope, and faith. 
                            Our mission is to create meaningful connections and foster spiritual growth.
                        </p>
                        <button class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                            Learn More About Us
                        </button>
                    </div>
                    <div class="relative h-96">
                        <img src="/images/about-us.jpg" alt="About Us" 
                            class="rounded-lg object-cover w-full h-full shadow-xl">
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="bg-white/10 backdrop-blur-sm">
            <div class="max-w-6xl mx-auto px-4 py-16">
                <h2 class="text-3xl font-bold text-white mb-12 text-center">Our Services</h2>
                <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                    @foreach(['Community Events', 'Bible Study', 'Youth Programs'] as $service)
                        <div class="bg-white/20 backdrop-blur-sm rounded-lg p-8 text-white transform transition hover:-translate-y-1">
                            <h3 class="text-xl font-semibold mb-4">{{$service}}</h3>
                            <p class="text-white/80">
                                Detailed description of {{$service}} and how it benefits our community members.
                            </p>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>

        <!-- Partners Section -->
        <div class="bg-white/70 backdrop-blur-sm min-h-[350px]">
            <div class="max-w-7xl mx-auto px-4 py-16">
                <h2 class="text-4xl font-bold text-slate-600 mb-12 text-center font-nunito tracking-wider">Our Partners</h2>
                <div class="flex flex-wrap justify-center items-center gap-12">
                    @foreach([4,5,6,4,9,4,5,6] as $partner)
                            <img 
                                src="{{ asset('images/partners/' . $partner . '.png') }}" 
                                alt="Partner {{ $partner }}"
                                class="w-40 h-40 object-contain filter brightness-100 prose-invert transition-all duration-300"
                            >
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-teal-900 text-white/80">
            <div class="max-w-7xl mx-auto px-4 py-12">
                <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-white font-semibold mb-4">About</h3>
                        <p class="text-sm">Brief description of your organization and its mission.</p>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-white">Home</a></li>
                            <li><a href="#" class="hover:text-white">Events</a></li>
                            <li><a href="#" class="hover:text-white">Services</a></li>
                            <li><a href="#" class="hover:text-white">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold mb-4">Contact</h3>
                        <ul class="space-y-2 text-sm">
                            <li>123 Street Name</li>
                            <li>City, Country</li>
                            <li>contact@email.com</li>
                            <li>+1 234 567 890</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <!-- Social Media Icons -->
                            <a href="#" class="hover:text-white"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="hover:text-white"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-white/10 mt-8 pt-8 text-center text-sm">
                    <p>&copy; {{ date('Y') }} Your Organization. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    @push('styles')
    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        /* For touch devices */
        @media (hover: none) {
            .snap-x {
                scroll-snap-type: x mandatory;
                -webkit-overflow-scrolling: touch;
            }
            .snap-center {
                scroll-snap-align: center;
            }
            /* Hide navigation buttons on touch devices */
            .group-hover\/carousel\:opacity-100 {
                opacity: 0 !important;
            }
        }
    </style>
    @endpush
</x-guest-layout>