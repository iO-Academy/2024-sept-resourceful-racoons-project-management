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
    public static function displayTasks(array $tasks): string
    {

//        $output = '';
//        foreach ($tasks as $task) {
//            //the . concatenates all the tasks so they all show on one page. Removed . to only show one task per page.
//            $output = "<div class='w-1/2'>
//            <h5 class='text-lg font-bold'>Task Estimate:</h5>
//            <p>$task->estimate</p>
//        </div>
//        <div class='w-1/2'>
//            <h5 class='text-lg font-bold'>Task Deadline:</h5>
//            <p class='text-red-500'>$task->deadline</p>
//        </div>
//        <div class='w-full my-3'>
//            <h5 class='text-lg font-bold'>Task Description:</h5>
//            <p>$task->description</p>
//        </div>";
        }
        return $output;
    }
}

