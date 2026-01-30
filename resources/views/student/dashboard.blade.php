@extends('layouts.app')

@section('title', 'Student Dashboard - AKAAT Technologies')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 font-['Plus_Jakarta_Sans']">
                        Welcome back, {{ auth()->user()->name }}! 👋
                    </h1>
                    <p class="text-gray-600 mt-1">Continue your learning journey</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Learning Streak</p>
                        <p class="text-2xl font-bold text-akaat-green">{{ $stats['learning_streak'] ?? 0 }} days</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-akaat-blue to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Active Courses -->
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['active_courses'] ?? 0 }}</p>
                        <p class="text-sm text-gray-600">Active Courses</p>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full" style="width: {{ $stats['avg_progress'] ?? 0 }}%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-2">{{ $stats['avg_progress'] ?? 0 }}% average progress</p>
            </div>

            <!-- Completed Courses -->
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['completed_courses'] ?? 0 }}</p>
                        <p class="text-sm text-gray-600">Completed</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-xs text-green-600 font-medium">{{ $stats['certificates_earned'] ?? 0 }} certificates earned</p>
                </div>
            </div>

            <!-- Badges Earned -->
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['badges_earned'] ?? 0 }}</p>
                        <p class="text-sm text-gray-600">Badges</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <p class="text-xs text-yellow-600 font-medium">{{ $stats['total_points'] ?? 0 }} points earned</p>
                </div>
            </div>

            <!-- Study Time -->
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['study_hours'] ?? 0 }}h</p>
                        <p class="text-sm text-gray-600">Study Time</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-xs text-purple-600 font-medium">This month</p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Continue Learning -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 font-['Plus_Jakarta_Sans']">Continue Learning</h2>
                        <a href="/student/courses" class="text-akaat-blue hover:text-blue-700 font-medium">View All</a>
                    </div>

                    @if(isset($activeCourses) && $activeCourses->count() > 0)
                        <div class="space-y-6">
                            @foreach($activeCourses->take(3) as $enrollment)
                                <div class="group border border-gray-200 rounded-2xl p-6 hover:border-akaat-blue hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="w-16 h-16 bg-gradient-to-br from-akaat-blue to-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-akaat-blue transition-colors">
                                                {{ $enrollment->course->title }}
                                            </h3>
                                            <p class="text-gray-600 text-sm mb-3">{{ $enrollment->course->short_description }}</p>
                                            
                                            <div class="flex items-center justify-between mb-3">
                                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                                    <span>{{ $enrollment->course->total_lessons }} lessons</span>
                                                    <span>{{ $enrollment->course->duration_hours }}h total</span>
                                                </div>
                                                <span class="text-sm font-medium text-akaat-blue">{{ number_format($enrollment->progress_percentage, 1) }}% complete</span>
                                            </div>
                                            
                                            <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                                                <div class="bg-gradient-to-r from-akaat-blue to-blue-600 h-2 rounded-full transition-all duration-300" 
                                                     style="width: {{ $enrollment->progress_percentage }}%"></div>
                                            </div>
                                            
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($enrollment->course->instructor_name) }}&background=0F4C81&color=fff&size=24" 
                                                         alt="{{ $enrollment->course->instructor_name }}" 
                                                         class="w-6 h-6 rounded-full">
                                                    <span class="text-sm text-gray-600">{{ $enrollment->course->instructor_name }}</span>
                                                </div>
                                                <a href="/student/courses/{{ $enrollment->course->slug }}" 
                                                   class="bg-akaat-blue text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors">
                                                    Continue
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">No Active Courses</h3>
                            <p class="text-gray-600 mb-4">Start your learning journey by enrolling in a course</p>
                            <a href="/courses" class="bg-akaat-green text-white px-6 py-3 rounded-xl font-medium hover:bg-green-600 transition-colors">
                                Browse Courses
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Recent Badges -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Badges</h3>
                    @if(isset($recentBadges) && $recentBadges->count() > 0)
                        <div class="space-y-3">
                            @foreach($recentBadges->take(3) as $userBadge)
                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold" 
                                         style="background: {{ $userBadge->badge->color }}">
                                        🏆
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 text-sm">{{ $userBadge->badge->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $userBadge->earned_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-500">No badges yet</p>
                            <p class="text-xs text-gray-400">Complete courses to earn badges</p>
                        </div>
                    @endif
                </div>

                <!-- Learning Goals -->
                <div class="bg-gradient-to-br from-akaat-green to-green-600 rounded-3xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-bold mb-4">This Week's Goal</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm opacity-90">Study Time</span>
                                <span class="text-sm font-medium">{{ $stats['weekly_study_hours'] ?? 0 }}/10h</span>
                            </div>
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white h-2 rounded-full" style="width: {{ min(100, (($stats['weekly_study_hours'] ?? 0) / 10) * 100) }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm opacity-90">Lessons</span>
                                <span class="text-sm font-medium">{{ $stats['weekly_lessons'] ?? 0 }}/5</span>
                            </div>
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white h-2 rounded-full" style="width: {{ min(100, (($stats['weekly_lessons'] ?? 0) / 5) * 100) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="/courses" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <span class="font-medium text-gray-900">Browse Courses</span>
                        </a>
                        <a href="/student/certificates" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="font-medium text-gray-900">My Certificates</span>
                        </a>
                        <a href="/student/profile" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <span class="font-medium text-gray-900">Profile Settings</span>
                        </a>
                    </div>
                </div>
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
    .hover\:border-akaat-blue:hover { border-color: #0F4C81; }
    .hover\:text-akaat-blue:hover { color: #0F4C81; }
    .from-akaat-blue { --tw-gradient-from: #0F4C81; }
    .to-akaat-blue { --tw-gradient-to: #0F4C81; }
    .from-akaat-green { --tw-gradient-from: #2ECC71; }
    .to-akaat-green { --tw-gradient-to: #2ECC71; }
</style>
@endsection