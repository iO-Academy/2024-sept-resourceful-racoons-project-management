<?php

require_once 'src/Entities/ProjectEntity.php';

class ProjectDisplayService
{
    public static function displaySingle(ProjectEntity $projects): string
    {
        return "<div>$projects->name</div>";
    }


    /**
     * @param ProjectEntity[] $projects
     */
    public static function displayProjects(array $projects): string
    {
        $output = '';
        $today = date('Y-m-d');
        foreach ($projects as $project) {
            if ($project->deadline < $today) {
                $output .= "<a href='project.php?id={$project->id}' class='hover:underline rounded-lg border border-red-600 p-4 py-6 text-4xl font-bold w-full bg-red-300'>{$project->name}</a>";
            } else {
                $output .= "<a href='project.php?id={$project->id}' class='hover:underline rounded-lg border p-4 py-6 text-4xl font-bold w-full bg-slate-300'>{$project->name}</a>";
            }
        }
        return $output;
    }

}


