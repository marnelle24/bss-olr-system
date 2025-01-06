<x-guest-layout>
    <div class="relative min-h-screen bg-gradient-to-b from-zinc-50 via-25% via-teal-100 to-teal-500">
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
                            <a href="#about-us" class="bg-gradient-to-r from-teal-600 via-teal-600 to-teal-600 hover:from-teal-600 hover:via-teal-500 hover:to-teal-600 text-white px-7 xl:py-3 py-2 hover:-translate-y-1 text-xl rounded-full duration-300 hover:bg-teal-500 shadow-md drop-shadow">
                                Learn More About Us
                            </a>
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
        {{-- <div class="bg-gradient-to-b from-teal-600 to-white/60 via-white/50 via-90%"> --}}
        <div class="bg-teal-600">
            @php
                $courses = [
                    [
                        'title' => 'How to Train your Daughter',
                        'thumbnail' => 'https://www.biblesociety.sg/wp-content/uploads/2024/02/Reading-ACTS-TN.jpg',
                        'trainer_image' => 'images/speaker-trainer/speaker-dummy.png',
                        'trainer' => 'Mr. Johnny Depp',
                        'description' => 'How to Train your Daughter. How to Train your Daughter. How to Train your Daughter',
                        'price' => '59.99',
                        'isPromo' => true
                    ],
                    [
                        'title' => 'Building a Strong Grip using Ai',
                        'thumbnail' => 'https://biblesociety.sg/wp-content/uploads/SIBD/artworks/EYHY2022-3-thumb.jpg',
                        'trainer_image' => 'images/speaker-trainer/speaker-dummy.png',
                        'trainer' => 'Dr. Anatoly',
                        'description' => 'Building a Strong Grip using Ai. Building a Strong Grip using AiBuilding a Strong Grip using Ai.',
                        'price' => '19',
                        'isPromo' => false
                    ],
                    [
                        'title' => 'Make A Living for Dummies',
                        'thumbnail' => 'https://www.biblesociety.sg/wp-content/uploads/2024/07/2025-Chi-D6-Poster-Temp-TN-1.jpg',
                        'trainer_image' => 'images/speaker-trainer/speaker-dummy.png',
                        'trainer' => 'Monsor Del Rosario',
                        'description' => 'Make A Living for Dummies. Make A Living for Dummies. Make A Living for DummiesMake A Living for Dummies',
                        'price' => '130',
                        'isPromo' => false
                    ],
                ];
            @endphp
            <x-programme.courses-carousel :courses="$courses" />
        </div>

        <!-- About Us Section -->
        <div id="about-us" class="bg-gradient-to-b from-white/10 to-white/60 via-white/10 via-80%">
            <div class="max-w-6xl mx-auto px-4 py-20">
                <div class="grid lg:grid-cols-2 gap-12">
                    <div class="flex flex-col xl:justify-start xl:items-start justify-center items-center">
                        <h1 class="w-full xl:text-6xl text-4xl xl:text-left md:text-left text-center font-extrabold font-nunito mb-4 drop-shadow-lg text-slate-600">
                            About Us
                        </h1>
                        <p class="text-slate-600 text-xl drop-shadow my-5 leading-8 xl:text-left md:text-left text-center">
                            We are a community dedicated to spreading love, hope, and faith. 
                            Our mission is to create meaningful connections and foster spiritual growth.
                        </p>
                        <p class="text-slate-600 text-xl drop-shadow my-5 leading-8 xl:text-left md:text-left text-center">
                            By providing a platform for spiritual growth and community engagement, we aim to inspire and uplift our members.
                            High quality, high impact, high value events and courses. As well as trainers and speakers.
                        </p>
                        <br />
                        <br />
                        <button class="bg-gradient-to-r from-teal-600 via-teal-600 to-teal-600 hover:from-teal-600 hover:via-teal-500 hover:to-teal-600 text-white px-7 xl:py-3 py-2 hover:-translate-y-1 text-2xl rounded-full duration-300 hover:bg-teal-500 shadow-md drop-shadow">
                            Partner with Us
                        </button>
                    </div>
                    <div class="flex justify-center items-end">
                        <img src="{{ asset('images/partnership-vector.png') }}" alt="About Us" class="object-cover w-full">
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="bg-gradient-to-r from-slate-600/40 to-slate-600/40 via-slate-500/50 via-50%">
            <div class="max-w-6xl mx-auto px-4 py-20">
                <h2 class="text-4xl font-bold text-slate-100 uppercase mb-12 text-center font-nunito tracking-wider drop-shadow">Our Services</h2>
                <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                    @foreach(['Community Events', 'Bible Study', 'Youth Programs'] as $service)
                        <div class="relative bg-white/10 border-2 border-white/20 backdrop-blur-sm rounded-lg p-8 text-white">
                            <h3 class="text-2xl font-semibold mb-4 drop-shadow">
                                <div class="flex items-center gap-2">
                                    <i class="fa fa-church text-2xl"></i>
                                    {{$service}}
                                </div>
                            </h3>
                            <div class="flex flex-col gap-2 min-h-[300px] overflow-hidden">
                                <p class="text-white/80">
                                    Detailed description of {{$service}} and how it benefits our community members.
                                    Detailed description of {{$service}} and how it benefits our community members.
                                </p>
                                <p class="text-white/80 mt-4">
                                    Detailed description of {{$service}} and how it benefits our community members.
                                    Detailed description of {{$service}} and how it benefits our community members.
                                </p>
                            </div>

                            <div class="flex justify-center items-center mt-6">
                                <a href="#" class="border border-teal-600 hover:bg-white/70 hover:text-teal-600 bg-teal-600 text-white px-7 xl:py-2 py-1 hover:scale-105 text-sm rounded-full duration-300 shadow-md drop-shadow">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Partners Section -->
        <div class="bg-white/70 backdrop-blur-sm min-h-[350px]">
            <div class="max-w-7xl mx-auto px-4 py-16">
                <h2 class="text-4xl font-bold text-slate-600 mb-12 text-center font-nunito tracking-wider uppercase drop-shadow">Our Partners</h2>
                <div class="flex flex-wrap justify-center items-center xl:gap-8 gap-4">
                    @foreach([4,5,6,4,9,4,5,6] as $partner)
                            <img src="{{ asset('images/partners/' . $partner . '.png') }}" alt="Partner {{ $partner }}" class="w-40 h-40 object-contain filter brightness-100 prose-invert transition-all duration-300">
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Footer -->
        <x-footer-public />
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