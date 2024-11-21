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
    public function getTasksById(): array
    {
        // With the where this query will be returning 1 TaskEntity, not an array of TaskEntities
        $query = $this->db->prepare('SELECT `project_id`, `user_id`, 
                                        `projects`.`name`,
                                        `tasks`. `name`,
                                        `tasks`. `description`, `estimate`, `tasks`. `deadline` 
                                        FROM `projects` LEFT JOIN `tasks` 
                                        ON `tasks`. `project_id` = `projects`. `id`;');
        $query->setFetchMode(PDO::FETCH_CLASS, TaskEntity::class);
        $query->execute();
        // This needs to be come fetch()
        return $query->fetchAll();
    }
}