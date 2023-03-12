
# Task Manager

This project has been built in Laravel framework.

To run this project you have to do few steps:
- Make sure you have installed local development environment application (DVA for future references) such as XAMPP, Laragon or equivalent
- Unzip the folder and place it in your DVA's root folder (check in your browser, it is different for each DVA), for XAMPP it is htdocs
- Open your code editor and open the folder from within your DVA's root folder (when you open terminal it should look something like this: C:\xampp\htdocs\task-manager)

After you have successfully accessed the application, it is time to set up the database.

Firstly, start your Apache and MySQL from your DVA, in XAMPP it should look something like this:
![App Screenshot](https://snipboard.io/EDsP3f.jpg)

Now go to your code editor and open your terminal and follow steps below.

Access your MySQL database, it must match those from your DVA's settings but usually it's username: root, password= (none)

```bash
  mysql -u root -p
```

Create new database table

```bash
  CREATE DATABASE task_manager;
```
## Run Locally

If you have successfully completed steps above, or you have already set up the environment before then follow the steps below to start the project:

Start your server locally, it will give you url to enter

```bash
  php artisan serve
```

If the page seems distorted, then open another terminal inside your editor and run the command

```bash
  npm run dev
```

