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
        $contacts = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($contacts as &$contact) {
            $avatar = $this->getAvatar($contact['id']);
            $contact['image'] = '';
            if ($avatar) {
                $contact['image'] = $avatar['path'];
            }
        }
        return $contacts;
    }

    public function getAvatar(int $contactId)
    {
        $query = $this->pdo->getPDO()->prepare("SELECT path FROM avatars WHERE contact_id = ?");
        $query->execute([$contactId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getContact(int $userId, int $contactId): array
    {
        $query = $this->pdo->getPDO()->prepare("SELECT * FROM contacts WHERE user_id = ? and id = ? ORDER BY id desc");
        $query->execute([$userId, $contactId]);

        $contact = $query->fetch(PDO::FETCH_ASSOC);
        $contact['image'] = '';
        if ($contact) {
            $contact['image'] = $this->getAvatar($contact['id']);
        }

        return $contact;
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

    public function uploadImage($files, $contactId): string
    {
        $publicPath = '/upload/';
        $uploadDir = __DIR__ . '/../../public' . $publicPath;
        if (isset($files["image"])) {
            $fileName = basename($files["image"]["name"]);
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileTime = time() . '.' . $extension;
            $uploadFile = $uploadDir . $fileTime;
            if (move_uploaded_file($files["image"]["tmp_name"], $uploadFile)) {
                echo "Image uploaded successfully!";
                $sql = "INSERT INTO `avatars` (`contact_id`, `path`) VALUES (?, ?)";
                $query = $this->pdo->getPDO()->prepare($sql);
                $query->execute([$contactId, $publicPath . $fileTime]);

                return $uploadFile;
            } else {
                echo "An error occurred during image upload.";
            }
        }

        return '';
    }

    public function deleteAvatar()
    {
        $query = $this->pdo->getPDO()->prepare("DELETE FROM avatars WHERE contact_id = ?");
        $query->execute([$_POST['avatarId']]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}