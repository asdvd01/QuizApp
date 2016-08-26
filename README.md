# QuizApp
Easily Conduct Quiz

1. client side android app project - project files for android application in android studio 1.0.1

2. server - php files for server 

3. quiz.apk - android app generated from above project that can be installed on client mobile

4. quiz.sql - create a database named 'quiz' and run this sql file to get required tables and data in database

Deployment Instructions

1. Server - For local deployment install a xampp server and put all the files in server folder into xampp/htdocs/quiz folder
2. For deployment on server copy all files to public_html on server
3. Database - import quiz.sql as above mentioned into local or remote server's database
4. Make sure server is running by opening server's url and login in to dashboard
2. Mobile - install apk file in mobile 
3. make sure server setting on client side points to server ip if not correct it
4. make sure the quiz is set to available in the dashboard (server) before trying it.
5. Enter the quiz id displayed on dashboard in the list of available quizzes.
6. Enter name and roll no correctly (only roll no present in db are permitted to take the quiz)
