# UiTM Student Portal

A responsive web-based student management system developed for the IMS566 Advanced Web Design Development and Content Management individual project. This system allows students to log in, manage assignments, monitor attendance performance, and view subject-related information through a modern dashboard interface.

---

# 📌 Project Description

UiTM Student Portal is a web application developed using CakePHP and Bootstrap 5. The system focuses on student academic management by providing authentication features, dashboard visualisation, assignment management, attendance tracking, and responsive navigation.

The project fulfills the IMS566 project requirements including authentication, dashboard page, navigation menu, data view pages, and meaningful data visualisation.

---

# ✨ Features Included

## 🔐 Authentication System
- Student Login
- Student Registration
- Session-based authentication
- Invalid login error handling
- Protected pages (users cannot access system pages without logging in)

---

## 🏠 Home Page
- Landing page for visitors
- Login & Register navigation
- Responsive design

---

## 📊 Dashboard
Displays assignment statistics:
- Total Assignments
- Submitted Assignments
- Pending Assignments

Features:
- Summary cards
- Visual dashboard interface
- Responsive layout

---

## 👨‍🎓 Student Management
- View student list
- Edit student information
- Delete student records
- Responsive table design

---

## 📚 Subject Management
- View subject list
- Assignment allocation by subject
- Organised academic structure

---

## 📝 Assignment Management
- Create assignments
- Assign tasks to multiple students
- Update submission status
- Delete assignments
- Clear all assignments
- Dynamic assignment table

---

## 📈 Attendance Monitoring

Attendance is calculated automatically based on assignment submission status.

### Attendance Categories
- Excellent
- Good
- Average
- Poor

### Attendance Features
- Progress bar visualisation
- Attendance percentage
- Student performance status

---

## 🌙 Additional Features
- Dark Mode Toggle
- Responsive Navigation Bar
- Footer with project information
- Mobile-friendly design
- Bootstrap UI components

---

# 🛠️ Frameworks / Libraries Used

| Technology | Usage |
|---|---|
| CakePHP | PHP MVC Framework |
| Bootstrap 5 | Responsive Front-end Framework |
| PHP | Backend Development |
| MySQL / phpMyAdmin | Database Management |
| Font Awesome | Icons |
| HTML5 | Structure |
| CSS3 | Styling |
| JavaScript | Interactivity |

---

# 💻 Software Used
- Laragon
- Visual Studio Code
- Google Chrome
- phpMyAdmin
- GitHub

---

# ⚙️ Installation Guide

## Step 1 — Download Project Files
Download the project files from the GitHub repository.

> Do not place the SQL file inside the project folder.

---

## Step 2 — Place Project Folder
Extract the downloaded project folder and place it inside:

```bash
laragon/www
```

Example:

```bash
C:/laragon/www/student_db
```

---

## Step 3 — Import Database
1. Open **phpMyAdmin**
2. Create a new database named:

```bash
student_db
```

3. Click the database
4. Go to the **Import** tab
5. Import the provided SQL file

---

## Step 4 — Run the Website
Open browser and run:

```bash
http://localhost/student_db
```

---

# 🔑 Instructions to Test Login

## Default Login Example

| Field | Example |
|---|---|
| Student ID | 2025235396 |
| Password | 123 |

You may also register a new student account using the Register page.

---
GitHub Repository
https://github.com/harithdanish/uitm-student-portal-INDIVIDUAL-IMS566.git
