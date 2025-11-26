# Music School Management System

A Laravel-based management system for a Music School, featuring role-based authentication (Admin, Staff, Client), user management, and course management.

## Features

- **Authentication**: Secure login and registration using Laravel Breeze.
- **Role Management**: Three distinct roles:
  - **Admin**: Full access to manage users and courses.
  - **Staff**: Can manage courses.
  - **Client**: View available courses.
- **User Management**: Admins can create, edit, and delete users.
- **Course Management**: CRUD operations for music courses (Name, Description, Teacher, Price, Schedule).
- **Instrument Management**: CRUD operations for instruments (Name, Description), linked to courses.

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd Music-School
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   Copy `.env.example` to `.env` and configure your database settings.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Migration & Seeding**
   Run migrations and seed the database with initial data (Roles, Admin User, Dummy Courses).
   ```bash
   php artisan migrate --seed
   ```

5. **Run the Application**
   ```bash
   npm run dev
   php artisan serve
   ```

## Usage

- **Admin Login**:
  - Email: `admin@example.com`
  - Password: `password`

- **Access Control**:
  - Navigate to `/users` to manage users (Admin only).
  - Navigate to `/courses` to manage courses (Admin/Staff).
  - Navigate to `/instruments` to manage instruments (Admin/Staff).

## Tech Stack

- Laravel 12
- Tailwind CSS
- Blade Templates
- SQLite / MySQL
