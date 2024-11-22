<?php
require_once 'src/Entities/TaskEntity.php';
require_once 'src/Services/DateService.php';

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
            if (!DateService::isOverdue($task->deadline)) {
                $output .= "<a class='block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl' href='task.php'>
                                <h3 class='mb-0 font-bold'>$task->taskname
                                <span class='bg-teal-400 px-2 rounded text-white font-bold float-right'>$task->estimate</span>
                                </h3>
                            </a>";
            } else {
                $output .= "<a class='block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl' href='task.php'>
                                    <h3 class='mb-0 text-red-800 font-bold'>$task->taskname
                                    <span class='bg-teal-400 px-2 rounded text-white font-bold float-right'>$task->estimate</span>
                                </h3>
                            </a>";
            }
        }
        return $output;
    }
}
