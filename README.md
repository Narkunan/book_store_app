functionalities of this application:
1.Author can publish Book
2.Author view salesreport
3.Author can edit/delete Book
4. User can buy their favourite Book
5. USer can edit Their Profile
6. User can See Recent Order
How To run the Project
Prerequisites
1. Make sure You have Xampp or wampp installed 
2. Make Sure you have Installed Mysql
Setting up Database
1. Make sure you have the `dump.sql` file ready.
2. Open your MySQL command-line client or a database management tool of your choice.
3. create new empty database by following command.
4. CREATE DATABASE bookstore;
5. Navigate to the directory where you have the `dump.sql` file
6. Open your command prompt.
7. Run the following command to import the `dump.sql
8. mysql -u your_username -p bookstore < dump.sql;
9. Replace `your_username` with your MySQL username
10. once the process is completed please verify all the data are import as expected by running query like select * from orders;,select * from book;
Setting up Project directory
1. keep the project folder inside the htdocs folder in xampp
2. And type http://localhost/book_store_app/public/assets/html/first.php
3. if you can see the home page that means it worked 

