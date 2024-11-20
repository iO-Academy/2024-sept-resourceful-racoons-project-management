<?php
require_once 'src/Entities/ProjectEntity.php';
class ProjectModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

//Magic comment to ensure the array has to go through project Entity so you can't have a key that isn't in Project Entity
    /**
     * @return ProjectEntity []
     *
     */
    public function getAll(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name`, `client_id`, `description`, `deadline` FROM `projects`;');
        $query->setFetchMode(PDO::FETCH_CLASS, ProjectEntity::class);
        //Line above added to make returned item entity not an array, so can access name
        $query->execute();
        return $query->fetchAll();
    }
    public function getTask(): array|false
    {
        $query = $this->db->prepare(
     'SELECT `tasks`.`name` AS "taskname",
`tasks`.`estimate`,
`users`.`name` as "username",
 `users`.`avatar` AS "icon" 
 FROM `tasks` INNER JOIN `users` 
 ON `tasks`.`user_id` = `users`.`id`;');
        $query->execute([]);
        return $query->fetch();
    }

    public function getProjectName(): array
    {
        $query = $this->db->prepare('SELECT `projects`.`name` AS "projectname",
`clients`.`name` AS "clientname" FROM `projects` INNER JOIN `clients` 
ON `projects`.`client_id` = `clients`.`id` WHERE `projects`.`id` = 1;');
        $query->execute();
        return $query->fetch();
    }
    public function getById(int $id): ProjectEntity
    {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `projects` WHERE `id` = :id;');
        $query->setFetchMode(PDO::FETCH_CLASS, ProjectEntity::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
}