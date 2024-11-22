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
        <a href="project.php" class="p-3 bg-slate-300 rounded-l-lg border-y border-l">🇬🇧</a>
        <a href="project-us.html" class="p-3 rounded-r-lg border-y border-r">🇺🇸</a>
    </div>
</header>
<main class="p-3">
    <div class="flex justify-between mb-3">

        <h2 class="text-4xl font-bold mb-2">Project Name
            <a href="index.php" class="text-base text-blue-600 hover:underline ms-3">Return to all projects</a>
        </h2>

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

        <div class="shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100">
            <div class="overflow-y-auto border rounded p-3 pb-0 h-full">
                <h4 class="border-b pb-2 mb-3 text-2xl font-bold">
                    <a href="user.html">Lamond Teather</a>
                    <img
                    src="https://robohash.org/explicaboautodit.png?size=50x50&set=set1" alt="Project Avatar"
                    class="float-right">
                </h4>
                <div class="w-full">
                    <a class="block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl" href="task.php">
                        <h3 class="mb-0 text-red-800 font-bold">mattis
                            <span class="bg-teal-400 px-2 rounded text-white font-bold float-right">3</span>
                        </h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae
                            <span class="bg-teal-400 px-2 rounded text-white font-bold float-right">2</span>
                        </h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100">
            <div class="overflow-y-auto border rounded p-3 pb-0 h-full">
                <h4 class="border-b pb-2 mb-3 text-2xl font-bold">
                    <?php
                    echo "<a href='user.html'>{$projects['projectname']}</a>"
                    ?>
                    <img
                    src="https://robohash.org/explicaboautodit.png?size=50x50&set=set1" alt="User Avatar"
                    class="float-right">
                </h4>
                <div class="w-full">
                    <a class="block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl" href="task.php">
                        <?php
                        echo "<h3 class='mb-0 text-red-800 font-bold'>{$projects['clientname']}
                            <span class='bg-teal-400 px-2 rounded text-white font-bold float-right'>3</span>
                        </h3>"
                        ?>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100">
            <div class="overflow-y-auto border rounded p-3 pb-0 h-full">
                <h4 class="border-b pb-2 mb-3 text-2xl font-bold">
                    <a href="user.html">Lamond Teather</a>
                    <img
                    src="https://robohash.org/explicaboautodit.png?size=50x50&set=set1" alt="User Avatar"
                    class="float-right">
                </h4>
                <div class="w-full">
                    <a class="block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl" href="task.php">
                        <h3 class="mb-0 text-red-800 font-bold">mattis
                            <span class="bg-teal-400 px-2 rounded text-white font-bold float-right">3</span>
                        </h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100">
            <div class="overflow-y-auto border rounded p-3 pb-0 h-full">
                <h4 class="border-b pb-2 mb-3 text-2xl font-bold">
                    <a href="user.html">Lamond Teather</a>
                    <img
                    src="https://robohash.org/explicaboautodit.png?size=50x50&set=set1" alt="User Avatar"
                    class="float-right">
                </h4>
                <div class="w-full">
                    <a class="block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl" href="task.php">
                        <h3 class="mb-0 text-red-800 font-bold">mattis
                            <span class="bg-teal-400 px-2 rounded text-white font-bold float-right">3</span>
                        </h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100">
            <div class="overflow-y-auto border rounded p-3 pb-0 h-full">
                <h4 class="border-b pb-2 mb-3 text-2xl font-bold">
                    <a href="user.html">Lamond Teather</a>
                    <img
                    src="https://robohash.org/explicaboautodit.png?size=50x50&set=set1" alt="User Avatar"
                    class="float-right">
                </h4>
                <div class="w-full">
                    <a class="block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl" href="task.php">
                        <h3 class="mb-0 text-red-800 font-bold">mattis
                            <span class="bg-teal-400 px-2 rounded text-white font-bold float-right">3</span>
                        </h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100">
            <div class="overflow-y-auto border rounded p-3 pb-0 h-full">
                <h4 class="border-b pb-2 mb-3 text-2xl font-bold">
                    <a href="user.html">Lamond Teather</a>
                    <img
                    src="https://robohash.org/explicaboautodit.png?size=50x50&set=set1" alt="User Avatar"
                    class="float-right">
                </h4>
                <div class="w-full">
                    <a class="block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl" href="task.php">
                        <h3 class="mb-0 text-red-800 font-bold">mattis
                            <span class="bg-teal-400 px-2 rounded text-white font-bold float-right">3</span>
                        </h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100">
            <div class="overflow-y-auto border rounded p-3 pb-0 h-full">
                <h4 class="border-b pb-2 mb-3 text-2xl font-bold">
                    <a href="user.html">Lamond Teather</a>
                    <img
                    src="https://robohash.org/explicaboautodit.png?size=50x50&set=set1" alt="User Avatar"
                    class="float-right">
                </h4>
                <div class="w-full">
                    <a class="block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl" href="task.php">
                        <h3 class="mb-0 text-red-800 font-bold">mattis
                            <span class="bg-teal-400 px-2 rounded text-white font-bold float-right">3</span>
                        </h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                    <a class="block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl" href="task.php">
                        <h3 class="mb-0 font-bold">curae<span class="badge badge-info float-right"></span></h3>
                    </a>
                </div>
            </div>
        </div>
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