<?php

class PhoneBook
{

    private PdoConnection $pdo;

    public function __construct()
    {
        $this->pdo = new PdoConnection();
    }

    public function addContact(array $data): bool
    {
        // TODO:: Add contact to database
        return true;
    }

    public function getContacts(int $userId): array
    {
        $query = $this->pdo->getPDO()->prepare("SELECT * FROM contacts WHERE user_id = ? ORDER BY id desc");
        $query->execute([$userId]);
        $contacts = $query->fetchAll(PDO::FETCH_ASSOC);

//        echo '<pre>';
//        print_r($contacts);
//        echo '</pre>';

        return $contacts;
    }

    public function updateContact($contactId, $data): bool
    {
        // TODO:: update DB
        return true;
    }

    public function deleteContact($contactId): bool
    {
        //TODO: delete contact from DB

        return true;
    }
}