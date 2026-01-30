<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolioItems = [
            // Printing Projects
            [
                'title' => 'Business Cards & Branding Package',
                'description' => 'Complete branding package including business cards, letterheads, and brand guidelines for a tech startup.',
                'category' => 'printing',
                'type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1586953208448-b95a79798f07?q=80&w=800&auto=format&fit=crop',
                'featured' => true,
                'status' => true,
                'sort_order' => 1,
                'meta_data' => [
                    'client' => 'TechStart Uganda',
                    'project_date' => '2024-01-15',
                    'services' => ['Logo Design', 'Business Cards', 'Letterheads']
                ]
            ],
            [
                'title' => 'Marketing Materials Campaign',
                'description' => 'Comprehensive marketing materials including flyers, brochures, and banners for a local restaurant.',
                'category' => 'printing',
                'type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?q=80&w=800&auto=format&fit=crop',
                'featured' => true,
                'status' => true,
                'sort_order' => 2,
                'meta_data' => [
                    'client' => 'Kampala Eats Restaurant',
                    'project_date' => '2024-02-20',
                    'services' => ['Flyers', 'Brochures', 'Banners', 'Menu Design']
                ]
            ],

            // Web Development Projects
            [
                'title' => 'E-commerce Platform Development',
                'description' => 'Modern e-commerce website with payment integration, inventory management, and mobile-responsive design.',
                'category' => 'web',
                'type' => 'video',
                'media_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Replace with actual project video
                'thumbnail_url' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?q=80&w=800&auto=format&fit=crop',
                'featured' => true,
                'status' => true,
                'sort_order' => 3,
                'meta_data' => [
                    'client' => 'Uganda Crafts Online',
                    'project_date' => '2024-03-10',
                    'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL'],
                    'features' => ['Payment Gateway', 'Inventory Management', 'Admin Dashboard']
                ]
            ],
            [
                'title' => 'Corporate Website Redesign',
                'description' => 'Complete website redesign for a consulting firm with modern UI/UX and content management system.',
                'category' => 'web',
                'type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?q=80&w=800&auto=format&fit=crop',
                'featured' => true,
                'status' => true,
                'sort_order' => 4,
                'meta_data' => [
                    'client' => 'Kampala Business Consultants',
                    'project_date' => '2024-01-25',
                    'technologies' => ['WordPress', 'Custom Theme', 'SEO Optimization'],
                    'features' => ['CMS', 'Contact Forms', 'Blog System', 'Mobile Responsive']
                ]
            ],

            // Software Development Projects
            [
                'title' => 'Inventory Management System',
                'description' => 'Custom inventory management system for a retail chain with real-time tracking and reporting.',
                'category' => 'software',
                'type' => 'video',
                'media_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Replace with actual demo video
                'thumbnail_url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=800&auto=format&fit=crop',
                'featured' => true,
                'status' => true,
                'sort_order' => 5,
                'meta_data' => [
                    'client' => 'Retail Plus Uganda',
                    'project_date' => '2024-02-15',
                    'technologies' => ['Laravel', 'MySQL', 'Chart.js', 'Bootstrap'],
                    'features' => ['Real-time Tracking', 'Reports', 'Multi-location Support', 'Barcode Scanning']
                ]
            ],
            [
                'title' => 'School Management System',
                'description' => 'Comprehensive school management system with student records, fee management, and parent portal.',
                'category' => 'software',
                'type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=800&auto=format&fit=crop',
                'featured' => false,
                'status' => true,
                'sort_order' => 6,
                'meta_data' => [
                    'client' => 'Kampala International School',
                    'project_date' => '2024-03-01',
                    'technologies' => ['PHP', 'MySQL', 'JavaScript', 'CSS'],
                    'features' => ['Student Records', 'Fee Management', 'Parent Portal', 'Report Cards']
                ]
            ],

            // Training Programs
            [
                'title' => 'Graphic Design Training Success',
                'description' => 'Showcase of student projects from our comprehensive graphic design training program.',
                'category' => 'training',
                'type' => 'video',
                'media_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Replace with actual training video
                'thumbnail_url' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop',
                'featured' => true,
                'status' => true,
                'sort_order' => 7,
                'meta_data' => [
                    'program' => 'Graphic Design Mastery',
                    'duration' => '8 weeks',
                    'students' => 25,
                    'completion_rate' => '96%',
                    'skills' => ['Photoshop', 'Illustrator', 'InDesign', 'Brand Design']
                ]
            ],
            [
                'title' => 'Programming Bootcamp Graduates',
                'description' => 'Meet our successful programming bootcamp graduates and see their final projects.',
                'category' => 'training',
                'type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=800&auto=format&fit=crop',
                'featured' => true,
                'status' => true,
                'sort_order' => 8,
                'meta_data' => [
                    'program' => 'Web Development Bootcamp',
                    'duration' => '12 weeks',
                    'students' => 18,
                    'job_placement_rate' => '89%',
                    'skills' => ['HTML/CSS', 'JavaScript', 'PHP', 'Laravel', 'MySQL']
                ]
            ],

            // Additional Projects
            [
                'title' => 'Mobile App UI/UX Design',
                'description' => 'Modern mobile application design for a fintech startup with intuitive user experience.',
                'category' => 'web',
                'type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=800&auto=format&fit=crop',
                'featured' => false,
                'status' => true,
                'sort_order' => 9,
                'meta_data' => [
                    'client' => 'FinTech Uganda',
                    'project_date' => '2024-03-20',
                    'services' => ['UI Design', 'UX Research', 'Prototyping', 'User Testing']
                ]
            ],
            [
                'title' => 'Annual Report Design',
                'description' => 'Professional annual report design for a non-profit organization with infographics and data visualization.',
                'category' => 'printing',
                'type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop',
                'featured' => false,
                'status' => true,
                'sort_order' => 10,
                'meta_data' => [
                    'client' => 'Hope Foundation Uganda',
                    'project_date' => '2024-01-30',
                    'services' => ['Report Design', 'Infographics', 'Data Visualization', 'Print Production']
                ]
            ]
        ];

        foreach ($portfolioItems as $item) {
            Portfolio::create($item);
        }
    }
}
