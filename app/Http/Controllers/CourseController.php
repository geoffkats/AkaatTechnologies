<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::published()
            ->with(['enrollments'])
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Course::published()
            ->distinct()
            ->pluck('category')
            ->sort();

        $levels = Course::published()
            ->distinct()
            ->pluck('level')
            ->sort();

        return view('courses.index', compact('courses', 'categories', 'levels'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)
            ->where('status', 'published')
            ->with(['lessons' => function ($query) {
                $query->where('is_published', true)->orderBy('sort_order');
            }, 'quizzes'])
            ->firstOrFail();

        $enrollment = null;
        $canEnroll = true;
        $isEnrolled = false;

        if (Auth::check()) {
            $enrollment = Enrollment::where('user_id', Auth::id())
                ->where('course_id', $course->id)
                ->first();
            
            $isEnrolled = $enrollment !== null;
            $canEnroll = !$isEnrolled;
        }

        $relatedCourses = Course::published()
            ->where('category', $course->category)
            ->where('id', '!=', $course->id)
            ->limit(3)
            ->get();

        return view('courses.show', compact('course', 'enrollment', 'canEnroll', 'isEnrolled', 'relatedCourses'));
    }

    public function enroll(Request $request, $slug)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to enroll in courses.');
        }

        $course = Course::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $user = Auth::user();

        // Check if already enrolled
        $existingEnrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        if ($existingEnrollment) {
            return redirect()->route('courses.show', $slug)
                ->with('error', 'You are already enrolled in this course.');
        }

        // Create enrollment
        $enrollment = Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'status' => 'active',
            'enrolled_at' => now(),
            'progress_percentage' => 0,
            'payment_status' => 'completed', // For now, assume free enrollment
            'payment_method' => 'free',
            'amount_paid' => 0,
        ]);

        // Award early bird badge if this is user's first enrollment
        if ($user->enrollments()->count() === 1) {
            $earlyBirdBadge = Badge::where('name', 'Early Bird')->first();
            if ($earlyBirdBadge) {
                $user->awardBadge($earlyBirdBadge);
            }
        }

        return redirect()->route('student.course', $slug)
            ->with('success', 'Successfully enrolled in ' . $course->title . '!');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');
        $level = $request->get('level');

        $courses = Course::published();

        if ($query) {
            $courses->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('short_description', 'like', "%{$query}%");
            });
        }

        if ($category) {
            $courses->where('category', $category);
        }

        if ($level) {
            $courses->where('level', $level);
        }

        $courses = $courses->with(['enrollments'])
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Course::published()
            ->distinct()
            ->pluck('category')
            ->sort();

        $levels = Course::published()
            ->distinct()
            ->pluck('level')
            ->sort();

        return view('courses.index', compact('courses', 'categories', 'levels', 'query', 'category', 'level'));
    }
}
