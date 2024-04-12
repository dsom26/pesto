# pesto

Pesto - Assignment (Full Stack Engineer)

Frontend : HTML5, JS, CSS

1. Using Bootstrap framework for Responsive screens
2. Using API's to pull the data onto Screens

Backend : PHP, MySQL

1. Using Codeigniter 3 for Backend Development along with MySQL database.
2. Basic Validations & Security Checks are added.

Login Credentials : (XAMPP setup locally)
URL : http://localhost/pesto/pesto/login
Email : admin@pesto.com
Pass : 123456

API Endpoints : (POSTMAN JSON attached)

1. Get Tasks (GET) : http://localhost/pesto/pesto/api/get_tasks/
   i) To Do : http://localhost/pesto/pesto/api/get_tasks/1
   ii) In Progress : http://localhost/pesto/pesto/api/get_tasks/2
   iii) Done : http://localhost/pesto/pesto/api/get_tasks/3

2. Create Task (POST) : http://localhost/pesto/pesto/api/create_task/
   (Form Data)

   title : First
   description : First Description
   status : To Do
   assigned_to : 20

3. Update Task (POST) : http://localhost/pesto/pesto/api/update_task/
   (Form Data)

   title : First
   description : First Description
   status : To Do
   assigned_to : 20
   id : 11

4. Delete Task (POST) : http://localhost/pesto/pesto/api/delete_task/
   (Form Data)
   id : 8

5. Get Tasks (GET) : http://localhost/pesto/pesto/api/get_users/
