<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();

            $project->title = $faker->realText(50);
            $project->slug = Str::slug($project->title, '-');
            // $project->thumb = 'thumbs/' . $faker->image('public/storage/thumbs', category: 'Projects', fullPath: 'false');
            $project->thumb = $faker->imageUrl(category: 'Projects');
            // dd($project->thumb);
            $project->description = $faker->realText();
            $project->tech = $faker->company();

            $project->link_github = $faker->url();
            $project->link_project_online = $faker->url();

            $project->save();
        }
    }
}
