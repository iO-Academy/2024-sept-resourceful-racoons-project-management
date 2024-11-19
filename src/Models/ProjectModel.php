<?php

require_once 'src/Entities/ProjectEntity.php';

class ProjectModel
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;

    }

    public function getProjects(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name`, `client_id`, `description`, `deadline` FROM `projects`;');
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