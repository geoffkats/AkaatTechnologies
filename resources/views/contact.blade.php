@extends('layouts.app')

@section('title', 'Contact Us - AKAAT Technologies')
@section('description', 'Get in touch with AKAAT Technologies for your printing, web development, software, and training needs.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Contact Us', 'url' => route('contact')]
]" />
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-akaat-blue to-blue-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Contact Us</h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                    Ready to start your next project? Get in touch with our team and let's discuss how we can help you succeed.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                    <p class="text-gray-600 mb-8">
                        Fill out the form below and we'll get back to you within 24 hours. For urgent matters, please call us directly.
                    </p>

                    <form class="space-y-6" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" id="first_name" name="first_name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-akaat-blue focus:border-transparent"
                                       placeholder="Your first name">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-akaat-blue focus:border-transparent"
                                       placeholder="Your last name">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-akaat-blue focus:border-transparent"
                                   placeholder="your.email@example.com">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-akaat-blue focus:border-transparent"
                                   placeholder="+1 (555) 123-4567">
                        </div>

                        <div>
                            <label for="service_interest" class="block text-sm font-medium text-gray-700 mb-2">Service Interest</label>
                            <select id="service_interest" name="service_interest" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-akaat-blue focus:border-transparent">
                                <option value="">Select a service</option>
                                <option value="printing">Printing & Stationery</option>
                                <option value="web_development">Web Development</option>
                                <option value="software_development">Software Development</option>
                                <option value="training">Training Programs</option>
                                <option value="consultation">General Consultation</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">Project Budget</label>
                            <select id="budget" name="budget" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-akaat-blue focus:border-transparent">
                                <option value="">Select budget range</option>
                                <option value="under_1000">Under $1,000</option>
                                <option value="1000_5000">$1,000 - $5,000</option>
                                <option value="5000_10000">$5,000 - $10,000</option>
                                <option value="10000_25000">$10,000 - $25,000</option>
                                <option value="over_25000">Over $25,000</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                            <textarea id="message" name="message" rows="6" required 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-akaat-blue focus:border-transparent"
                                      placeholder="Tell us about your project or requirements..."></textarea>
                        </div>

                        <div class="flex items-start">
                            <input type="checkbox" id="newsletter" name="newsletter" 
                                   class="mt-1 h-4 w-4 text-akaat-blue border-gray-300 rounded focus:ring-akaat-blue">
                            <label for="newsletter" class="ml-3 text-sm text-gray-600">
                                I'd like to receive updates about AKAAT Technologies services and offers.
                            </label>
                        </div>

                        <button type="submit" class="btn-primary w-full">
                            Send Message
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Get In Touch</h2>
                    <p class="text-gray-600 mb-8">
                        We're here to help! Reach out to us through any of the following channels and we'll respond promptly.
                    </p>

                    <!-- Contact Methods -->
                    <div class="space-y-6 mb-8">
                        <!-- Phone -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-akaat-blue rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Phone</h3>
                                <p class="text-gray-600 mb-2">Call us for immediate assistance</p>
                                <a href="tel:+1234567890" class="text-akaat-blue font-medium hover:text-akaat-green">+1 (234) 567-8900</a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-akaat-green rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600 mb-2">Send us an email anytime</p>
                                <a href="mailto:info@akaat.tech" class="text-akaat-blue font-medium hover:text-akaat-green">info@akaat.tech</a>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">WhatsApp</h3>
                                <p class="text-gray-600 mb-2">Chat with us instantly</p>
                                <a href="https://wa.me/1234567890" target="_blank" class="text-akaat-blue font-medium hover:text-akaat-green">+1 (234) 567-8900</a>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-akaat-orange rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Office Address</h3>
                                <p class="text-gray-600 mb-2">Visit us at our office</p>
                                <address class="text-gray-600 not-italic">
                                    123 Tech Street<br>
                                    Innovation City, IC 12345<br>
                                    United States
                                </address>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Business Hours</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Monday - Friday</span>
                                <span class="text-gray-900 font-medium">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Saturday</span>
                                <span class="text-gray-900 font-medium">10:00 AM - 4:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sunday</span>
                                <span class="text-gray-900 font-medium">Closed</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium text-akaat-green">Emergency Support:</span> Available 24/7 for existing clients
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Find Us</h2>
                <p class="text-xl text-gray-600">
                    Located in the heart of Innovation City, we're easily accessible by car or public transport.
                </p>
            </div>

            <!-- Map Placeholder -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="h-96 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-gray-500">Interactive map will be integrated here</p>
                        <p class="text-sm text-gray-400 mt-2">123 Tech Street, Innovation City, IC 12345</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600">
                    Quick answers to common questions about our services and processes.
                </p>
            </div>

            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">How quickly can you start my project?</h3>
                    <p class="text-gray-600">
                        Most projects can begin within 1-2 weeks of contract signing. Rush projects may be accommodated based on our current workload and project complexity.
                    </p>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Do you offer ongoing support after project completion?</h3>
                    <p class="text-gray-600">
                        Yes! We provide various support packages including maintenance, updates, and technical support. Our team is always available to help you succeed.
                    </p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">What payment methods do you accept?</h3>
                    <p class="text-gray-600">
                        We accept bank transfers, credit cards, PayPal, and can arrange custom payment schedules for larger projects. A deposit is typically required to begin work.
                    </p>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Can you work with my existing team or vendors?</h3>
                    <p class="text-gray-600">
                        Absolutely! We collaborate effectively with existing teams, agencies, and vendors. We believe in partnership and can adapt to your preferred workflow.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection