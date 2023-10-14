<?php

class Contact
{

    private PdoConnection $pdo;

    public function __construct()
    {
        $this->pdo = new PdoConnection();
    }

    public function addContact(array $data): bool
    {
        $sql = "INSERT INTO `contacts` (`user_id`, `name`, `last_name`, `email`, `phone`)
                VALUES (?, ?, ?, ?, ?)";
        $query = $this->pdo->getPDO()->prepare($sql);

        return $query->execute(
            [$_SESSION['user']['id'], $_POST['name'], $_POST['last_name'], $_POST['email'], $_POST['phone']]
        );
    }

    public function getContacts(int $userId): array
    {
        $query = $this->pdo->getPDO()->prepare("SELECT * FROM contacts WHERE user_id = ? ORDER BY id desc");
        $query->execute([$userId]);
        return $query->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function getContact(int $userId, int $contactId): array
    {
        $query = $this->pdo->getPDO()->prepare("SELECT * FROM contacts WHERE user_id = ? and id = ? ORDER BY id desc");
        $query->execute([$userId, $contactId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateContact()
    {
        $query = $this->pdo->getPDO()->prepare(
            "UPDATE contacts SET name = ?, last_name = ?, email = ?, phone = ? WHERE user_id = ? and id = ? ORDER BY id desc"
        );

        $query->execute(
            [
                $_POST['nameView'],
                $_POST['last_name_view'],
                $_POST['emailView'],
                $_POST['phoneView'],
                $_SESSION['user']['id'],
                $_POST['contact_id']
            ]
        );

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteContact(): bool
    {
        $query = $this->pdo->getPDO()->prepare("DELETE FROM contacts WHERE id = ?");
        $query->execute([$_POST['contactId']]);
        return $query->fetch(PDO::FETCH_ASSOC);

    }
}