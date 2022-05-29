Student Managemnet System.

Setup Guide.

If running from windows clone under xampp\htdocs folder
If running from linux clone under var\www\html folder

1.  Clone from https://github.com/SobhithK/FingTest.git  
2.  git checkout origin master   
3.  Run Composer Update
4.  Rename the env file set db credentials.
5.  Generate key - php artisan key:generate
6.  Run Migrations - php artisan migrate
7.  Run seeders  -  php php artisan db:seed --class=DatabaseSeeder
8. Finally serve the project - php artisan serve

