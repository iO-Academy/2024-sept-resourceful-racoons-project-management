<?php

require_once 'src/Services/DatabaseService.php';
require_once 'src/Models/ProjectModel.php';

$db = DatabaseService::connect();

$task = new ProjectModel($db);

$tasks = $task->displayTasks();

echo "<pre>";
var_dump($tasks);