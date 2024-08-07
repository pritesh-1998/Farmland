<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
# Farm Manager: Large-Scale Farm Management System
Welcome to the Farm Manager repository, a powerful and user-friendly farm management system built with PHP Laravel framework. This application is designed to help large-scale farmers manage their expenses, track crop growth, and maintain comprehensive records for efficient farm operations.

## Table of Contents
- Introduction
- Features
- Installation & Setup
- Usage
- Contribution Guidelines
- License
## Introduction
Farm Manager is a web-based application tailored to the unique needs of large-scale farmers, providing an **all-in-one** platform_ for managing expenses, monitoring crop growth, and keeping track of crucial records. Built using the PHP Laravel framework, this application offers a `robust` and `scalable` solution to streamline farm management tasks and optimize overall efficiency.

## Features
- Intuitive dashboard for monitoring farm activities
- Expense tracking and reporting for informed decision-making
- Crop growth tracking with detailed information on each crop
- Comprehensive record-keeping of farm operations and activities
- Customizable settings to adapt to individual farm needs
- Secure user authentication and authorization
## Installation & Setup
Follow these steps to install and set up the Farm Manager application on your local machine:

1. Clone the repository using 
```
git clone https://github.com/pritesh-1998/Farmland.git
```
2. Navigate to the project directory using cd farm-manager
3. Install the required dependencies using:
```
composer install
```
4. Copy the .env.example file to .env using:
```
cp .env.example .env
```
5. Set up your database and update the .env file with the necessary credentials
6. To generate an application key run:
```
php artisan key:generate 
```
7. Run 
```
php artisan migrate
```
to create the necessary database tables
8. Start the local development server using:
```
php artisan serve
```
9. Run the following route to load the live data from Govy api:
```
/getCropData
```
Now, you can access the Farm Manager application in your web browser at `http://localhost:8000`.

## Usage
+ Register as a new user or log in with your existing credentials
+ Navigate the dashboard to access various farm management features
+ Add, edit, and manage expenses, crops, and records as needed
+ Customize the application settings to suit your farm's requirements
+ Contribution Guidelines
We welcome contributions to improve and expand the Farm Manager application.
To contribute, please follow these steps:

1. Fork the repository and create a new branch for your changes
2. Make your changes or additions to the project
3. Create a pull request and wait for a review from a team member.

Please ensure that your code adheres to best practices for code quality and documentation. 

## License
The Farm Manager application is licensed under the MIT License. This allows for open collaboration and sharing of the application while ensuring that contributors retain ownership of their work.
