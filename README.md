# Citruse

A Laravel + Vue + PostgreSQL platform for managing purchase orders, stock, shipping, and distributor interactions for a fruit logistics business in Southern Africa.

---

## Setup Notes

### Commit: `Project Init + Docker Container Prebuild`

Initial project scaffold and container setup completed.

All commands below are run from inside the Docker container at:

`/var/www/`

### Setup Scripts

`./docker/setup/entry-point.sh`

Used to scaffold the Laravel application with Vue support:
- npm install
- composer install

> This ensures `node_modules/` and `vendor/` directories are rebuilt locally after `git clone`.

#### laravel new --vue --phpunit html

`./docker/setup/runme.sh`

Restores local dependencies that are not committed to version control:

I built this docker kit a year ago but updated docker-compose.yml to 
- support postgreSQL
- added `runme.sh` for dependancies (please run this before use!)

## 1. Database design

### `users`
- `id` (serial, Primary Key)
- `name` (varchar)
- `email` (varchar, unique)
- `email_verified_at` (timestamp, nullable)
- `password` (varchar)
- `remember_token` (varchar, nullable)
- `created_at` (timestamp)
- `updated_at` (timestamp)

---

### `contacts`
- `id` (serial, Primary Key)
- `name` (varchar)
- `email` (varchar)
- `telephone` (varchar)
- `created_at` (timestamp)
- `updated_at` (timestamp)

---

### `businesses`
- `id` (serial, Primary Key)
- `name` (varchar)
- `address` (varchar)
- `country` (varchar)
- `vat_number` (varchar)
- `business_type` (enum: `producer`, `distributor`) — NOT NULL
- `primary_sales_contact_id` -> (contacts.id) - NOT NULL
- `primary_logistics_contact_id` -> (contacts.id) - NOT NULL
- `created_at` (timestamp)
- `updated_at` (timestamp)

---

### `stock`
- `id` (serial, Primary Key)
- `product_code` (varchar)
- `description` (varchar)
- `quantity` (integer)
- `created_at` (timestamp)
- `updated_at` (timestamp)

---

### `stock_price`
- `id` (serial, Primary Key)
- `stock_id` -> (stock.id) - NOT NULL
- `year` (integer)
- `price` (decimal)
- `created_at` (timestamp)
- `updated_at` (timestamp)

---

### `orders`
- `id` (serial, Primary Key)
- `type` (varchar) — values: `POS`, `POD`
- `business_id` -> (businesses.id) - NOT NULL
- `shipping_date` (timestamp)
- `status` (enum: `New`, `Accepted by Supplier`, `In Delivery`, `Delivered`, `Rejected by Supplier`, `Rejected by Distributor`, `Cancelled`) — NOT NULL
- `created_at` (timestamp)
- `updated_at` (timestamp)

---

### `order_details`
- `id` (serial, Primary Key)
- `order_id` -> (orders.id) - NOT NULL
- `stock_id` -> (stock.id) - NOT NULL
- `quantity` (integer)
- `cost` (decimal)
- `created_at` (timestamp)
- `updated_at` (timestamp)

---

2. Application Design

Used Spatie Permissions for the roles

`composer require spatie/laravel-permission`

`php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"`

Generated two seeders to prepopulate roles and users

`php artisan make:seeder RoleSeeder`

`php artisan make:seeder UserSeeder`

Generated migration scripts

`php artisan make:migration create_contacts_table`

`php artisan make:migration create_businesses_table`

`php artisan make:migration create_stock_table`

`php artisan make:migration create_stock_prices_table`

`php artisan make:migration create_orders_table`

`php artisan make:migration create_order_details_table`

`php artisan make:migration create_roles_table`

Generated models

`php artisan make:model Business`

`php artisan make:model Contact`

`php artisan make:model Stock`

`php artisan make:model StockPrice`

`php artisan make:model Order`

`php artisan make:model OrderDetail`

`php artisan make:model Role`

Generated Controllers

`php artisan make:controller ContactController`

`php artisan make:controller BusinessController`

`php artisan make:controller StockController`

`php artisan make:controller StockPriceController`

`php artisan make:controller OrderController`

`php artisan make:controller OrderDetailController`
