# Task Management Application

A web-based task management solution built with Laravel, featuring project organization and dynamic task prioritization.


## Features

- Dashboard with statistics
- Project listing with associated tasks
- Task management (CRUD operations)
- Drag-and-drop task reordering with automatic priority updates via AJAX
- Project-specific task filtering


## Prerequisites

- PHP 7.4 or higher
- Composer
- MySQL database


## Installation

1. Clone the repository:
   - git clone https://github.com/iman-ali-ali/task-management.git
   - cd task-management
     
2. Install dependencies:
   - composer install
     
3. Environment setup:
   - Copy `.env.example` to `.env` => cp .env.example .env
   - Edit `.env` file with your database credentials and app name:
        * APP_NAME=task-management
        * APP_KEY=base64:8bGFdo43epDzYOenOdd6FqnH50QFRzYpFKu+yu2C6rc=
        * DB_DATABASE=your_database_name
        * DB_USERNAME=your_database_username
        * DB_PASSWORD=your_database_password
    
4. Database migration and seeding:
   - php artisan migrate
   - php artisan db:seed

  
## Initial Data

The seeder creates:
1. Five random projects
2. One user: 
    - Name: John Doe
    - Email: john@example.com
    - Password: password


## Usage

1. Start the Laravel development server => php artisan serve

2. Access the application at: `http://localhost:8000`

