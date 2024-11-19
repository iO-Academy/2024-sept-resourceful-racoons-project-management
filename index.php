<?php

require_once 'src/Services/DatabaseService.php';
require_once 'src/Models/ProjectModel.php';

$db = DatabaseService::connect();

$projectModel = new ProjectModel($db);

$projects = $projectModel->getProjects();

echo "<pre>";
var_dump($projects);