<?php
require_once 'src/Services/DatabaseService.php';
require_once 'src/Models/ProjectModel.php';
require_once 'src/Services/ProjectDisplayService.php';
require_once 'src/Models/UserModel.php';

$db = DatabaseService::connect();
$projectModel = new ProjectModel($db);
$userModel = new UserModel($db);

$projects = $projectModel->getAll();

$projects = $projectModel->getProjects();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="p-3 bg-teal-50 flex justify-between">
        <h1 class="sm:text-5xl text-4xl"><a href="index.php">Project Manager</a></h1>
    </header>
    <main class="p-3">
        <h2 class="text-4xl font-bold mb-2">Projects</h2>

        <section class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-3">
            <?php
            echo
            ProjectDisplayService::displayProjects($projects);
            //Called the static function, using HTML within the function to display all the project names.
            ?>
        </section>
    </main>
    <footer class="border-t border-slate-300 mt-3 mx-3 p-3 pt-5">
        <p>&copy; Copyright iO Academy 2024</p>
    </footer>
</body>
</html>