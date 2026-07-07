<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# Deployment Guide

This document explains how to deploy the application in a local or production environment.

---

# Prerequisites

Ensure the target environment meets the following requirements.

## Software Requirements

- PHP **8.2+**
- Composer **2.x**
- Node.js **20+**
- npm
- MySQL
- Git

# Clone the Repository

```bash
git clone <repository-url>
cd <project-directory>
```

---

# Install Dependencies

## PHP Dependencies

```bash
sail composer install
```

## JavaScript Dependencies

```bash
sail npm install
```

Build frontend assets:

```bash
sail npm run build
```

For local development:

```bash
sail npm run dev
```

---

# Environment Configuration

Create the environment file:

```bash
cp .env.example .env
```

Update the `.env` file with your environment-specific configuration.

## Application

```env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://your-domain.com
```

Generate the application key:

```bash
php artisan key:generate
```

---

## Database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=username
DB_PASSWORD=password
```

---

## Cache & Session

Example:

```env
CACHE_STORE=file
SESSION_DRIVER=file
QUEUE_CONNECTION=database
```

Adjust these values according to your infrastructure.

---

## Mail

Example configuration:

```env
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```

---

# Database Setup

Run all migrations:

```bash
php artisan migrate
```

If seeders are available:

```bash
php artisan db:seed
```

Or both:

```bash
php artisan migrate --seed
```

---

# Storage

Create the storage symlink:

```bash
php artisan storage:link
```

---

# Cache Optimization

For production environments:

Cache configuration:

```bash
php artisan config:cache
```

Cache routes:

```bash
php artisan route:cache
```

Cache views:

```bash
php artisan view:cache
```

Optimize the application:

```bash
php artisan optimize
```

---

# File Permissions

Ensure Laravel can write to the following directories:

```
storage/
bootstrap/cache/
```

Example:

```bash
chmod -R 775 storage bootstrap/cache
```

---

# Queue Workers (Optional)

If the application uses queues:

```bash
php artisan queue:work
```

For production, use Supervisor or another process manager.

---

# Scheduler (Optional)

If scheduled tasks are used, configure a cron job:

```cron
* * * * * php /path/to/project/artisan schedule:run >> /dev/null 2>&1
```

---

# Verify the Deployment

Check that:

- The application loads successfully.
- Database connection works.
- Migrations have been applied.
- Uploaded files are accessible.
- Queue workers are running (if used).
- Scheduled tasks execute correctly (if used).

---

# Useful Artisan Commands

Generate application key:

```bash
php artisan key:generate
```

Run migrations:

```bash
php artisan migrate
```

Run migrations with seeders:

```bash
php artisan migrate --seed
```

Clear all caches:

```bash
php artisan optimize:clear
```

Optimize application:

```bash
php artisan optimize
```

Create storage link:

```bash
php artisan storage:link
```

Start queue worker:

```bash
php artisan queue:work
```

Run scheduled tasks manually:

```bash
php artisan schedule:run
```

---

# Production Deployment Checklist

- [ ] Clone the repository
- [ ] Install Composer dependencies
- [ ] Install Node.js dependencies
- [ ] Build frontend assets
- [ ] Configure the `.env` file
- [ ] Generate the application key
- [ ] Configure the database
- [ ] Run migrations
- [ ] Create the storage symlink
- [ ] Cache configuration, routes, and views
- [ ] Set correct file permissions
- [ ] Configure queue workers (if applicable)
- [ ] Configure scheduled tasks (if applicable)
- [ ] Verify the application is working correctly
