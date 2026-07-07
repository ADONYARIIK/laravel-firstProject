# CV Builder

A simple Laravel application for displaying and exporting a Curriculum Vitae (CV). The application renders CV data stored in a JSON file using Blade templates and Tailwind CSS, and supports PDF generation using DomPDF.

## Features

* Display a responsive CV in the browser
* Store CV data in a JSON file
* Generate a printable PDF version of the CV
* Easy to customize and extend
* Feature tests for the main page

---

# Tech Stack

* PHP 8.2+
* Laravel 12
* Blade
* Tailwind CSS
* Laravel Sail (Docker)
* Barryvdh/Laravel-Dompdf
* PHPUnit

---

# Project Structure

```
app/
resources/
├── views/
│   ├── cv.blade.php
│   └── pdf.blade.php
storage/
tests/
```

---

# Getting Started

## Clone the repository

```bash
git clone <repository-url>
cd <project-directory>
```

---

## Install PHP dependencies

Using Laravel Sail:

```bash
./vendor/bin/sail composer install
```

Or locally:

```bash
composer install
```

---

## Install JavaScript dependencies

Using Sail:

```bash
./vendor/bin/sail npm install
```

Or locally:

```bash
npm install
```

---

## Configure the environment

Copy the example environment file:

```bash
cp .env.example .env
```

Generate an application key:

```bash
php artisan key:generate
```

Configure the database inside `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

---

## Run database migrations

```bash
php artisan migrate
```

---

## Build frontend assets

Development:

```bash
npm run dev
```

Production:

```bash
npm run build
```

---

## Start the application

Using Sail:

```bash
./vendor/bin/sail up -d
```

Start the Laravel development server:

```bash
php artisan serve
```

The application will be available at:

```
http://localhost:8000
```

---

# Updating the CV

The CV content is loaded from a JSON data file.

Open the data file and edit its contents:

```
storage/app/cv.json
```

(or whichever file your application uses.)

The JSON contains sections such as:

* Personal Information
* Contacts
* Social Links
* Skills
* Experience
* Education
* Projects
* Certificates
* Courses
* Interests
* References

Example:

```json
{
  "personal": {
    "name": {
      "first": "John",
      "last": "Doe"
    },
    "position": "Full Stack Developer"
  }
}
```

After modifying the JSON file, refresh the page to see the changes.

---

# Generating the PDF

Open the main CV page:

```
/
```

Download the PDF:

```
/download
```

The PDF version uses a simplified Blade template optimized for DomPDF.

---

# Running Tests

Run all tests:

```bash
php artisan test
```

Run a specific test:

```bash
php artisan test --filter=CvPageTest
```

---

# Deployment

Deployment instructions are available in:

```
DEPLOYMENT.md
```

The deployment guide includes:

* System requirements
* Environment configuration
* Database setup
* Storage configuration
* Cache optimization
* Queue workers
* Production checklist

---

# License

This project is licensed under the MIT License.
