<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About Laravel

Laravel is a sophisticated web application framework known for its expressive and elegant syntax. We believe in making development an enjoyable and creative experience. Laravel simplifies common tasks in web projects, offering features such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database-agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is not only accessible and powerful but also provides the essential tools for building large, robust applications.

## Learning Laravel

Laravel offers the most extensive and thorough [documentation](https://laravel.com/docs) and a comprehensive video tutorial library, making it easy for developers to get started. Explore the framework through the hands-on [Laravel Bootcamp](https://bootcamp.laravel.com), where you'll be guided in building a modern Laravel application from scratch.

For those who prefer visual learning, [Laracasts](https://laracasts.com) is a treasure trove with over 2000 video tutorials covering Laravel, modern PHP, unit testing, and JavaScript. Boost your skills with this extensive video library.

## Laravel Sponsors

We extend our gratitude to the sponsors who fund Laravel development. If you're interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

# About Limupa (My App)

Limupa is an e-commerce application meticulously crafted using the Laravel framework. Our platform enables users to effortlessly search and order cutting-edge electronic devices, including smartphones, computers, laptops, and smartwatches.

We aspire to provide you with a stellar experience while using our program.

<p align="center"><b>Home page</b></p>
<p align="center"><img src="public\images\imgpreview\Screenshot 2023-11-27 153930.jpg" width="400" alt="Ảnh 1"></p>

<p align="center"><b>Product page</b></p>
<p align="center"><img src="public\images\imgpreview\Screenshot 2023-11-27 154122.jpg" width="400" alt="Ảnh 3"></p>

<p align="center"><b>Product detail page</b></p>
<p align="center"><img src="public\images\imgpreview\Screenshot 2023-11-27 154221.jpg" width="400" alt="Ảnh 5"></p>

<p align="center"><b>Cart page</b></p>
<p align="center"><img src="public\images\imgpreview\Screenshot 2023-11-27 154325.jpg" width="400" alt="Ảnh 7"></p>

<p align="center"><b>Favorite page</b></p>
<p align="center"><img src="public\images\imgpreview\Screenshot 2023-11-27 154405.jpg" width="400" alt="Ảnh 8"></p>

<p align="center"><b>Payment page</b></p>
<p align="center"><img src="public\images\imgpreview\Screenshot 2023-11-27 154436.jpg" width="400" alt="Ảnh 9"></p>

## Technology Stack

- **Frontend:** HTML/CSS, JavaScript, Bootstrap
- **Backend:** PHP, Laravel 9.x, MySQL

## Functionality Overview

The application features two user interfaces:

- **User Interface:** Allows users to access, search, and purchase products, with product information sourced from the database.
- **Administrator Interface:** Reserved for accounts with "administrator" privileges. Administrators control product display in the user interface, manage product and category operations, and oversee user orders, product statistics, and revenue functions.

## Detailed Description

- We've optimized the user experience on the application interface using LivewireComponent.
- Registration, login, and logout functions are seamlessly managed with Laravel Authentication.
- The application utilizes the MySQL database management system to store information such as product lists, category lists, user lists, shopping cart lists, and favorite lists. To streamline the product CRUD process, we employ Triggers to automatically perform functions like adding product codes, catalog codes, and maintaining price and quantity statistics.
- The admin interface implements CRUD operations for products and product catalogs in adherence to the [RESTful API](https://www.redhat.com/en/topics/api/what-is-a-rest-api) standard.
- Product photos are stored on the app using Symbolic Links.
- Payment functions are integrated with VNpay, Momo, and bank accounts.