<?php
require_once 'src/Entities/TaskEntity.php';

$task_id = $_GET ["task_id"];

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
    public function getTaskById($task_id): TaskEntity
    {
        // With the where this query will be returning 1 TaskEntity, not an array of TaskEntities
        $query = $this->db->prepare('SELECT `tasks`.`id`, 
                                    `tasks`.`project_id`, `tasks`.`user_id`, 
                                    `projects`.`name` AS `project_name`, 
                                    `tasks`.`name`, `tasks`.`description`, `tasks`.`estimate`, `tasks`.`deadline` 
                                    FROM `projects` LEFT JOIN `tasks` 
                                    ON `tasks`.`project_id` = `projects`.`id` 
                                    WHERE `tasks`.`id` = :task_id');
        $query->setFetchMode(PDO::FETCH_CLASS, TaskEntity::class);
        //the execute is passing in the :task_id placeholder as $task_id
        $query->execute(['task_id' => $task_id]);
        // This needs to be come fetch()
        return $query->fetch();
        // deprecated error is saying there's a mismatch between what we are trying to pass through
        // and the TaskEntity properties
    }
}