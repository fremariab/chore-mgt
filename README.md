# Chore Management System

## Overview
Managing household or team chores can be challenging, especially when keeping track of assignments and responsibilities. This **Chore Management System** provides a structured way to **assign, track, and manage chores** using a web-based interface.

## Impact
- **Increases Productivity** – Helps distribute tasks efficiently, reducing workload imbalance.
- **Encourages Accountability** – Users can view and track their assigned chores.
- **Simplifies Task Management** – Easy assignment, editing, and removal of chores.
- **Improves Household/Team Organization** – A centralized platform for managing responsibilities.

## Features
- **Chore Assignment** – Assign chores to users with deadlines.
- **Task Management** – Add, edit, and delete chores.
- **User-Friendly Dashboard** – Web-based UI for ease of use.
- **Chore Tracking** – View all active assignments.
- **Automated Updates** – Users receive updated information on their tasks.

## Project Structure
```
📦 Chore-Management-System
 ┣ 📂 actions               # Contains PHP scripts for chore actions
 ┣ 📜 app.php               # Core application logic
 ┣ 📜 index.php             # Main UI interface
 ┣ 📜 actions/add_chore_action.php      # Adds a new chore
 ┣ 📜 actions/assign_a_chore_action.php # Assigns chores to users
 ┣ 📜 actions/delete_assignment_action.php # Deletes a chore assignment
 ┣ 📜 actions/edit_a_chore_action.php   # Edits a chore
 ┣ 📜 actions/get_all_assignment_action.php # Retrieves all assignments
```

## Installation & Setup
### 1. Clone the Repository
```sh
git clone <repository-url>
cd chore-mgt-main
```

### 2. Set Up a Local Server
Use **XAMPP**, **MAMP**, or any local PHP server. Move the project to the appropriate directory (e.g., `htdocs` for XAMPP).

### 3. Start the Server
Start the Apache and MySQL services.

### 4. Access the Application
Open a browser and navigate to:
```
http://localhost/chore-mgt-main/index.php
```

## Usage
1. Add new chores through the dashboard.
2. Assign chores to users.
3. Track completed and pending tasks.
4. Edit or delete assignments when necessary.

## Future Enhancements
- **User Authentication** – Enable login/logout functionality for better task tracking.
- **Notification System** – Send reminders for pending chores.
- **Progress Tracking** – Display completion status for assigned tasks.
- **Mobile-Friendly UI** – Improve interface for mobile accessibility.

## Author
Developed by **Freda-Marie Beecham**

---

