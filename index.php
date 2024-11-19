<?php

require_once 'src/Services/DatabaseService.php';
require_once 'src/Models/ProjectModel.php';
require_once 'src/Models/UserModel.php';

$db = DatabaseService::connect();

$projectModel = new ProjectModel($db);
$userModel = new UserModel($db);

$projects = $projectModel->getProjectName();


echo "<pre>";
var_dump($projects);