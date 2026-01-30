@extends('layouts.app')

@section('title', 'Printing Order - AKAAT Technologies')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Print Orders', 'url' => route('printing.order')]
]" />
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-6 lg:px-10 py-12">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-['Plus_Jakarta_Sans']">
            Place Your Printing Order
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Professional printing services with dynamic pricing and fast turnaround times.
        </p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-8">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h3 class="font-medium text-green-800">{{ session('success')['message'] }}</h3>
                    <p class="text-sm text-green-600 mt-1">
                        Order Number: <strong>{{ session('success')['order_number'] }}</strong> | 
                        Total: <strong>{{ session('success')['formatted_total_cost'] }}</strong> | 
                        Estimated Completion: <strong>{{ session('success')['estimated_completion'] }}</strong>
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-8">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-red-800">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <form action="{{ route('printing.submit') }}" method="POST" enctype="multipart/form-data" id="printing-order-form" class="grid lg:grid-cols-3 gap-8">
        @csrf
        
        <!-- Order Details -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Customer Information -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Customer Information
                </h2>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                        <input type="text" id="customer_name" name="customer_name" required value="{{ old('customer_name') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                    </div>
                    <div>
                        <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                        <input type="email" id="customer_email" name="customer_email" required value="{{ old('customer_email') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                    </div>
                    <div>
                        <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" id="customer_phone" name="customer_phone" required placeholder="+256 XXX XXX XXX" value="{{ old('customer_phone') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                    </div>
                </div>
            </div>

            <!-- Print Specifications -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Print Specifications
                </h2>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="paper_type" class="block text-sm font-medium text-gray-700 mb-2">Paper Type *</label>
                        <select id="paper_type" name="paper_type" required onchange="updatePricing()"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                            <option value="">Select paper type</option>
                            @foreach($paperTypes as $type)
                                <option value="{{ $type }}" {{ old('paper_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="paper_size" class="block text-sm font-medium text-gray-700 mb-2">Paper Size *</label>
                        <select id="paper_size" name="paper_size" required onchange="updatePricing()"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                            <option value="">Select size</option>
                            @foreach($paperSizes as $size)
                                <option value="{{ $size }}" {{ old('paper_size') == $size ? 'selected' : '' }}>{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="color_type" class="block text-sm font-medium text-gray-700 mb-2">Color Type *</label>
                        <select id="color_type" name="color_type" required onchange="updatePricing()"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                            <option value="">Select color type</option>
                            @foreach($colorTypes as $key => $label)
                                <option value="{{ $key }}" {{ old('color_type') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="print_type" class="block text-sm font-medium text-gray-700 mb-2">Print Type *</label>
                        <select id="print_type" name="print_type" required onchange="updatePricing()"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                            <option value="">Select print type</option>
                            @foreach($printTypes as $key => $label)
                                <option value="{{ $key }}" {{ old('print_type') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Number of Pages *</label>
                        <input type="number" id="quantity" name="quantity" required min="1" max="10000" value="{{ old('quantity', 1) }}" onchange="updatePricing()"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                    </div>
                    
                    <div>
                        <label for="copies" class="block text-sm font-medium text-gray-700 mb-2">Number of Copies *</label>
                        <input type="number" id="copies" name="copies" required min="1" max="1000" value="{{ old('copies', 1) }}" onchange="updatePricing()"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                    </div>
                </div>
            </div>

            <!-- Additional Options -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Additional Options</h2>
                
                <div class="space-y-4">
                    <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                        <input type="checkbox" name="rush_order" value="1" class="text-akaat-blue focus:ring-akaat-blue" onchange="updatePricing()" {{ old('rush_order') ? 'checked' : '' }}>
                        <div class="ml-3">
                            <div class="font-medium text-gray-900">Rush Order (+50% fee)</div>
                            <div class="text-sm text-gray-600">Complete within 2-4 hours</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- File Upload -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    Upload Your File *
                </h2>
                
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center">
                    <input type="file" id="file" name="file" required accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="hidden">
                    <label for="file" class="cursor-pointer">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-lg font-medium text-gray-700 mb-2">Click to upload file</p>
                        <p class="text-sm text-gray-500">PDF, DOC, DOCX, JPG, PNG (Max 10MB)</p>
                    </label>
                </div>
                
                <div id="file-preview" class="mt-4 hidden">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <div>
                                <p class="font-medium text-gray-900" id="file-name"></p>
                                <p class="text-sm text-gray-500" id="file-size"></p>
                            </div>
                        </div>
                        <button type="button" onclick="removeFile()" class="text-red-500 hover:text-red-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Delivery Information -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Delivery Method
                </h2>
                
                <div class="space-y-3">
                    <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                        <input type="radio" name="delivery_option" value="pickup" class="text-akaat-blue focus:ring-akaat-blue" {{ old('delivery_option', 'pickup') == 'pickup' ? 'checked' : '' }} onchange="updatePricing()">
                        <div class="ml-3">
                            <div class="font-medium text-gray-900">Store Pickup - FREE</div>
                            <div class="text-sm text-gray-600">Pick up from our office in Kampala</div>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                        <input type="radio" name="delivery_option" value="delivery" class="text-akaat-blue focus:ring-akaat-blue" {{ old('delivery_option') == 'delivery' ? 'checked' : '' }} onchange="updatePricing()">
                        <div class="ml-3">
                            <div class="font-medium text-gray-900">Delivery - UGX 15K</div>
                            <div class="text-sm text-gray-600">Delivery within Kampala</div>
                        </div>
                    </label>
                </div>
                
                <div id="delivery-address" class="{{ old('delivery_option') == 'delivery' ? '' : 'hidden' }} mt-4">
                    <label for="delivery_address" class="block text-sm font-medium text-gray-700 mb-2">Delivery Address *</label>
                    <textarea id="delivery_address" name="delivery_address" rows="3" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors"
                              placeholder="Enter your full delivery address">{{ old('delivery_address') }}</textarea>
                </div>
            </div>

            <!-- Special Instructions -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Special Instructions</h2>
                <textarea name="special_instructions" rows="4" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors"
                          placeholder="Any special requirements or instructions for your print job...">{{ old('special_instructions') }}</textarea>
            </div>
        </div>
        
        <!-- Order Summary -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 sticky top-24">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                
                <div id="pricing-breakdown" class="space-y-3 mb-6">
                    <div class="text-center text-gray-500 py-8">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        <p>Select print specifications to see pricing</p>
                    </div>
                </div>
                
                <button type="submit" id="submit-order-btn" 
                        class="w-full bg-akaat-green hover:bg-green-600 text-white py-4 rounded-xl font-bold text-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex items-center justify-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Submit Order
                </button>
                
                <div class="mt-4 text-center">
                    <a href="{{ route('services.printing') }}" class="text-akaat-blue hover:text-blue-700 text-sm font-medium">
                        ← Back to Printing Services
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setupFormHandlers();
        updatePricing(); // Initial pricing calculation
    });
    
    function setupFormHandlers() {
        // File upload handler
        document.getElementById('file').addEventListener('change', handleFileUpload);
        
        // Delivery method handler
        const deliveryRadios = document.querySelectorAll('input[name="delivery_option"]');
        deliveryRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const deliveryAddress = document.getElementById('delivery-address');
                if (this.value === 'delivery') {
                    deliveryAddress.classList.remove('hidden');
                } else {
                    deliveryAddress.classList.add('hidden');
                }
                updatePricing();
            });
        });
    }
    
    function handleFileUpload(event) {
        const file = event.target.files[0];
        const filePreview = document.getElementById('file-preview');
        
        if (file) {
            document.getElementById('file-name').textContent = file.name;
            document.getElementById('file-size').textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
            filePreview.classList.remove('hidden');
        } else {
            filePreview.classList.add('hidden');
        }
    }
    
    function removeFile() {
        document.getElementById('file').value = '';
        document.getElementById('file-preview').classList.add('hidden');
    }
    
    function updatePricing() {
        const paperType = document.getElementById('paper_type').value;
        const paperSize = document.getElementById('paper_size').value;
        const colorType = document.getElementById('color_type').value;
        const printType = document.getElementById('print_type').value;
        const quantity = document.getElementById('quantity').value;
        const copies = document.getElementById('copies').value;
        const rushOrder = document.querySelector('input[name="rush_order"]').checked;
        const deliveryOption = document.querySelector('input[name="delivery_option"]:checked')?.value;
        
        // Check if required fields are filled
        if (!paperType || !paperSize || !colorType || !printType || !quantity || !copies || !deliveryOption) {
            return;
        }
        
        const formData = new FormData();
        formData.append('paper_type', paperType);
        formData.append('paper_size', paperSize);
        formData.append('color_type', colorType);
        formData.append('print_type', printType);
        formData.append('quantity', quantity);
        formData.append('copies', copies);
        formData.append('rush_order', rushOrder ? '1' : '0');
        formData.append('delivery_option', deliveryOption);
        
        fetch('{{ route("printing.pricing") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updatePricingDisplay(data);
            }
        })
        .catch(error => {
            console.error('Error calculating pricing:', error);
        });
    }
    
    function updatePricingDisplay(pricing) {
        const breakdown = document.getElementById('pricing-breakdown');
        
        let html = `
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Price per page</span>
                    <span class="font-medium">${pricing.formatted_price_per_page}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Print Cost</span>
                    <span class="font-medium">${pricing.formatted_total_cost}</span>
                </div>
        `;
        
        // Show bulk discount info if applicable
        if (pricing.bulk_discount && pricing.bulk_threshold) {
            html += `
                <div class="flex justify-between text-green-600">
                    <span class="text-sm">Bulk Discount Applied!</span>
                    <span class="text-sm font-medium">${pricing.formatted_bulk_price}/page</span>
                </div>
            `;
        } else if (pricing.bulk_threshold && !pricing.bulk_discount) {
            html += `
                <div class="text-center text-sm text-gray-500 py-2 bg-gray-50 rounded-lg">
                    💡 Order ${pricing.bulk_threshold}+ pages to get bulk pricing at ${pricing.formatted_bulk_price}/page
                </div>
            `;
        }
        
        // Add delivery fee
        const deliveryOption = document.querySelector('input[name="delivery_option"]:checked')?.value;
        const deliveryFee = deliveryOption === 'delivery' ? 15000 : 0;
        
        html += `
                <div class="flex justify-between">
                    <span class="text-gray-600">Delivery</span>
                    <span class="font-medium">${deliveryFee > 0 ? 'UGX ' + formatPrice(deliveryFee) : 'FREE'}</span>
                </div>
        `;
        
        // Add rush order fee if applicable
        const rushOrder = document.querySelector('input[name="rush_order"]').checked;
        if (rushOrder) {
            const rushFee = pricing.total_cost * 0.5;
            html += `
                <div class="flex justify-between text-orange-600">
                    <span class="text-gray-600">Rush Order (+50%)</span>
                    <span class="font-medium">UGX ${formatPrice(rushFee)}</span>
                </div>
            `;
        }
        
        // Calculate final total
        let finalTotal = pricing.total_cost + deliveryFee;
        if (rushOrder) {
            finalTotal = finalTotal * 1.5;
        }
        
        html += `
                <div class="border-t border-gray-200 pt-3">
                    <div class="flex justify-between">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-lg font-bold text-akaat-blue">UGX ${formatPrice(finalTotal)}</span>
                    </div>
                </div>
            </div>
        `;
        
        breakdown.innerHTML = html;
    }
    
    function formatPrice(price) {
        if (price >= 1000000) {
            return (price / 1000000).toFixed(1) + 'M';
        } else if (price >= 1000) {
            return (price / 1000).toFixed(0) + 'K';
        } else {
            return price.toLocaleString();
        }
    }
</script>

<style>
    .bg-akaat-blue { background-color: #0F4C81; }
    .text-akaat-blue { color: #0F4C81; }
    .bg-akaat-green { background-color: #2ECC71; }
    .text-akaat-green { color: #2ECC71; }
    .border-akaat-blue { border-color: #0F4C81; }
    .focus\:ring-akaat-blue:focus { --tw-ring-color: #0F4C81; }
    .focus\:border-akaat-blue:focus { border-color: #0F4C81; }
</style>
@endsection