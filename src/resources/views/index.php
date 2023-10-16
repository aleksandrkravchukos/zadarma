<!DOCTYPE html>
<html lang="en">
<?php
include_once 'header.php';
?>
<body>

<header class="bg-dark text-light text-center py-4">
    <h1>Phone book</h1>
</header>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <?php
            include "auth.php";
            ?>
        </div>

        <div class="col-md-9">
            <h2>Description</h2>
            <p>A phone book is a tool for storing, organizing and managing contacts and information about people and organizations with whom you have contact. Typically, it contains information such as name, phone number, email address, address, additional notes, and the ability to edit and search for this information. Phone books can be physical notebooks or virtual applications available online or on mobile devices.</p>
            <p>A phone book site is an online application that allows users to store, edit and manage their contacts online. Here is a short description of the functions and capabilities of the phone book website:</p>
            <p>Registration and authorization: Users can create an account and log in to the site to access their phone book.</p>
            <p>Adding and editing contacts: Users can add new contacts and edit existing contact details such as name, phone number, address, etc.</p>
            <p>Search and filter contacts: Users can search for contacts by name, phone number, or other parameters. It may also be possible to filter contacts by groups or categories.</p>
            <p>Delete contacts: Users can delete redundant or outdated contacts from their book.</p>
            <p>Export and import of contacts: Ability to export and import contacts in various formats (for example, CSV or vCard) for convenient data exchange.</p>
            <p>Synchronization with other devices: If the site works on mobile devices, then users can synchronize their phone book with other devices so that they can access it from anywhere.</p>
            <p>Protection and security: Ensuring the security of user data, such as encryption and protection against unauthorized access.</p>
            <p>Other features: May include the ability to add images to contacts, create contact groups, birthday reminders, and other useful features.</p>
            <p>A phone book site helps people manage their contacts and access them anytime and from any device with an Internet connection.</p>
        </div>
    </div>
</div>
<?php
include_once 'scripts.php';
?>
</body>

</html>