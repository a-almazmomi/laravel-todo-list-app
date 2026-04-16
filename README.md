# 📝 Todo List - Laravel

## 🎯 Project Overview
This project is a **Todo List web application** built using **Laravel**, designed to help users manage their tasks in a simple and organized way.

The system allows users to:
- Register and log in
- Add new tasks
- View tasks
- Manage tasks (add / delete / organize)

---

## 🚀 Features

- 🔐 User Authentication (Login & Register)
- ➕ Add New Tasks
- 📋 View Tasks List
- ❌ Delete Tasks
- 🗂️ Organized Task Management

---

## 🧱 Project Structure

### 🔹 Routes
- `web.php` → Handles web routes
- `api.php` → Handles API routes (if used)

---

### 🔹 Controllers
- `AuthManager.php` → Handles authentication (login & registration)
- `TaskManager.php` → Handles task operations

---

### 🔹 Models
- `User.php` → Represents user data
- `Tasks.php` → Represents tasks data

---

### 🔹 Views (UI)
- `login.blade.php` → Login page
- `register.blade.php` → Registration page
- `add.blade.php` → Add task page
- `default.blade.php` → Main layout
- `header.blade.php` / `footer.blade.php` → UI components

---

### 🔹 Database
- Migrations:
  - Users table
  - Tasks table
  - System tables (cache / jobs)

---

## 🛠️ How to Run

1. Clone the repository:
```
git clone https://github.com/your-username/todo-list-laravel.git
cd todo-list-laravel
``` 

2. Install dependencies:
```
composer install
npm install
```

3. Setup environment:
```
cp .env.example .env
php artisan key:generate
```

4. Configure your database in .env
```
Run migrations:
php artisan migrate
```

5. Start the server:
```
php artisan serve
```

6. Open in browser:
http://127.0.0.1:8000

---
## 👤 Author

Abdulmajeed Abdullah


