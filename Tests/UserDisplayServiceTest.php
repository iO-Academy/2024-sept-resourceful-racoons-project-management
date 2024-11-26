<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Services/UserDisplayService.php';
require_once 'src/Models/UserModel.php';

class UserDisplayServiceTest extends TestCase
{
    public function testUserDisplay_TaskByUser()
    {
        $usermock = $this->createMock(UserEntity::class);
        $usermock->username = 'TestName';
        $usermock->id = 1;
        $usermock->usericon = 'TestIcon';

        $taskmock = $this->createMock(TaskEntity::class);
        $taskmock->taskname = 'TestTaskName';
        $taskmock->estimate = '1';
        $taskmock->deadline = '1970-01-01';

        $taskmodelmock = $this->createMock(TaskModel::class);
        $taskmodelmock->method('getTasksByUserID')->willReturn([$taskmock]);
        $actual = UserDisplayService::displayUsers([$usermock], $taskmodelmock, 5);
        $expected = "<div class='shrink-0 w-full sm:w-1/2 lg:w-1/4 h-100'>
            <div class='overflow-y-auto border rounded p-3 pb-0 h-full'>
                <h4 class='border-b pb-2 mb-3 text-2xl font-bold'>
                    <a href='user.html'>TestName</a>
                    <img
                    src='TestIcon' alt='Project Avatar'
                    class='float-right'>
                </h4>
                <div class='w-full'>
                    <a class='block border rounded border-red-600 hover:underline mb-3 p-3 bg-red-200 border-red-600 text-2xl' href='task.html'>
                                    <h3 class='mb-0 text-red-800 font-bold'>TestTaskName
                                    <span class='bg-teal-400 px-2 rounded text-white font-bold float-right'>1</span>
                                </h3>
                            </a>
                </div>
            </div>
        </div>";
        $this->assertEquals($expected, $actual);
    }

}