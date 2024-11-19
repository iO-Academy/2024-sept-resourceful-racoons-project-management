<?php

require_once 'src/Entities/ProjectEntity.php';

class ProjectDisplayService
{
    public function displaySingle(ProjectEntity $projects): string
    {
        return "<div>$projects->name</div>";
    }


    /**
     * @param ProjectEntity[] $projects
     */
    public function displayProjects(array $projects): string
    {
        $output = '';
        foreach ($projects as $project)
        {
            $output .= "<div>$project->name </div>";
        }
        return $output;
    }

}

