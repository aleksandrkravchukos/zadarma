<?php

class PhoneBookController
{
    private $model;

    public function __construct(PhoneBookModel $model)
    {
        $this->model = $model;
    }

    public function listContacts()
    {
        $contacts = $this->model->getContacts();
        //TODO:: include __DIR__.'/../resources/view/contacts.php';
    }

    public function addContact($data)
    {
        $this->model->addContact($data);
        return json_encode([/** TODO: result array */]);
    }

    public function updateContact($contactId, $data)
    {
        return $this->model->updateContact($contactId, $data);
    }

    public function deleteContact($contactId)
    {
        return $this->model->deleteContact($contactId);
    }
}