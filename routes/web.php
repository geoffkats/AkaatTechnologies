<?php

use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', function () {
    $portfolioItems = \App\Models\Portfolio::active()
        ->orderBy('sort_order')
        ->get()
        ->map(function($item) {
            return [
                'id' => $item->id,
                'src' => $item->display_url,
                'category' => $item->category,
                'title' => $item->title,
                'type' => $item->type,
                'description' => $item->description,
                'meta_data' => $item->meta_data,
                'media_url' => $item->media_url,
                'is_youtube' => $item->is_youtube_video
            ];
        });
        
    return view('home', compact('portfolioItems'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Services Routes
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/printing', function () {
        return view('services.printing');
    })->name('printing');
    
    Route::get('/development', function () {
        return view('services.development');
    })->name('development');
    
    Route::get('/software', function () {
        return view('services.software');
    })->name('software');
    
    Route::get('/training', function () {
        return view('services.training');
    })->name('training');
});

// Shop Routes
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::get('/shop/all', [App\Http\Controllers\ShopController::class, 'all'])->name('shop.all');
Route::get('/shop/categories', [App\Http\Controllers\ShopController::class, 'categories'])->name('shop.categories');
Route::get('/shop/product/{product}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.product');

// Product Card Examples (for development/demo purposes)
Route::get('/product-card-examples', function () {
    $products = \App\Models\Product::with('category')->where('status', 'active')->paginate(12);
    return view('components.product-card-examples', compact('products'));
})->name('product-card-examples');

// Cart Routes
Route::get('/cart', function () {
    return view('cart.index');
})->name('cart.index');

Route::post('/cart/add/{product}', [App\Http\Controllers\ShopController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{product}', [App\Http\Controllers\ShopController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{product}', [App\Http\Controllers\ShopController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/data', [App\Http\Controllers\ShopController::class, 'getCartData'])->name('cart.data');
Route::get('/cart/status/{product}', [App\Http\Controllers\ShopController::class, 'checkCartStatus'])->name('cart.status');

// Checkout Routes
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/order/confirmation/{order}', [App\Http\Controllers\CheckoutController::class, 'confirmation'])->name('order.confirmation');

// Review Routes
Route::middleware('auth')->group(function () {
    Route::post('/products/{product}/reviews', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/products/{product}/can-review', [App\Http\Controllers\ReviewController::class, 'canReview'])->name('reviews.can-review');
});
Route::get('/products/{product}/reviews', [App\Http\Controllers\ReviewController::class, 'index'])->name('reviews.index');

// Printing Order Routes
Route::get('/printing', [App\Http\Controllers\PrintingController::class, 'index'])->name('printing.index');
Route::get('/printing/order', [App\Http\Controllers\PrintingController::class, 'order'])->name('printing.order');
Route::post('/printing/order/submit', [App\Http\Controllers\PrintingController::class, 'submitOrder'])->name('printing.submit');
Route::post('/printing/pricing', [App\Http\Controllers\PrintingController::class, 'getPricing'])->name('printing.pricing');

// Wishlist routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::post('/wishlist/add/{product}', [App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist.add');
    Route::post('/wishlist/remove/{product}', [App\Http\Controllers\WishlistController::class, 'remove'])->name('wishlist.remove');
});

// Newsletter subscription
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Training Enrollment Routes
Route::get('/training/enroll', function () {
    return view('training.enroll');
})->name('training.enroll');

Route::post('/training/enroll', function () {
    // Validate the form data
    $validated = request()->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'training_program' => 'required|exists:services,id',
        'experience_level' => 'nullable|string|in:beginner,intermediate,advanced',
        'preferred_schedule' => 'nullable|string|in:weekdays,weekends,evenings,flexible',
        'message' => 'nullable|string|max:1000',
    ]);

    // Get the selected training program
    $program = \App\Models\Service::find($validated['training_program']);
    
    // Here you would typically:
    // 1. Save the enrollment to database
    // 2. Send confirmation email to student
    // 3. Send notification email to admin
    // 4. Create a user account if needed
    
    // For now, we'll just redirect with success message
    return redirect()->route('training.enroll')->with('success', 
        'Thank you for your enrollment application for ' . $program->name . '! We will contact you within 24 hours to confirm your enrollment and provide payment details.'
    );
})->name('training.enroll.submit');

// Courses Route
Route::get('/courses', function () {
    return view('courses');
})->name('courses');

// Contact Form Submission
Route::post('/contact', function () {
    // TODO: Implement contact form handling
    return redirect()->route('contact')->with('success', 'Thank you for your message! We\'ll get back to you soon.');
})->name('contact.submit');

// Course Routes
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/search', [App\Http\Controllers\CourseController::class, 'search'])->name('courses.search');
Route::get('/courses/{slug}', [App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');
Route::post('/courses/{slug}/enroll', [App\Http\Controllers\CourseController::class, 'enroll'])->name('courses.enroll');

// Dashboard (Protected)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/orders', [App\Http\Controllers\DashboardController::class, 'orders'])->name('dashboard.orders');
    Route::get('/dashboard/reviews', [App\Http\Controllers\DashboardController::class, 'reviews'])->name('dashboard.reviews');
    
    // Admin Routes (Protected by middleware in controller)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::post('/products/{product}/toggle-status', [App\Http\Controllers\Admin\ProductController::class, 'toggleStatus'])->name('products.toggle-status');
        Route::post('/products/{product}/toggle-featured', [App\Http\Controllers\Admin\ProductController::class, 'toggleFeatured'])->name('products.toggle-featured');
    });
    
    // Student Dashboard Routes
    Route::get('/student/dashboard', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/courses', [App\Http\Controllers\StudentController::class, 'courses'])->name('student.courses');
    Route::get('/student/courses/{slug}', [App\Http\Controllers\StudentController::class, 'course'])->name('student.course');
    Route::get('/student/certificates', [App\Http\Controllers\StudentController::class, 'certificates'])->name('student.certificates');
    Route::get('/student/profile', [App\Http\Controllers\StudentController::class, 'profile'])->name('student.profile');
});

require __DIR__.'/settings.php';
