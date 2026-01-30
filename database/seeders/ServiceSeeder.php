<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Printing Services
            [
                'name' => 'Business Cards Printing',
                'slug' => 'business-cards-printing',
                'category' => 'printing',
                'description' => 'Professional business card printing with various paper options and finishes.',
                'short_description' => 'High-quality business cards for your professional needs.',
                'features' => [
                    'Multiple paper types',
                    'Various sizes available',
                    'Matte or glossy finish',
                    'Fast turnaround time',
                    'Bulk discounts available'
                ],
                'pricing' => [
                    ['quantity' => 100, 'price' => 25.00],
                    ['quantity' => 250, 'price' => 45.00],
                    ['quantity' => 500, 'price' => 75.00],
                    ['quantity' => 1000, 'price' => 120.00],
                ],
                'delivery_time' => '2-3 business days',
                'featured' => true,
            ],
            [
                'name' => 'Flyers & Brochures',
                'slug' => 'flyers-brochures',
                'category' => 'printing',
                'description' => 'Eye-catching flyers and brochures for marketing and promotional purposes.',
                'short_description' => 'Professional marketing materials to promote your business.',
                'features' => [
                    'Full color printing',
                    'Various paper weights',
                    'Custom sizes',
                    'Folding options',
                    'Design assistance available'
                ],
                'pricing' => [
                    ['quantity' => 100, 'price' => 35.00],
                    ['quantity' => 250, 'price' => 65.00],
                    ['quantity' => 500, 'price' => 110.00],
                    ['quantity' => 1000, 'price' => 180.00],
                ],
                'delivery_time' => '3-5 business days',
                'featured' => true,
            ],

            // Web Development Services
            [
                'name' => 'Business Website Development',
                'slug' => 'business-website-development',
                'category' => 'web_development',
                'description' => 'Custom business websites built with modern technologies and responsive design.',
                'short_description' => 'Professional websites that grow your business online.',
                'features' => [
                    'Responsive design',
                    'SEO optimization',
                    'Content management system',
                    'Contact forms',
                    'Social media integration',
                    '1 year free hosting',
                    'SSL certificate included'
                ],
                'pricing' => [
                    ['package' => 'Basic', 'price' => 500.00, 'pages' => '5 pages'],
                    ['package' => 'Standard', 'price' => 800.00, 'pages' => '10 pages'],
                    ['package' => 'Premium', 'price' => 1200.00, 'pages' => '15+ pages'],
                ],
                'delivery_time' => '2-4 weeks',
                'featured' => true,
            ],
            [
                'name' => 'E-commerce Website',
                'slug' => 'ecommerce-website',
                'category' => 'web_development',
                'description' => 'Complete online store solutions with payment integration and inventory management.',
                'short_description' => 'Sell your products online with a professional e-commerce website.',
                'features' => [
                    'Product catalog',
                    'Shopping cart',
                    'Payment gateway integration',
                    'Inventory management',
                    'Order tracking',
                    'Customer accounts',
                    'Mobile responsive'
                ],
                'pricing' => [
                    ['package' => 'Starter', 'price' => 1000.00, 'products' => 'Up to 50 products'],
                    ['package' => 'Business', 'price' => 1500.00, 'products' => 'Up to 200 products'],
                    ['package' => 'Enterprise', 'price' => 2500.00, 'products' => 'Unlimited products'],
                ],
                'delivery_time' => '4-6 weeks',
                'featured' => true,
            ],

            // Software Development Services
            [
                'name' => 'Custom Software Development',
                'slug' => 'custom-software-development',
                'category' => 'software_development',
                'description' => 'Tailored software solutions to meet your specific business requirements.',
                'short_description' => 'Custom software built specifically for your business needs.',
                'features' => [
                    'Requirements analysis',
                    'Custom development',
                    'Database design',
                    'User training',
                    'Ongoing support',
                    'Source code included'
                ],
                'pricing' => [
                    ['type' => 'Consultation', 'price' => 100.00, 'unit' => 'per hour'],
                    ['type' => 'Development', 'price' => 50.00, 'unit' => 'per hour'],
                    ['type' => 'Fixed Project', 'price' => 2000.00, 'unit' => 'starting from'],
                ],
                'delivery_time' => '6-12 weeks',
                'featured' => false,
            ],

            // Training Services
            [
                'name' => 'Computer Basics Training',
                'slug' => 'computer-basics-training',
                'category' => 'training',
                'description' => 'Essential computer skills training for beginners covering Windows navigation, file management, internet usage, and basic troubleshooting. Perfect for those starting their digital journey.',
                'short_description' => 'Master fundamental computer skills for personal and professional use.',
                'features' => [
                    'Windows navigation and file management',
                    'Microsoft Office suite (Word, Excel, PowerPoint)',
                    'Internet browsing and email setup',
                    'Basic troubleshooting techniques',
                    'Digital security awareness',
                    'Hands-on practice sessions',
                    'Certificate upon completion'
                ],
                'pricing' => [
                    ['duration' => '4 weeks', 'price' => 750000, 'schedule' => 'Flexible timing', 'sessions' => '16 hours total'],
                ],
                'delivery_time' => 'Flexible scheduling available',
                'featured' => true,
                'portfolio' => [
                    'image' => 'https://images.unsplash.com/photo-1484807352052-23338990c6c6?q=80&w=800&auto=format&fit=crop',
                    'color' => 'akaat-blue'
                ],
                'meta_data' => [
                    'icon' => 'computer',
                    'level' => 'Beginner',
                    'students' => '200+ enrolled'
                ]
            ],
            [
                'name' => 'Graphic Design Training',
                'slug' => 'graphic-design-training',
                'category' => 'training',
                'description' => 'Comprehensive graphic design training covering Adobe Creative Suite including Photoshop, Illustrator, and InDesign. Learn to create stunning visual designs and marketing materials.',
                'short_description' => 'Master Adobe Creative Suite and create professional designs.',
                'features' => [
                    'Adobe Photoshop mastery',
                    'Adobe Illustrator fundamentals',
                    'Adobe InDesign for layouts',
                    'Design principles and theory',
                    'Logo and brand identity design',
                    'Print and digital design projects',
                    'Portfolio development',
                    'Industry-standard techniques'
                ],
                'pricing' => [
                    ['duration' => '8 weeks', 'price' => 1500000, 'schedule' => 'Hands-on projects', 'sessions' => '32 hours total'],
                ],
                'delivery_time' => 'Portfolio development included',
                'featured' => true,
                'portfolio' => [
                    'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop',
                    'color' => 'akaat-green'
                ],
                'meta_data' => [
                    'icon' => 'design',
                    'level' => 'Intermediate',
                    'students' => '150+ enrolled'
                ]
            ],
            [
                'name' => 'Programming Fundamentals',
                'slug' => 'programming-fundamentals-training',
                'category' => 'training',
                'description' => 'Start your coding journey with HTML, CSS, JavaScript fundamentals. Build your first websites and interactive applications with hands-on projects and real-world examples.',
                'short_description' => 'Learn programming basics and build your first web applications.',
                'features' => [
                    'HTML5 and CSS3 fundamentals',
                    'JavaScript programming basics',
                    'Responsive web design',
                    'Version control with Git',
                    'Web development tools',
                    'Live coding sessions',
                    'Real project development',
                    'Career guidance included'
                ],
                'pricing' => [
                    ['duration' => '12 weeks', 'price' => 2200000, 'schedule' => 'Live coding sessions', 'sessions' => '48 hours total'],
                ],
                'delivery_time' => 'Real projects included',
                'featured' => true,
                'portfolio' => [
                    'image' => 'https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?q=80&w=800&auto=format&fit=crop',
                    'color' => 'brand-orange'
                ],
                'meta_data' => [
                    'icon' => 'code',
                    'level' => 'Beginner to Intermediate',
                    'students' => '100+ enrolled'
                ]
            ],
            [
                'name' => 'Web Development Training',
                'slug' => 'web-development-training',
                'category' => 'training',
                'description' => 'Comprehensive web development training covering HTML, CSS, JavaScript, and modern frameworks.',
                'short_description' => 'Learn to build websites from scratch with hands-on training.',
                'features' => [
                    'HTML & CSS fundamentals',
                    'JavaScript programming',
                    'Responsive design',
                    'Modern frameworks',
                    'Project-based learning',
                    'Certificate upon completion'
                ],
                'pricing' => [
                    ['duration' => '4 weeks', 'price' => 1200000, 'schedule' => 'Weekends'],
                    ['duration' => '8 weeks', 'price' => 2000000, 'schedule' => 'Evenings'],
                    ['duration' => '12 weeks', 'price' => 2800000, 'schedule' => 'Part-time'],
                ],
                'delivery_time' => 'Flexible scheduling',
                'featured' => false,
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}
