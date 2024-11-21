<?php
require_once 'src/Entities/UserEntity.php';
class UserDisplayService
{
    public static function displaySingle(UserEntity $users): string
    {
        return "<div>$users->username</div>";
    }


    /**
     * @param UserEntity[] $users
     */
    public static function displayUsers(array $users): string
    {
        $output = '';
        foreach ($users as $user) {
            $output .= "<div class='shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100'>
            <div class='overflow-y-auto border rounded p-3 pb-0 h-full'>
                <h4 class='border-b pb-2 mb-3 text-2xl font-bold'>
                    <a href='user.html'>$user->username</a>
                    <img
                    src='$user->usericon' alt='Project Avatar'
                    class='float-right'>
                </h4>
                <div class='w-full'>
                    <a class='block border rounded border-slate-600 hover:underline mb-3 p-3 bg-slate-300 text-2xl' href='task.php'>
                        <h3 class='mb-0 font-bold'>curae
                            <span class='bg-teal-400 px-2 rounded text-white font-bold float-right'>2</span>
                        </h3>
                    </a>
                </div>
            </div>
        </div>";




        }
        return $output;
    }
}
