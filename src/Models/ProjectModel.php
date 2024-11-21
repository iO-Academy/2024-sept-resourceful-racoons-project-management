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

    public function getProjects(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name`, `client_id`, `description`, `deadline` FROM `projects`;');
        $query->setFetchMode(PDO::FETCH_CLASS, ProjectEntity::class);
        //Line above added to make returned item entity not an array, so can access name
        $query->execute();
        return $query->fetchAll();
    }

    public function getById(int $id): ProjectEntity
    {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `projects` WHERE `id` = :id;');
        $query->setFetchMode(PDO::FETCH_CLASS, ProjectEntity::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }


}