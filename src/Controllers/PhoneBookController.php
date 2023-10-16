<?php

class PhoneBookController extends Controller
{
    /**
     * Get contacts info
     */
    public function listContacts()
    {
        $contacts = json_encode($this->model->getContacts($_SESSION['user']['id']));
        header('Content-Type: application/json');
        echo $contacts;
    }

    /**
     * Get contact info.
     */
    public function contact()
    {
        $contact = json_encode($this->model->getContact($_SESSION['user']['id'], $_POST['contactId']));
        header('Content-Type: application/json');
        echo $contact;
    }

    /**
     * Show contacts html page.
     */
    public function contactsView()
    {
        header('Content-Type: text/html; charset=utf-8');
        include $this->view->render('contacts');
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

    public function processUploadedFile($files, $contactId): string
    {
        return $this->model->uploadImage($files, $contactId);
    }

    public function deleteAvatar(): string
    {
        return $this->model->deleteAvatar();
    }
}