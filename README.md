# Setup steps

## 1. clone the repository

```bash
git clone https://github.com/Bansari-Siddhapura/laravel_breeze.git
```

## 2. install composer

```bash
composer install
```

## 3. install npm

```bash
npm install
```

## 4. create env file using following command

```bash
cp .env.example .env
```

- create key in .env file using following command :

```bash
php artisan key:generate
```

## 5. create database in phpmyadmin and change database releted configuration in .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= envato_license_verification_panel
DB_USERNAME=root
DB_PASSWORD=root
```

## 6. run migration

```bash
php artisan migrate
```

## 7. run the project

```bash
php artisan serve
```

```bash
npm run dev
```

## Eloquent Relationship

### OneToMany Relationship :

