# To-Do App by Othman NL

A simple To-Do application built with PHP and MySQL, featuring task creation, completion, and deletion functionalities.

## Features
- Add tasks to your to-do list.
- Mark tasks as completed.
- Delete tasks from the list.
- View separate lists for open and completed tasks.

---

## Requirements
- PHP 7.4 or higher
- MySQL
- A web server (e.g., XAMPP, WAMP, or MAMP)
- Composer (optional, if you extend the project with additional libraries)

---

## Installation

### 1. Clone the Repository
Clone this project to your local machine using Git:
```bash
git clone git@github.com:yourusername/todo-app.git
cd todo-app
```

### 2. Set Up the Database
1. **Run the database setup script**:
   Execute the following command to create the database and tables automatically:
   ```bash
   php setup_database.php
   ```
   This will:
    - Create a database named `tasks_db`.
    - Create a table named `tasks` with the necessary structure.

2. Alternatively, you can manually create the database:
    - Import the SQL file `database.sql` (if provided) into your database.
    - Use tools like phpMyAdmin or MySQL CLI for this step.

---

### 3. Configure the Database
1. Open the `db.php` file in the root directory.
2. Update the database credentials if necessary:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'tasks_db');
   ```

---

### 4. Start the Application
1. Place the project in your web server's root directory (e.g., `htdocs` for XAMPP).
2. Start your web server.
3. Access the app in your browser:
   ```
   http://localhost/todo-app/index.php
   ```

---

## Project Structure
```
todo-app/
│
├── index.php               # Main file for task management
├── db.php                  # Database connection file
├── complete_task.php       # Marks a task as completed
├── delete_task.php         # Deletes a task
├── setup_database.php      # Sets up the database and table
└── README.md               # Project instructions
```

---

## Usage
1. **Add a Task**:
    - Enter a task name in the input box and click "Add Task."

2. **Complete a Task**:
    - Click the "Complete" button next to the task.

3. **Delete a Task**:
    - Click the "Delete" button to remove a task.

---

## Troubleshooting
- **Database Connection Error**: If you see an error about the database connection, ensure you've run the `setup_database.php` script and updated the credentials in `db.php`.
- **No Tasks Displayed**: Ensure the `tasks` table has been created correctly in your database.

---

## License
This project is open-source and available under the MIT License.

---