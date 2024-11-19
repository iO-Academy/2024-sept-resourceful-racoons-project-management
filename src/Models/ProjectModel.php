<?php

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


}