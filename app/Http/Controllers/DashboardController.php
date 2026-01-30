<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Badge;
use App\Models\LessonCompletion;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get user's orders
        $orders = Order::where('user_id', $user->id)
            ->with('orderItems.product')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Get user's reviews
        $reviews = Review::where('user_id', $user->id)
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Get orders that can be reviewed (delivered orders without reviews)
        $reviewableOrders = Order::where('user_id', $user->id)
            ->where('status', 'delivered')
            ->whereHas('orderItems', function($query) use ($user) {
                $query->whereDoesntHave('product.reviews', function($reviewQuery) use ($user) {
                    $reviewQuery->where('user_id', $user->id);
                });
            })
            ->with('orderItems.product')
            ->get();
        
        // E-Learning Data
        $enrollments = Enrollment::where('user_id', $user->id)
            ->with('course')
            ->orderBy('last_accessed_at', 'desc')
            ->limit(5)
            ->get();
        
        $activeEnrollments = Enrollment::where('user_id', $user->id)
            ->where('status', 'active')
            ->with('course')
            ->get();
        
        $recentBadges = $user->badges()
            ->orderBy('user_badges.created_at', 'desc')
            ->limit(5)
            ->get();
        
        $nextLesson = $user->getNextLesson();
        
        // Learning Statistics
        $learningStats = [
            'total_courses' => $user->enrollments()->count(),
            'active_courses' => $user->activeEnrollments()->count(),
            'completed_courses' => $user->completedEnrollments()->count(),
            'total_badges' => $user->badges()->count(),
            'total_points' => $user->total_points,
            'lessons_completed' => $user->lessonCompletions()->count(),
            'quizzes_passed' => $user->quizAttempts()->where('passed', true)->distinct('quiz_id')->count(),
            'learning_streak' => $user->learning_streak,
            'average_quiz_score' => round($user->quizAttempts()->where('status', 'completed')->avg('percentage') ?? 0, 1),
        ];
        
        // Overall Statistics
        $stats = [
            'total_orders' => Order::where('user_id', $user->id)->count(),
            'pending_orders' => Order::where('user_id', $user->id)->where('status', 'pending')->count(),
            'total_reviews' => Review::where('user_id', $user->id)->count(),
            'total_spent' => Order::where('user_id', $user->id)->where('payment_status', 'paid')->sum('total_amount')
        ];
        
        return view('dashboard', compact(
            'orders', 
            'reviews', 
            'reviewableOrders', 
            'stats', 
            'enrollments', 
            'activeEnrollments', 
            'recentBadges', 
            'nextLesson', 
            'learningStats'
        ));
    }
    
    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('orderItems.product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('dashboard.orders', compact('orders'));
    }
    
    public function reviews()
    {
        $reviews = Review::where('user_id', auth()->id())
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('dashboard.reviews', compact('reviews'));
    }
}
