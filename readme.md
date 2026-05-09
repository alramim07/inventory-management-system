# Friends Fashion POS

<a href="https://f-fashion.ticlimited.com.bd">Live Link</a>
A professional, feature-rich Point of Sale (POS) system built with Laravel 9, designed specifically for fashion and retail businesses.

## 🚀 Features

- **Inventory Management**: Track stock levels, expiry dates, and variations (size, color, etc.).
- **Multiple Business Locations**: Manage multiple branches or warehouses from a single dashboard.
- **Role-Based Access Control**: Advanced permission system using Spatie Permissions.
- **Reporting & Analytics**: Comprehensive reports for sales, purchases, stock, and profit/loss.
- **Payment Integrations**: Supports PayPal, Stripe, Razorpay, Paystack, and more.
- **WooCommerce Integration**: Sync products and orders with your online store.
- **AI Assistance**: Integrated OpenAI for intelligent business support.
- **Module System**: Easily extendable with modules like CRM, Essentials, and HRM.

## 🛠 Tech Stack

- **Framework**: Laravel 9.x
- **Frontend**: AdminLTE 3 (Bootstrap), jQuery, DataTables
- **Database**: MySQL / MariaDB
- **Reporting**: Highcharts / Chart.js
- **PDF Generation**: mPDF / DomPDF

## 📦 Installation

1. **Clone the repository**:

    ```bash
    git clone https://github.com/lynsromero/friends-fashion-pos.git
    ```

2. **Install dependencies**:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. **Configure Environment**:
    - Copy `.env.example` to `.env`.
    - Update database credentials and `APP_URL`.
    - Run `php artisan key:generate`.

4. **Run Migrations & Seeders**:

    ```bash
    php artisan migrate --seed
    ```

5. **Start the server**:
    ```bash
    php artisan serve
    ```

## 🔒 Security

If you discover any security-related issues, please open an issue or contact the maintainer directly.

## 📄 License

This project is based on the Ultimate POS framework. Please ensure compliance with the original license terms.

---

Developed for **Friends Fashion**.
