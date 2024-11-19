<?php


require_once 'src/Entities/UserEntity.php';

class UserModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return UserEntity[]
     */
    public function getAll(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `users`;');
        $query->setFetchMode(PDO::FETCH_CLASS, UserEntity::class);
        $query->execute();
        return $query->fetchAll();
    }
}