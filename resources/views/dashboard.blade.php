@extends('layouts.user')

@section('content')
    <div class="relative">
        <!-- Full-width background image -->
        <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('https://images.unsplash.com/photo-1595434091143-b375ced5fe5c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); height: 85vh;">
            <div class="absolute inset-0 bg-black opacity-20"></div>
        </div>
        
        <div class="container mx-auto px-6 pt-32 pb-48 relative z-10" x-data="{ fadeIn: false }" x-init="setTimeout(() => fadeIn = true, 500)">
            <div class="max-w-3xl transition-all duration-1000" :class="fadeIn ? 'opacity-100 transform translate-y-0' : 'opacity-0 transform translate-y-10'">
                <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-6">Where Imaginations <br>Come to Life</h1>
                <p class="text-xl text-white mb-8 md:pr-12">Premium vinyl playsets designed for endless adventures, built to last for generations of fun.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#featured" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center">
                        <span>Explore Playsets</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="#contact" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center">
                        <span>Get a Quote</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-20 bg-white" id="features">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Why Families Choose SwingIt</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Our premium playsets are designed with both children and parents in mind.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-all duration-300" 
                     x-data="{ hover: false }" 
                     @mouseenter="hover = true" 
                     @mouseleave="hover = false">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-yellow-100 text-yellow-500 rounded-full text-3xl" :class="{ 'transform scale-110': hover }">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Premium Quality</h3>
                    <p class="text-gray-600">Durable vinyl construction that withstands years of active play without fading, splintering, or requiring maintenance.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-all duration-300" 
                     x-data="{ hover: false }" 
                     @mouseenter="hover = true" 
                     @mouseleave="hover = false">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-blue-100 text-blue-500 rounded-full text-3xl" :class="{ 'transform scale-110': hover }">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Custom Designs</h3>
                    <p class="text-gray-600">Create a personalized playset that fits your space, budget, and your children's unique play preferences.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-all duration-300" 
                     x-data="{ hover: false }" 
                     @mouseenter="hover = true" 
                     @mouseleave="hover = false">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-green-100 text-green-500 rounded-full text-3xl" :class="{ 'transform scale-110': hover }">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Safety First</h3>
                    <p class="text-gray-600">Built with rounded edges, secure connections, and premium materials that meet rigorous safety standards.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="py-20 bg-gray-50" id="featured">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Most Popular Playsets</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Endless adventures start with a SwingIt playset.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" 
                     x-data="{ hover: false }" 
                     @mouseenter="hover = true" 
                     @mouseleave="hover = false">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1605276277265-84f97da7d47a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Adventure Playset" class="w-full h-64 object-cover transition-all duration-500" :class="{ 'transform scale-105': hover }">
                        <div class="absolute top-4 right-4 bg-yellow-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                            Popular
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Adventure World</h3>
                        <p class="text-gray-600 mb-4">Packed with fun: slides, swings, climbing wall, and monkey bars in a compact design.</p>
                        <a href="#" class="text-yellow-500 font-medium hover:text-yellow-600 transition inline-flex items-center">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" 
                     x-data="{ hover: false }" 
                     @mouseenter="hover = true" 
                     @mouseleave="hover = false">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1575783970733-1aaedde1db74?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Castle Kingdom Playset" class="w-full h-64 object-cover transition-all duration-500" :class="{ 'transform scale-105': hover }">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                            New
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Castle Kingdom</h3>
                        <p class="text-gray-600 mb-4">A royal playground with turrets, wave slides, and a spacious playhouse for imaginative play.</p>
                        <a href="#" class="text-yellow-500 font-medium hover:text-yellow-600 transition inline-flex items-center">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" 
                     x-data="{ hover: false }" 
                     @mouseenter="hover = true" 
                     @mouseleave="hover = false">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1596461110761-b4e5d5ad49f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Backyard Explorer Playset" class="w-full h-64 object-cover transition-all duration-500" :class="{ 'transform scale-105': hover }">
                        <div class="absolute top-4 right-4 bg-green-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                            Best Value
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Backyard Explorer</h3>
                        <p class="text-gray-600 mb-4">Perfect for smaller yards with swing beam, slide, and climbing options at an affordable price.</p>
                        <a href="#" class="text-yellow-500 font-medium hover:text-yellow-600 transition inline-flex items-center">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                    View All Playsets
                </a>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="py-20 bg-white" id="testimonials">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our Customers Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Join hundreds of happy families who've chosen SwingIt for their children's outdoor play.</p>
            </div>
            
            <div class="max-w-4xl mx-auto" x-data="{ current: 0, testimonials: [0, 1, 2] }">
                <div class="relative">
                    <!-- Testimonial Slides -->
                    <div class="overflow-hidden relative h-80">
                        <!-- Testimonial 1 -->
                        <div class="absolute inset-0 transition-all duration-500 ease-in-out p-8 bg-gray-50 rounded-xl flex flex-col justify-center"
                             :class="{ 'opacity-100 transform translate-x-0': current === 0, 'opacity-0 transform translate-x-full': current !== 0 }">
                            <div class="text-yellow-500 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-600 italic mb-6 text-lg">"I love my swing set! SwingIt helped me with the design and planning and was so pleasant to work with. They helped me stay within my budget and time frame, and the delivery and installation was hassle-free. Such nice people to work with!"</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0"></div>
                                <div class="ml-4">
                                    <h4 class="font-bold">Ruthy J.</h4>
                                    <p class="text-gray-500 text-sm">Happy Parent</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 2 -->
                        <div class="absolute inset-0 transition-all duration-500 ease-in-out p-8 bg-gray-50 rounded-xl flex flex-col justify-center"
                             :class="{ 'opacity-100 transform translate-x-0': current === 1, 'opacity-0 transform translate-x-full': current !== 1 }">
                            <div class="text-yellow-500 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-600 italic mb-6 text-lg">"We are so very pleased and happy with our beautiful swing set! The process was super quick and easy and the customer service was unbeatable. Thank you for helping us get an incredible playset that will hopefully last us for many more years to come!"</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0"></div>
                                <div class="ml-4">
                                    <h4 class="font-bold">Tzipora B.</h4>
                                    <p class="text-gray-500 text-sm">Delighted Customer</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 3 -->
                        <div class="absolute inset-0 transition-all duration-500 ease-in-out p-8 bg-gray-50 rounded-xl flex flex-col justify-center"
                             :class="{ 'opacity-100 transform translate-x-0': current === 2, 'opacity-0 transform translate-x-full': current !== 2 }">
                            <div class="text-yellow-500 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-600 italic mb-6 text-lg">"Highly recommend. Amazing service, very high-quality set. Children are using and abusing it and it's in perfect condition several years later. Only regret is not purchasing an even larger one. Worth every penny."</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0"></div>
                                <div class="ml-4">
                                    <h4 class="font-bold">Tzvi W.</h4>
                                    <p class="text-gray-500 text-sm">Satisfied Parent</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation Buttons -->
                    <button @click="current = (current - 1 + testimonials.length) % testimonials.length" class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-6 w-12 h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-800 hover:text-yellow-500 focus:outline-none transition">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button @click="current = (current + 1) % testimonials.length" class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-6 w-12 h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-800 hover:text-yellow-500 focus:outline-none transition">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                
                <!-- Indicators -->
                <div class="flex justify-center mt-8 space-x-2">
                    <template x-for="(_, index) in testimonials" :key="index">
                        <button @click="current = index" class="w-3 h-3 rounded-full focus:outline-none transition-all duration-300" :class="{ 'bg-yellow-500 scale-110': current === index, 'bg-gray-300': current !== index }"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="py-20 bg-white" id="gallery">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Gallery</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">See how our playsets bring joy to families across the region.</p>
            </div>
            
            <div class="relative" x-data="gallery">
                <!-- Main Image -->
                <div class="rounded-xl overflow-hidden shadow-xl mb-4">
                    <template x-for="(photo, index) in photos" :key="index">
                        <div 
                            x-show="current === index"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                        >
                            <img :src="photo" class="w-full h-96 md:h-[500px] object-cover" :alt="'Gallery image ' + (index + 1)">
                        </div>
                    </template>
                </div>
                
                <!-- Thumbnails -->
                <div class="grid grid-cols-4 gap-4 mt-4">
                    <template x-for="(photo, index) in photos" :key="index">
                        <div
                            @click="current = index"
                            class="rounded-lg overflow-hidden cursor-pointer transition-all"
                            :class="{ 'ring-2 ring-yellow-500 ring-offset-2': current === index }"
                        >
                            <img :src="photo" class="w-full h-24 object-cover" :alt="'Thumbnail ' + (index + 1)">
                        </div>
                    </template>
                </div>
                
                <!-- Navigation Buttons -->
                <button @click="prev()" class="absolute top-1/2 left-4 transform -translate-y-1/2 w-12 h-12 rounded-full bg-white/80 shadow-lg flex items-center justify-center text-gray-800 hover:text-yellow-500 focus:outline-none transition">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button @click="next()" class="absolute top-1/2 right-4 transform -translate-y-1/2 w-12 h-12 rounded-full bg-white/80 shadow-lg flex items-center justify-center text-gray-800 hover:text-yellow-500 focus:outline-none transition">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                    View Full Gallery
                </a>
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">How It Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">From design to installation, we make the process simple and enjoyable.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-yellow-500 text-white rounded-full text-2xl font-bold transition-all duration-700" :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        1
                    </div>
                    <h3 class="text-xl font-bold mb-3">Consultation</h3>
                    <p class="text-gray-600">Discuss your vision, space requirements, and budget with our playset experts.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-yellow-500 text-white rounded-full text-2xl font-bold transition-all duration-700 delay-300" :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        2
                    </div>
                    <h3 class="text-xl font-bold mb-3">Design</h3>
                    <p class="text-gray-600">Customize your perfect playset with the features your children will love.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-yellow-500 text-white rounded-full text-2xl font-bold transition-all duration-700 delay-600" :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        3
                    </div>
                    <h3 class="text-xl font-bold mb-3">Production</h3>
                    <p class="text-gray-600">Your playset is carefully crafted using premium materials and expert craftsmanship.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-yellow-500 text-white rounded-full text-2xl font-bold transition-all duration-700 delay-900" :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        4
                    </div>
                    <h3 class="text-xl font-bold mb-3">Installation</h3>
                    <p class="text-gray-600">Professional setup in your yard, ensuring safety and stability for years of play.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="py-20 bg-white" id="faq">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Find answers to our most commonly asked questions.</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="mb-6" x-data="{ open: false }">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 px-6 py-4 rounded-lg text-left transition-all duration-200"
                    >
                        <h3 class="font-bold text-lg">How long does installation take?</h3>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="!open">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="open">
                            <i class="fas fa-minus"></i>
                        </span>
                    </button>
                    <div 
                        x-show="open" 
                        x-transition:enter="transition ease-out duration-200" 
                        x-transition:enter-start="opacity-0 -translate-y-2" 
                        x-transition:enter-end="opacity-100 translate-y-0" 
                        class="pl-6 pr-4 py-4"
                    >
                        <p class="text-gray-600">Most standard playset installations take between 4-8 hours, depending on the complexity of your chosen design. Our professional installation team will arrive on the scheduled day with all necessary tools and equipment to complete the job efficiently.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="mb-6" x-data="{ open: false }">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 px-6 py-4 rounded-lg text-left transition-all duration-200"
                    >
                        <h3 class="font-bold text-lg">What type of maintenance is required?</h3>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="!open">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="open">
                            <i class="fas fa-minus"></i>
                        </span>
                    </button>
                    <div 
                        x-show="open" 
                        x-transition:enter="transition ease-out duration-200" 
                        x-transition:enter-start="opacity-0 -translate-y-2" 
                        x-transition:enter-end="opacity-100 translate-y-0" 
                        class="pl-6 pr-4 py-4"
                    >
                        <p class="text-gray-600">Our vinyl playsets require minimal maintenance. Simply rinse with a garden hose as needed to remove dirt or debris. Unlike wooden sets, there's no need for staining, sealing, or checking for splinters. We recommend checking hardware connections once a year to ensure everything remains tight and secure.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="mb-6" x-data="{ open: false }">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 px-6 py-4 rounded-lg text-left transition-all duration-200"
                    >
                        <h3 class="font-bold text-lg">Do you offer financing options?</h3>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="!open">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="open">
                            <i class="fas fa-minus"></i>
                        </span>
                    </button>
                    <div 
                        x-show="open" 
                        x-transition:enter="transition ease-out duration-200" 
                        x-transition:enter-start="opacity-0 -translate-y-2" 
                        x-transition:enter-end="opacity-100 translate-y-0" 
                        class="pl-6 pr-4 py-4"
                    >
                        <p class="text-gray-600">Yes, we offer several financing options to help make your dream playset affordable. During your consultation, our team can explain the various payment plans available, including 0% interest options for qualified customers.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="mb-6" x-data="{ open: false }">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 px-6 py-4 rounded-lg text-left transition-all duration-200"
                    >
                        <h3 class="font-bold text-lg">What warranty do your playsets include?</h3>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="!open">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="open">
                            <i class="fas fa-minus"></i>
                        </span>
                    </button>
                    <div 
                        x-show="open" 
                        x-transition:enter="transition ease-out duration-200" 
                        x-transition:enter-start="opacity-0 -translate-y-2" 
                        x-transition:enter-end="opacity-100 translate-y-0" 
                        class="pl-6 pr-4 py-4"
                    >
                        <p class="text-gray-600">All Demo come with our comprehensive warranty that covers structural components for 15 years, vinyl materials for 10 years, and accessories for 1 year. We stand behind the quality of our products and are committed to your family's satisfaction.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="mb-6" x-data="{ open: false }">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 px-6 py-4 rounded-lg text-left transition-all duration-200"
                    >
                        <h3 class="font-bold text-lg">Can I add accessories later?</h3>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="!open">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="ml-4 flex-shrink-0 text-yellow-500" x-show="open">
                            <i class="fas fa-minus"></i>
                        </span>
                    </button>
                    <div 
                        x-show="open" 
                        x-transition:enter="transition ease-out duration-200" 
                        x-transition:enter-start="opacity-0 -translate-y-2" 
                        x-transition:enter-end="opacity-100 translate-y-0" 
                        class="pl-6 pr-4 py-4"
                    >
                        <p class="text-gray-600">Absolutely! Our playsets are designed to grow with your family. You can easily add or upgrade accessories as your children's interests and abilities develop. From additional swings to challenging climbing features, we make it easy to enhance your playset over time.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="py-20 bg-gray-50" id="quote">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Form Column -->
                <div>
                    <h2 class="text-3xl font-bold mb-6">Request a Free Quote</h2>
                    <p class="text-gray-600 mb-8">Fill out the form below, and our team will get back to you within 24 hours with pricing information tailored to your needs.</p>
                    
                    <div x-data="contactForm">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 font-medium mb-2">Your Name*</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    x-model="name" 
                                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition"
                                    :class="{ 'border-red-500': errors.name }"
                                >
                                <div x-show="errors.name" class="text-red-500 text-sm mt-1" x-text="errors.name"></div>
                            </div>
                            
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address*</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    x-model="email" 
                                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition"
                                    :class="{ 'border-red-500': errors.email }"
                                >
                                <div x-show="errors.email" class="text-red-500 text-sm mt-1" x-text="errors.email"></div>
                            </div>
                            
                            <div class="mb-6">
                                <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    x-model="phone" 
                                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition"
                                >
                            </div>
                            
                            <div class="mb-6">
                                <label for="message" class="block text-gray-700 font-medium mb-2">Tell Us About Your Project*</label>
                                <textarea 
                                    id="message" 
                                    x-model="message" 
                                    rows="4" 
                                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition"
                                    :class="{ 'border-red-500': errors.message }"
                                ></textarea>
                                <div x-show="errors.message" class="text-red-500 text-sm mt-1" x-text="errors.message"></div>
                            </div>
                            
                            <button 
                                type="submit" 
                                class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center"
                                :class="{ 'opacity-75 cursor-not-allowed': loading }"
                                :disabled="loading"
                            >
                                <span x-show="!loading">Submit Request</span>
                                <span x-show="loading" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing...
                                </span>
                            </button>
                            
                            <div x-show="submitted" class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                                Thank you for your request! We'll be in touch shortly.
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Info Column -->
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h3 class="text-2xl font-bold mb-6">Why Choose Demo?</h3>
                    
                    <div class="mb-8">
                        <div class="flex mb-4">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500 text-xl mr-4 flex-shrink-0">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Premium Materials</h4>
                                <p class="text-gray-600">Our vinyl construction offers superior durability without splinters or maintenance worries.</p>
                            </div>
                        </div>
                        
                        <div class="flex mb-4">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500 text-xl mr-4 flex-shrink-0">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Professional Installation</h4>
                                <p class="text-gray-600">Expert installation included with every purchase for safety and peace of mind.</p>
                            </div>
                        </div>
                        
                        <div class="flex mb-4">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500 text-xl mr-4 flex-shrink-0">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Industry-Leading Warranty</h4>
                                <p class="text-gray-600">Comprehensive coverage that protects your investment for years to come.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h4 class="font-bold text-lg mb-4">Contact Information</h4>
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500 text-lg mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="text-gray-600">Serving NY, NJ & CT Areas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-20 bg-yellow-500" id="contact">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white">Ready to Create Endless Adventures?</h2>
                <p class="text-xl text-white mb-10">Get in touch with our playset experts and start designing your family's dream playset today.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">
                    <!-- Phone -->
                    <a href="tel:9097779911" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all transform hover:-translate-y-1 flex items-center">
                        <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500 text-xl mr-4">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="font-bold text-lg">Call Us</h3>
                            <p class="text-gray-600">909.777.9911</p>
                        </div>
                    </a>
                    
                    <!-- Email -->
                    <a href="mailto:info@demo.com" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all transform hover:-translate-y-1 flex items-center">
                        <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500 text-xl mr-4">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="font-bold text-lg">Email Us</h3>
                            <p class="text-gray-600">info@demo.com</p>
                        </div>
                    </a>
                </div>
                
                <div class="mt-12">
                    <a href="#quote" class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center">
                        <span>Request a Free Quote</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- Company Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Demo</h3>
                    <p class="text-gray-400 mb-4">Premium vinyl playsets designed for endless adventures, built to last for generations of fun.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Products -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Products</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Swing Sets</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Playhouses</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Combo Playsets</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Accessories</a></li>
                    </ul>
                </div>
                
                <!-- Resources -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Gallery</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Safety Tips</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Installation Guide</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQs</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-400 flex items-center">
                            <i class="fas fa-phone mr-2 text-yellow-500"></i>
                            <span>909.777.9911</span>
                        </li>
                        <li class="text-gray-400 flex items-center">
                            <i class="fas fa-envelope mr-2 text-yellow-500"></i>
                            <span>info@demo.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-800 pt-8">
                <p class="text-gray-500 text-center">&copy; 2025 Demo. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Custom Alpine.js Components -->
    <script>
        // Add intersection observer polyfill for older browsers
        document.addEventListener('alpine:init', () => {
            // Custom directive for scroll animations
            Alpine.directive('intersect', (el, { value, expression, modifiers }) => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            value(entry.target);
                            if (modifiers.includes('once')) {
                                observer.unobserve(entry.target);
                            }
                        }
                    });
                }, {
                    root: null,
                    threshold: 0.1,
                    rootMargin: '0px'
                });
                
                observer.observe(el);
                
                return () => {
                    observer.unobserve(el);
                };
            });
            
            // Gallery component
            Alpine.data('gallery', () => ({
                photos: [
                    'https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1497217968520-7d8d34bfa9c6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1602353225887-4486f295dde7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1565538810643-b5bdb714032a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
                ],
                current: 0,
                next() {
                    this.current = (this.current + 1) % this.photos.length;
                },
                prev() {
                    this.current = (this.current - 1 + this.photos.length) % this.photos.length;
                }
            }));
            
            // Contact form
            Alpine.data('contactForm', () => ({
                name: '',
                email: '',
                phone: '',
                message: '',
                submitted: false,
                loading: false,
                errors: {},
                
                validate() {
                    this.errors = {};
                    
                    if (!this.name.trim()) {
                        this.errors.name = 'Name is required';
                    }
                    
                    if (!this.email.trim()) {
                        this.errors.email = 'Email is required';
                    } else if (!/^\S+@\S+\.\S+$/.test(this.email)) {
                        this.errors.email = 'Please enter a valid email';
                    }
                    
                    if (!this.message.trim()) {
                        this.errors.message = 'Message is required';
                    }
                    
                    return Object.keys(this.errors).length === 0;
                },
                
                submit() {
                    if (this.validate()) {
                        this.loading = true;
                        
                        // Simulate form submission
                        setTimeout(() => {
                            this.loading = false;
                            this.submitted = true;
                            this.resetForm();
                        }, 1500);
                    }
                },
                
                resetForm() {
                    this.name = '';
                    this.email = '';
                    this.phone = '';
                    this.message = '';
                }
            }));
        });
    </script>

    <!-- Back to top button -->
    <div x-data="{ showButton: false }" @scroll.window="showButton = window.pageYOffset > 500">
        <button 
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })" 
            x-show="showButton" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-10"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-10"
            class="fixed bottom-8 right-8 bg-yellow-500 text-gray-900 w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-yellow-400 transition focus:outline-none"
        >
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>


@endsection