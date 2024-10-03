# Code Particles customer-products-api
# Laravel API Setup Instructions

## Overview

This project is a simple Laravel API that implements JWT-based authentication and exposes endpoints for getting customers and products.

## Prerequisites

Ensure you have the following installed on your system:

- **PHP** (version 8.0 or higher)
- **Composer** - A PHP package manager
- **MySQL** - A database server
- **Laravel** (optional, can be installed via Composer)

## 1. Clone the Repository

Clone the repository to your local machine using the following command:


```
git clone <repository-url>
cd <repository-folder>
```
## 2. Install Deependencies

```
composer install
```
## 3. Environment Configurations
Open the .env file in your preferred text editor and configure the following database settings

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

## 4. Generate Application Key
```
php artisan key:generate
```

## 5. Run Migrations and Seed the Database
```
php artisan key:generate
```
This command will create the necessary tables and insert ten fake customers, ten fake products, and a default user with the following credentials:
- **Username:** admin
- **Email:** kazi@codeparticles.com
- **Password:** 1234

## 6. JWT Authentication
Ensure that the JWT authentication package (tymon/jwt-auth) is properly configured.
```
'guards' => [
    'api' => [
        'driver' => 'jwt',
        'provider' => 'users',
    ],
],
```
## 7. Accessing the API
Login Endpoint
To authenticate and retrieve a JWT token, send a POST request to the following endpoint:
```
POST /api/login
```
Request Body:
```
{
    "email": "kazi@codeparticles.com",
    "password": "1234"
}
```
Successful Response:
```
{
    "user": {
        "id": 1,
        "name": "admin",
        "email": "kazi@codeparticles.com"
    },
    "access_token": "your_jwt_token_here"
}
```
Unsueccessful Response:
```
{
  "error":"Invalid Credentials"
}

```
Public Endpoint: View Products
To access the list of products, send a GET request to:
```
GET /api/products
```

Sample Response:
```
[
    {
        "id": 1,
        "name": "Product 1",
        "description": "Description of product 1",
        "price": 100.00
    },
    
]
```
Protected Endpoint: View Customers
To access the list of customers, you must include the JWT token in the Authorization header. Send a GET request to:
```
GET /api/customers
```
Response:
```
[
    {
        "id": 1,
        "name": "Customer 1",
        "email": "customer1@example.com",
        "phone_number": "123456789"
    },
    ...
]
```
Unsueccessful Response:
```
{
  "error":"Unauthorized access"
}

## 8. Running the Application
To run the application, use the following command:
```
php artisan serve
```


