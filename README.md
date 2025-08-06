# Quick Task - Laravel Project

This is a Laravel-based application designed to manage tasks and posts with real-time admin notifications using Pusher and AdminLTE.

## 🛠 Requirements

- PHP 8.1 or above  
- Composer  
- Node.js & NPM  
- MySQL or compatible database  
- Laravel 12  
- Redis (if using queue broadcasting)  

---

## 🚀 Installation & Setup

1. **Clone the Repository / Extract the Archive**  
   Unzip or clone the project into your server directory:
   ```bash
   git clone https://github.com/your/repo.git quick-task
   cd quick-task
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Environment Setup**
   - Copy the `.env.example` file:
     ```bash
     cp .env.example .env
     ```
   - Update `.env` with your database, broadcasting, and Pusher settings.

4. **Generate App Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations & Seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Set File Permissions**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

7. **Serve the Application**
   ```bash
   php artisan serve
   ```

---

## 🔔 Real-Time Notifications with Pusher

Make sure your `.env` contains:

```
BROADCAST_DRIVER=pusher

PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=your_cluster
```

Then run the WebSocket queue listener:

```bash
php artisan queue:work
```

---

## ✅ Testing

You can run feature and unit tests with:

```bash
php artisan test
```

Or using PHPUnit directly:

```bash
./vendor/bin/phpunit
```

---

## 📁 Directory Overview

```
├── app/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   └── views/
├── routes/
│   ├── web.php
│   └── api.php
├── .env
├── README.md
└── artisan
```

---

## 📌 Notes

- AdminLTE is used as the admin panel layout.
- Notifications are sent to admin users on new post creation.
- Toastr is used for frontend toast notifications.
- Queue broadcasting is handled via `ShouldQueue`.

---

## 👤 Author

Developed by Yousef Yehia 
Email: jooyehia611@gmail.com

---
