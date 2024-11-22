<?php

class TaskEntity {
    public int $id;
    public int $project_id;
    public string $project_name;
    public string $task_name;
    public int $user_id;
    public string $name;

    public string $taskname;

    public ?string $description;
    public ?int $estimate;
    public ?string $deadline;
}

