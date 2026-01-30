<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Welcome to AKAAT Technologies',
                'slug' => 'home',
                'content' => '<div class="hero-section">
                    <h1>Welcome to AKAAT Technologies</h1>
                    <p>Your trusted partner for printing, web development, software solutions, and technology training.</p>
                </div>
                
                <div class="services-overview">
                    <h2>Our Services</h2>
                    <div class="service-cards">
                        <div class="service-card">
                            <h3>Printing & Stationery</h3>
                            <p>Professional printing services for all your business needs.</p>
                        </div>
                        <div class="service-card">
                            <h3>Web Development</h3>
                            <p>Modern, responsive websites that grow your business online.</p>
                        </div>
                        <div class="service-card">
                            <h3>Software Development</h3>
                            <p>Custom software solutions tailored to your requirements.</p>
                        </div>
                        <div class="service-card">
                            <h3>Training Programs</h3>
                            <p>Learn essential computer and programming skills.</p>
                        </div>
                    </div>
                </div>',
                'excerpt' => 'AKAAT Technologies offers comprehensive technology services including printing, web development, software development, and training programs.',
                'template' => 'homepage',
                'status' => 'published',
                'is_homepage' => true,
                'sort_order' => 1,
                'meta_data' => [
                    'title' => 'AKAAT Technologies - Printing, Web Development & Training Services',
                    'description' => 'Professional printing services, web development, software solutions, and technology training in Ghana. Your trusted technology partner.',
                    'keywords' => 'printing services, web development, software development, computer training, Ghana, AKAAT Technologies'
                ]
            ],
            [
                'title' => 'About AKAAT Technologies',
                'slug' => 'about',
                'content' => '<div class="about-content">
                    <h1>About AKAAT Technologies</h1>
                    
                    <h2>Our Story</h2>
                    <p>AKAAT Technologies was founded with a vision to provide comprehensive technology services to individuals, small and medium businesses, and the local community. We specialize in printing and stationery, web development, software development, and computer training.</p>
                    
                    <h2>Our Mission</h2>
                    <p>To empower businesses and individuals with quality technology services and training that drive growth and success in the digital age.</p>
                    
                    <h2>Our Vision</h2>
                    <p>To be the leading technology services provider in Ghana, known for innovation, quality, and customer satisfaction.</p>
                    
                    <h2>Our Values</h2>
                    <ul>
                        <li><strong>Quality:</strong> We deliver exceptional quality in all our services</li>
                        <li><strong>Innovation:</strong> We embrace new technologies and creative solutions</li>
                        <li><strong>Customer Focus:</strong> Our customers success is our priority</li>
                        <li><strong>Integrity:</strong> We conduct business with honesty and transparency</li>
                        <li><strong>Excellence:</strong> We strive for excellence in everything we do</li>
                    </ul>
                </div>',
                'excerpt' => 'Learn about AKAAT Technologies, our mission, vision, and commitment to providing quality technology services.',
                'template' => 'default',
                'status' => 'published',
                'is_homepage' => false,
                'sort_order' => 2,
                'meta_data' => [
                    'title' => 'About AKAAT Technologies - Our Story & Mission',
                    'description' => 'Learn about AKAAT Technologies, our mission to provide quality technology services, and our commitment to customer success.',
                    'keywords' => 'about AKAAT, company mission, technology services, Ghana'
                ]
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'content' => '<div class="contact-content">
                    <h1>Contact AKAAT Technologies</h1>
                    
                    <div class="contact-info">
                        <h2>Get in Touch</h2>
                        <p>We would love to hear from you. Contact us for any inquiries about our services or to request a quote.</p>
                        
                        <div class="contact-details">
                            <div class="contact-item">
                                <h3>Phone</h3>
                                <p>+233 XX XXX XXXX</p>
                            </div>
                            <div class="contact-item">
                                <h3>Email</h3>
                                <p>info@akaattech.com</p>
                            </div>
                            <div class="contact-item">
                                <h3>Address</h3>
                                <p>Accra, Ghana</p>
                            </div>
                            <div class="contact-item">
                                <h3>Business Hours</h3>
                                <p>Monday - Friday: 8:00 AM - 6:00 PM<br>
                                Saturday: 9:00 AM - 4:00 PM<br>
                                Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-form-section">
                        <h2>Send us a Message</h2>
                        <p>Fill out the form below and we will get back to you as soon as possible.</p>
                        <!-- Contact form will be added via Livewire component -->
                    </div>
                </div>',
                'excerpt' => 'Contact AKAAT Technologies for inquiries about our printing, web development, software, and training services.',
                'template' => 'contact',
                'status' => 'published',
                'is_homepage' => false,
                'sort_order' => 5,
                'meta_data' => [
                    'title' => 'Contact AKAAT Technologies - Get in Touch',
                    'description' => 'Contact AKAAT Technologies for printing services, web development, software solutions, and training programs. Get your free quote today.',
                    'keywords' => 'contact AKAAT, get quote, printing services, web development, Ghana'
                ]
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => '<div class="privacy-policy">
                    <h1>Privacy Policy</h1>
                    <p><em>Last updated: January 2026</em></p>
                    
                    <h2>Information We Collect</h2>
                    <p>We collect information you provide directly to us, such as when you create an account, make a purchase, or contact us.</p>
                    
                    <h2>How We Use Your Information</h2>
                    <p>We use the information we collect to provide, maintain, and improve our services, process transactions, and communicate with you.</p>
                    
                    <h2>Information Sharing</h2>
                    <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy.</p>
                    
                    <h2>Data Security</h2>
                    <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
                    
                    <h2>Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact us at info@akaattech.com.</p>
                </div>',
                'excerpt' => 'AKAAT Technologies Privacy Policy - How we collect, use, and protect your personal information.',
                'template' => 'default',
                'status' => 'published',
                'is_homepage' => false,
                'sort_order' => 10,
                'meta_data' => [
                    'title' => 'Privacy Policy - AKAAT Technologies',
                    'description' => 'AKAAT Technologies Privacy Policy explaining how we collect, use, and protect your personal information.',
                    'keywords' => 'privacy policy, data protection, AKAAT Technologies'
                ]
            ],
            [
                'title' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'content' => '<div class="terms-of-service">
                    <h1>Terms of Service</h1>
                    <p><em>Last updated: January 2026</em></p>
                    
                    <h2>Acceptance of Terms</h2>
                    <p>By accessing and using our services, you accept and agree to be bound by the terms and provision of this agreement.</p>
                    
                    <h2>Services</h2>
                    <p>AKAAT Technologies provides printing services, web development, software development, and training programs.</p>
                    
                    <h2>Payment Terms</h2>
                    <p>Payment is due upon completion of services unless otherwise agreed upon in writing. We accept various payment methods.</p>
                    
                    <h2>Intellectual Property</h2>
                    <p>All content and materials provided by AKAAT Technologies remain our intellectual property unless explicitly transferred to the client.</p>
                    
                    <h2>Limitation of Liability</h2>
                    <p>AKAAT Technologies shall not be liable for any indirect, incidental, special, or consequential damages.</p>
                    
                    <h2>Contact Information</h2>
                    <p>For questions about these Terms of Service, contact us at info@akaattech.com.</p>
                </div>',
                'excerpt' => 'AKAAT Technologies Terms of Service - Terms and conditions for using our services.',
                'template' => 'default',
                'status' => 'published',
                'is_homepage' => false,
                'sort_order' => 11,
                'meta_data' => [
                    'title' => 'Terms of Service - AKAAT Technologies',
                    'description' => 'AKAAT Technologies Terms of Service outlining the terms and conditions for using our services.',
                    'keywords' => 'terms of service, terms and conditions, AKAAT Technologies'
                ]
            ]
        ];

        foreach ($pages as $page) {
            \App\Models\Page::create($page);
        }
    }
}
