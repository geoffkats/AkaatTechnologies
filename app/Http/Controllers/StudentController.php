<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Badge;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        
        // Get user's active enrollments
        $activeCourses = Enrollment::where('user_id', $user->id)
            ->where('status', 'active')
            ->with(['course'])
            ->orderBy('updated_at', 'desc')
            ->get();
        
        // Get user's recent badges
        $recentBadges = $user->badges()
            ->with('badge')
            ->orderBy('earned_at', 'desc')
            ->limit(5)
            ->get();
        
        // Calculate stats
        $stats = [
            'active_courses' => $activeCourses->count(),
            'completed_courses' => Enrollment::where('user_id', $user->id)
                ->where('status', 'completed')
                ->count(),
            'badges_earned' => $user->badges()->count(),
            'certificates_earned' => Enrollment::where('user_id', $user->id)
                ->where('status', 'completed')
                ->whereNotNull('certificate_url')
                ->count(),
            'avg_progress' => $activeCourses->avg('progress_percentage') ?? 0,
            'total_points' => $user->badges()->sum('points') ?? 0,
            'study_hours' => 24, // This would be calculated from actual study time tracking
            'learning_streak' => 5, // This would be calculated from daily activity
            'weekly_study_hours' => 8, // This would be calculated from this week's activity
            'weekly_lessons' => 3, // This would be calculated from this week's completed lessons
        ];
        
        return view('student.dashboard', compact('activeCourses', 'recentBadges', 'stats'));
    }
    
    public function courses()
    {
        $user = auth()->user();
        
        $enrollments = Enrollment::where('user_id', $user->id)
            ->with(['course'])
            ->orderBy('updated_at', 'desc')
            ->paginate(12);
        
        return view('student.courses', compact('enrollments'));
    }
    
    public function course($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        
        $enrollment = Enrollment::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->first();
        
        if (!$enrollment) {
            return redirect()->route('courses.show', $slug)
                ->with('error', 'You are not enrolled in this course.');
        }
        
        $lessons = $course->lessons()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->get();
        
        return view('student.course', compact('course', 'enrollment', 'lessons'));
    }
    
    public function certificates()
    {
        $user = auth()->user();
        
        $certificates = Enrollment::where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereNotNull('certificate_url')
            ->with('course')
            ->orderBy('completed_at', 'desc')
            ->get();
        
        return view('student.certificates', compact('certificates'));
    }
    
    public function profile()
    {
        $user = auth()->user();
        
        $badges = $user->badges()
            ->with('badge')
            ->orderBy('earned_at', 'desc')
            ->get();
        
        $stats = [
            'total_courses' => Enrollment::where('user_id', $user->id)->count(),
            'completed_courses' => Enrollment::where('user_id', $user->id)
                ->where('status', 'completed')
                ->count(),
            'total_badges' => $badges->count(),
            'total_points' => $badges->sum('points') ?? 0,
        ];
        
        return view('student.profile', compact('badges', 'stats'));
    }
}
