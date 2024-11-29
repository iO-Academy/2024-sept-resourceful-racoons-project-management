<?php
require_once 'src/Entities/UserEntity.php';
require_once 'src/Models/TaskModel.php';
require_once 'src/Services/TaskDisplayService.php';

class UserDisplayService
{
    public static function displaySingle(UserEntity $user): string
    {
        return "<div>$user->username</div>";
    }

    /**
     * @param UserEntity[] $users
     */
    public static function displayUsers(array $users, TaskModel $taskModel, int $projectID): string
    {
        $output = '';
        foreach ($users as $user) {
            $tasks=TaskDisplayService::displayTasks($taskModel->getTasksByUserID($user->id, $projectID));
            $output .= "<div class='shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100'>
            <div class='overflow-y-auto border rounded p-3 pb-0 h-full'>
                <h4 class='border-b pb-2 mb-3 text-2xl font-bold'>
                    <a href='user.html'>$user->username</a>
                    <img
                    src='$user->usericon' alt='Project Avatar'
                    class='float-right'>
                </h4>
                <div class='w-full'>
                    $tasks
                </div>
            </div>
        </div>";
        }
        return $output;
    }
}
