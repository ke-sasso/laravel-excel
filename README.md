<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Excel Features
PhpSpreadsheet (opens new window)is a library written in pure PHP and providing a set of classes that allow you to read from and to write to different spreadsheet file formats, like Excel and LibreOffice Calc.

- Easily export collections to Excel.
- Export queries with automatic chunking for better performance.
- Queue exports for better performance.
- Easily export Blade views to Excel.
- Easily import to collections.
- Read the Excel file in chunks.
- Handle the import inserts in batches.

Project that uses an excel template to send an email to all users whose birthday is on the current date. Once the file is uploaded, a button is enabled to send a reminder of all the users that already exist in the excel sheet.

Excel sheet format

|**Nombre Cliente**|**Fecha Nacimiento**|**Telefono Casa**| **Telefono Movil** |**Telefono Oficina**|**Correo Personal**| **Correo Oficina** | **Correo Otro** 	|
|----------	|------------------	|------------------	|----------	|------------------	|------------------	|------------------	|------------------	|
|      	    |     	            |  	                |   	    |                	|  	                |                	| 	                |



# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    https://github.com/ke-sasso/laravel-excel.git


Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
 Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
