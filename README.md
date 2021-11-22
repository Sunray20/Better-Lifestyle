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
    - The database has demo data to try out the functionalities of the application.
    - The admin user is avaliable from the start so is a basic user.
        Admin:
            user: admin@gmail.com
            pass: admin
        User:
            user: test@gmail.com
            pass: test

    - It is possible to register a new basic user with the 'Register' button.
    - After filling out the form the new user will be authenticated automatically.
    - However accessing most functions requires an email address validation.
    - The email is sent from a better-lifestyle account with a link in it.
    - After validation every user functions will be available to the user.

    - The login and logout methods are straightforward.

2. Excercise
2.1 Excercises
   - This page categorizes the excercises by type. It's possible that one excercise
    is found under multiple categories.
   - After selecting an excercise you can check out the description of it and if you are an admin
    you can also delete or modify it.

2.2 Excercise History
    - You can log previously done excercises. This is a page where all record is available for the user.
    - If you want to add a new record go to 'My Routine' page.

2.3 My Routine
    - In a table view you can add "excercise histories" which serve as a week-to-week workout plan for you.
    - Once you added one you can click on it's name to edit it or the 'X' button to delete entry
2.4 Workout Routines
    - This page gives the opportunity for admin users to add "pre-built" workout plans, with descriptions
    and assing excercises to the said plan.

1. Food
3.1 Ingredients
    - In this view you can select an ingredient to check it's macro nutrients.
    - If you can't find the ingredient you are searching for you can use the search bar.
    - If it isn't in the database it will send a request to an external API and retrieves it.
    - If you still can't find it, then a new button will appear to add a new ingredient.

3.2 Foods
    - This view will present all the foods in the database.
    - If you are looking for something specific you can use the search bar to find it.
    - The same thing applies that were stated in the previous point.
    - There is one addition, a food consists of many ingredients, so you can send async request
    to retrieve ingredient data from the database, which can be added to a food.

4. Diet
4.1 My Diet
    - This page serves as the GUI for creating diet plans.
    - In a table view you can add foods to your diet and also delete them from it.
    - The table calculates wether you exceded your daily total calories and warns you about it.
    - Also you can check the daily total protein, carb and fat amount.
4.2 Diet Types
    - On this page an administrator can add, delete or modify diet types and write descriptions to it.
    - In the future it will be possible to short ingredients based on followed diet types.
    - Right now an user can only assign what type of diet he/she followes, if any.

5. User Data
   - The registered user can give his / her measurements, sex, age and a total target calorie calculation
   will be made using those numbers.
   - It works by first calculating the BMI of the user, then multiply it with an activity number.
   - The calculations are not a 100% accurate, but they give a general idea, of the users target calories
   if he / she wants to maintain weight.

6. Known issues / Possible extensions
   - General design fixes like more padding, better button placements etc.
   + Pagination for long lists items (like on the food index page)
   + External API calls for foods not just ingredients
   + Food incompatibility based on user followed diet
   + Calculation of the total calories etc of a food in the 'show' page
   + More built in excercises, workout routines, foods etc
