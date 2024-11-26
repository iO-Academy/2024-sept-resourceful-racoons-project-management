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
    public function getAll(int $id): array
    {
        $query = $this->db->prepare(
            "SELECT `users`.`id`, `users`.`name` AS 'username',
                    `users`.`avatar` AS 'usericon' 
                    FROM `users` INNER JOIN `project_users`
                    ON `users`.`id` = `project_users`.`user_id`         
                    WHERE `project_users`.`project_id`= :id ;");
        $query->setFetchMode(PDO::FETCH_CLASS, UserEntity::class);
        $query->execute(['id'=>$id]);
        return $query->fetchAll();
    }
}