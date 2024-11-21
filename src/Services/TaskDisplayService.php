<?php

require_once 'src/Entities/TaskEntity.php';
// WORK IN PROGRESS
//class TaskDisplayService
//{
//    public static function displaySingle(ProjectEntity $projects): string
//    {
//        return "<div>$projects->name</div>";
//    }
//
//
//    /**
//     * @param ProjectEntity[] $projects
//     */
//    public static function displayProjects(array $projects): string
//    {
//        $output = '';
//        foreach ($projects as $project)
//        {
//            $output .= " <a href='project.html' class='hover:underline rounded-lg border p-4 py-6 text-4xl font-bold
//            w-full md:w-1/4 bg-slate-300'>$project->name</a>";
//            //Put the html inside the foreach loop. Must be $project not $projects otherwise it can't read the array.
//        }
//        return $output;
//    }

class TaskDisplayService
{
    public static function displaySingle(TaskEntity $tasks): string
    {
        return "<div>$tasks->taskname</div>";
    }


    /**
     * @param TaskEntity[] $tasks
     */
    public static function displayTasks(array $tasks): string
    {
        $output = '';
        foreach ($tasks as $task) {
            $output .= "<a class='block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl' href='task.php'>
                        <h3 class='mb-0 font-bold'>$task->taskname<span class='badge badge-info float-right'></span></h3>
                    </a>";
        }
        return $output;
    }

}
