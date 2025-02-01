# Task Management API

This is a simple task management API built with Node.js, Express, and MongoDB. The API provides endpoints for managing users and tasks, along with a scheduled job that checks for overdue tasks.

## Prerequisites

- PHP (v8.0 or higher)
- Composer
- Laravel (v10 or higher)
- Mysql

## Setup Instructions

### 1. Clone the Repository

First, clone the repository to your local machine:

```bash
git clone git@github.com:blessingk/touraxis-php.git
cd touraxis-php
```

### 2. Install Dependencies
Run the following command to install all the necessary dependencies:

```bash
composer install
```

### 3. Configure MongoDB Connection
In Laravel, the MySQL connection is configured in the .env file. Add or update the following variables:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=
```
Make sure to replace DB_USERNAME and DB_PASSWORD with your actual MySQL credentials.

### 4. Run Migrations
Laravel uses migrations to create tables in the database. Run the following command to create the required tables:
```bash
php artisan migrate
```
This will create the necessary tables in the task_management database.

### 5. Run the Application
Once you've configured the database, you can start the Laravel development server using:

```bash
php artisan serve
```
This will start the server on the port specified in the .env file (default: 8000). The app will be accessible at:

```bash
http://localhost:8000
```

### 6. Testing the API
The API exposes the following routes:

User Routes:
```bash
POST /api/users: Create a new user
GET /api/users: Get all users
GET /api/users/:id: Get a specific user by ID
PUT /api/users/:id: Update a specific user by ID
DELETE /api/users/:id: Delete a specific user by ID
```
Task Routes:
```bash
POST /api/users/:userId/tasks: Create a new task for a user
GET /api/users/:userId/tasks: Get all tasks for a user
GET /api/users/:userId/tasks/:taskId: Get a specific task for a user
PUT /api/users/:userId/tasks/:taskId: Update a specific task for a user
DELETE /api/users/:userId/tasks/:taskId: Delete a specific task for a user
```

### 7. Scheduled Job for Overdue Tasks
A scheduled job runs every minute and checks for tasks that are "pending" and past their date_time. If any are found, their status will be updated to "done". This job is managed using Laravel's task scheduling.

In app/Console/Kernel.php, you can schedule a command that checks for overdue tasks:

```bash
protected function schedule(Schedule $schedule)
{
    $schedule->command('app:update-pending-tasks')->everyMinute();
}
```
Then, create a custom command (php artisan make:command UpdatePendingTasks) in the app/Console/Commands directory, which will implement the logic for checking overdue tasks.

## Project Structure
```app/Http/Controllers:``` Contains controllers for handling user and task API requests

```app/Models:``` Contains Eloquent models for User and Task

```app/Console/Commands:``` Contains the command for checking overdue tasks

```app/Repositories:``` Contains the code to query the database

```app/Contracts:``` Contains the interfaces

```routes/api.php::``` Defines the API routes for users and tasks

```database/migrations:``` Migration files for users and tasks tables

### Dependencies
```laravel/framework:``` The Laravel framework
