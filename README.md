# Blog Management System

## Overview
This project is a simple blog management system built with Laravel. It allows managing blog categories and posts from the admin panel and displays them on the frontend.  

## Approach

### 1. Master Layout
- Created a master Blade layout file (`layouts/app.blade.php`) to manage common components such as header, navigation, and footer.
- Used `@yield` and `@section` directives for dynamic content.

### 2. Blog Categories
- Developed a form to add new blog categories.
- Applied **form validation** (`required`, `unique:categories`) to ensure correct input.
- Displayed **error messages** in the form when validation failed.
- Implemented **pagination** to show a list of categories in the admin panel.

### 3. Blog Posts
- Built a form to add new blog posts with fields: `title`, `content`, and `category`.
- Implemented a **one-to-many relationship** (`Category` has many `Posts`).
- Applied validation rules for required fields and content.
- Displayed **error messages** on the form upon validation failure.
- Used **pagination** for listing posts in the admin panel.

### 4. Frontend Display
- Displayed all blog categories with their related posts using **Eloquent relationships**.
- Shown post titles, short descriptions, and their category names.
- Used a clean layout for better readability.

## Features
- Category Management (Add, List, Paginate)
- Post Management (Add, List, Paginate)
- Validation and Error Handling
- Category-Post Relationship
- Frontend display by category

---

## Tech Stack
- **Laravel** (Backend + Blade Templating)
- **MySQL** (Database)
- **Tailwind CSS** (Styling)
