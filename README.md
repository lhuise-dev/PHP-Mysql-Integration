# PHP-Mysql-Integration
# PHP + MySQL CRUD Project

This project demonstrates how PHP connects to a MySQL database and performs basic CRUD (Create, Read, Update, Delete) operations.  
It serves as a learning reference for beginners who want to understand how PHP and MySQL work together to store, display, and manage data.

---

## Project Overview

This website showcases:
- How MySQL is connected through PHP
- How to fetch, insert, update, and delete records
- Basic frontend integration using HTML tables
- A working user management system (view, add, edit, delete)

The goal of this project is to provide a simple and functional example of connecting PHP to MySQL and performing database operations efficiently.

---

## Requirements

Before you start, make sure you have:

- XAMPP or WAMP installed
- A working PHP environment (PHP 7+ recommended)
- phpMyAdmin access
- A browser (Chrome, Edge, etc.)

---

## Project Setup

### 1. Clone or Download the Project

Download or copy this project folder into your local server directory:

| Server | Folder Location |
|---------|-----------------|
| XAMPP   | `C:\xampp\htdocs\your_project_name` |
| WAMP    | `C:\wamp64\www\your_project_name`   |

---

### 2. Import the Database

1. Open phpMyAdmin by visiting `http://localhost/phpmyadmin`
2. Click **Import**
3. Choose the exported file (the file is included in this clone 'testdb.sql')
4. Click **Go**

The import process will automatically:
- Create the database
- Add all tables and records

No need to manually create a database name.

---

### 3. Configure Database Connection

Make sure your `db.php` file is set as follows:

```php
<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "your_database_name"; // match the name from your exported .sql file

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
>?


ADMIN CREDENTIALS: 
admin
test123
}
?>
