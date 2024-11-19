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

    public function displayTasks()
    {
        $query = $this->db->prepare('SELECT `tasks`.`name` AS "taskname", `tasks`.`estimate`, `users`.`name` as "username", `users`.`avatar` AS "icon" FROM `tasks`
  INNER JOIN `users` ON `tasks`.`user_id` = `users`.`id`;');
        $query->execute();
        return $query->fetchAll();
    }


}