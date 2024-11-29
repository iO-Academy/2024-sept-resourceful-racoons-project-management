<?php
require_once 'src/Services/DatabaseService.php';
require_once 'src/Models/TaskModel.php';
require_once 'src/Entities/TaskEntity.php';
require_once 'src/Services/TaskDisplayService.php';

$db = DatabaseService::connect();
$taskModel = new TaskModel($db);
$task_id = $_GET["task_id"];
//taking the task_id from the URL and passing it through the function below
$task = $taskModel->getTaskById($task_id);
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
</header>
<main class="p-3">
    <div class="flex justify-between mb-3">
        <h2 class="text-4xl font-bold mb-2"><?php echo $task->name . ' - ' . DateService::dateFormat($task) ?>
            <a href="project.php?id=<?php echo $task->project_id ?>" class="text-base text-blue-600 hover:underline ms-3">Return to project</a>
        </h2>
        <div class="flex items-center gap-3">
            <h3 class="text-3xl font-bold">User</h3>
            <img class="w-[50px]" src="http://dummyimage.com/200x200.png/dddddd/000000" alt="profile pic" />
        </div>
    </div>
    <section class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-3">
        <?php echo TaskDisplayService::displayTask($task); ?>

    </section>
</main>
<div style="right: 0px; top: 150px; height: 300px;" class="fixed">→</div>
<footer class="border-t border-slate-300 mt-3 mx-3 p-3 pt-5">
    <p>&copy; Copyright iO Academy 2024</p>
</footer>
</body>
</html>