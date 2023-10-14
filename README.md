## Zadarma test task. Back-end

PHP, MySQL, AJAX
It is necessary to develop the "Phone Book" website. 
User, after registration and authorization,
 can keep track of phone book entries.

## Pages
- Authorization of the customer (combined with the main page)
- Registration of a client
- Phone book
# User parameters
- Login (Latin letters, numbers, up to 16 characters)
- Email (correct mail address)
- Password (check validation - different registers + numbers, not less than 6 characters)

# Contacts parameters
- Name
- Last name
- Phone number
- Email (correct mail address)
- Image (jpeg or png, up to 5 MB)
# Phone book functionality
- View the list of contacts
- Adding to the record (create without refreshing page, using AJAX)
- Viewing contacts
- Delete contacts
# Conditions
The command may be installed using PHP version 8.0 (or higher). It's not possible
use PHP frameworks and libraries. To save data - MySQL / MariaDB /
Percona server. For front-end you can use wiki - Vanilla JS, jQuery, Vue.js. For layout
You can use frameworks (Bootstrap, Bulma, etc.).
I would like to learn more about: form validation, PDO implementation, template implementation (MVC, Front
controller then). The external appearance is not evaluated, but the logic of the interfaces is lost.
# Result
Upload PHP file archives and database dump. Please describe the specific details of the supporting document.
mind the launch (as it is). Tell me how many hours you spent on this task

## Install 


You may be sure that Docker desktop was installed in your system
    
    git clone https://github.com/aleksandrkravchukos/zadarma.git
    cd zadarma
    docker-compose up --build -d
    cp env.txt src/.env

Go to http://localhost/install.php and then you need delete this file in public folder

Make sure that public/upload/ folder is writable

# Test

Go to http://localhost and try to test

After this you can login with email "admin@admin.com" and password "1"

Here is Adminer http://localhost:8081/
- login:root
- pass:test


