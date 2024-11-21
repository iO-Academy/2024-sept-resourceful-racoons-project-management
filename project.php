<?php

require_once 'src/Services/DatabaseService.php';
require_once 'src/Models/ProjectModel.php';
require_once 'src/Models/UserModel.php';
require_once 'src/Models/TaskModel.php';
require_once 'src/Services/TaskDisplayService.php';
require_once 'src/Services/UserDisplayService.php';
$db = DatabaseService::connect();

$projectModel = new ProjectModel($db);
$userModel = new UserModel($db);
$taskModel = new TaskModel($db);

$projects = $projectModel->getProjectName();


$users = $userModel->getAll();



//$output = '';
//echo "<pre>";
//var_dump($ids);
//exit();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Manager - Project Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<header class="p-3 bg-teal-50 flex justify-between">
    <h1 class="sm:text-5xl text-4xl"><a href="index.php">Project Manager</a></h1>
    <div class="pr-3 flex">
        <a href="project.html" class="p-3 bg-slate-300 rounded-l-lg border-y border-l">🇬🇧</a>
        <a href="project-us.html" class="p-3 rounded-r-lg border-y border-r">🇺🇸</a>
    </div>
</header>
<main class="p-3">
    <div class="flex justify-between mb-3">

        <?php
        echo "<h2 class='text-4xl font-bold mb-2'>{$projects['projectname']}
            <a href='index.php' class='text-base text-blue-600 hover:underline ms-3'>Return to all projects</a>
        </h2>";
        ?>

        <div class="flex items-center gap-3">
            <?php
            echo "<h3 class='text-3xl font-bold'>{$projects['clientname']}</h3>";
            echo "<img class='w-[50px]' src='{$projects['clientlogo']}' alt='client logo' />"
            ?>
        </div>
    </div>

    <section class="flex gap-5 flex-nowrap h-[70vh] pb-5 overflow-x-auto">
        <?php
        echo
        UserDisplayService::displayUsers($users, $taskModel, $projects['id']);


        ?>



    </section>
</main>
<div style="right: 0px; top: 150px; height: 300px;" class="fixed">→</div>
<footer class="border-t border-slate-300 mt-3 mx-3 p-3 pt-5">
    <p>&copy; Copyright iO Academy 2024</p>
</footer>
</body>
</html>