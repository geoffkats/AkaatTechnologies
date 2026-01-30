@extends('layouts.app')

@section('title', $course->title . ' - AKAAT Technologies')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50">
    <!-- Course Header -->
    <div class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Course Info -->
                <div>
                    <!-- Breadcrumb -->
                    <nav class="mb-6">
                        <ol class="flex items-center space-x-2 text-sm text-gray-500">
                            <li><a href="{{ route('courses.index') }}" class="hover:text-akaat-blue">Courses</a></li>
                            <li><span class="mx-2">/</span></li>
                            <li><span class="text-akaat-blue">{{ $course->category }}</span></li>
                            <li><span class="mx-2">/</span></li>
                            <li class="text-gray-900">{{ $course->title }}</li>
                        </ol>
                    </nav>

                    <!-- Category & Level -->
                    <div class="flex items-center gap-4 mb-4">
                        <span class="bg-akaat-blue/10 text-akaat-blue px-3 py-1 rounded-full text-sm font-medium">
                            {{ $course->category }}
                        </span>
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">
                            {{ ucfirst($course->level) }}
                        </span>
                        @if($course->featured)
                            <span class="bg-akaat-green/10 text-akaat-green px-3 py-1 rounded-full text-sm font-medium">
                                Featured
                            </span>
                        @endif
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 font-['Plus_Jakarta_Sans'] mb-4">
                        {{ $course->title }}
                    </h1>

                    <!-- Description -->
                    <p class="text-xl text-gray-600 mb-6">
                        {{ $course->short_description }}
                    </p>

                    <!-- Course Stats -->
                    <div class="flex flex-wrap items-center gap-6 text-gray-600 mb-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $course->duration_hours }} hours</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span>{{ $course->total_lessons }} lessons</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>{{ $course->student_count }} students</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            <span>{{ $course->average_rating }} ({{ $course->student_count }} reviews)</span>
                        </div>
                    </div>

                    <!-- Instructor -->
                    <div class="flex items-center gap-4 mb-8">
                        <img src="{{ $course->instructor_image }}" 
                             alt="{{ $course->instructor_name }}" 
                             class="w-16 h-16 rounded-full">
                        <div>
                            <p class="text-sm text-gray-500">Instructor</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $course->instructor_name }}</p>
                        </div>
                    </div>

                    <!-- Price and Enrollment -->
                    <div class="flex items-center gap-6">
                        <div>
                            <span class="text-3xl font-bold text-gray-900">{{ $course->formatted_price }}</span>
                            @if($course->original_price)
                                <span class="text-lg text-gray-500 line-through ml-2">{{ $course->original_price }}</span>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-medium ml-2">
                                    {{ $course->discount_percentage }}% OFF
                                </span>
                            @endif
                        </div>
                        
                        @if($isEnrolled)
                            <a href="{{ route('student.course', $course->slug) }}" 
                               class="bg-akaat-green text-white px-8 py-4 rounded-2xl font-semibold text-lg hover:bg-green-600 transition-colors">
                                Continue Learning
                            </a>
                        @elseif($canEnroll)
                            <form action="{{ route('courses.enroll', $course->slug) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" 
                                        class="bg-akaat-blue text-white px-8 py-4 rounded-2xl font-semibold text-lg hover:bg-blue-700 transition-colors">
                                    Enroll Now
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" 
                               class="bg-akaat-blue text-white px-8 py-4 rounded-2xl font-semibold text-lg hover:bg-blue-700 transition-colors">
                                Login to Enroll
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Course Preview -->
                <div>
                    <div class="relative bg-gray-900 rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-video bg-gradient-to-br from-akaat-blue to-blue-600 flex items-center justify-center">
                            @if($course->video_preview)
                                <!-- Video preview would go here -->
                                <div class="text-center">
                                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                                        <svg class="w-10 h-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                    <p class="text-white text-lg font-medium">Course Preview</p>
                                </div>
                            @else
                                <div class="text-center">
                                    <svg class="w-20 h-20 text-white/60 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-white/80">{{ $course->title }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Course Description -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">About This Course</h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        {!! nl2br(e($course->description)) !!}
                    </div>
                </div>

                <!-- What You'll Learn -->
                @if($course->what_you_learn && count($course->what_you_learn) > 0)
                    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">What You'll Learn</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            @foreach($course->what_you_learn as $outcome)
                                <div class="flex items-start gap-3">
                                    <div class="w-6 h-6 bg-akaat-green/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg class="w-4 h-4 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">{{ $outcome }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Course Curriculum -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Course Curriculum</h2>
                    <div class="space-y-4">
                        @foreach($course->lessons as $index => $lesson)
                            <div class="border border-gray-200 rounded-2xl p-6 hover:border-akaat-blue/30 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 bg-akaat-blue/10 rounded-full flex items-center justify-center">
                                            <span class="text-akaat-blue font-semibold">{{ $index + 1 }}</span>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">{{ $lesson->title }}</h3>
                                            <p class="text-sm text-gray-600">{{ $lesson->description }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 text-sm text-gray-500">
                                        @if($lesson->is_free)
                                            <span class="bg-akaat-green/10 text-akaat-green px-2 py-1 rounded text-xs font-medium">
                                                Free Preview
                                            </span>
                                        @endif
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $lesson->formatted_duration }}
                                        </div>
                                        @if($lesson->type === 'video')
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                </svg>
                                                Video
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Requirements -->
                @if($course->requirements && count($course->requirements) > 0)
                    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Requirements</h2>
                        <ul class="space-y-3">
                            @foreach($course->requirements as $requirement)
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">{{ $requirement }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Instructor Bio -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">About the Instructor</h2>
                    <div class="flex items-start gap-6">
                        <img src="{{ $course->instructor_image }}" 
                             alt="{{ $course->instructor_name }}" 
                             class="w-20 h-20 rounded-full">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $course->instructor_name }}</h3>
                            <p class="text-gray-600">{{ $course->instructor_bio }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Course Features -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">This course includes:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-700">{{ $course->duration_hours }} hours on-demand video</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="text-gray-700">Downloadable resources</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-700">Access on mobile and desktop</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-700">Certificate of completion</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <span class="text-gray-700">Lifetime access</span>
                        </li>
                    </ul>
                </div>

                <!-- Related Courses -->
                @if($relatedCourses->count() > 0)
                    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Related Courses</h3>
                        <div class="space-y-4">
                            @foreach($relatedCourses as $relatedCourse)
                                <a href="{{ route('courses.show', $relatedCourse->slug) }}" 
                                   class="block p-4 border border-gray-200 rounded-xl hover:border-akaat-blue/30 transition-colors">
                                    <h4 class="font-semibold text-gray-900 mb-2">{{ $relatedCourse->title }}</h4>
                                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($relatedCourse->short_description, 80) }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-akaat-blue font-medium">{{ $relatedCourse->formatted_price }}</span>
                                        <span class="text-xs text-gray-500">{{ $relatedCourse->duration_hours }}h</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .bg-akaat-blue { background-color: #0F4C81; }
    .text-akaat-blue { color: #0F4C81; }
    .bg-akaat-green { background-color: #2ECC71; }
    .text-akaat-green { color: #2ECC71; }
    .border-akaat-blue { border-color: #0F4C81; }
    .hover\:border-akaat-blue\/30:hover { border-color: rgba(15, 76, 129, 0.3); }
    .bg-akaat-blue\/10 { background-color: rgba(15, 76, 129, 0.1); }
    .bg-akaat-green\/10 { background-color: rgba(46, 204, 113, 0.1); }
    .from-akaat-blue { --tw-gradient-from: #0F4C81; }
    .to-akaat-blue { --tw-gradient-to: #0F4C81; }
</style>
@endsection