# Project Name

This is a Laravel project that implements a role-based authentication system.

## Features

- User authentication
- Role-based authorization (admin, user)
- Functionality to become an admin

## Requirements

- PHP >= 8.0
- Composer
- Laravel >= 8.0
- SQL Database (MySQL, SQLite, PostgreSQL)

## Installation

1. Clone the project repository:

```bash
git clone https://github.com/GazzaBombata/congresso-rotary-2024
```

2. Navigate to the project folder:

```bash
cd projectname
```

3. Install the dependencies:

```bash
composer install
```

4. Copy the example environment file and make the required configuration changes in the `.env` file:

```bash
cp .env.example .env
```

5. Generate a new application key:

```bash
php artisan key:generate
```

6. Run the database migrations:

```bash
php artisan migrate
```

7. Start the local development server:

```bash
php artisan serve
```

You can now access the server at http://localhost:8000

## Usage

Register a new account and log in. By default, new users are given the 'user' role. To become an admin, navigate to the designated page and click the 'Become admin' button.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](https://choosealicense.com/licenses/mit/)
