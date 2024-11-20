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
        foreach ($projects as $project)
        {
            $output .= " <a href='project.php' class='hover:underline rounded-lg border p-4 py-6 text-4xl font-bold
            w-full bg-slate-300'>$project->name</a>";
            //Put the html inside the foreach loop. Must be $project not $projects otherwise it can't read the array.
        }
        return $output;
    }
}

