<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BadgeSeeder extends Seeder
{
    public function run(): void
    {
        $badges = [
            [
                'name' => 'First Course Completed',
                'description' => 'Congratulations on completing your first course!',
                'icon' => '🎓',
                'color' => 'green',
                'points' => 100,
                'criteria' => [
                    [
                        'type' => 'courses_completed',
                        'operator' => '>=',
                        'value' => 1,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Learning Enthusiast',
                'description' => 'You\'ve completed 5 courses! Keep up the great work!',
                'icon' => '📚',
                'color' => 'blue',
                'points' => 500,
                'criteria' => [
                    [
                        'type' => 'courses_completed',
                        'operator' => '>=',
                        'value' => 5,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Knowledge Seeker',
                'description' => 'Amazing! You\'ve completed 10 courses!',
                'icon' => '🔍',
                'color' => 'purple',
                'points' => 1000,
                'criteria' => [
                    [
                        'type' => 'courses_completed',
                        'operator' => '>=',
                        'value' => 10,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Learning Master',
                'description' => 'Incredible! You\'ve completed 25 courses!',
                'icon' => '🏆',
                'color' => 'gold',
                'points' => 2500,
                'criteria' => [
                    [
                        'type' => 'courses_completed',
                        'operator' => '>=',
                        'value' => 25,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Education Champion',
                'description' => 'Outstanding! You\'ve completed 50 courses!',
                'icon' => '👑',
                'color' => 'gold',
                'points' => 5000,
                'criteria' => [
                    [
                        'type' => 'courses_completed',
                        'operator' => '>=',
                        'value' => 50,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Quiz Master',
                'description' => 'You\'ve passed 10 quizzes with flying colors!',
                'icon' => '🧠',
                'color' => 'blue',
                'points' => 300,
                'criteria' => [
                    [
                        'type' => 'quizzes_passed',
                        'operator' => '>=',
                        'value' => 10,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Web Developer',
                'description' => 'You\'ve mastered web development courses!',
                'icon' => '💻',
                'color' => 'green',
                'points' => 400,
                'criteria' => [
                    [
                        'type' => 'course_category',
                        'operator' => '>=',
                        'value' => 1,
                        'category' => 'Web Development',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Backend Expert',
                'description' => 'You\'ve completed backend development courses!',
                'icon' => '⚙️',
                'color' => 'red',
                'points' => 400,
                'criteria' => [
                    [
                        'type' => 'course_category',
                        'operator' => '>=',
                        'value' => 1,
                        'category' => 'Backend Development',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name' => 'Mobile Developer',
                'description' => 'You\'ve mastered mobile app development!',
                'icon' => '📱',
                'color' => 'blue',
                'points' => 400,
                'criteria' => [
                    [
                        'type' => 'course_category',
                        'operator' => '>=',
                        'value' => 1,
                        'category' => 'Mobile Development',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'Marketing Pro',
                'description' => 'You\'ve completed marketing courses!',
                'icon' => '📈',
                'color' => 'purple',
                'points' => 400,
                'criteria' => [
                    [
                        'type' => 'course_category',
                        'operator' => '>=',
                        'value' => 1,
                        'category' => 'Marketing',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'name' => 'Data Scientist',
                'description' => 'You\'ve mastered data science!',
                'icon' => '📊',
                'color' => 'blue',
                'points' => 500,
                'criteria' => [
                    [
                        'type' => 'course_category',
                        'operator' => '>=',
                        'value' => 1,
                        'category' => 'Data Science',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 11,
            ],
            [
                'name' => 'Point Collector',
                'description' => 'You\'ve earned 1000 points!',
                'icon' => '💎',
                'color' => 'gold',
                'points' => 200,
                'criteria' => [
                    [
                        'type' => 'total_points',
                        'operator' => '>=',
                        'value' => 1000,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 12,
            ],
            [
                'name' => 'Lesson Learner',
                'description' => 'You\'ve completed 50 lessons!',
                'icon' => '📖',
                'color' => 'green',
                'points' => 250,
                'criteria' => [
                    [
                        'type' => 'lessons_completed',
                        'operator' => '>=',
                        'value' => 50,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 13,
            ],
            [
                'name' => 'Dedicated Student',
                'description' => 'You\'ve maintained a 7-day learning streak!',
                'icon' => '🔥',
                'color' => 'red',
                'points' => 300,
                'criteria' => [
                    [
                        'type' => 'study_streak_days',
                        'operator' => '>=',
                        'value' => 7,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 14,
            ],
            [
                'name' => 'Early Bird',
                'description' => 'Welcome to AKAAT Technologies E-Learning!',
                'icon' => '🌟',
                'color' => 'gold',
                'points' => 50,
                'criteria' => [
                    [
                        'type' => 'courses_completed',
                        'operator' => '>=',
                        'value' => 0,
                    ],
                ],
                'is_active' => true,
                'sort_order' => 0,
            ],
        ];

        foreach ($badges as $badgeData) {
            $badgeData['slug'] = Str::slug($badgeData['name']);
            unset($badgeData['sort_order']); // Remove sort_order as it doesn't exist in the table
            Badge::create($badgeData);
        }
    }
}
