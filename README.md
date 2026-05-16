# Sofra - Food Delivery Platform

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-10.10+-red?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-purple?logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)

A complete food delivery platform for restaurants and customers with real-time order management and mobile/web API.

[Features](#-features) • [Installation](#-installation) • [API Docs](#-api-documentation)

</div>

---

## 📋 Quick Links

- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Installation](#-installation)
- [Getting Started](#-getting-started)
- [API Documentation](#-api-documentation)
- [License](#-license)

---

## 🌟 Features

### 🍽️ For Restaurants
- Secure authentication (register, login, password reset)
- Manage menu items (products, prices, images)
- Create and manage promotional offers
- Real-time order management (pending, accept, reject, deliver)
- View customer reviews and ratings
- Profile management with image upload

### 👥 For Customers
- Browse and search restaurants by city
- View menus and active offers
- Place orders with multiple items
- Track order status in real-time
- Rate and review restaurants
- Manage multiple payment methods
- Order history and receipts

### 👨‍💼 For Admins
- Manage categories, cities, regions
- User management (restaurants, customers)
- Configure payment methods
- System settings and reports
- Contact management

### General
- RESTful API for mobile & web apps
- Multi-language support (English/Arabic, Cairo timezone)
- Role-based access control with Laravel Sanctum
- Real-time notifications
- CORS support

---

## 📦 Tech Stack

**Backend**: Laravel 10.10+ | PHP 8.1+ | MySQL
**Frontend**: Vite | Bootstrap 5.2+ | SASS | Axios
**Tools**: Composer | npm | PHPUnit | Laravel Pint

---

## 🔧 Installation

### Prerequisites
- PHP 8.1+ | Composer | Node.js & npm | MySQL

### Setup Steps

```bash
# Clone and install
git clone https://github.com/yourusername/sofra.git
cd sofra
composer install
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Update .env with database credentials
# DB_HOST=127.0.0.1, DB_DATABASE=sofra

# Run migrations and seeders
php artisan migrate
php artisan db:seed

# Build assets and start
npm run build
php artisan serve
```

App will be at `http://localhost:8000`

**Development Mode:**
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

---

## 🚀 Quick Start Guide

### Restaurant Workflow
1. Register → `POST /api/restaurants/register`
2. Login → `POST /api/restaurants/login` (get API token)
3. Add Products → `POST /api/restaurants/add-product`
4. Create Offers → `POST /api/restaurants/add-offer`
5. Manage Orders → `GET /api/restaurants/pending-orders`

### Customer Workflow
1. Register → `POST /api/client/register`
2. Browse → `GET /api/client/restaurants`
3. Search by City → `GET /api/client/restaurants/search/{cityId}`
4. Place Order → `POST /api/client/new-order`
5. Track Order → `GET /api/client/orders/accepts`
6. Review → `POST /api/client/add-review`

---

## 📚 API Documentation

**Base URL**: `http://localhost:8000/api`

**Authentication**: Include `Authorization: Bearer {TOKEN}` header for protected routes

### Main Endpoints

| Feature | Method | Endpoint |
|---------|--------|----------|
| Categories | GET | `/categories` |
| Cities | GET | `/cities` |
| Payments | GET | `/payments` |
| Contact Us | POST | `/contact-us` |

### Restaurant APIs

| Action | Method | Endpoint | Auth |
|--------|--------|----------|------|
| Register | POST | `/restaurants/register` | ✗ |
| Login | POST | `/restaurants/login` | ✗ |
| Profile | POST | `/restaurants/profile` | ✓ |
| Add Product | POST | `/restaurants/add-product` | ✓ |
| Get Products | GET | `/restaurants/get-products` | ✓ |
| Update Product | POST | `/restaurants/update-product/{id}` | ✓ |
| Delete Product | GET | `/restaurants/delete-product/{id}` | ✓ |
| Add Offer | POST | `/restaurants/add-offer` | ✓ |
| Get Offers | GET | `/restaurants/get-offers` | ✓ |
| Pending Orders | GET | `/restaurants/pending-orders` | ✓ |
| Accept Order | GET | `/restaurants/accept-order/{id}` | ✓ |
| Reject Order | GET | `/restaurants/reject-order/{id}` | ✓ |
| Deliver Order | GET | `/restaurants/delivered-order/{id}` | ✓ |

### Client APIs

| Action | Method | Endpoint | Auth |
|--------|--------|----------|------|
| Register | POST | `/client/register` | ✗ |
| Login | POST | `/client/login` | ✗ |
| Profile | POST | `/client/profile` | ✓ |
| All Restaurants | GET | `/client/restaurants` | ✗ |
| Restaurant Details | GET | `/client/restaurants/{id}` | ✗ |
| Search by City | GET | `/client/restaurants/search/{cityId}` | ✗ |
| All Offers | GET | `/client/offers` | ✗ |
| New Order | POST | `/client/new-order` | ✓ |
| Active Orders | GET | `/client/orders/accepts` | ✓ |
| Delivered Orders | GET | `/client/orders/delivered` | ✓ |
| Order Receipt | GET | `/client/order/receipt/{id}` | ✓ |
| Add Review | POST | `/client/add-review` | ✓ |

**Response Format:**
```json
{ "success": true, "message": "Operation successful", "data": {} }
```

---

## 🔐 Authentication

The app uses **Laravel Sanctum** for secure API authentication:

- **Guards**: `restaurant_api`, `client_api`, `web`
- **Flow**: Register → Login → Get Token → Use in Authorization Header
- **Token Usage**: `Authorization: Bearer {your_token}`
- **Protected Routes**: Require valid token in Authorization header

---

## 📁 Project Structure

```
sofra/
├── app/Http/Controllers/Api/
│   ├── Client/                  # Customer APIs
│   ├── Restaurant/              # Restaurant APIs
│   └── MainController.php       # General endpoints
├── app/Models/                  # Eloquent models
│   ├── Restaurant.php
│   ├── Client.php
│   ├── Order.php
│   ├── Product.php
│   └── ...
├── routes/api.php               # API routes
├── config/                      # Configuration files
├── database/
│   ├── migrations/
│   └── seeders/
├── public/                      # Static files & uploads
└── resources/                   # Frontend assets
```

**Core Models**: Restaurant, Client, Order, Product, Offer, Review, Category, City, Region, Transaction

---

## 🧪 Testing & Deployment

**Run Tests:**
```bash
php artisan test
php artisan test tests/Feature/OrderTest.php
```

**Deployment Checklist:**
- Set `APP_ENV=production`, `APP_DEBUG=false`
- Configure database and mail settings
- Run `php artisan migrate --force`
- Run `php artisan optimize`
- Set up SSL certificate
- Configure web server (Apache/Nginx)

---

## 📞 Support & License

- **Email**: support@sofra.local
- **Issues**: Create GitHub issues
- **License**: [MIT License](https://opensource.org/licenses/MIT)

---

## 🙏 Acknowledgments

- [Laravel Framework](https://laravel.com)
- [Laravel Sanctum](https://laravel.com/docs/sanctum)
- [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)
- [Vite](https://vitejs.dev)

<div align="center">

**Made with ❤️ by Mostafa Yehia**

</div>
