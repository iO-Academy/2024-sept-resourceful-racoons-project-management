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

    public function getByProjectId(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name`, `client_id`, `description`, `deadline` FROM `projects`;');
        $query->setFetchMode(PDO::FETCH_CLASS, ProjectEntity::class);
        //Line above added to make returned item entity not an array, so can access name
        $query->execute();
        return $query->fetchAll();
    }

    public function getById(int $id): array
    {
        $query = $this->db->prepare('SELECT `projects`.`name` AS "projectname", `projects`.`id`,
`clients`.`name` AS "clientname", `clients`.`logo` AS "clientlogo" FROM `projects` INNER JOIN `clients` 
ON `projects`.`client_id` = `clients`.`id` WHERE `projects`.`id` = :id;');
//query 1
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

}