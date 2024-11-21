<?php
require_once 'src/Entities/TaskEntity.php';
class TaskDisplayService
{
    public static function displaySingle(TaskEntity $tasks): string
    {
        return "<div>$tasks->name</div>";
    }


    public static function displayTask(TaskEntity $task): string
    {
        //the . concatenates all the tasks so they all show on one page. Removed . to only show one task per page.
        //$task doesn't contain what you think it does -> when it says attempt to read property
        //means the bit before the skinny arrow isn't what you think it is
        $deadline = TaskDisplayService::taskDateFormat($task);
        $output = "<div class='w-1/2'>
            <h5 class='text-lg font-bold'>Task Estimate:</h5>
            <p>$task->estimate</p>
        </div>
        <div class='w-1/2'>
            <h5 class='text-lg font-bold'>Task Deadline:</h5>
            <p class='text-red-500'>$deadline</p>
        </div>
        <div class='w-full my-3'>
            <h5 class='text-lg font-bold'>Task Description:</h5>
            <p>$task->description</p>
        </div>";
        return $output;
    }

    public static function displayTasks(array $tasks): string
    {
        $output = '';
        foreach ($tasks as $task) {
            if (!DateService::isOverdue($task->deadline)) {
                $output .= "<a class='block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl' href='task.php'>
                                <h3 class='mb-0 font-bold'>$task->taskname
                                <span class='bg-teal-400 px-2 rounded text-white font-bold float-right'>$task->estimate</span>
                                </h3>
                            </a>";
            } else {
                $output .= "<a class='block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl' href='task.html'>
                                    <h3 class='mb-0 text-red-800 font-bold'>$task->taskname
                                    <span class='bg-teal-400 px-2 rounded text-white font-bold float-right'>$task->estimate</span>
                                </h3>
                            </a>";
            }
        }
        return $output;
    }

    public static function taskDateFormat(TaskEntity $tasks): string
    {
        $time = strtotime($tasks->deadline);
        return date('d-m-Y', $time);
    }
}

