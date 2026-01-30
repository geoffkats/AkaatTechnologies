# AKAAT Technologies Business Website

A comprehensive Laravel-based business website and e-learning platform for AKAAT Technologies, featuring modern design, e-commerce functionality, course management, and advanced analytics dashboard.

## 🚀 Features

### 🏢 **Business Website**
- **Modern Homepage** - Professional design with AKAAT branding
- **Service Pages** - Development, Printing, Software, Training services
- **About Us** - Company information and team details
- **Contact** - Contact form and business information
- **Portfolio Gallery** - Showcase of completed projects

### 🛒 **E-Commerce Platform**
- **Product Catalog** - Dynamic product listings with categories
- **Shopping Cart** - Add/remove items, quantity management
- **Checkout System** - Complete order processing with payment
- **Order Management** - Track orders, delivery status
- **Product Reviews** - Customer feedback and ratings
- **Wishlist** - Save products for later

### 📚 **E-Learning Platform**
- **Course Management** - Create and manage online courses
- **Lesson System** - Video lessons, quizzes, assignments
- **Student Dashboard** - Progress tracking, certificates
- **Badge System** - Gamification with achievements
- **Enrollment Management** - Course registration and access control

### 🖨️ **Printing Services**
- **Online Ordering** - Upload files for printing
- **Dynamic Pricing** - Automatic price calculation
- **Specifications** - Paper size, quality, quantity options
- **Order Tracking** - Status updates and notifications

### 📊 **Advanced Dashboard**
- **Sales Analytics** - Revenue tracking and metrics
- **Interactive Charts** - Sales funnel, category breakdown
- **Order Management** - View and manage all orders
- **User Analytics** - Customer behavior insights
- **Modern UI** - Clean, professional interface

## 🔐 Login Credentials

### **Admin Account**
- **Email:** `admin@akaattech.com`
- **Password:** `password`

### **Customer Account**
- **Email:** `customer@example.com`
- **Password:** `password`

### **Demo User (Alternative)**
- **Email:** `test@example.com`
- **Password:** `password`

## 🛠️ Installation & Setup

### **Prerequisites**
- PHP 8.4+
- Composer
- Node.js & NPM
- SQLite (default) or MySQL

### **Quick Setup**

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd akaat-technologies
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Build assets**
   ```bash
   npm run build
   # OR for development
   npm run dev
   ```

6. **Start the server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Website: `http://localhost:8000`
   - Login: `http://localhost:8000/login`
   - Dashboard: `http://localhost:8000/dashboard`

## 🎨 Design & Branding

### **Brand Colors**
- **Deep Blue:** `#0F4C81` (Primary)
- **Bright Green:** `#2ECC71` (Secondary)
- **Orange:** `#F39C12` (Accent)

### **Typography**
- **Primary:** Inter (Clean, modern)
- **Headings:** Plus Jakarta Sans (Bold, professional)

### **Currency Format**
- **Format:** UGX (Ugandan Shillings)
- **Display:** 750K, 1.5M, 2.2M format

## 📱 Key Pages & Routes

### **Public Pages**
- `/` - Homepage
- `/about` - About Us
- `/contact` - Contact Information
- `/services/*` - Service pages
- `/shop` - Product catalog
- `/courses` - Course listings

### **Authentication**
- `/login` - User login
- `/register` - User registration
- `/dashboard` - User dashboard

### **E-Commerce**
- `/shop/product/{id}` - Product details
- `/cart` - Shopping cart
- `/checkout` - Order checkout
- `/printing/order` - Printing services

### **E-Learning**
- `/courses/{slug}` - Course details
- `/student/dashboard` - Student portal
- `/training/enroll` - Training enrollment

## 🔧 Technical Stack

### **Backend**
- **Framework:** Laravel 12
- **PHP:** 8.4
- **Database:** SQLite (default)
- **Authentication:** Laravel Fortify

### **Frontend**
- **CSS:** Tailwind CSS
- **JavaScript:** Vanilla JS + Chart.js
- **Icons:** Heroicons
- **Fonts:** Google Fonts (Inter, Plus Jakarta Sans)

### **Key Packages**
- **Laravel Fortify** - Authentication
- **Livewire** - Dynamic components
- **Chart.js** - Interactive charts
- **Tailwind CSS** - Styling framework

## 📊 Database Structure

### **Core Models**
- **User** - Customer accounts and authentication
- **Product** - E-commerce product catalog
- **Order** - Purchase orders and transactions
- **Category** - Product categorization
- **Review** - Customer product reviews

### **E-Learning Models**
- **Course** - Online course content
- **Lesson** - Individual course lessons
- **Enrollment** - Student course registrations
- **Quiz** - Course assessments
- **Badge** - Achievement system

### **Business Models**
- **Service** - Business service offerings
- **Portfolio** - Project showcase
- **Page** - Dynamic content pages
- **Newsletter** - Email subscriptions

## 🚀 Deployment

### **Production Setup**
1. Configure production environment variables
2. Set up database (MySQL recommended for production)
3. Run migrations and seeders
4. Build production assets: `npm run build`
5. Configure web server (Apache/Nginx)
6. Set up SSL certificate
7. Configure email services

### **Environment Variables**
```env
APP_NAME="AKAAT Technologies"
APP_ENV=production
APP_URL=https://your-domain.com
DB_CONNECTION=mysql
MAIL_MAILER=smtp
```

## 🎯 Key Features Breakdown

### **Dashboard Analytics**
- Sales funnel visualization
- Revenue tracking with UGX formatting
- Category performance metrics
- Order status monitoring
- Customer behavior insights

### **E-Commerce Features**
- Dynamic product catalog
- Advanced filtering and search
- Shopping cart with session persistence
- Complete checkout workflow
- Order tracking and management
- Customer review system

### **E-Learning Platform**
- Course creation and management
- Progress tracking
- Quiz and assessment system
- Certificate generation
- Badge and achievement system
- Student dashboard

### **Business Features**
- Service showcase pages
- Portfolio gallery
- Contact forms
- Newsletter subscription
- Printing service ordering
- Training program enrollment

## 🔒 Security Features

- **Authentication:** Laravel Fortify
- **CSRF Protection:** Built-in Laravel protection
- **Input Validation:** Comprehensive form validation
- **SQL Injection Prevention:** Eloquent ORM
- **XSS Protection:** Blade templating engine
- **Password Hashing:** Bcrypt encryption

## 📞 Support & Contact

For technical support or questions about AKAAT Technologies:

- **Website:** [AKAAT Technologies](http://localhost:8000)
- **Email:** admin@akaattech.com
- **Phone:** +256 XXX XXX XXX

## 📄 License

This project is proprietary software developed for AKAAT Technologies. All rights reserved.

---

**Built with ❤️ for AKAAT Technologies**

*Empowering businesses through technology, training, and innovation.*