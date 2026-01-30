@extends('layouts.app')

@section('title', 'Courses - AKAAT Technologies')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 font-['Plus_Jakarta_Sans'] mb-4">
                    Learn New Skills
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                    Master in-demand skills with our comprehensive courses designed by industry experts
                </p>
                
                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto">
                    <form action="{{ route('courses.search') }}" method="GET" class="flex gap-4">
                        <div class="flex-1">
                            <input type="text" 
                                   name="q" 
                                   value="{{ $query ?? '' }}"
                                   placeholder="Search courses..." 
                                   class="w-full px-6 py-4 rounded-2xl border border-gray-200 focus:border-akaat-blue focus:ring-2 focus:ring-akaat-blue/20 outline-none text-lg">
                        </div>
                        <button type="submit" 
                                class="bg-akaat-blue text-white px-8 py-4 rounded-2xl font-semibold hover:bg-blue-700 transition-colors">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
        <!-- Filters -->
        <div class="mb-8">
            <div class="flex flex-wrap gap-4 items-center justify-between">
                <div class="flex flex-wrap gap-4">
                    <!-- Category Filter -->
                    <div class="relative">
                        <select name="category" 
                                onchange="filterCourses()" 
                                class="appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2 pr-8 focus:border-akaat-blue focus:ring-2 focus:ring-akaat-blue/20 outline-none">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ ($category ?? '') === $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Level Filter -->
                    <div class="relative">
                        <select name="level" 
                                onchange="filterCourses()" 
                                class="appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2 pr-8 focus:border-akaat-blue focus:ring-2 focus:ring-akaat-blue/20 outline-none">
                            <option value="">All Levels</option>
                            @foreach($levels as $lvl)
                                <option value="{{ $lvl }}" {{ ($level ?? '') === $lvl ? 'selected' : '' }}>
                                    {{ ucfirst($lvl) }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="text-sm text-gray-600">
                    {{ $courses->total() }} courses found
                </div>
            </div>
        </div>

        <!-- Courses Grid -->
        @if($courses->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($courses as $course)
                    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <!-- Course Thumbnail -->
                        <div class="relative h-48 bg-gradient-to-br from-akaat-blue to-blue-600">
                            @if($course->thumbnail)
                                <img src="{{ $course->thumbnail }}" 
                                     alt="{{ $course->title }}" 
                                     class="w-full h-full object-cover">
                            @endif
                            
                            <!-- Featured Badge -->
                            @if($course->featured)
                                <div class="absolute top-4 left-4">
                                    <span class="bg-akaat-green text-white px-3 py-1 rounded-full text-sm font-medium">
                                        Featured
                                    </span>
                                </div>
                            @endif

                            <!-- Level Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="bg-white/90 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ ucfirst($course->level) }}
                                </span>
                            </div>

                            <!-- Play Button Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Course Content -->
                        <div class="p-6">
                            <!-- Category -->
                            <div class="mb-3">
                                <span class="text-sm text-akaat-blue font-medium">{{ $course->category }}</span>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                {{ $course->title }}
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $course->short_description }}
                            </p>

                            <!-- Course Stats -->
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $course->duration_hours }}h
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    {{ $course->total_lessons }} lessons
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    {{ $course->student_count }} students
                                </div>
                            </div>

                            <!-- Instructor -->
                            <div class="flex items-center gap-3 mb-4">
                                <img src="{{ $course->instructor_image }}" 
                                     alt="{{ $course->instructor_name }}" 
                                     class="w-8 h-8 rounded-full">
                                <span class="text-sm text-gray-600">{{ $course->instructor_name }}</span>
                            </div>

                            <!-- Price and CTA -->
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-gray-900">{{ $course->formatted_price }}</span>
                                    @if($course->original_price)
                                        <span class="text-sm text-gray-500 line-through ml-2">{{ $course->original_price }}</span>
                                    @endif
                                </div>
                                <a href="{{ route('courses.show', $course->slug) }}" 
                                   class="bg-akaat-blue text-white px-6 py-2 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                                    View Course
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $courses->links() }}
            </div>
        @else
            <!-- No Courses Found -->
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">No courses found</h3>
                <p class="text-gray-600 mb-6">Try adjusting your search criteria or browse all courses.</p>
                <a href="{{ route('courses.index') }}" 
                   class="bg-akaat-blue text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                    View All Courses
                </a>
            </div>
        @endif
    </div>
</div>

<script>
function filterCourses() {
    const form = document.createElement('form');
    form.method = 'GET';
    form.action = '{{ route("courses.search") }}';
    
    const query = document.querySelector('input[name="q"]')?.value || '';
    const category = document.querySelector('select[name="category"]').value;
    const level = document.querySelector('select[name="level"]').value;
    
    if (query) {
        const queryInput = document.createElement('input');
        queryInput.type = 'hidden';
        queryInput.name = 'q';
        queryInput.value = query;
        form.appendChild(queryInput);
    }
    
    if (category) {
        const categoryInput = document.createElement('input');
        categoryInput.type = 'hidden';
        categoryInput.name = 'category';
        categoryInput.value = category;
        form.appendChild(categoryInput);
    }
    
    if (level) {
        const levelInput = document.createElement('input');
        levelInput.type = 'hidden';
        levelInput.name = 'level';
        levelInput.value = level;
        form.appendChild(levelInput);
    }
    
    document.body.appendChild(form);
    form.submit();
}
</script>

<style>
    .bg-akaat-blue { background-color: #0F4C81; }
    .text-akaat-blue { color: #0F4C81; }
    .bg-akaat-green { background-color: #2ECC71; }
    .text-akaat-green { color: #2ECC71; }
    .border-akaat-blue { border-color: #0F4C81; }
    .focus\:border-akaat-blue:focus { border-color: #0F4C81; }
    .focus\:ring-akaat-blue\/20:focus { --tw-ring-color: rgba(15, 76, 129, 0.2); }
    .from-akaat-blue { --tw-gradient-from: #0F4C81; }
    .to-akaat-blue { --tw-gradient-to: #0F4C81; }
    .from-akaat-green { --tw-gradient-from: #2ECC71; }
    .to-akaat-green { --tw-gradient-to: #2ECC71; }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection