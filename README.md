Installation process: 
1. Get the app from github / other ways.
2. Run 'composer install' command from command line
3. Create local env file with: 'copy .env.example .env'
4. Generate app key with: 'php artisan key:generate'
5. Start local development server, like XAMPP or LAMP + MySQL server
6. Add MySQL database with the use of PhpMyAdmin or any other ways
   The name is: 'better-lifestyle'
   It can be modified in .env file, DB_DATABASE=YourDatabaseName
   Also if database credentials need to be modified it can be done in the same .env file
7. Run 'php artisan migrate:fresh --seed' to create tables and run the seeder files
7.1 If you get the 'error driver not found' error, then edit php.ini()
    Search for line ';extension=pdo_mysql.so' and remove the ';' character
8. Run 'php artisan serve' command and open the link to the local website

Usage:
1. Login / Register / Logout
The database has demo data to try out the functionalities of the application.
The admin user is avaliable from the start so is a basic user.
Admin: 
    user: admin@gmail.com
    pass: admin
User:
    user: test@gmail.com
    pass: test

It is possible to register a new basic user with the 'Register' button.
After filling out the form the new user will be authenticated automatically.
However accessing most functions requires an email address validation.
The email is sent from a better-lifestyle account with a link in it.
After validation every user functions will be available to the user.

The login and logout methods are straightforward.

2. 
