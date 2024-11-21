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
    public function getTasksByUserID(int $userID, int $projectID): array
    {
        $query = $this->db->prepare("SELECT `tasks`.`deadline`, `tasks`.`name` AS 'taskname', `estimate` FROM `tasks` WHERE `user_id` = :userID AND `project_id` = :projectID");
        $query->setFetchMode(PDO::FETCH_CLASS, TaskEntity::class);
        $query->execute(['userID' => $userID, 'projectID' => $projectID]);
        return $query->fetchAll();
        //query3
    }

    public function getTaskPreviewDELETE(): array
    {
        $query = $this->db->prepare('SELECT `tasks`.`name` AS `taskname`, `estimate`
                                            FROM `tasks` INNER JOIN `project_users` 
                                            ON `tasks`.`user_id` = `project_users`.`user_id`;');
        $query->setFetchMode(PDO::FETCH_CLASS, TaskEntity::class);
        $query->execute();
        return $query->fetchAll();
    }
}