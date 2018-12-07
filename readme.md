

## B2B ESHOP API

- composer install 

- php artisan key:generate

- php artisan migrate

- Normal User /Register and /Login

- Create admin user: php artisan tinker

>>> $admin = new App\Admin;
=> App\Admin {#2927}
>>> $admin->email = "admin@admin.com";
=> "admin@admin.com"
>>> $admin->password = bcrypt('admin');
=> "$2y$10$Oem9/MUE/yOdWWsabqT3Jeond6NuN2bY5LKGSRAcYOloWr4bz9gau"
>>> $admin->save();
=> true

- Admin User /admin/login
