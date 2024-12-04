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
   - git clone https://github.com/iman-abouelgoud/Task-Management.git
   - cd Task-Management
     
2. Install dependencies:
   - composer install
     
3. Environment setup:
   # Copy the example env file and configure environment variables
    cp .env.example .env

   # Generate application key
    php artisan key:generate
   
   # Make sure to update the database configuration in your .env file:
    * DB_PORT=your_SQL_port
    * DB_DATABASE=your_database_name
    * DB_USERNAME=your_database_username
    * DB_PASSWORD=your_database_password
    
5. Run migrations and seeders:
   - php artisan migrate
   - php artisan db:seed
  
6. Run the project
    php artisan serve

    ```

  
## Initial Data

The seeder creates:
1. Five random projects
2. One user: 
    - Name: John Doe
    - Email: john@example.com
    - Password: password


## Usage

1. Start the Laravel development server => php artisan serve

2. Access the application at: `http://localhost:YOUR_LOCALHOST_PORT`

