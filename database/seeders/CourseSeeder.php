<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Web Development Fundamentals',
                'short_description' => 'Learn the basics of HTML, CSS, and JavaScript to build modern websites.',
                'description' => 'This comprehensive course covers the fundamental technologies used in web development. You\'ll learn HTML for structure, CSS for styling, and JavaScript for interactivity. Perfect for beginners who want to start their web development journey.',
                'instructor_name' => 'John Mukasa',
                'instructor_bio' => 'Senior Web Developer with 8+ years of experience in building scalable web applications.',
                'instructor_avatar' => 'https://ui-avatars.com/api/?name=John+Mukasa&background=0F4C81&color=fff&size=200',
                'thumbnail_url' => '/storage/courses/web-dev-fundamentals.jpg',
                'video_preview_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'price' => 150000,
                'discounted_price' => 120000,
                'duration_hours' => 40,
                'difficulty_level' => 'beginner',
                'category' => 'Web Development',
                'tags' => ['HTML', 'CSS', 'JavaScript', 'Frontend', 'Beginner'],
                'requirements' => [
                    'Basic computer skills',
                    'Text editor (VS Code recommended)',
                    'Web browser (Chrome or Firefox)',
                ],
                'what_you_learn' => [
                    'HTML structure and semantic elements',
                    'CSS styling and responsive design',
                    'JavaScript fundamentals and DOM manipulation',
                    'Building interactive web pages',
                    'Best practices for web development',
                ],
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'PHP & Laravel Development',
                'short_description' => 'Master PHP programming and Laravel framework to build powerful web applications.',
                'description' => 'Dive deep into PHP programming and learn the Laravel framework. This course covers everything from PHP basics to advanced Laravel features like Eloquent ORM, authentication, and API development.',
                'instructor_name' => 'Sarah Nakato',
                'instructor_bio' => 'Full-stack developer and Laravel expert with 6+ years of experience.',
                'instructor_avatar' => 'https://ui-avatars.com/api/?name=Sarah+Nakato&background=2ECC71&color=fff&size=200',
                'thumbnail_url' => '/storage/courses/php-laravel.jpg',
                'video_preview_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'price' => 250000,
                'discounted_price' => 200000,
                'duration_hours' => 60,
                'difficulty_level' => 'intermediate',
                'category' => 'Backend Development',
                'tags' => ['PHP', 'Laravel', 'Backend', 'Database', 'API'],
                'requirements' => [
                    'Basic programming knowledge',
                    'Understanding of HTML and CSS',
                    'Local development environment (XAMPP/WAMP)',
                ],
                'what_you_learn' => [
                    'PHP programming fundamentals',
                    'Laravel framework architecture',
                    'Database design and Eloquent ORM',
                    'Authentication and authorization',
                    'RESTful API development',
                    'Testing and deployment',
                ],
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Mobile App Development with Flutter',
                'short_description' => 'Build cross-platform mobile apps using Flutter and Dart programming language.',
                'description' => 'Learn to create beautiful, native mobile applications for both iOS and Android using Flutter. This course covers Dart programming, Flutter widgets, state management, and app deployment.',
                'instructor_name' => 'David Ssemakula',
                'instructor_bio' => 'Mobile app developer specializing in Flutter with 5+ years of experience.',
                'instructor_avatar' => 'https://ui-avatars.com/api/?name=David+Ssemakula&background=F39C12&color=fff&size=200',
                'thumbnail_url' => '/storage/courses/flutter-mobile.jpg',
                'video_preview_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'price' => 300000,
                'discounted_price' => 250000,
                'duration_hours' => 50,
                'difficulty_level' => 'intermediate',
                'category' => 'Mobile Development',
                'tags' => ['Flutter', 'Dart', 'Mobile', 'iOS', 'Android', 'Cross-platform'],
                'requirements' => [
                    'Basic programming knowledge',
                    'Flutter SDK installed',
                    'Android Studio or VS Code',
                    'Mobile device or emulator for testing',
                ],
                'what_you_learn' => [
                    'Dart programming language',
                    'Flutter framework and widgets',
                    'State management with Provider/Bloc',
                    'Navigation and routing',
                    'API integration and data persistence',
                    'App store deployment',
                ],
                'is_published' => true,
                'is_featured' => false,
                'sort_order' => 3,
            ],
            [
                'title' => 'Digital Marketing Essentials',
                'short_description' => 'Learn digital marketing strategies to grow your business online.',
                'description' => 'Comprehensive digital marketing course covering SEO, social media marketing, content marketing, email marketing, and paid advertising. Perfect for entrepreneurs and marketing professionals.',
                'instructor_name' => 'Grace Namukasa',
                'instructor_bio' => 'Digital marketing strategist with 7+ years of experience helping businesses grow online.',
                'instructor_avatar' => 'https://ui-avatars.com/api/?name=Grace+Namukasa&background=9B59B6&color=fff&size=200',
                'thumbnail_url' => '/storage/courses/digital-marketing.jpg',
                'video_preview_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'price' => 180000,
                'discounted_price' => 150000,
                'duration_hours' => 35,
                'difficulty_level' => 'beginner',
                'category' => 'Marketing',
                'tags' => ['SEO', 'Social Media', 'Content Marketing', 'Email Marketing', 'PPC'],
                'requirements' => [
                    'Basic computer skills',
                    'Social media accounts',
                    'Google Analytics account (free)',
                ],
                'what_you_learn' => [
                    'SEO fundamentals and keyword research',
                    'Social media marketing strategies',
                    'Content creation and marketing',
                    'Email marketing campaigns',
                    'Google Ads and Facebook Ads',
                    'Analytics and performance tracking',
                ],
                'is_published' => true,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Data Science with Python',
                'short_description' => 'Master data analysis, visualization, and machine learning using Python.',
                'description' => 'Comprehensive data science course using Python. Learn data manipulation with Pandas, visualization with Matplotlib and Seaborn, and machine learning with Scikit-learn.',
                'instructor_name' => 'Michael Kiwanuka',
                'instructor_bio' => 'Data scientist and Python expert with 6+ years of experience in analytics and ML.',
                'instructor_avatar' => 'https://ui-avatars.com/api/?name=Michael+Kiwanuka&background=3498DB&color=fff&size=200',
                'thumbnail_url' => '/storage/courses/data-science-python.jpg',
                'video_preview_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'price' => 350000,
                'discounted_price' => 280000,
                'duration_hours' => 70,
                'difficulty_level' => 'advanced',
                'category' => 'Data Science',
                'tags' => ['Python', 'Data Analysis', 'Machine Learning', 'Pandas', 'Visualization'],
                'requirements' => [
                    'Basic Python programming knowledge',
                    'Mathematics and statistics background',
                    'Jupyter Notebook installed',
                ],
                'what_you_learn' => [
                    'Data manipulation with Pandas and NumPy',
                    'Data visualization with Matplotlib and Seaborn',
                    'Statistical analysis and hypothesis testing',
                    'Machine learning algorithms',
                    'Model evaluation and deployment',
                    'Real-world data science projects',
                ],
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($courses as $courseData) {
            $courseData['slug'] = Str::slug($courseData['title']);
            
            $course = Course::create([
                'title' => $courseData['title'],
                'slug' => $courseData['slug'],
                'description' => $courseData['description'],
                'short_description' => $courseData['short_description'],
                'thumbnail' => $courseData['thumbnail_url'],
                'video_preview' => $courseData['video_preview_url'],
                'price' => $courseData['price'],
                'level' => $courseData['difficulty_level'],
                'category' => $courseData['category'],
                'duration_hours' => $courseData['duration_hours'],
                'learning_outcomes' => $courseData['what_you_learn'],
                'prerequisites' => $courseData['requirements'],
                'status' => $courseData['is_published'] ? 'published' : 'draft',
                'featured' => $courseData['is_featured'],
                'instructor_name' => $courseData['instructor_name'],
                'instructor_bio' => $courseData['instructor_bio'],
                'instructor_image' => $courseData['instructor_avatar'],
                'meta_data' => [
                    'tags' => $courseData['tags'],
                    'meta_title' => $courseData['title'] . ' - AKAAT Technologies',
                    'meta_description' => $courseData['short_description'],
                    'discounted_price' => $courseData['discounted_price'] ?? null,
                ],
            ]);
            
            // Create lessons for each course
            $this->createLessonsForCourse($course);
        }
    }

    private function createLessonsForCourse(Course $course): void
    {
        $lessonTemplates = [
            'Web Development Fundamentals' => [
                ['title' => 'Introduction to Web Development', 'duration' => 1800, 'is_preview' => true],
                ['title' => 'HTML Basics and Structure', 'duration' => 2400],
                ['title' => 'CSS Fundamentals', 'duration' => 2700],
                ['title' => 'CSS Flexbox and Grid', 'duration' => 3000],
                ['title' => 'JavaScript Introduction', 'duration' => 2400],
                ['title' => 'DOM Manipulation', 'duration' => 3600],
                ['title' => 'Events and Interactivity', 'duration' => 3000],
                ['title' => 'Responsive Web Design', 'duration' => 2700],
                ['title' => 'Final Project: Portfolio Website', 'duration' => 4800],
            ],
            'PHP & Laravel Development' => [
                ['title' => 'PHP Fundamentals', 'duration' => 3600, 'is_preview' => true],
                ['title' => 'Object-Oriented Programming in PHP', 'duration' => 4200],
                ['title' => 'Introduction to Laravel', 'duration' => 3000],
                ['title' => 'Laravel Routing and Controllers', 'duration' => 3600],
                ['title' => 'Blade Templates and Views', 'duration' => 3000],
                ['title' => 'Database and Eloquent ORM', 'duration' => 4800],
                ['title' => 'Authentication and Authorization', 'duration' => 4200],
                ['title' => 'API Development', 'duration' => 3600],
                ['title' => 'Testing and Deployment', 'duration' => 3000],
            ],
            'Mobile App Development with Flutter' => [
                ['title' => 'Dart Programming Basics', 'duration' => 3600, 'is_preview' => true],
                ['title' => 'Flutter Setup and First App', 'duration' => 2400],
                ['title' => 'Widgets and Layouts', 'duration' => 4200],
                ['title' => 'State Management', 'duration' => 4800],
                ['title' => 'Navigation and Routing', 'duration' => 3600],
                ['title' => 'Working with APIs', 'duration' => 4200],
                ['title' => 'Local Storage and Databases', 'duration' => 3600],
                ['title' => 'App Deployment', 'duration' => 3000],
            ],
            'Digital Marketing Essentials' => [
                ['title' => 'Digital Marketing Overview', 'duration' => 1800, 'is_preview' => true],
                ['title' => 'SEO Fundamentals', 'duration' => 3600],
                ['title' => 'Content Marketing Strategy', 'duration' => 3000],
                ['title' => 'Social Media Marketing', 'duration' => 3600],
                ['title' => 'Email Marketing', 'duration' => 2700],
                ['title' => 'Google Ads', 'duration' => 4200],
                ['title' => 'Facebook and Instagram Ads', 'duration' => 3600],
                ['title' => 'Analytics and Reporting', 'duration' => 3000],
            ],
            'Data Science with Python' => [
                ['title' => 'Python for Data Science', 'duration' => 4200, 'is_preview' => true],
                ['title' => 'NumPy and Pandas', 'duration' => 4800],
                ['title' => 'Data Visualization', 'duration' => 4200],
                ['title' => 'Statistical Analysis', 'duration' => 4800],
                ['title' => 'Machine Learning Basics', 'duration' => 5400],
                ['title' => 'Supervised Learning', 'duration' => 6000],
                ['title' => 'Unsupervised Learning', 'duration' => 5400],
                ['title' => 'Model Evaluation', 'duration' => 4200],
                ['title' => 'Final Project', 'duration' => 7200],
            ],
        ];

        $lessons = $lessonTemplates[$course->title] ?? [];
        
        foreach ($lessons as $index => $lessonData) {
            $lesson = Lesson::create([
                'course_id' => $course->id,
                'title' => $lessonData['title'],
                'slug' => Str::slug($lessonData['title']),
                'description' => 'Learn about ' . strtolower($lessonData['title']) . ' in this comprehensive lesson.',
                'content' => $this->generateLessonContent($lessonData['title']),
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'duration_minutes' => intval($lessonData['duration'] / 60), // Convert seconds to minutes
                'attachments' => [
                    'slides' => '/storage/lessons/slides-' . Str::slug($lessonData['title']) . '.pdf',
                    'code' => '/storage/lessons/code-' . Str::slug($lessonData['title']) . '.zip',
                ],
                'sort_order' => $index + 1,
                'type' => 'video',
                'is_published' => true,
                'is_free' => $lessonData['is_preview'] ?? false,
                'meta_data' => [
                    'video_duration_seconds' => $lessonData['duration'],
                ],
            ]);

            // Create a quiz for some lessons
            if (($index + 1) % 3 === 0) {
                $this->createQuizForLesson($lesson);
            }
        }
    }

    private function generateLessonContent(string $title): string
    {
        return "
        <h2>{$title}</h2>
        <p>Welcome to this comprehensive lesson on {$title}. In this lesson, you will learn the fundamental concepts and practical applications.</p>
        
        <h3>Learning Objectives</h3>
        <ul>
            <li>Understand the core concepts</li>
            <li>Apply practical techniques</li>
            <li>Complete hands-on exercises</li>
            <li>Build real-world examples</li>
        </ul>
        
        <h3>Key Topics Covered</h3>
        <p>This lesson covers essential topics that will help you master {$title}. We'll start with the basics and gradually move to more advanced concepts.</p>
        
        <h3>Practical Exercises</h3>
        <p>Throughout this lesson, you'll complete several practical exercises to reinforce your learning and build confidence in applying these concepts.</p>
        
        <h3>Resources</h3>
        <p>Additional resources including slides, code examples, and reference materials are available in the lesson resources section.</p>
        ";
    }

    private function createQuizForLesson(Lesson $lesson): void
    {
        $questions = [
            [
                'type' => 'multiple_choice',
                'question' => 'What is the main topic of this lesson?',
                'options' => [
                    $lesson->title,
                    'Something else',
                    'Not covered',
                    'Unknown topic'
                ],
                'correct_answer' => $lesson->title,
                'explanation' => 'This lesson focuses on ' . $lesson->title . ' as stated in the lesson title.',
            ],
            [
                'type' => 'true_false',
                'question' => 'This lesson includes practical exercises.',
                'correct_answer' => 'true',
                'explanation' => 'Yes, practical exercises are an important part of the learning process.',
            ],
            [
                'type' => 'multiple_choice',
                'question' => 'What type of resources are provided with this lesson?',
                'options' => [
                    'Slides and code examples',
                    'Only videos',
                    'No resources',
                    'Just text content'
                ],
                'correct_answer' => 'Slides and code examples',
                'explanation' => 'Each lesson includes slides and code examples to support your learning.',
            ],
        ];

        Quiz::create([
            'course_id' => $lesson->course_id,
            'lesson_id' => $lesson->id,
            'title' => $lesson->title . ' - Quiz',
            'description' => 'Test your understanding of ' . $lesson->title,
            'questions' => $questions,
            'passing_score' => 66.67, // 2 out of 3 questions (66.67%)
            'time_limit_minutes' => 10, // 10 minutes
            'max_attempts' => 3,
            'randomize_questions' => true,
            'show_results_immediately' => true,
            'is_published' => true,
            'sort_order' => 1,
            'meta_data' => [
                'instructions' => 'Answer all questions to complete this quiz. You need to score at least 70% to pass.',
            ],
        ]);
    }
}
