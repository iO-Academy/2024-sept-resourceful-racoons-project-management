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
        $query = $this->db->prepare("SELECT `users`.`id`, `users`.`name` AS 'username',`users`.`avatar` AS 'usericon' 

                                    FROM `users` INNER JOIN `project_users` ON `users`.`id` = `project_users`.`user_id`
                                     WHERE `project_users`.`project_id`= 1 ;");
        $query->setFetchMode(PDO::FETCH_CLASS, UserEntity::class);
        $query->execute();
        return $query->fetchAll();
    }
}