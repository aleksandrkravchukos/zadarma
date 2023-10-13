<?php

class PhoneBookController extends Controller
{
    public function listContacts()
    {
        $contacts = json_encode($this->model->getContacts($_SESSION['user']['id']));
        header('Content-Type: application/json');
        echo $contacts;
    }

    public function contact()
    {
        $contact = json_encode($this->model->getContact($_SESSION['user']['id'], $_POST['contactId']));
        header('Content-Type: application/json');
        echo $contact;
    }

    public function contactsView()
    {
        header('Content-Type: text/html; charset=utf-8');
        include $this->getViewPath() . 'contacts.php';
    }

    public function addContact()
    {
        $result = $this->model->addContact($_POST);
        header('Content-Type: application/json');
        echo $result;
    }

    public function updateContact()
    {
        $result = json_encode($this->model->updateContact());
        header('Content-Type: application/json');
        echo $result;
    }

    public function deleteContact()
    {
        echo $this->model->deleteContact();
    }
}