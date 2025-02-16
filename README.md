# PHP Quiz App

A simple PHP Quiz Application designed for beginners and college projects. This project features a wizard-style quiz with a start screen, a 10-minute countdown timer, and smooth navigation. It also includes a PHP-themed design (complete with the official PHP logo) and an admin panel for managing quiz questions with full CRUD (Create, Read, Update, Delete) functionality using DataTables.

## Features

### Quiz Application
- **Start Screen:** Welcomes the user and provides a "Start Quiz" button.
- **Timer:** A 10-minute countdown timer for the quiz.
- **Wizard Navigation:** "Next" and "Previous" buttons for smooth navigation through the quiz.
- **Feedback:** User-friendly notifications via SweetAlert2.
- **PHP-Themed Design:** Uses a custom color palette (primary color: `#4F5B93`) and includes the official PHP logo.
- **Suitable For:** Beginners and college projects.

### Admin Panel
- **Secure Login:** Admin login page (credentials below).
- **CRUD Operations:** Easily add, edit, and delete quiz questions.
- **DataTables Integration:** Advanced table features including search, pagination, filters, and entries-per-page selection.
- **Sorted View:** Questions are displayed in descending order by ID.
- **Admin Credentials:**
  - **Username:** `admin`
  - **Password:** `admin123`

## Installation & Setup

### Requirements
- PHP 7.0 or higher
- MySQL
- A Web Server (e.g., Apache or Nginx)

### Steps

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/msiddiqaemdani/php-quiz-app.git

2. Place the Project in Your Web Server's Root Directory:

  For example, in Apache's htdocs folder.
  
3. Database Setup:

  database is inside the Database folder. import it to you machine.

4. Configure Database Connection:

   <?php
    // config.php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "q2";  // Ensure this matches your created database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   ?>

5. Admin Panel Credentials:
   Username: `admin`
   Password: `admin123`
   **To access the admin panel, navigate to admin_login.php in your browser.**

**Folder Structure**

php-quiz-app/
│
├── admin_action.php         # Processes AJAX requests for admin CRUD operations.
├── admin_dashboard.php      # Admin panel interface.
├── admin_login.php          # Admin login page.
├── admin_logout.php         # Admin logout script.
├── config.php               # Database configuration file.
├── index.php                # Main quiz application.
├── process.php              # Processes quiz submissions.
├── README.md                # This readme file.
└── database/
    └── php_quiz.sql         # SQL script to create the database schema and insert 50 PHP quiz questions.

