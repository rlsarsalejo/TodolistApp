# TodolistApp
This Todo List app is built using Nuxt.js, Laravel, TailwindCss with MySQL as the database. The front end and back end are separated into different folders for better organization.
# Getting Started
To run the app locally, follow these steps:
# Frontend Setup
1. Open the frontend folder in your preferred IDE.
2. Install dependencies:
```
npm install
```
3. Start the development server
```
npm run dev
```
4. The url of the app should be http://localhost:3000.
# Backend Setup
1. Open the backend folder in your preferred IDE.
2. Install dependencies:
```
composer install
```
3. Set up the .env file by copying .env.example and configuring your database settings.
4. Generate application key
```
php artisan key:generate
```
5. Migrate the database:
```
php artisan migrate
```
6. Start the laravel app
```
php artisan serve
```
7. The API endpoints will be accessible at http://localhost:8000.

# Usage
Once the app is set up and running, you can perform the following actions:
 - ### User Authentication
     - Register: Create a new account by providing a username, email, and password.
     - Login: Access your account by providing your credentials.
 - ### Middleware:
     - Middleware is implemented to handle authentication and authorization.
     - Certain routes may require authentication before accessing.
-  ### Todo Management:
     - Create a new todo task.
     - Mark tasks as completed.
     - Delete tasks.











