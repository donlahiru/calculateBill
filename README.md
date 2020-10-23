# Bill Calculate
Calculate the final bill amount according to the number of units input

## Requirements

```bash
php 7.2 or higher
```

## Installation

install the dependencies.

```bash
composer install
```
rename .env.example to .env

key generate.

```bash
php artisan key:generate 
```

Run server

```bash
php artisan serve
```

## Testing

Run unit Test

```bash
vendor/bin/phpunit
```
## Folder Structure

```bash
Main view file is resources/views/bill.blade.php
Controller file is app/Http/Controllers/BillController.php
Logic and validation file is  app/Services/BillService.php
Unit test file is tests/Feature/BillTest.php
```
The calculate conditions are in config/constants.php . If you want to change the conditions you can do it in this file by editing below code lines.

```bash
return [
    'bill' => [
        'calculation' => [
            80 => 2.5,
            280 => 6,
            480 => 7.2,
            'above' => 8.5
        ]
    ]
];
```
