# Student Management System

A simple yet powerful student management system built with Laravel and Bootstrap.

## Features

- Add new students with name and additional information
- View list of all students in a responsive table
- Edit existing student information
- Delete students from the system
- Responsive design that works on mobile and desktop
- Beautiful card-based UI with hover effects
- Form validation and error handling

## Requirements

- PHP >= 8.0
- MySQL >= 5.7
- Composer
- Node.js & NPM
- XAMPP/WAMP/MAMP

## Installation

1. Clone the repository:
```bash
git clone https://github.com/KAXUN01/Laravel-CRUD-Application.git
cd Laravel-CRUD-Application
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Copy .env.example to .env and configure your database:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations:
```bash
php artisan migrate
```

## Database Configuration

Update your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test-app
DB_USERNAME=root
DB_PASSWORD=
```

## Usage

1. Start your local development server:
```bash
php artisan serve
```

2. Visit `http://localhost:8000` in your browser

## File Structure

```
test-app/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── StudentController.php
│   └── Models/
│       └── Student.php
├── resources/
│   ├── views/
│   │   ├── welcome.blade.php
│   │   ├── addStudent.blade.php
│   │   └── edit.blade.php
│   └── css/
│       └── style.css
└── routes/
    └── web.php
```

## Contributing

1. Fork the repository
2. Create a new branch
3. Make your changes
4. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
