<?php

use App\ExperienceType;
use Illuminate\Database\Seeder;

class AddProjectToExperienceType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expetrienceType = new ExperienceType();
        $expetrienceType->name = 'Project';
        $expetrienceType->save();
    }
}
