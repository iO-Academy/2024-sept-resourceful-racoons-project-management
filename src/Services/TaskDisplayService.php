<?php
require_once 'src/Entities/TaskEntity.php';
class TaskDisplayService
{
    public static function displaySingle(TaskEntity $tasks): string
    {
        return "<div>$tasks->name</div>";
    }

    /**
     * @param TaskEntity[] $tasks
     */
    public static function displayProjects(array $tasks): string
    {
        $output = '';
        foreach ($tasks as $task) {
            $output .= " <a href='project.php' class='hover:underline rounded-lg border p-4 py-6 text-4xl font-bold
            w-full bg-slate-300'>$task->name</a>";
            //Put the html inside the foreach loop. Must be $project not $projects otherwise it can't read the array.
        }
        return $output;
    }
}

