<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Services/ProjectDisplayService.php';
require_once 'src/Models/ProjectModel.php';

class ProjectDisplayServiceTest extends TestCase
{
    public function testDisplayProjects()
    {
        // Don't mock the object you're testing
        // Mock any objects that you need to give to the thing you're testing
        $projectMock = $this->createMock(ProjectEntity::class);
        $projectMock->name = 'Test Project';
        $projectMock->deadline = '1970-01-01';

        // displayProjects needs to be given an array of ProjectEntity objects
        $actual = ProjectDisplayService::displayProjects([$projectMock]);
        // displayProjects wants an array of entities, so we need to put out mock entity
        // into an array = hence the []

        $expected = "<a href='project.php' class='hover:underline rounded-lg border border-red-600 p-4 py-6 text-4xl font-bold w-full bg-red-300'>$projectMock->name</a>";

        $this->assertEquals($expected, $actual);
    }
    public function testDisplaySingle()
    {
        $projectMock = $this->createMock(ProjectEntity::class);
        $projectMock->name = 'Test Project';
        $projectMock->deadline = '1970-01-01';
        $actual = ProjectDisplayService::displaySingle($projectMock);
        $expected = "<div>$projectMock->name</div>";
        $this->assertEquals($expected, $actual);
    }
}