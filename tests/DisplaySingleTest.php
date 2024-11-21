<?php

use PHPUnit\Framework\TestCase;

require_once "src/Services/ProjectDisplayService.php";
require_once "src/Models/ProjectModel.php";

class DisplaySingleTest extends TestCase
{
    public function testDisplaySingle()
    {
        $projectMock = $this->createMock(ProjectEntity::class);
        $projectMock->name = 'Test Project';
        $actual = ProjectDisplayService::displaySingle($projectMock);
        $expected = "<div>$projectMock->name</div>";
        $this->assertEquals($expected, $actual);
    }
}
