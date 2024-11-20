<?php
require_once 'src/Entities/TaskEntity.php';

class TaskModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return TaskEntity []
     *
     */
    public function getTasks(): array
    {
        $query = $this->db->prepare('SELECT `project_id`, `user_id`, 
                                        `projects`.`name`,
                                        `tasks`. `name`,
                                        `tasks`. `description`, `estimate`, `tasks`. `deadline` 
                                        FROM `projects` LEFT JOIN `tasks` 
                                        ON `tasks`. `project_id` = `projects`. `id`;');
        $query->setFetchMode(PDO::FETCH_CLASS, TaskEntity::class);
        $query->execute();
        return $query->fetchAll();
    }
}